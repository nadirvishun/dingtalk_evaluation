<?php

namespace App\Http\Controllers;

use EasyDingTalk\Kernel\BaseClient;
use Illuminate\Http\Request;
use App\Example;
use Validator;
use Log;
use EasyDingTalk\Application;
use EasyDingTalk\Jssdk\ConfigBuilder;

class ExampleController extends Controller
{
    //展示数据
    public function index()
    {
        // $info=Example::select('name')->get();

        // $info=Example::first(['name']);

        $info = Example::All(['name']);

        return view('example.index', ['info' => $info]);
    }

    /**
     * 创建数据
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            //验证数据有效性,如果出错，会自动抛出json格式的错误（只能是json格式的）
            /* $this->validate($request, [
                 'name' => 'bail|required|min:3'
             ]);*/
            $name = $request->input('name');

            //自定义数据验证
//            $message=[
//                'name.required'=>'名称必须填写',
//                'name.min'=>'名称最少3个字符'
//            ];
            $validator = Validator::make($request->all(), [
                'name' => 'bail|required|min:3'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                /*foreach($errors->all() as $error){
                    return $error;
                }*/
                return $errors->first();//取第一个错误
            }
            //save方法
            // $exampleModel=new Example();
            // $exampleModel->name=$name;
            // $res=$exampleModel->save();

            //直接insert不触发自动写入时间
            // $res=Example::insert(['name'=>$name]);

            //create方法，需要先在model中开启白名单，白名单中时间等自动写入的无需填写
            $res = Example::create(['name' => $name]);
            dd($res);
        } else {
            return view('example.create');
        }
    }

    /**
     * 测试钉钉相关
     */
    public function dingtalk()
    {
        $corpId = env('CORP_ID');
        $corpSecret = env('CORP_SECRET');
        $agentId=env('AGENT_ID');
        //前端赋值
        $options = [
            'corp_id' => $corpId,
            'corp_secret' => $corpSecret,
        ];
        $app = new Application($options);
        //调用组装配置类获取组装结果
        $config = new ConfigBuilder($app->jssdk);
        $ddConfig = $config->ofAgent($agentId)->useApi([
            'biz.user.get',
            'biz.contact.choose',
            'biz.contact.complexPicker',
            'biz.contact.departmentsPicker'
        ])->toArray();

        return view('example.dingtalk', ['ddConfig' => $ddConfig]);
    }

    /**
     * 获取用户身份
     */
    public function getUserInfo(Request $request)
    {
        $corpId = env('CORP_ID');
        $corpSecret = env('CORP_SECRET');
        //前端赋值
        $options = [
            'corp_id' => $corpId,
            'corp_secret' => $corpSecret,
        ];
        $app = new Application($options);
        $baseClient = new BaseClient($app);
        $code = $request->input('code');
        $result = $baseClient->httpGet('user/getuserinfo', ['code' => $code]);
        return $result;
    }
}

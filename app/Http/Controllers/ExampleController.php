<?php

namespace App\Http\Controllers;
use App\Example;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function index(){
        $info=Example::select('name')->get();
        return response()->json($info);
    }
    /**
     * 创建数据
     */
    public function create(){
        $exampleModel=new Example();
        $exampleModel->name='abc';
        $res=$exampleModel->save();
        if($res){
            return 'insert success!';
        }else{
            return 'insert failed!';
        }

    }
}

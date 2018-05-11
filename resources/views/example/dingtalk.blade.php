<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>钉钉</title>
    </head>
    <body>
        <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js" charset="utf-8"></script>
        <script src="http://g.alicdn.com/dingding/open-develop/1.9.0/dingtalk.js"></script>
        <script>
            dd.config(@json($ddConfig));
            dd.ready(function(){
                //弹出框
                /*dd.device.notification.confirm({
                message: "你爱我吗",
                title: "提示",
                buttonLabels: ['爱', '不爱'],
                onSuccess : function(result) {
                    //onSuccess将在点击button之后回调
                    /!*
                    {
                        buttonIndex: 0 //被点击按钮的索引值，Number类型，从0开始
                    }
                    *!/
                },
                onFail : function(err) {}
                });*/

                //获取免登陆code
                /*dd.runtime.permission.requestAuthCode({
                    corpId: "{{ $ddConfig['corpId'] }}",
                    onSuccess: function(result) {
                        $.ajax({
                            url: "{{url('example/getUserInfo')}}",
                            type: 'POST',
                            data:{code:result.code},
                            dataType: 'json',
                            success: function(response){
                                /!*if (response.errcode === 0){
                                    proper.userInfo = response;
                                } else {
                                    alert(JSON.stringify(response) + 'getUserInfo');
                                }*!/
                                dd.device.notification.alert({
                                    message: response,
                                    title: "提示",//可传空
                                    buttonName: "收到",
                                    onSuccess : function() {
                                        //onSuccess将在点击button之后回调
                                        /!*回调*!/
                                    },
                                    onFail : function(err) {}
                                });
                            },
                            error: function(err){

                            }
                        });
                    },
                    onFail : function(err) {}
                });*/

                //获取用户信息
                /*dd.biz.user.get({
                    corpId:"{{ $ddConfig['corpId'] }}", // 可选参数，如果不传则使用用户当前企业的corpId。
                    onSuccess: function (info) {
                        dd.device.notification.alert({
                            message: JSON.stringify(info),
                            title: "提示",//可传空
                            buttonName: "收到",
                            onSuccess : function() {
                                //onSuccess将在点击button之后回调
                            },
                            onFail : function(err) {}
                        });
                    },
                    onFail: function (err) {
                        dd.device.notification.alert({
                            message: JSON.stringify(err),
                            title: "提示",//可传空
                            buttonName: "收到",
                            onSuccess : function() {
                                //onSuccess将在点击button之后回调
                            },
                            onFail : function(err) {}
                        });
                    }
                });*/

                //选择人员
                /*dd.biz.contact.complexPicker({
                    title:"测试标题",            //标题
                    corpId:"{{ $ddConfig['corpId'] }}",              //企业的corpId
                    multiple:true,            //是否多选
                    limitTips:"超出了",          //超过限定人数返回提示
                    maxUsers:1000,            //最大可选人数
                    pickedUsers:[],            //已选用户
                    pickedDepartments:[],          //已选部门
                    disabledUsers:[],            //不可选用户
                    disabledDepartments:[],        //不可选部门
                    requiredUsers:[],            //必选用户（不可取消选中状态）
                    requiredDepartments:[],        //必选部门（不可取消选中状态）
                    appId:{{ $ddConfig['agentId'] }},              //微应用的Id
                    permissionType:"GLOBAL",          //选人权限，目前只有GLOBAL这个参数
                    responseUserOnly:false,        //返回人，或者返回人和部门
                    startWithDepartmentId:0 ,   // 0表示从企业最上层开始
                    onSuccess: function(result) {
                        dd.device.notification.alert({
                            message: JSON.stringify(result),
                            title: "提示",//可传空
                            buttonName: "收到",
                            onSuccess : function() {
                                //onSuccess将在点击button之后回调
                            },
                            onFail : function(err) {}
                        });
                        /!**
                         {
                             selectedCount:1,                              //选择人数
                             users:[{"name":"","avatar":"","emplId":""}]，//返回选人的列表，列表中的对象包含name（用户名），avatar（用户头像），emplId（用户工号）三个字段
                             departments:[{"id":,"name":"","number":}]//返回已选部门列表，列表中每个对象包含id（部门id）、name（部门名称）、number（部门人数）
                         }
                         *!/
                    },
                    onFail : function(err) {}
                });*/

                //选择部门
                dd.biz.contact.departmentsPicker({
                    title:"测试标题",            //标题
                    corpId:"{{ $ddConfig['corpId'] }}",              //企业的corpId
                    multiple:true,            //是否多选
                    limitTips:"超出了",          //超过限定人数返回提示
                    maxDepartments:100,            //最大选择部门数量
                    pickedDepartments:[],          //已选部门
                    disabledDepartments:[],        //不可选部门
                    requiredDepartments:[],        //必选部门（不可取消选中状态）
                    appId:{{ $ddConfig['agentId'] }},              //微应用的Id
                    permissionType:"GLOBAL",          //选人权限，目前只有GLOBAL这个参数
                    onSuccess: function(result) {
                        dd.device.notification.alert({
                            message: JSON.stringify(result),
                            title: "提示",//可传空
                            buttonName: "收到",
                            onSuccess : function() {
                                //onSuccess将在点击button之后回调
                            },
                            onFail : function(err) {}
                        });
                        /**
                         {
                             userCount:1,                              //选择人数
                             departmentsCount:1，//选择的部门数量
                             departments:[{"id":,"name":"","number":}]//返回已选部门列表，列表中每个对象包含id（部门id）、name（部门名称）、number（部门人数）
                         }
                         */
                    },
                    onFail : function(err) {}
                });

            });
        </script>
    </body>
</html>
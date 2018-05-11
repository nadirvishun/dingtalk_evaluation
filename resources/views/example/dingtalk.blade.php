<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>钉钉</title>
    </head>
    <body>
        
        <script src="http://g.alicdn.com/dingding/open-develop/1.9.0/dingtalk.js"></script>
        <script>
            dd.config({{$ddConfig}});
            dd.ready(function(){
                dd.device.notification.confirm({
                message: "你爱我吗",
                title: "提示",
                buttonLabels: ['爱', '不爱'],
                onSuccess : function(result) {
                    //onSuccess将在点击button之后回调
                    /*
                    {
                        buttonIndex: 0 //被点击按钮的索引值，Number类型，从0开始
                    }
                    */
                },
                onFail : function(err) {}
                });
            });
        </script>
    </body>
</html>
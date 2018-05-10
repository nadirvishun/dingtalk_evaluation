<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>创建</title>
</head>
<body>
    <h2>表单提交</h2>
    <form action="{{url('example/create')}}" method="post">
        <label for="name">填写名称：</label>
        <input type="text" name='name' id='name'>
        <button type="submit">提交</button>
    </form>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\person.html";i:1539834204;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>设置</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!--标准mui.css-->
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <!--App自定义的css-->
    <link rel="stylesheet" type="text/css" href="__WAP__/css/app.css"/>
    <style>
        .mui-content-padded{
            margin: 10px;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-back mui-pull-left"></a>
    <h1 class="mui-title">设置</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded">
        <span id="loginOut" class="mui-btn mui-btn-primary mui-btn-block">退出登录</span>
    </div>
</div>
</body>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
    $('#loginOut').click(function () {
        $.ajax({
            type:"post",
            url:"<?=url('login/loginout')?>",
            data:$('#payForm').serialize(),
            success:function (result) {
                console.log(result);
                if(result.code == '1'){
                    mui.alert('成功退出！！', function() {
                        location.href="<?=url('login/login')?>";
                    });
                }else{
                    layer.msg(result.msg, {icon: 2, time: 3000});
                }
            }
        })
    });
</script>
</html>
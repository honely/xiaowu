<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"G:\xampp\htdocs\bbb\public/../application/marketm\view\login\login.html";i:1537602909;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!--标准mui.css-->
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <!--App自定义的css-->
    <!-- <link rel="stylesheet" type="text/css" href="../css/app.css" /> -->
    <style>
        h5 {
            margin: 5px 7px;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">登录</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group" id="loginForm">
            <div class="mui-input-row">
                <label>账号</label>
                <input type="text" name="u_account" id="u_account" placeholder="请输入手机号或邮箱进行登录">
            </div>
            <div class="mui-input-row">
                <label>密码</label>
                <input type="password" name="u_password" id="u_password" class="mui-input-password">
            </div>
            <div class="mui-content-padded">
                <span type="button" id="login" class="mui-btn mui-btn-primary mui-btn-block">登录</span>
            </div>
        </form>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    $('#login').click(function () {
        var u_account=$('#u_account').val();
        var u_password=$('#u_password').val();
        if(u_account.length<=0){
            mui.alert('请输入手机号或者邮箱进行登录！', function() {
                $('#u_account').focus();
            });
        }else{
            if(u_password.length<=0){
                mui.alert('请输入至少6位登录密码', function() {
                    $('#u_password').focus();
                });
            }else{
                $.ajax({
                    'type':"post",
                    'url':"<?=url('login/login')?>",
                    'data':$('#loginForm').serialize(),
                    'success':function (result) {
                        if(result.code == '1'){
                            mui.alert(result.msg, function() {
                                window.location.href="<?=url('index/index')?>";
                            });
                        }else{
                            mui.toast(result.msg);
                        }
                    },
                    'error':function (error) {
                        console.log(error);
                    }
                })
            }
        }
    });
</script>
</body>

</html>
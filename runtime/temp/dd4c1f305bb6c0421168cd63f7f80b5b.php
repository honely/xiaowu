<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"G:\xampp\htdocs\bbb\public/../application/marketm\view\login\login.html";i:1544579067;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style>
        h5 {
            margin: 5px 7px;
        }
        .login{
            width: 100%;
            height: 100%;
            background: url(__WAP__/images/login-bg.png) no-repeat;
            background-size: cover;
            position: fixed;
            z-index: -10;
        }
        .welcome{
            width: 100%;
            margin: 30% 0;
            text-align: center;
            color: #fff;
            font-size: 25px;
        }
        .login-form{
            margin: 0;
            padding: 0;
            border: 0;
            list-style: none;
            font-style: normal;
        }
        .login-inp{
            margin: 0 30px 15px 30px;
            border: 1px solid #fff;
            border-radius: 25px;
            line-height: 42px;
        }
        .login-inp label {
            width: 20%;
            text-align: center;
            display: inline-block;
            color: #fff;
        }
        .login-inp input {
            line-height: 40px;
            color: #fff;
            width: 80%;
            display: inline-block;
            background-color: transparent;
            border: none;
            outline: none;
            float: right;
        }
        .login-inp span{
            display: block;
            width: 100%;
            text-align: center;
            line-height: 40px;
            color: #fff;
            font-size: 16px;
            letter-spacing: 5px;
        }
    </style>
</head>
<body>
<div class="mui-content login" >
    <div class="welcome">
        欢迎登录大城小屋！
    </div>
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="login-form" id="loginForm">
            <div class="login-inp">
                <label>账号</label>
                <input type="text" name="u_account" id="u_account" placeholder="请输入手机号或邮箱">
            </div>
            <div class="login-inp">
                <label>密码</label>
                <input type="password" name="u_password" id="u_password" placeholder="请输入密码"/>
            </div>
            <div class="login-inp">
                <span id="login">登录</span>
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
                            var data=result.data;
                            var u_role=data.u_depart_id;
                            mui.alert(result.msg, function() {
                                console.log(u_role);
                                if(u_role == 1){
                                    //事业部房源收入
                                    window.location.href="<?=url('index/house')?>";
                                }else if(u_role == 2){
                                    //工程部房源装修
                                    window.location.href="<?=url('decoration/index/index')?>"
                                }else if(u_role == 3){
                                    //运营部房源出租
                                    window.location.href="<?=url('operation/index/index')?>"
                                }else if(u_role == 4){
                                    //管理层对房源的整体监控
                                    window.location.href="<?=url('manager/index/index')?>"
                                }else if(u_role == 5){
                                    //房源的分配  事业部->工程部
                                    window.location.href="<?=url('manager/admin/index')?>"
                                }else if(u_role == 6){
                                    //房源的分配  工程部->运营部
                                    window.location.href="<?=url('manager/allot/index')?>"
                                }
                            });
                        }else{
                            mui.alert(result.msg, function() {
                                window.location.href="<?=url('login/login')?>";
                            });
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
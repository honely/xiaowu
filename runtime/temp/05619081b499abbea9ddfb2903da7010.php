<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"G:\xampp\htdocs\bbb\public/../application/admin\view\login\login.html";i:1543896578;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <link rel="stylesheet" href="__PUBLIC/static/admin.css">
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <script src="__LAY__/layui.js"></script>
    <style>
        html,body{
            width: 100%;
            height: 100%;
        }
        #login{
            background: #179898;
            widht:100%;
            height: 100%;
            position: relative;
        }
        .login{
            width: 260px;
            position: absolute;
            background: #fff;
            padding: 60px 80px;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin:  auto;
            height: 320px;
        }
        .login h2 {
            font-size: 28px;
            font-weight: 100;
            color: #333;
            text-align: center;
            margin-bottom: 50px;
        }
    </style>
</head>
<body id="login">

<div class="login">
    <h2>后台管理系统</h2>
    <form class="layui-form" method="post" action="<?=url('login/login')?>">
        <div class="layui-form-item">
            <input type="username" name="username" placeholder="请输入手机号或邮箱" required lay-verify="required" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-item">
            <input type="password" name="password" placeholder="请输入密码" required lay-verify="required" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-item">
            <button style="padding: 0 102px;" class="layui-btn" lay-submit lay-filter="formDemo">立即登录</button>
        </div>
        <div class="layui-form-item" style="margin-top: 30px;">
            <div class="layui-word-aux" style="text-align: center !important;">技术支持QQ：1549089944</div>
        </div>
    </form>
    <script>
        layui.use('form', function(){
            var form = layui.form();
        });
    </script>
</div>
</body>
</html>
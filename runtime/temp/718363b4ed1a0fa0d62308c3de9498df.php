<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"G:\xampp\htdocs\bbb\public/../application/wap\view\index\register.html";i:1537595014;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style>
        h5 {
            margin: 5px 7px;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">注册</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group" id="regForm">
            <div class="mui-input-row">
                <label>姓名</label>
                <input type="text" name="u_name" id="u_name" placeholder="请输入您的真是姓名">
            </div>
            <div class="mui-input-row">
                <label>手机号</label>
                <input type="text" name="u_phone" id="u_phone" onkeyup="this.value=this.value.replace(/\D/g, '')" placeholder="请输入您的手机号">
            </div>
            <div class="mui-input-row">
                <label>邮箱</label>
                <input type="text" name="u_email" id="u_email"  placeholder="请输入您的邮箱">
            </div>
            <div class="mui-input-row">
                <label>密码</label>
                <input type="password" id="u_password" name="u_password"  class="mui-input-password">
            </div>
            <div class="mui-input-row">
                <label>确认密码</label>
                <input type="password" onblur="checkPass()" id="u_password1" class="mui-input-password">
            </div>
            <div class="mui-content-padded">
                <span type="button" id="reg" class="mui-btn mui-btn-primary mui-btn-block">注册</span>
            </div>
            <div class="mui-button-row">
                <a href="<?=url('index/login')?>">已有账号</a>
            </div>
        </form>
    </div>
    <div id="infos"></div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    function checkPass(){
        var u_password=$('#u_password').val();
        var u_password1=$('#u_password1').val();
        if(u_password.length<6 || u_password1.length<6){
            mui.alert('请输入至少6位数密码！', function() {
                $('#u_password').focus();
            });
        }
        if(u_password1 != u_password){
            mui.alert('两次输入的密码不一致！', function() {
                $('#u_password1').focus();
            });
        }
    }
    $('#reg').click(function () {
        var u_name=$('#u_name').val();
        var u_phone=$('#u_phone').val();
        var u_email=$('#u_email').val();
        var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
        var u_password=$('#u_password').val();
        var u_password1=$('#u_password1').val();
        if(u_name.length<=0){
            mui.alert('请输入您的真实姓名！', function() {
                $('#u_name').focus();
            });
        }else{
            if(u_phone.length<=0){
                mui.alert('手机号不能为空！', function() {
                    $('#u_phone').focus();
                });
            }else{
                if(u_phone.length != 11){
                    mui.alert('请输入正确的手机号码！', function() {
                        $('#u_phone').focus();
                    });
                }else{
                    if(u_email.length<=0){
                        mui.alert('邮箱不能为空！', function() {
                            $('#u_email').focus();
                        });
                    }else{
                        if(reg.test(u_email)){
                            if(u_password.length<6 || u_password1.length<6){
                                mui.alert('请输入至少6位数密码！', function() {
                                    $('#u_password').focus();
                                });
                            }else{
                                if(u_password1 != u_password){
                                    mui.alert('两次输入的密码不一致！', function() {
                                        $('#u_password1').focus();
                                    });
                                }else{
                                    $.ajax({
                                        'type':"post",
                                        'url':"<?=url('index/register')?>",
                                        'data':$('#regForm').serialize(),
                                        'success':function (result) {
                                            if(result.code == '1'){
                                                mui.alert(result.msg, function() {
                                                    window.location.href="<?=url('index/login')?>";
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
                        }else{
                            mui.alert('请输入正确的电子邮箱！', function() {
                                $('#u_email').focus();
                            });
                        }
                    }
                }
            }
        }
    });
</script>
</body>

</html>
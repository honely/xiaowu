<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\form.html";i:1539419689;}*/ ?>
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
        <form id="form1" action="javascript:upload();" method="post">
            <label>用户：</label>
            <input type="text" id="name1" style="border:2px solid red;" name="name"/><br>
            <label>图片：</label>
            <input type="file" id="file1" multiple="multiple" style="border:2px solid red;" name="ph"/>
            <p class="help-block">支持jpg、jpeg、png、gif格式，大小不超过5.0M</p>
            <button type="submit" style="border: 2px solid red;">上传1</button>
        </form>

        <!--<form id="form2" action="<%=request.getContextPath()%>/multi/save2.do" method="post" enctype="multipart/form-data">-->
            <!--<label>用户：</label>-->
            <!--<input type="text" id="name2" style="border:2px solid red;" name="name"/><br>-->
            <!--<label>图片：</label>-->
            <!--<input type="file" id="file2" multiple="multiple" style="border:2px solid red;" name="ph"/>-->
            <!--<p class="help-block">支持jpg、jpeg、png、gif格式，大小不超过5.0M</p>-->
            <!--<button type="submit" style="border: 2px solid red;">上传2</button>-->
        <!--</form>-->
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
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\resetpwd.html";i:1544579067;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>修改密码</title>
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
        label,input{
            font-size: 14px;
        }
        #login{
            font-size: 14px;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/person')?>?role=<?php echo $role; ?>"></a>
    <h1 class="mui-title">修改密码</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group" id="loginForm">
            <div class="mui-input-row">
                <label>账号</label>
                <input type="text" name="u_phone" id="u_phone" readonly value="<?php echo $account['u_phone']; ?>"/>
                <input type="hidden" name="u_id" readonly value="<?php echo $account['u_id']; ?>"/>
            </div>
            <div class="mui-input-row">
                <label>原密码</label>
                <input type="password" name="u_password" id="u_password" class="mui-input-password">
            </div>
            <div class="mui-input-row">
                <label>新密码</label>
                <input type="password" name="u_passwordn" id="u_passwordn" class="mui-input-password">
            </div>
            <div class="mui-input-row">
                <label>确认新密码</label>
                <input type="password" id="u_passwords" class="mui-input-password">
            </div>
            <ul class="mui-table-view">
                <li class="mui-table-view-cell" style="text-align: center;">
                    <span type="button" id="login" >确认修改</span>
                </li>
            </ul>
        </form>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui('body').on('tap','a',function(){
        if(this.href){
            window.top.location.href=this.href;
        }
    });
</script>
<script>
    $('#login').click(function () {
        var u_password=$('#u_password').val();
        var u_passwordn=$('#u_passwordn').val();
        var u_passwords=$('#u_passwords').val();
        if(u_password.length<6 ||　u_passwordn.length<6　|| u_passwords.length<6){
            mui.alert('请输入至少6位数密码！', function() {
            });
        }else{
            if(u_passwordn != u_passwords){
                mui.alert('两次输入的密码不一致！', function() {
                    $('#u_passwords').focus();
                });
            }else{
                $.ajax({
                    'type':"post",
                    'url':"<?=url('index/resetpwd')?>",
                    'data':$('#loginForm').serialize(),
                    'success':function (result) {
                        if(result.code == '1'){
                            mui.alert(result.msg, function() {
                                window.location.href="<?=url('login/login')?>";
                            });
                        }else{
                            mui.alert(result.msg, function() {
                                $('#u_password').focus();
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
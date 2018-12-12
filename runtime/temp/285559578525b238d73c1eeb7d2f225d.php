<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\person.html";i:1543561172;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>设置</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="__WAP__/css/app.css"/>
    <style>
        .mui-content-padded{
            margin: 10px;
        }
        #head-img1 {
            position: absolute;
            bottom: 10px;
            right: 25px;
            width: 40px;
            height: 40px;
        }
        .mui-table-view-cell{
            position: relative;
            overflow: hidden;
            padding: 11px 15px;
        }
        a{
            font-size: 14px;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-back mui-pull-left"
        <?php switch($role): case "1": ?>href="<?=url('index/house')?>"<?php break; case "2": ?>href="<?=url('manager/admin/index')?>"<?php break; case "3": ?>href="<?=url('decoration/index/index')?>"<?php break; case "4": ?>href="<?=url('manager/allot/index')?>"<?php break; case "5": ?>href="<?=url('operation/index/index')?>"<?php break; case "6": ?>href="<?=url('manager/index/index')?>"<?php break; endswitch; ?>
    ></a>
    <h1 class="mui-title">设置</h1>
</header>
<div class="mui-content">
    <div class="mui-scroll">
        <ul class="mui-table-view">
            <li  id="head" class="mui-table-view-cell">
                <a style="line-height: 40px;" >头像
                    <span class="mui-pull-right head">
                            <img class="head-img" id="head-img1" src="__WAP__/images/logo.png"/>
                        </span>
                </a>
            </li>
            <li class="mui-table-view-cell">
                <a>姓名<span class="mui-pull-right"><?php echo $user['u_name']; ?></span></a>
            </li>
            <li class="mui-table-view-cell">
                <a>电话<span class="mui-pull-right"><?php echo $user['u_phone']; ?></span></a>
            </li>
            <li class="mui-table-view-cell">
                <a>职位<span class="mui-pull-right"><?php echo $user['u_c_id']; ?>-<?php echo $user['u_depart_id']; ?>-<?php echo $user['u_job']; ?></span></a>
            </li>
        </ul>
        <ul class="mui-table-view" style="margin-top: 20px;">
            <li class="mui-table-view-cell">
                <a href="<?=url('marketm/index/resetpwd')?>?role=<?php echo $role; ?>" class="mui-navigate-right">修改密码</a>
            </li>
        </ul>
        <ul class="mui-table-view" style="margin-top: 20px;">
            <li class="mui-table-view-cell" style="text-align: center;">
                <a id="loginOut">退出登录</a>
            </li>
        </ul>
    </div>
</div>
</body>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
    $("#head").click(function(){
        mui.alert('这个图像公司统一的，不能改！！');
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
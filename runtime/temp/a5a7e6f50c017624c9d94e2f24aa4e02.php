<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\deposit.html";i:1537955180;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1537929394;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1537954699;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>大城小屋智能公寓-知名的白领公寓|合租公寓|单身公寓出租</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" href="__WAP__/css/icons-extra.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">房屋托管</h1>
    <a class="mui-icon mui-icon-bars mui-icon-right-nav mui-pull-right" href="<?=url('index/nav')?>"></a>
</header>
<div class="mui-content">
    <div class="mui-card-header mui-card-media" style="height:43vw;background-image:url(__WEB__/img/dp_banners.jpg)"></div>
</div>
<div class="mui-content" style="padding-top: 0px;">
    <div class="mui-card-content-inner" style="padding-bottom: 2px;">
       <p style="font-size: 20px;">房东选择我们的理由</p>
    </div>
    <div class="mui-card-header mui-card-media" style="height:37vw;background-image:url(__WEB__/img/dp01.png);"></div>
</div>
<div class="mui-content" style="padding-top: 0px;">
    <div class="mui-card-header mui-card-media" style="height: 70vw;background-image:url(__WEB__/img/step.png);"></div>
</div>
<div class="mui-content" style="padding-top: 10px;">
    <form id="order">
        <div class="mui-input-row">
            <label>姓名</label>
            <input type="text" name="dp_name" id="dp_name" placeholder="请输入您的姓名">
        </div>
        <div class="mui-input-row">
            <label>电话</label>
            <input type="text" name="dp_phone" id="dp_phone" placeholder="请输入您的手机号">
        </div>
        <span onclick="makeOrders()" style="margin-top: 8px;" class="mui-btn mui-btn-danger mui-btn-block">一键托管</span>
    </form>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script type="text/javascript" charset="utf-8">
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });

</script>
</body>

</html>
<script>
    function makeOrders(){
        $.ajax({
            'type':"post",
            'url':"<?=url('index/deposit')?>",
            'data':$('#order').serialize(),
            'success':function (result) {
                if(result.code == '1'){
                    mui.alert(result.msg);
                }else{
                    mui.alert(result.msg);
                }
            },
            'error':function (error) {
                console.log(error);
            }
        })
    }
</script>
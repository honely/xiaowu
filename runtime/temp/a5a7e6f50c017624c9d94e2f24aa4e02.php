<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\deposit.html";i:1541236390;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1541226131;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1541228282;}*/ ?>
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
    <link rel="stylesheet" href="__WAP__/css/style.css">
    <link rel="stylesheet" href="__WEB__/css/swiper-3.4.2.min.css">
</head>
<body style="background:#fff;width:100%">
<header class="mui-bar mui-bar-nav">
    <a href="<?=url('index/index')?>" class="mui-icon-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">房屋托管</h1>
    <a id="menu" class="mui-action-menu mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
</header>
<style>

    .mui-plus .plus{
        display: inline;
    }

    .plus{
        display: none;
    }

    #topPopover {
       position: absolute;
        top: 16px;
        right: 6px;
    }
    #topPopover .mui-popover-arrow {
        left: auto;
        right: 6px;
    }
    p {
        text-indent: 22px;
    }
    span.mui-icon {
        font-size: 14px;
        color: #007aff;
        margin-left: -15px;
        padding-right: 10px;
    }
    .mui-popover {
        height: 355px;
    }
    .mui-content {
        padding: 10px;
    }
</style>
<div id="topPopover" class="mui-popover">
    <div class="mui-popover-arrow"></div>
    <div class="mui-scroll-wrapper">
        <div class="mui-scroll">
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/index')?>">网站首页</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/house')?>">快速找房</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/promise')?>">品质承诺</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/advance')?>">托管优势</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/news')?>">新闻资讯</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/about')?>">关于我们</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="tel:400-996-1585">联系我们</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="http://api.map.baidu.com/marker?location=34.230218,108.892857&title=陕西大城小屋不动产管理有限公司&content=陕西大城小屋不动产管理有限公司&output=html">公司地址</a>
                </li>
            </ul>
        </div>
    </div>

</div>
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
<div class="mui-content" style="margin-top: 8px;background:#fff;padding-top: 0px;">
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <p style="color: #5b5b5b;text-align: center;">Copyright © 2018 <a style="color: #5b5b5b" href="<?=url('index/index')?>">www.xiaowugroup.com</a>
                <br/>
                陕西大城小屋不动产管理有限公司
                <br/>
                版权所有 陕ICP备18007211号</p>
        </div>
    </div>
</div>
<div class="mui-content" style="margin-bottom: 8px;background:#fff;padding-top: 0px;">
    <span class="mui-btn mui-btn-warning" style="width: 46.5%;height: 36px;margin-left: 5px;"><a style="color:#fff" href="tel:18291435205">房屋托管</a></span>
    <span class="mui-btn mui-btn-warning" style="width: 46.5%;height: 36px"><a style="color:#fff" href="tel:17792870379">公寓租赁</a></span>
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
        var dp_name=$('#dp_name').val();
        var dp_phone=$('#dp_phone').val();
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        if(dp_name.length<=0){
            mui.alert("请输入您的姓名！", function() {
                $('#dp_name').focus();
            });
        }else{
            if(dp_phone.length != 11 || dp_phone.length<=0 ||!myreg.test(dp_phone)){
                mui.alert("请输入正确的手机号码！", function() {
                    $('#dp_phone').focus();
                });
            }else{
                $.ajax({
                    'type':"post",
                    'url':"<?=url('index/deposit')?>",
                    'data':$('#order').serialize(),
                    'success':function (result) {
                        if(result.code == '1'){
                            mui.alert(result.msg);
                            window.reload();
                        }else{
                            mui.alert(result.msg);
                        }
                    },
                    'error':function (error) {
                        console.log(error);
                    }
                })
            }
        }
    }
</script>
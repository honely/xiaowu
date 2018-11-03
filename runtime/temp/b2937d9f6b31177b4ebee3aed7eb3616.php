<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\detail.html";i:1541150833;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1541226131;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1541228282;}*/ ?>
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
    <a href="<?=url('index/news')?>" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title"><?php echo $news['art_title']; ?></h1>
</header>
<div class="mui-content" style="background-color:#fff; ">
    <div class="mui-content-padded" style="background-color:#fff; ">
        <h3><?php echo $news['art_title']; ?></h3>
        <h5 class="h5asd">发布时间：<?php echo $news['art_createtime']; ?><span style="float: right;margin-right: 10px;">浏览量：<?php echo $news['art_view']; ?></span></h5>
        <div style="background-color:#fff;">
            <p class="contentss" >
                <?php echo $news['art_content']; ?>
            </p>
        </div>
    </div>
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
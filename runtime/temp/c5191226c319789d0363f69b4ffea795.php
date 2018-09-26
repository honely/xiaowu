<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\nav.html";i:1537942332;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1537929394;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1537954699;}*/ ?>
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
    <a class="mui-icon mui-icon-bars mui-icon-right-nav mui-pull-right" href="<?=url('index/index')?>"></a>
</header>
<div class="mui-content">
    <ul class="mui-table-view mui-grid-view mui-grid-9">
        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
            <a href="<?=url('index/index')?>">
                <span class="mui-icon mui-icon-home"></span>
                <div class="mui-media-body">网站首页</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
            <a href="<?=url('index/deposit')?>">
                <span class="mui-icon mui-icon-map"></span>
                <div class="mui-media-body">房屋托管</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
            <a href="<?=url('index/house')?>">
                <span class="mui-icon mui-icon-search"></span>
                <div class="mui-media-body">快速找房</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
            <a href="<?=url('index/news')?>">
                <span class="mui-icon-extra mui-icon-extra-new"></span>
                <div class="mui-media-body">新闻资讯</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
            <a href="<?=url('index/about')?>">
                <span class="mui-icon mui-icon-person"></span>
                <div class="mui-media-body">关于我们</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
            <a  href="tel:400-996-1585">
                <span class="mui-icon mui-icon-phone"></span>
                <div class="mui-media-body">联系我们</div>
            </a>
        </li>
    </ul>
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
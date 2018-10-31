<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\details.html";i:1540863668;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1538205562;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1538103965;}*/ ?>
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
<body style="background:#fff;width:100%">
<style>
    input, button, .mui-btn {
        margin-top: 10px;
        margin-left: 10px;
    }
    .h5asd{
        padding: 5px;
    }
</style>
<style type="text/css">
    .mui-preview-image.mui-fullscreen {
        position: fixed;
        z-index: 20;
        background-color: #000;
    }
    .mui-preview-header,
    .mui-preview-footer {
        position: absolute;
        width: 100%;
        left: 0;
        z-index: 10;
    }
    .mui-preview-header {
        height: 44px;
        top: 0;
    }
    .mui-preview-footer {
        height: 50px;
        bottom: 0px;
    }
    .mui-preview-header .mui-preview-indicator {
        display: block;
        line-height: 25px;
        color: #fff;
        text-align: center;
        margin: 15px auto 4;
        width: 70px;
        background-color: rgba(0, 0, 0, 0.4);
        border-radius: 12px;
        font-size: 16px;
    }
    .mui-preview-image {
        display: none;
        -webkit-animation-duration: 0.5s;
        animation-duration: 0.5s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }
    .mui-preview-image.mui-preview-in {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;
    }
    .mui-preview-image.mui-preview-out {
        background: none;
        -webkit-animation-name: fadeOut;
        animation-name: fadeOut;
    }
    .mui-preview-image.mui-preview-out .mui-preview-header,
    .mui-preview-image.mui-preview-out .mui-preview-footer {
        display: none;
    }
    .mui-zoom-scroller {
        position: absolute;
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        width: 100%;
        height: 100%;
        margin: 0;
        -webkit-backface-visibility: hidden;
    }
    .mui-zoom {
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }
    .mui-slider .mui-slider-group .mui-slider-item img {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;
    }
    .mui-android-4-1 .mui-slider .mui-slider-group .mui-slider-item img {
        width: 100%;
    }
    .mui-android-4-1 .mui-slider.mui-preview-image .mui-slider-group .mui-slider-item {
        display: inline-table;
    }
    .mui-android-4-1 .mui-slider.mui-preview-image .mui-zoom-scroller img {
        display: table-cell;
        vertical-align: middle;
    }
    .mui-preview-loading {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: none;
    }
    .mui-preview-loading.mui-active {
        display: block;
    }
    .mui-preview-loading .mui-spinner-white {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -25px;
        margin-top: -25px;
        height: 50px;
        width: 50px;
    }
    .mui-preview-image img.mui-transitioning {
        -webkit-transition: -webkit-transform 0.5s ease, opacity 0.5s ease;
        transition: transform 0.5s ease, opacity 0.5s ease;
    }
    @-webkit-keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    @-webkit-keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
    p img {
        max-width: 100%;
        height: auto;
    }
</style>
<!--房源详情-->
<header class="mui-bar mui-bar-nav">
    <a href="<?=url('index/house')?>" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">房源详情</h1>
</header>
<div id="slider" class="mui-slider" style="margin-top:45px" >
    <div class="mui-slider-group mui-slider-loop">
        <?php if(is_array($house['h_img']) || $house['h_img'] instanceof \think\Collection || $house['h_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $house['h_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <div class="mui-slider-item">
            <a>
                <img src="__PUBLIC__/<?php echo $item; ?>"  data-preview-src="" data-preview-group="1">
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="mui-slider-indicator">
        <div class="mui-indicator mui-active"></div>
        <div class="mui-indicator"></div>
        <div class="mui-indicator"></div>
        <div class="mui-indicator"></div>
    </div>
</div>
<div class="mui-content" style="padding-top: 4px;background-color: #fff">
    <div class="mui-content-padded">
        <h4><?php echo $house['h_name']; if($house['h_iscop'] == 1): ?>整租<?php else: ?>合租<?php endif; ?></h4>
        <h5 class="h5asd">租金：<?php echo $house['h_area']; ?>㎡&nbsp;<?php echo $house['h_rent']; ?>元/<?php if($house['h_rent_type'] == 1): ?>月<?php else: ?>日<?php endif; ?></h5>

        <h5 class="h5asd">所在区域：<?php echo $house['h_address']; ?></h5>


        <h5 class="h5asd">小区名称：<?php echo $house['h_building']; ?><span style="float: right;margin-right: 10px;">朝向：<?php echo $house['h_head']; ?></span></h5>



        <h5 class="h5asd">附近公交：<?php echo $house['h_nearbus']; ?></h5>

        <h5 class="h5asd">沿线地铁：<?php echo $house['h_subway']; ?></h5>



        <h5 class="h5asd">发布时间：<?php echo $house['h_updatetime']; ?><span style="float: right;margin-right: 10px;">浏览量：<?php echo $house['h_view']; ?></span></h5>
        <h4 style="margin-top: 20px;width: 100%;">房屋配置<span style="float: right;line-height: 24px;font-size: 11px;color: #828282; font-weight: normal">具体配置以现场实际情况为准</span></h4>
        <hr/>
        <div style=" float: left;width: 100% ;background-color: #fff">
            <div class="mui-content" style="background-color: #fff">
                <?php if(is_array($house['config_img']) || $house['config_img'] instanceof \think\Collection || $house['config_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $house['config_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgs): $mod = ($i % 2 );++$i;?>
                <button type="button" class="mui-btn mui-btn-warning">
                    <?php echo $imgs['type_name']; ?>
                </button>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <div style="padding-left: 10px;padding-right: 10px;float: left;">
            <p class="contentss" >
                <?php echo $house['h_description']; ?>
            </p>
        </div>
</div>
<div class="mui-content" style="margin-top: 8px;padding-top: 0px;float: left;width: 100%">
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
    <span class="mui-btn mui-btn-warning" style="width: 45%;height: 36px;margin-left: 5px;"><a style="color:#fff" href="tel:18291435205">房屋托管</a></span>
    <span class="mui-btn mui-btn-warning" style="width: 45%;height: 36px"><a style="color:#fff" href="tel:17792870379">公寓租赁</a></span>
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
<script src="__WAP__/js/mui.zoom.js"></script>
<script src="__WAP__/js/mui.previewimage.js"></script>
<script>
    mui.previewImage();
</script>
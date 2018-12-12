<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"G:\xampp\htdocs\bbb\public/../application/manager\view\index\maindetails.html";i:1544436548;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>记录详情</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
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
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left"
       href="<?=url('index/maintain')?>?h_id=<?php echo $logs['hmt_house_code']; ?>"
    ></a>
    <h1 class="mui-title">记录详情</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded">
        <h4><b>房源编号</b>【<?php echo $logs['hmt_house_code']; ?>】</h4>
        <p>
            <b>记录标题</b>：<?php echo $logs['hmt_title']; ?>
        </p>
        <p>
            <b>记录内容</b>：<?php echo $logs['hmt_content']; ?>
        </p>
        <p><b>记录图片：</b></p>
        <p>
            <?php if($logs['hmt_img_first'] != null): ?>
            <img src="__WEB__/img/one-btn.png" style="width: 20%" data-preview-src="<?php echo $logs['hmt_img_first']; ?>" data-preview-group="1">
            <?php endif; if($logs['hmt_imgs'] != null): if(is_array($logs['hmt_imgs']) || $logs['hmt_imgs'] instanceof \think\Collection || $logs['hmt_imgs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $logs['hmt_imgs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
            <img style="display: none" src="<?php echo $items; ?>" data-preview-src="" data-preview-group="1">
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </p>
        <br>
        <p class="mui-pull-right">
            <b>提交人</b>：<?php echo $logs['u_job']; ?>---<?php echo $logs['hmt_admin']; ?>
        </p>
        <p><hr style="opacity:0"/></p>
        <hr style="opacity:0"/>
        <p class="mui-pull-right">
            <b>时间</b>：<?php echo $logs['hmt_add_time']; ?>
        </p>
    </div>
</div>
</body>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__WAP__/js/mui.zoom.js"></script>
<script src="__WAP__/js/mui.previewimage.js"></script>
<script>
    mui.previewImage();
</script>
<script>
    mui('body').on('tap','a',function(){
        if(this.href){
            window.top.location.href=this.href;
        }
    });
</script>
</html>
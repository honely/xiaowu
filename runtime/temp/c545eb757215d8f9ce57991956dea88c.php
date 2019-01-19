<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"G:\xampp\htdocs\bbb\public/../application/wap\view\index\details.html";i:1543896567;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo $content['lc_title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style>
        .contentss img{
            width:100% !important;
            height: auto !important;
        }
    </style>
</head>
<body onload="loads()">
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title"><?php echo $content['lc_title']; ?></h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded">
        <h3><?php echo $content['ls_title']; ?></h3>
        <h5><?php echo $content['lc_title']; ?></h5>
        <h5 class="h5asd">发布时间：<?php echo $content['lc_addtime']; ?><span style="float: right;margin-right: 10px;">浏览量：<?php echo $content['lc_view']; ?></span></h5>
        <p class="contentss">
            <?php echo $content['lc_content']; ?>
        </p>
    </div>
</div>
</body>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
    function loads(){
        $('.contentss img').attr("width","180");
    }
</script>
</html>
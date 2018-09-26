<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\detail.html";i:1537947967;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1537929394;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1537954699;}*/ ?>
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
    <a href="<?=url('index/news')?>" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title"><?php echo $news['art_title']; ?></h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded">
        <h3><?php echo $news['art_title']; ?></h3>
        <h5 class="h5asd">发布时间：<?php echo $news['art_createtime']; ?><span style="float: right;margin-right: 10px;">浏览量：<?php echo $news['art_view']; ?></span></h5>
        <p class="contentss">
            <?php echo $news['art_content']; ?>
        </p>
    </div>
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
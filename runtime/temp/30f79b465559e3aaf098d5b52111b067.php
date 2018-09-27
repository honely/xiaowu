<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\news.html";i:1538018859;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1537929394;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1537954699;}*/ ?>
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
    <h1 class="mui-title">新闻资讯</h1>
    <a class="mui-icon mui-icon-bars mui-icon-right-nav mui-pull-right" href="<?=url('index/nav')?>"></a>
</header>
<div class="mui-content" style="background-color:#fff">
    <ul class="mui-table-view mui-grid-view">
        <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li class="mui-table-view-cell mui-media mui-col-xs-6">
            <a href="<?=url('index/detail')?>?art_id=<?php echo $vo['art_id']; ?>">
                <img style="height: 130px;" class="mui-media-object" src="<?php echo $vo['art_img']; ?>">
                <div class="mui-media-body"><?php echo $vo['art_title']; ?></div>
            </a>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
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
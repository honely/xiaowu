<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"G:\xampp\htdocs\bbb\public/../application/wap\view\index\chapter.html";i:1543896567;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>课程标题</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="__WAP__/css/app.css"/>
    <style>
        .title{
            margin: 20px 15px 7px;
            color: #6d6d72;
            font-size: 15px;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title"><?php echo $lesson; ?></h1>
</header>
<div class="mui-content">
    <?php if($chapter != null): ?>
    <div class="mui-card" style="margin-bottom: 35px;">
        <ul class="mui-table-view">
            <?php if(is_array($chapter) || $chapter instanceof \think\Collection || $chapter instanceof \think\Paginator): $i = 0; $__LIST__ = $chapter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$chap): $mod = ($i % 2 );++$i;?>
            <li class="mui-table-view-cell mui-media">
                <a href="<?=url('index/details')?>?lc_id=<?php echo $chap['lc_id']; ?>">
                    <img class="mui-media-object mui-pull-left" src="<?php echo $chap['lc_img']; ?>">
                    <div class="mui-media-body">
                        <?php echo $chap['lc_title']; ?>
                        <p class='mui-ellipsis'><?php echo $chap['lc_remark']; ?></p>
                    </div>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php else: ?>
    <div class="title">
        暂无相关课程
    </div>
    <?php endif; ?>
</div>
</body>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
</html>
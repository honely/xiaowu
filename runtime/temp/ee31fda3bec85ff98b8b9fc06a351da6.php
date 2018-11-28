<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"G:\xampp\htdocs\bbb\public/../application/decoration\view\index\timeline.html";i:1543199081;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>装修进度</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" href="__WAP__/css/timeline.css">
</head>
<body class="mui-ios mui-ios-11 mui-ios-11-0">
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/index')?>"></a>
    <h1 class="mui-title">装修进度</h1>
</header>
<div id="app" class="mui-content" style="background-color: rgb(255, 255, 255);">
    <section id="cd-timeline" class="cd-container" style="">
        <?php if(is_array($step) || $step instanceof \think\Collection || $step instanceof \think\Paginator): $i = 0; $__LIST__ = $step;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-movie"></div>
                <div class="cd-timeline-content">
                    <div><?php echo $log['hds_end_statuss']; ?></div>
                    <div class="cd-date"><?php echo $log['hds_change_time']; ?></div>
                </div>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </section>
</div>
</body>
<script>
    mui('body').on('tap','a',function(){
        if(this.href){
            window.top.location.href=this.href;
        }
    });
</script>
</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"G:\xampp\htdocs\bbb\public/../application/wap\view\index\index.html";i:1537840127;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>学习资料</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style>
        h5{
            padding-top: 8px;
            padding-bottom: 8px;
            text-indent: 12px;
        }

        .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body{
            font-size: 15px;
            margin-top:8px;
            color: #333;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">学习资料</h1>
    <a class="mui-icon mui-icon-gear mui-icon-right-nav mui-pull-right" href="<?=url('index/resetPwd')?>"></a>
</header>
<div class="mui-content" style="background-color:#fff">
    <ul class="mui-table-view mui-grid-view">
        <?php if(is_array($lesson) || $lesson instanceof \think\Collection || $lesson instanceof \think\Paginator): $i = 0; $__LIST__ = $lesson;if( count($__LIST__)==0 ) : echo "暂无相关课程" ;else: foreach($__LIST__ as $key=>$les): $mod = ($i % 2 );++$i;?>
            <li class="mui-table-view-cell mui-media mui-col-xs-6">
                <a href="<?=url('index/chapter')?>?ls_id=<?php echo $les['ls_id']; ?>">
                    <img class="mui-media-object" src="<?php echo $les['ls_img']; ?>" alt="<?php echo $les['ls_img_alt']; ?>">
                    <div class="mui-media-body"><?php echo $les['ls_title']; ?></div>
                </a>
            </li>
        <?php endforeach; endif; else: echo "暂无相关课程" ;endif; ?>
    </ul>
</div>
</body>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
</html>
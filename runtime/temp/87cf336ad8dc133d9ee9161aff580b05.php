<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"G:\xampp\htdocs\bbb\public/../application/manager\view\index\allot.html";i:1543282204;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>房屋出租记录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/index')?>"></a>
    <h1 class="mui-title">房屋转交记录</h1>
</header>
<div class="mui-content" style="padding-top: 40px;">
    <?php if($marToDec != null): if(is_array($marToDec) || $marToDec instanceof \think\Collection || $marToDec instanceof \think\Paginator): $i = 0; $__LIST__ = $marToDec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
            <div class="mui-card">
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <p><b><?php echo $log['hat_assign_title']; ?></b>
                        <p style="color: #333;">
                            本条记录在<?php echo $log['hat_add_time']; ?>由<?php echo $log['hat_admin_job']; ?>--<?php echo $log['hat_admin_name']; ?>提交，
                            由<?php echo $log['hat_assigner_job']; ?>--<?php echo $log['hat_assigner_name']; ?>在<?php echo $log['hat_assign_time']; ?>,
                            分配给<?php echo $log['hat_assign_to_job']; ?>--<?php echo $log['hat_assign_too']; ?>。
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <div class="mui-card">
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <p><b>暂无交接记录！</b>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
</body>

</html>
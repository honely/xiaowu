<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\decorate.html";i:1543483684;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>装修进度</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" href="__WAP__/css/icons-extra.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/index')?>"></a>
    <h1 class="mui-title">装修进度</h1>
</header>
<div class="mui-content">
    <div class="mui-card">
        <ul class="mui-table-view">
            <?php if($step != null): if(is_array($step) || $step instanceof \think\Collection || $step instanceof \think\Paginator): $i = 0; $__LIST__ = $step;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
            <li class="mui-table-view-cell mui-collapse">
                <a><?php echo $log['hds_end_statuss']; ?>
                    <span class="mui-pull-right">共<span class="mui-badge mui-badge-success"><?php echo $log['decorate_count']; ?></span>条</span>
                    <span class="mui-pull-right" style="margin-right: 6%">
                        <?php echo $log['hds_change_time']; ?>
                    </span>
                </a>
                <div class="mui-collapse-content">
                    <ul class="mui-table-view" style="margin-top: -8px;">
                        <?php if($log['decorate_log'] != null): if(is_array($log['decorate_log']) || $log['decorate_log'] instanceof \think\Collection || $log['decorate_log'] instanceof \think\Paginator): $i = 0; $__LIST__ = $log['decorate_log'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li class="mui-table-view-cell">
                            <a href="<?=url('index/decdetails')?>?hdl_id=<?php echo $vo['hdl_id']; ?>">
                                <span class="mui-icon mui-icon-paperplane"></span>
                                <?php echo date("Y年m月d日 H时i分",$vo['hdl_addtime']); ?>
                                <?php echo $vo['hdl_title']; ?>
                                <span class="mui-navigate-right"></span>
                            </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <li class="mui-table-view-cell">
                            <a>
                                <span class="mui-icon mui-icon-paperplane"></span>
                                暂无记录！
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <li class="mui-table-view-cell">
                <a style="text-align: center;">暂无装修记录！</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<script src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
</body>

</html>
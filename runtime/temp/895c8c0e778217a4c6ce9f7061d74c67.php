<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\rentlog.html";i:1540518903;}*/ ?>
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
    <h1 class="mui-title">房屋出租记录</h1>
    <a class="mui-icon-plusempty mui-icon mui-icon-right-nav mui-pull-right" href="<?=url('index/addrent')?>?h_id=<?php echo $h_id; ?>"></a>
</header>
<div class="mui-content" style="padding-top: 40px;">
    <?php if($rentLog == null): ?>
        <div class="mui-card">
            <div class="mui-card-content" style="height: 40px;text-align: center;line-height: 36px;">
                暂无出租信息
            </div>
        </div>
    <?php else: if(is_array($rentLog) || $rentLog instanceof \think\Collection || $rentLog instanceof \think\Paginator): $i = 0; $__LIST__ = $rentLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
        <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>房源编号：【<?php echo $log['hrl_house_code']; ?>】</b>
                </p>
                <p style="color: #333;">
                    小区名称：<?php echo $house['h_building']; ?>
                    <br/> 租客姓名：<?php echo $log['hr_name']; ?>【<?php echo $log['hr_phone']; ?>】
                    <br/> 租赁时间：<?php echo $log['hrl_rent_time']; ?>—<?php echo $log['hrl_dead_time']; ?>
                    <br/>
                    房屋面积：<?php echo $house['h_area']; ?>（㎡）
                    <br/>
                    房源地址：<?php echo $house['h_address']; ?>
                </p>
            </div>
        </div>
        <div class="mui-card-footer">
            <a class="mui-card-link" href="<?=url('index/renter')?>?hr_id=<?php echo $log['hrl_renter_id']; ?>">租客信息</a>
            <a class="mui-card-link" href="<?=url('index/paylog')?>?h_id=<?php echo $log['hrl_id']; ?>">收租记录</a>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; endif; ?>


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
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\index.html";i:1540348822;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>小屋智能公寓运营部</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">房源列表</h1>
</header>
<div class="mui-content" style="padding-top: 40px;">
    <?php if($houses == null): ?>
    <div class="mui-card">
        <div class="mui-card-content" style="height: 40px;text-align: center;line-height: 36px;">
            暂无房源
        </div>
    </div>
    <?php else: if(is_array($houses) || $houses instanceof \think\Collection || $houses instanceof \think\Paginator): $i = 0; $__LIST__ = $houses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hous): $mod = ($i % 2 );++$i;?>
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>房源编号：【<?php echo $hous['h_b_id']; ?>】</b>
                    <?php if($hous['is_paid_ratio'] == 1): ?>
                    <span style="float: right;">回款率：<span style="margin-left: 8px;" class="mui-badge mui-badge-danger"><?php echo $hous['paid_ratio']; ?></span></span>
                    <?php endif; ?>
                </p>
                <p style="color: #333;">
                    <!--房源标题：<?php echo $hous['h_name']; ?>-->
                    <!--<br/>-->
                    小区名称：<?php echo $hous['h_building']; ?>
                    <br/>
                    <?php if($hous['is_paid_ratio'] == 1): ?>
                    装修款额：<?php echo $hous['h_money']; ?>（元）
                    <br/>
                    <?php endif; ?>
                    房屋面积：<?php echo $hous['h_area']; ?>（㎡）
                    <br/>
                    <?php if(isset($hous['h_contract_code'])): ?>
                    合同编号：<?php echo $hous['h_contract_code']; ?>（元）
                    <br/>
                    <?php endif; ?>
                    签订日期：<?php echo $hous['h_addtime']; ?>
                    <br/>
                    房源地址：<?php echo $hous['h_address']; ?>
                    <br/>
                </p>
            </div>
        </div>
        <div class="mui-card-footer">
            <a class="mui-card-link" href="<?=url('index/details')?>?h_id=<?php echo $hous['h_b_id']; ?>">房源详情</a>
            <a class="mui-card-link" href="<?=url('index/rentlog')?>?h_id=<?php echo $hous['h_b_id']; ?>">出租记录</a>
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
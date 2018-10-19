<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\details.html";i:1538205274;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1538205562;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1538103965;}*/ ?>
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
<body style="background:#fff;width:100%">
<style>
    input, button, .mui-btn {
        margin-top: 10px;
        margin-left: 10px;
    }
    .h5asd{
        padding: 5px;
    }
</style>
<!--房源详情-->
<header class="mui-bar mui-bar-nav">
    <a href="<?=url('index/house')?>" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">房源详情</h1>
</header>
<div id="slider" class="mui-slider" style="margin-top:45px" >
    <div class="mui-slider-group mui-slider-loop">
        <?php if(is_array($house['h_img']) || $house['h_img'] instanceof \think\Collection || $house['h_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $house['h_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <div class="mui-slider-item">
            <a>
                <img src="<?php echo $item; ?>">
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="mui-slider-indicator">
        <div class="mui-indicator mui-active"></div>
        <div class="mui-indicator"></div>
        <div class="mui-indicator"></div>
        <div class="mui-indicator"></div>
    </div>
</div>
<div class="mui-content" style="padding-top: 4px;background-color: #fff">
    <div class="mui-content-padded">
        <h4><?php echo $house['h_name']; if($house['h_iscop'] == 1): ?>整租<?php else: ?>合租<?php endif; ?></h4>
        <h5 class="h5asd">租金：<?php echo $house['h_area']; ?>㎡&nbsp;<?php echo $house['h_rent']; ?>元/<?php if($house['h_rent_type'] == 1): ?>月<?php else: ?>日<?php endif; ?></h5>

        <h5 class="h5asd">所在区域：<?php echo $house['h_address']; ?></h5>


        <h5 class="h5asd">小区名称：<?php echo $house['h_building']; ?><span style="float: right;margin-right: 10px;">朝向：<?php echo $house['h_head']; ?></span></h5>



        <h5 class="h5asd">附近公交：<?php echo $house['h_nearbus']; ?></h5>

        <h5 class="h5asd">沿线地铁：<?php echo $house['h_subway']; ?></h5>



        <h5 class="h5asd">发布时间：<?php echo $house['h_updatetime']; ?><span style="float: right;margin-right: 10px;">浏览量：<?php echo $house['h_view']; ?></span></h5>
        <h4 style="margin-top: 20px;width: 100%;">房屋配置<span style="float: right;line-height: 24px;font-size: 11px;color: #828282; font-weight: normal">具体配置以现场实际情况为准</span></h4>
        <hr/>
        <div style=" float: left;width: 100% ;background-color: #fff">
            <div class="mui-content" style="background-color: #fff">
                <?php if(is_array($house['config_img']) || $house['config_img'] instanceof \think\Collection || $house['config_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $house['config_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgs): $mod = ($i % 2 );++$i;?>
                <button type="button" class="mui-btn mui-btn-warning">
                    <?php echo $imgs['type_name']; ?>
                </button>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <div style="padding-left: 10px;padding-right: 10px;float: left;">
            <p class="contentss" >
                <?php echo $house['h_description']; ?>
            </p>
        </div>
</div>
<div class="mui-content" style="margin-top: 8px;padding-top: 0px;float: left;width: 100%">
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <p style="color: #5b5b5b;text-align: center;">Copyright © 2018 <a style="color: #5b5b5b" href="<?=url('index/index')?>">www.xiaowugroup.com</a>
                <br/>
                陕西大城小屋不动产管理有限公司
                <br/>
                版权所有 陕ICP备18007211号</p>
        </div>
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
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"G:\xampp\htdocs\bbb\public/../application/manager\view\admin\details.html";i:1542706802;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>房源预览</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style type="text/css">
        .item_img{
            width: 23%;
            float: left;
            height: 116px;
            overflow: hidden;
        }
        /*.img{*/
        /*width:100%; height: 92px*/
        /*}*/
        .mui-preview-image.mui-fullscreen {
            position: fixed;
            z-index: 20;
            background-color: #000;
        }
        .mui-preview-header,
        .mui-preview-footer {
            position: absolute;
            width: 100%;
            left: 0;
            z-index: 10;
        }
        .mui-preview-header {
            height: 44px;
            top: 0;
        }
        .mui-preview-footer {
            height: 50px;
            bottom: 0px;
        }
        .mui-preview-header .mui-preview-indicator {
            display: block;
            line-height: 25px;
            color: #fff;
            text-align: center;
            margin: 15px auto 4;
            width: 70px;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 12px;
            font-size: 16px;
        }
        .mui-preview-image {
            display: none;
            -webkit-animation-duration: 0.5s;
            animation-duration: 0.5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        .mui-preview-image.mui-preview-in {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }
        .mui-preview-image.mui-preview-out {
            background: none;
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }
        .mui-preview-image.mui-preview-out .mui-preview-header,
        .mui-preview-image.mui-preview-out .mui-preview-footer {
            display: none;
        }
        .mui-zoom-scroller {
            position: absolute;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            -webkit-backface-visibility: hidden;
        }
        .mui-zoom {
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }
        .mui-slider .mui-slider-group .mui-slider-item img {
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }
        .mui-android-4-1 .mui-slider .mui-slider-group .mui-slider-item img {
            width: 100%;
        }
        .mui-android-4-1 .mui-slider.mui-preview-image .mui-slider-group .mui-slider-item {
            display: inline-table;
        }
        .mui-android-4-1 .mui-slider.mui-preview-image .mui-zoom-scroller img {
            display: table-cell;
            vertical-align: middle;
        }
        .mui-preview-loading {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: none;
        }
        .mui-preview-loading.mui-active {
            display: block;
        }
        .mui-preview-loading .mui-spinner-white {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -25px;
            margin-top: -25px;
            height: 50px;
            width: 50px;
        }
        .mui-preview-image img.mui-transitioning {
            -webkit-transition: -webkit-transform 0.5s ease, opacity 0.5s ease;
            transition: transform 0.5s ease, opacity 0.5s ease;
        }
        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        @-webkit-keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
        p img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/index')?>"></a>
    <h1 class="mui-title">房源预览</h1>
</header>
<div class="mui-content" style="padding-top: 40px;">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>基本信息</b>：房源编号：【<?php echo $hous['h_b_id']; ?>】
                </p>
                <?php if($manger != null): ?>
                <p>
                    <?php echo $manger['u_job']; ?>-<?php echo $manger['u_name']; ?>-<?php echo $manger['u_phone']; ?>
                </p>
                <?php endif; ?>

                <p style="color: #333;">
                    小区名称：<?php echo $hous['h_building']; ?>
                    <br/>
                    房屋面积：<?php echo $hous['h_area']; ?>（㎡）
                    <br/>
                    房屋户型：<?php echo $hous['h_house_type']; ?>
                    <br/>
                </p>
            </div>
        </div>
    </div>
</div>
<?php if($master != null): ?>
<div class="mui-card">
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <p><b>房主信息</b></p>
            <p style="color: #333;">
                姓名：<?php echo $master['hm_name']; ?>
                <br/>
                联系方式：<?php echo $master['hm_phone']; ?>
                <br/>
                身份证号：<?php echo $master['hm_idcard']; ?>
                <br/>
                银行卡号：<?php echo $master['hm_bank_card']; ?>
                <br/>
                现居地址：<?php echo $master['hm_address']; ?>
                <br/>
                备注信息：<?php echo $master['hm_remarks']; ?>
            </p>
        </div>
    </div>
</div>
<?php endif; if($payInfo != null): ?>
<div class="mui-card">
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <p><b>回款信息</b></p>
            <p style="color: #333;">
                总装修款<?php echo $payInfo['hp_money']; ?>元，已回款<?php echo $payInfo['hp_paid']; ?>元，未回款<?php echo $payInfo['hp_will_pay']; ?>元，回款率<?php echo $payInfo['hp_paid_ratio']; ?>。
            </p>
            <?php if($payLogs != null): ?>
            <p><b>回款记录</b></p>
            <?php if(is_array($payLogs) || $payLogs instanceof \think\Collection || $payLogs instanceof \think\Paginator): $i = 0; $__LIST__ = $payLogs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$logs): $mod = ($i % 2 );++$i;?>
            <p style="color: #333;">
                <?php echo $logs['hpl_addtime']; ?> 回款<?php echo $logs['hpl_money']; ?>元。
            </p>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
    </div>
</div>
<?php endif; if($attach != null): ?>
<div class="mui-card">
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <p><b>附属信息</b></p>
            <p style="color: #333;">
                钥匙：<?php if(isset($attach['ha_keys'])): ?><?php echo $attach['ha_keys']; endif; ?>
                备注：<?php if(isset($attach['ha_keys_remarks'])): ?><?php echo $attach['ha_keys_remarks']; endif; ?>
            </p>
            <p style="color: #333;">
                门禁：<?php if(isset($attach['ha_door_ban'])): ?><?php echo $attach['ha_door_ban']; endif; ?>
                备注：<?php if(isset($attach['ha_door_ban_remarks'])): ?><?php echo $attach['ha_door_ban_remarks']; endif; ?>
            </p>
            <hr/>
            <p style="color: #333;">
                电卡：<?php if(isset($attach['ha_elect_card'])): ?><?php echo $attach['ha_elect_card']; endif; ?>
            </p>
            <p style="color: #333;">
                电表底数：<?php if(isset($attach['ha_elect_start'])): ?><?php echo $attach['ha_elect_start']; endif; ?>
            </p>
            <p style="color: #333;">
                电费单价：<?php if(isset($attach['ha_elect_price'])): ?><?php echo $attach['ha_elect_price']; endif; ?>
            </p>
            <p style="color: #333;">
                缴费方式：<?php if(isset($attach['ha_elect_type'])): ?><?php echo $attach['ha_elect_type']; endif; ?>
            </p>
            <p style="color: #333;">
                备注：<?php if(isset($attach['ha_elect_card_tips'])): ?><?php echo $attach['ha_elect_card_tips']; endif; ?>
            </p>
            <hr/>
            <p style="color: #333;">
                水卡：<?php if(isset($attach['ha_water_card'])): ?><?php echo $attach['ha_water_card']; endif; ?>
            </p>
            <p style="color: #333;">
                水表底数：<?php if(isset($attach['ha_water_start'])): ?><?php echo $attach['ha_water_start']; endif; ?>
            </p>
            <p style="color: #333;">
                水费单价：<?php if(isset($attach['ha_water_price'])): ?><?php echo $attach['ha_water_price']; endif; ?>
            </p>
            <p style="color: #333;">
                缴费方式：<?php if(isset($attach['ha_water_type'])): ?><?php echo $attach['ha_water_type']; endif; ?>
            </p>
            <p style="color: #333;">
                备注：<?php if(isset($attach['ha_water_card_tips'])): ?><?php echo $attach['ha_water_card_tips']; endif; ?>
            </p>
            <hr/>
            <p style="color: #333;">
                供暖方式：<?php if(isset($attach['ha_warm_type'])): ?><?php echo $attach['ha_warm_type']; endif; ?>
            </p>
            <p style="color: #333;">
                暖气单价：<?php if(isset($attach['ha_warm_price'])): ?><?php echo $attach['ha_warm_price']; endif; ?>
            </p>
            <p style="color: #333;">
                缴费方式：<?php if(isset($attach['ha_warm_tips'])): ?><?php echo $attach['ha_warm_tips']; endif; ?>
            </p>
            <hr/>
            <p style="color: #333;">
                猫眼：<?php if(isset($attach['ha_cat_eye'])): ?><?php echo $attach['ha_cat_eye']; endif; ?>
                备注：<?php if(isset($attach['ha_cat_eye_tips'])): ?><?php echo $attach['ha_cat_eye_tips']; endif; ?>
            </p>
            <p style="color: #333;">
                可视电话：<?php if(isset($attach['ha_view_phone'])): ?><?php echo $attach['ha_view_phone']; endif; ?>
                备注：<?php if(isset($attach['ha_view_phone_tips'])): ?><?php echo $attach['ha_view_phone_tips']; endif; ?>
            </p>
            <p style="color: #333;">
                燃气底数：<?php if(isset($attach['ha_air_start'])): ?><?php echo $attach['ha_air_start']; endif; ?>
                备注：<?php if(isset($attach['ha_air_tips'])): ?><?php echo $attach['ha_air_tips']; endif; ?>
            </p>
            <p style="color: #333;">
                车位情况：<?php if(isset($attach['ha_car_park'])): ?><?php echo $attach['ha_car_park']; endif; ?>
                物业电话：<?php if(isset($attach['ha_wuye_phone'])): ?><?php echo $attach['ha_wuye_phone']; endif; ?>
            </p>
            <p style="color: #333;">
                合同编号：<?php if(isset($attach['ha_contact_code'])): ?><?php echo $attach['ha_contact_code']; endif; ?>
            </p>
            <p style="color: #333;">
                <b>合同扫描件：</b>
            </p>
            <p>
                <?php if(is_array($attach['ha_contact_img']) || $attach['ha_contact_img'] instanceof \think\Collection || $attach['ha_contact_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $attach['ha_contact_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                <img src="<?php echo $items; ?>" data-preview-src="" data-preview-group="2">
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
            <hr/>
            <p style="color: #333;">
                租金(每月)：<?php if(isset($attach['ha_rent_price'])): ?><?php echo $attach['ha_rent_price']; endif; ?>
            </p>
            <p style="color: #333;">
                租期：<?php if(isset($attach['ha_rent_time'])): ?><?php echo $attach['ha_rent_time']; endif; ?>
            </p>
            <p style="color: #333;">
                到期时间：<?php if(isset($attach['ha_deadline'])): ?><?php echo $attach['ha_deadline']; endif; ?>
            </p>
            <p style="color: #333;">
                装修许可时间：<?php if(isset($attach['ha_decorate_permit'])): ?><?php echo $attach['ha_decorate_permit']; endif; ?>
            </p>
            <p style="color: #333;">
                其他备注：<?php if(isset($attach['ha_remarks'])): ?><?php echo $attach['ha_remarks']; endif; ?>
            </p>
        </div>
    </div>
</div>
</div>
<?php endif; ?>
</div>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__WAP__/js/mui.zoom.js"></script>
<script src="__WAP__/js/mui.previewimage.js"></script>
<script>
    mui.previewImage();
</script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\preview.html";i:1543031660;}*/ ?>
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
        input{
            font-size: 14px;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
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
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group layui-form" id="attachForm" style="background-color: #efeff4">
            <div class="mui-card">
                <p><b>附属信息</b></p>
                <div class="mui-input-row">
                    <label>合同编号：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_contact_code'])): ?> value="<?php echo $attach['ha_contact_code']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>合同扫描件</label>
                </div>
                <div id="imgPre">
                    <?php if(is_array($attach['ha_contact_img']) || $attach['ha_contact_img'] instanceof \think\Collection || $attach['ha_contact_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $attach['ha_contact_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                    <li class="item_img" style="list-style-type: none">
                        <img src="__PUBLIC__/<?php echo $items; ?>" class="img" style="padding: 5px;" data-preview-src="" data-preview-group="1"  >
                        <input type="hidden" name="ha_contact_img[]" value="' + res.path + '" />
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="mui-input-row">
                    <label>租金(每月)：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_rent_price'])): ?> value="<?php echo $attach['ha_rent_price']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>租期：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_rent_time'])): ?> value="<?php echo $attach['ha_rent_time']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>到期时间：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_deadline'])): ?> value="<?php echo $attach['ha_deadline']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>装修许可时间：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_decorate_permit'])): ?> value="<?php echo $attach['ha_decorate_permit']; ?>" <?php endif; ?>>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>钥匙：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_keys'])): ?> value="<?php echo $attach['ha_keys']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_keys_remarks'])): ?> value="<?php echo $attach['ha_keys_remarks']; ?>" <?php endif; ?>>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>门禁：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_door_ban'])): ?> value="<?php echo $attach['ha_door_ban']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_door_ban_remarks'])): ?> value="<?php echo $attach['ha_door_ban_remarks']; ?>" <?php endif; ?>>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>电卡：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_elect_card'])): ?> value="<?php echo $attach['ha_elect_card']; ?>" <?php endif; ?> id="ha_elect_card">
                </div>
                <div class="mui-input-row">
                    <label>电表底数：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_elect_start'])): ?> value="<?php echo $attach['ha_elect_start']; ?>" <?php endif; ?> class="layui-input" lay-verify="required" id="ha_elect_start" name="ha_elect_start">
                </div>
                <div class="mui-input-row">
                    <label>电费单价：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_elect_price'])): ?> value="<?php echo $attach['ha_elect_price']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>缴费方式：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_elect_type'])): ?> value="<?php echo $attach['ha_elect_type']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text" readonly  <?php if(isset($attach['ha_elect_card_tips'])): ?> value="<?php echo $attach['ha_elect_card_tips']; ?>" <?php endif; ?>>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>水卡：</label>
                    <input type="text" readonly  <?php if(isset($attach['ha_water_card'])): ?> value="<?php echo $attach['ha_water_card']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>水表底数：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_water_start'])): ?> value="<?php echo $attach['ha_water_start']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>水费单价：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_water_price'])): ?> value="<?php echo $attach['ha_water_price']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>缴费方式：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_water_type'])): ?> value="<?php echo $attach['ha_water_type']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text" readonly  <?php if(isset($attach['ha_water_card_tips'])): ?> value="<?php echo $attach['ha_water_card_tips']; ?>" <?php endif; ?>>
                </div>
            </div>

            <div class="mui-card">
                <div class="mui-input-row">
                    <label>供暖方式：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_warm_type'])): ?> value="<?php echo $attach['ha_warm_type']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>暖气单价：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_warm_price'])): ?> value="<?php echo $attach['ha_warm_price']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>缴费方式：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_warm_tips'])): ?> value="<?php echo $attach['ha_warm_tips']; ?>" <?php endif; ?>>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>猫眼：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_cat_eye'])): ?> value="<?php echo $attach['ha_cat_eye']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_cat_eye_tips'])): ?> value="<?php echo $attach['ha_cat_eye_tips']; ?>" <?php endif; ?>>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>可视电话：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_view_phone'])): ?> value="<?php echo $attach['ha_view_phone']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text" readonly  <?php if(isset($attach['ha_view_phone_tips'])): ?> value="<?php echo $attach['ha_view_phone_tips']; ?>" <?php endif; ?>>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>燃气底数：</label>
                    <input type="text" readonly  <?php if(isset($attach['ha_air_start'])): ?> value="<?php echo $attach['ha_air_start']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>燃气备注：</label>
                    <input type="text" readonly  <?php if(isset($attach['ha_air_tips'])): ?> value="<?php echo $attach['ha_air_tips']; ?>" <?php endif; ?>>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>车位情况：</label>
                    <input type="text" readonly   <?php if(isset($attach['ha_car_park'])): ?> value="<?php echo $attach['ha_car_park']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>物业电话：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_wuye_phone'])): ?> value="<?php echo $attach['ha_wuye_phone']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>物业费用：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_wuye_fee'])): ?> value="<?php echo $attach['ha_wuye_fee']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>物业费类型：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_wuye_fee_type'])): ?> value="<?php echo $attach['ha_wuye_fee_type']; ?>" <?php endif; ?>>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <label>其他备注信息：</label>
                    <textarea readonly rows="5"><?php if(isset($attach['ha_remarks'])): ?><?php echo $attach['ha_remarks']; endif; ?></textarea>
                </div>
            </div>
        </form>
    </div>
    <?php endif; if(($attach != null) AND ($payLogs != null) AND ($payInfo != null) AND ($hous != null) and ($master != null) AND ($manger != null) AND ($hous['h_isable'] == 6)): ?>
    <div class="mui-card">
        <div class="mui-input-row" style="margin: 10px 5px;">
            <label>转交备注：</label>
            <input id="transInfo" type="text" value="">
        </div>
    </div>
    <span id="toWork" class="mui-btn mui-btn-primary mui-btn-block">信息准确无误，提交信息</span>
    <?php endif; if($hous['h_isable'] == 7): ?>
    <span class="mui-btn mui-btn-warning mui-btn-block">已提交</span>
    <?php endif; ?>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__WAP__/js/mui.zoom.js"></script>
<script src="__WAP__/js/mui.previewimage.js"></script>
<script>
    mui.previewImage();
    mui('body').on('tap','a',function(){
        if(this.href){
            window.top.location.href=this.href;
        }
    });
</script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
    $("#toWork").click(function () {
        var h_id=<?php echo $hous['h_b_id']; ?>;
        var transInfo=$('#transInfo').val();
        var btnArray = ['否', '是'];
        mui.confirm('请确认信息准确无误？', 'Hello MUI', btnArray, function(e) {
            if (e.index == 1) {
                $.ajax({
                    type:"post",
                    url:"<?=url('index/towork')?>",
                    data:{'h_id':h_id,'transfer':transInfo},
                    success:function (result) {
                        console.log(result);
                        if(result.code == '1'){
                            mui.alert(result.msg, function() {
                                window.location.href="<?=url('index/house')?>";
                            });
                        }else{
                            mui.alert(result.msg, function() {
                            });
                        }
                    },
                    'error':function (error) {
                        console.log(error);
                    }
                })
            }
        });
    });
</script>
</body>

</html>
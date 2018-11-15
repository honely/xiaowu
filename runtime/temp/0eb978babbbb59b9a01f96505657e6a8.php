<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\xampp\htdocs\bbb\public/../application/admin\view\house\rentdetail.html";i:1542158760;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <style>
        .layui-form-mid{
            padding:0 !important;
            width: 45%;
        }
    </style>
</head>
<form class="layui-form">
    <div class="layui-form-item" style="margin-left:20px">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>房源信息</legend>
        </fieldset>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">小区名称: <?php if(isset($house['h_building'])): ?><?php echo $house['h_building']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">房屋面积: <?php if(isset($house['h_area'])): ?><?php echo $house['h_area']; ?>㎡<?php endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">房源编号: <?php if(isset($house['h_b_id'])): ?><?php echo $house['h_b_id']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">房源地址: <?php if(isset($house['h_address'])): ?><?php echo $house['h_address']; endif; ?></div>
        </div>
        </div>
    </div>

    <div class="layui-form-item" style="margin-left:20px">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>租客信息</legend>
        </fieldset>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">租客姓名: <?php if(isset($renter['hr_name'])): ?><?php echo $renter['hr_name']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">联系电话: <?php if(isset($renter['hr_phone'])): ?><?php echo $renter['hr_phone']; endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">身份证号: <?php if(isset($renter['hr_idcard'])): ?><?php echo $renter['hr_idcard']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">备注信息: <?php if(isset($renter['hr_remarks'])): ?><?php echo $renter['hr_remarks']; endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux" style="width: 80%;">本条记录由【<?php echo $renter['hr_admin']; ?>】在<?php echo $renter['hr_addtime']; ?>提交。</div>
        </div>
    </div>


    <div class="layui-form-item" style="margin-left:20px">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>出租信息【<?php if($rent['hrl_status'] == 1): ?>出租中<?php else: ?>已完成<?php endif; ?>】</legend>
        </fieldset>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">合同编号: <?php if(isset($rent['hrl_contact_code'])): ?><?php echo $rent['hrl_contact_code']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">租房日期: <?php if(isset($rent['hrl_rent_time'])): ?><?php echo $rent['hrl_rent_time']; ?>-<?php echo $rent['hrl_dead_time']; endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">租房押金: <?php if(isset($rent['hrl_foregift'])): ?><?php echo $rent['hrl_foregift']; ?>元<?php endif; ?></div>
            <div class="layui-form-mid layui-word-aux">租金: <?php if(isset($rent['hrl_rent_price'])): ?><?php echo $rent['hrl_rent_price']; ?>元/<?php if($rent['hrl_rent_type'] == 1): ?>日<?php else: ?>月<?php endif; endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">出租方式: <?php if($rent['hrl_pay_type'] == 1): ?>日租金<?php else: ?>月租金<?php endif; ?></div>
            <div class="layui-form-mid layui-word-aux">出租渠道: <?php if(isset($rent['hrc_title'])): ?><?php echo $rent['hrc_title']; endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">电表底数: <?php if(isset($rent['hrl_elect_start'])): ?><?php echo $rent['hrl_elect_start']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">水表底数: <?php if(isset($rent['hrl_water_start'])): ?><?php echo $rent['hrl_water_start']; endif; ?></div>
        </div>
        <?php if($rent['hrl_status'] == 2): ?>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">电表结数: <?php if(isset($rent['hrl_elect_end'])): ?><?php echo $rent['hrl_elect_end']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">水表结数: <?php if(isset($rent['hrl_water_end'])): ?><?php echo $rent['hrl_water_end']; endif; ?></div>
        </div>
        <?php endif; ?>
    </div>
        <div class="layui-form-item">
            <p style="padding-bottom: 20px;">
                合同扫描件
            </p>
            <p>
                <?php if(is_array($rent['hrl_contact_img']) || $rent['hrl_contact_img'] instanceof \think\Collection || $rent['hrl_contact_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $rent['hrl_contact_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                <img src="<?php echo $items; ?>" style="max-width: 100%;margin: 10px;"><br/>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
        </div>
    </div>
</form>
</html>
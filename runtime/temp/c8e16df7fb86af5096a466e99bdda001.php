<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"G:\xampp\htdocs\bbb\public/../application/admin\view\house\paydetail.html";i:1542100795;}*/ ?>
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
            /*width: 45%;*/
        }
    </style>
</head>
<form class="layui-form">
    <div class="layui-form-item" style="margin-left:20px">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>房源编号【<?php echo $payLog['hrl_house_code']; ?>】</legend>
        </fieldset>
    </div>
    </div>
    <div class="layui-form-item" style="margin-left:20px">
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">
                今收到房客【<?php echo $payLog['rent_name']; ?>】电话【<?php echo $payLog['rent_phone']; ?>】，房租<?php echo $payLog['hrpl_money']; ?>元。
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">
                本条记录由【<?php echo $details['u_name']; ?>】在<?php echo $details['hrpl_addtime']; ?>提交。
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">
                收款凭证
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <p>
            <?php if(is_array($details['hrpl_img']) || $details['hrpl_img'] instanceof \think\Collection || $details['hrpl_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $details['hrpl_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
            <img src="<?php echo $items; ?>">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </p>
    </div>
    </div>
</form>
</html>
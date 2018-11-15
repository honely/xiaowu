<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\house\declog.html";i:1542005825;}*/ ?>
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
        .show-width{
            width: 45%;
            padding-bottom: 20px;
            display: block;
            float: left;
            overflow: hidden;
        }
    </style>
</head>
<form class="layui-form" action="" id="cusInfo" method="post">
    <div class="layui-form-item" style="margin-left:20px">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>房源编号【<?php echo $logs['hdl_house_code']; ?>】</legend>
        </fieldset>
        <div class="layui-form-item">

            <span class="show-width">
                <b>装修阶段</b>：<?php echo $logs['hdl_status']; ?>
            </span>
            <span class="show-width">
                <b>小区名称</b>：<?php echo $house['h_building']; ?>
            </span>
            <span class="show-width">
                <b>施工工地</b>：<?php echo $house['h_address']; ?>
            </span>
            <span class="show-width">
                <b>提交人</b>：<?php echo $logs['u_job']; ?>---<?php echo $logs['u_name']; ?>
            </span>
            <span class="show-width">
                <b>提交时间</b>：<?php echo $logs['hdl_addtime']; ?>
            </span>
            <hr style="opacity: 0"/>
            <span>
                <b>日志内容</b>：<?php echo $logs['hdl_content']; ?>
            </span>
            <hr/>
            <p><b>日志图片</b></p>
            <p>
                <?php if(is_array($logs['hdl_img']) || $logs['hdl_img'] instanceof \think\Collection || $logs['hdl_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $logs['hdl_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                <img src="<?php echo $items; ?>" style="max-width: 100%;margin: 10px;"><br/>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
        </div>
    </div>
</form>
</html>
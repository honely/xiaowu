<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\xampp\htdocs\bbb\public/../application/admin\view\house\showdetail.html";i:1542004437;}*/ ?>
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
</head>
<form class="layui-form" action="" id="cusInfo" method="post">
    <div class="layui-form-item" style="margin-left:20px">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>房源编号【<?php echo $logs['hpl_house_code']; ?>】</legend>
        </fieldset>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">
                房源编号为【<?php echo $logs['hpl_house_code']; ?>】的房屋回款<?php echo $logs['hpl_money']; ?>元
                <?php if($logs['hpl_tips'] != null): ?>
                ，备注信息为<?php echo $logs['hpl_tips']; endif; ?>
                。
            </div>
        </div>
        <div class="layui-form-item">

            <p style="padding-bottom: 20px;">
                本条记录由【<?php echo $logs['u_name']; ?>】在<?php echo $logs['hpl_addtime']; ?>提交。
            </p>
            <p><b>回款凭证</b></p>
            <p>
                <?php if(is_array($logs['hpl_img']) || $logs['hpl_img'] instanceof \think\Collection || $logs['hpl_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $logs['hpl_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                <img src="<?php echo $items; ?>" style="max-width: 100%;margin: 10px;"><br/>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
        </div>
    </div>
</form>
</html>
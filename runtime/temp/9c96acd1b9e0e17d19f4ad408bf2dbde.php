<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"G:\xampp\htdocs\bbb\public/../application/market\view\house\details.html";i:1539249803;}*/ ?>
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
    <script src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
    <script src="__LAY__/layui.js"></script>
</head>
<form class="layui-form" style="margin-top: 20px;">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">回款编号</label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo $logs['hpl_id']; ?>" readonly class="layui-input" />
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">房屋编号</label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo $logs['hpl_house_code']; ?>" readonly class="layui-input" />
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">回款金额</label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo $logs['hpl_money']; ?>" readonly class="layui-input" />
            </div>
            <div class="layui-form-mid layui-word-aux" >单位：元。</div>
        </div>
    </div>
    <?php if($logs['hpl_tips'] != null): ?>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">回款备注</label>
            <div class="layui-input-block">
                <textarea readonly name="hpl_tips" class="layui-textarea"><?php echo $logs['hpl_tips']; ?></textarea>
            </div>
        </div>
    <?php endif; ?>


    <div class="layui-form-item one-pan">
        <label class="layui-form-label">回款凭证</label>
        <img src="<?php echo $logs['hpl_img']; ?>"/>
    </div>
</form>
</html>
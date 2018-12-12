<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"G:\xampp\htdocs\bbb\public/../application/admin\view\msg\edittem.html";i:1529823943;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
    <title>大城小屋后台管理系统</title>
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <script src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
    <script src="__LAY__/layui.js"></script>
	<style>
		.layui-body{
			left:0!important
		}
	</style>
</head>
<body class="layui-layout-body">

<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>系统配置</a>
        <a href="<?=url('msg/msg')?>">信息配置</a>
        <a href="<?=url('msg/msgtem')?>">短信模板</a>
        <a><cite>修改短信模板</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('msg/msgtem')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1" action="<?=url('msg/edittem')?>?sms_id=<?php echo $tem['sms_id']; ?>" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">
                    <span style="color: red;">*</span>模板类型
                </label>
                <div class="layui-input-inline">
                    <select name="sms_type" lay-verify="required">
                        <option value="">请选择模板类型</option>
                        <option value="1" <?php if($tem['sms_type'] == 1): ?>selected<?php endif; ?> >管理员通知</option>
                        <option value="2" <?php if($tem['sms_type'] == 2): ?>selected<?php endif; ?> >普通预约</option>
                        <option value="3" <?php if($tem['sms_type'] == 3): ?>selected<?php endif; ?> >报价预约</option>
                        <option value="4" <?php if($tem['sms_type'] == 4): ?>selected<?php endif; ?> >量房预约</option>
                        <option value="5" <?php if($tem['sms_type'] == 5): ?>selected<?php endif; ?> >活动预约</option>
                        <option value="6" <?php if($tem['sms_type'] == 6): ?>selected<?php endif; ?> >设计预约</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">
                    <span style="color: red;">*</span>模板名称
                </label>
                <div class="layui-input-block">
                    <input type="text" name="sms_title" value="<?php echo $tem['sms_title']; ?>" lay-verify="required" placeholder='请输入模板名称' autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">
                    <span style="color: red;">*</span>模板CODE
                </label>
                <div class="layui-input-block">
                    <input type="text" name="sms_code" value="<?php echo $tem['sms_code']; ?>" lay-verify="required" placeholder='请输入模板CODE' autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label"><span style="color: red;">*</span>模板内容</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入模板内容" name="sms_content" lay-verify="required" class="layui-textarea"><?php echo $tem['sms_content']; ?></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">模板说明</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入模板说明" name="sms_remarks" class="layui-textarea"><?php echo $tem['sms_remarks']; ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" type="submit">修改</button>
                    <a class="layui-btn layui-btn-primary" href="<?=url('msg/msgtem')?>">返回</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    layui.use('form', function(){
        var form = layui.form;
        form.on('radio', function(data){
            console.log(data);
        });
    });
</script>
</div>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>
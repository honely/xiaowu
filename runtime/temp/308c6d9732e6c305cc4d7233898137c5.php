<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\msg\editsign.html";i:1529823935;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <a href="<?=url('msg/msgsigns')?>">短信签名</a>
        <a><cite>修改短信签名</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('msg/msgsigns')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1" action="<?=url('msg/editsign')?>?sign_id=<?php echo $sign['ali_sign_id']; ?>" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">
                    <span style="color: red;">*</span>签名名称
                </label>
                <div class="layui-input-block">
                    <input type="text" name="ali_sign_name" lay-verify="required" value="<?php echo $sign['ali_sign_name']; ?>" placeholder='请输入短信签名' autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label"><span style="color: red;">*</span>签名说明</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入签名说明" name="ali_sign_remarks" class="layui-textarea"><?php echo $sign['ali_sign_remarks']; ?></textarea>
                </div>
            </div>
            <div class="layui-form-item" pane>
                <label class="layui-form-label">是否可用</label>
                <div class="layui-input-block">
                    <input type="radio" name="ali_sign_able" value="1" title="是" <?php if($sign['ali_sign_able'] == 1): ?>checked<?php endif; ?> >
                    <input type="radio" name="ali_sign_able" value="2" title="否"  <?php if($sign['ali_sign_able'] == 2): ?>checked<?php endif; ?> >
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" type="submit">修改</button>
                    <a class="layui-btn layui-btn-primary" href="<?=url('msg/msgsigns')?>">返回</a>
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
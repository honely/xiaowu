<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\setinfo\editset.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
        <a href="<?=url('setinfo/setlist')?>">基础配置</a>
        <a><cite>修改配置</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('setinfo/setlist')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1" action="<?=url('setinfo/editset')?>?s_id=<?php echo $set['s_id']; ?>&type=<?php echo $type; ?>" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">配置key</label>
                <div class="layui-input-block">
                    <input type="text" name="s_key" value="<?php echo $set['s_key']; ?>" lay-verify="required|s_key" placeholder="请输入配置key" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">配置名称</label>
                <div class="layui-input-block">
                    <input type="text" name="s_desc" value="<?php echo $set['s_desc']; ?>" lay-verify="required" required placeholder="请输入配置名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">配置value</label>
                <div class="layui-input-block">
                    <input type="text" name="s_value" value="<?php echo $set['s_value']; ?>" lay-verify="required|s_value" required placeholder="请输入配置value" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item" pane>
                <label class="layui-form-label">是否可用</label>
                <div class="layui-input-block">
                    <input type="radio" name="s_is_able" value="1" title="是" <?php if($set['s_is_able'] == 1): ?>checked<?php endif; ?> >
                    <input type="radio" name="s_is_able" value="2" title="否" <?php if($set['s_is_able'] == 2): ?>checked<?php endif; ?> >
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="*">修改</button>
                    <?php if($type == 1): ?>
                    <a class="layui-btn layui-btn-primary" href="<?=url('msg/msg')?>">返回</a>
                    <?php else: ?>
                    <a class="layui-btn layui-btn-primary" href="<?=url('setinfo/setlist')?>">返回</a>
                    <?php endif; ?>
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
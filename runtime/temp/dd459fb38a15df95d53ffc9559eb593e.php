<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"G:\xampp\htdocs\bbb\public/../application/admin\view\regin\editprov.html";i:1541387967;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <a href="<?=url('district/district')?>">区域管理-省份</a>
        <a><cite>修改省份</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('district/district')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1" action="<?=url('regin/editProv')?>?p_id=<?php echo $prov['p_id']; ?>" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>省份名称</label>
                <div class="layui-input-block">
                    <input type="text" name="p_name" value="<?php echo $prov['p_name']; ?>" lay-verify="required" required placeholder="请输入省份名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>省份编码</label>
                <div class="layui-input-inline">
                    <input type="text" name="p_code" lay-verify="required" value="<?php echo $prov['p_code']; ?>" placeholder="请输入省份编码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux" style="color: red !important;">此编码用来生成房源编号，一旦填写请勿随意修改！</div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" type="submit">修改</button>
                    <a class="layui-btn" href="<?=url('district/district')?>">返回</a>
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
        //监听提交
        form.on('submit(*)', function(data){
            console.log(data)
            return false;
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
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"G:\xampp\htdocs\bbb\public/../application/admin\view\department\edit.html";i:1537593942;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
       <a>部门管理</a>
        <a href="<?=url('department/index')?>">部门管理</a>
        <a><cite>添加部门</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('department/index')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1" action="<?=url('department/edit')?>?d_id=<?php echo $menu['d_id']; ?>&m_fid=<?php echo $finfo['d_id']; ?>" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>部门名称</label>
                <div class="layui-input-block">
                    <input type="text" name="d_name" value="<?php echo $menu['d_name']; ?>" lay-verify="required|title" placeholder="请输入部门名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label"><span style="color: red;">*</span>上级部门</label>
                <div class="layui-input-block">
                    <input type="text" lay-verify="required" value="<?php echo $finfo['d_name']; ?>" readonly autocomplete="off" class="layui-input">
                    <input type="hidden" name="d_f_id" value="<?php echo $finfo['d_id']; ?>" >
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="saveInfo">修改</button>
                    <a class="layui-btn layui-btn-primary" href="<?=url('department/index')?>">返回</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    layui.use(['form','jquery'], function(){
        var form = layui.form
            ,$ = layui.jquery;
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
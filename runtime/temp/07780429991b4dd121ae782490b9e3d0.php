<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\admin\addmenu.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
        <a>系统设置</a>
        <a href="<?=url('admin/menu')?>">模块配置</a>
        <a><cite>添加菜单</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('admin/menu')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1" action="<?=url('admin/addmenu')?>" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>菜单名称</label>
                <div class="layui-input-block">
                    <input type="text" name="m_name" lay-verify="required|title" placeholder="请输入菜单名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label"><span style="color: red;">*</span>菜单父级</label>
                <div class="layui-input-block">
                    <input type="text" lay-verify="required" value="<?php echo $finfo['m_name']; ?>" readonly autocomplete="off" class="layui-input">
                    <input type="hidden" name="m_fid" value="<?php echo $finfo['m_id']; ?>" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>菜单类型</label>
                <div class="layui-input-inline">
                    <select name="m_type" lay-verify="required">
                        <option value="">请选择菜单类型</option>
                        <option value="1">菜单</option>
                        <option value="2">操作</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>控制器名</label>
                <div class="layui-input-block">
                    <input type="text" name="m_control" lay-verify="required" placeholder="请输入控制器名" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>方法名称</label>
                <div class="layui-input-block">
                    <input type="text" name="m_action" lay-verify="required" placeholder="请输入方法名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单图标</label>
                <div class="layui-input-block">
                    <input type="text" name="m_icon" lay-verify="required" placeholder="请输入菜单图标" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-block">
                    <input type="text" name="m_sort" value="0" lay-verify="required" placeholder="请输入排序" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="saveInfo">添加</button>
                    <a class="layui-btn layui-btn-primary" href="<?=url('admin/menu')?>">返回</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    layui.use(['form','jquery'], function(){
        var form = layui.form
            ,$ = layui.jquery;
        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,content: function(value){
            }
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
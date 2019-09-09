<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\question\index.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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

<div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>调查问卷</a>
        <a><cite>调查问卷</cite></a>
    </span>
</div>
<hr/>
<section class="panel panel-padding">
    <table lay-skin="line" class="layui-table" lay-filter="demo" lay-data="{height: 'full-200', cellMinWidth:60, url:'/admin/question/questionData/', limit:20,limits:[20,30,50] ,id: 'testReload',page:true}" >
        <thead>
        <tr>
            <th lay-data="{field:'dp_id', width:110, sort: true}">托管编号</th>
            <th lay-data="{field:'q_user_name', width:90}">填表人</th>
            <th lay-data="{field:'q_user_phone', width:120}">联系电话</th>
            <th lay-data="{field:'q_user_wechat', width:90}">微信名称</th>
            <th lay-data="{field:'q_service_step',width:120}">服务流程</th>
            <th lay-data="{field:'q_aroundings',width:120}">居住环境</th>
            <th lay-data="{field:'q_security',width:120}">安保措施</th>
            <th lay-data="{field:'q_layout',width:120,}">房子布局</th>
            <th lay-data="{field:'q_clean',width:120,}">干净整洁</th>
            <th lay-data="{field:'q_setinfo',width:120,}">配套设施</th>
            <th lay-data="{field:'q_transport',width:120,}">交通</th>
            <th lay-data="{field:'q_shopping',width:120,}">购物</th>
            <th lay-data="{field:'q_experience',width:120}">居住体验</th>
            <th lay-data="{field:'q_remarks',width:222}">备注</th>
        </tr>
        </thead>
    </table>
</section>
<script>
    layui.use(['table','laydate','form'], function(){
        var table = layui.table
            ,laydate = layui.laydate
            ,form = layui.form;
        laydate.render({
            elem: '#case_decotime'
            ,range: true
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
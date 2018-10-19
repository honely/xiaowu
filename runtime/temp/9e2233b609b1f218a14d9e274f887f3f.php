<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"G:\xampp\htdocs\bbb\public/../application/market\view\index\index.html";i:1539135973;s:72:"G:\xampp\htdocs\bbb\public/../application/market\view\common\header.html";i:1539334886;s:72:"G:\xampp\htdocs\bbb\public/../application/market\view\common\footer.html";i:1539074576;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>大城小屋平台管理系统-事业部端</title>
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <style>
        .nav-item{
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin" >
    <div class="layui-header" style="border-bottom: 2px solid #009688;">
        <div class="layui-logo">事业部管理系统</div>
        <ul class="layui-nav layui-layout-left">
            <div style="line-height: 60px;">
                <span>欢迎您！<?php echo $userInfo['u_job']; ?>-<?php echo $userInfo['u_name']; ?>。</span>
            </div>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item nav-item"><a style="padding-left: 0px !important;font-size: smaller"  href="<?=url('index/index/index')?>" target="_blank">打开首页</a></li>
            <li class="layui-nav-item nav-item"><a style="padding-left: 0px !important;font-size: smaller"  href="<?=url('login/loginOut')?>">退出登录</a></li>
        </ul>
    </div>
<div class="layui-side layui-bg-black" style="top: 60px!important;">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            <li class="layui-nav-item">
                <a class="" href="javascript:;">房源管理</a>
                <dl class="layui-nav-child">
                    <dd><a data-url="<?=url('house/index')?>">房源列表</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>
<div class='layui-body' style="left: 0px;">
    <iframe id='option' src="<?=url('index/welcome')?>" frameborder='no' width='100%' height='99%'>
    </iframe>
</div>
<div class="layui-footer">
    <!-- 底部固定区域 -->
   技术支持QQ:1549089944
</div>
</div>
<script src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
<script src="__LAY__/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use(['element','jquery','layer'], function(){
        var element = layui.element,
            $ = layui.jquery;
        element.on('nav(test)',function(elem){
            var $url = $(elem).eq(0).attr('data-url');
            $("#option").attr('src',$url)
        })
    });
</script>
</body>
</html>
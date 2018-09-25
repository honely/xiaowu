<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"G:\xampp\htdocs\bbb\public/../application/admin\view\customer\addconpon.html";i:1537860626;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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

<style>
    .one-pan{
        position: relative;
    }
    .one{
        position: absolute;
        left:300px;
        top:0;
    }
</style>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>会员管理</a>
        <a href="<?=url('customer/conpon')?>">营销管理</a>
        <a><cite>发布优惠券</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('customer/conpon')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="margin: 10px">
        <div style="padding: 15px;">
            <form class="layui-form" id="conponForm">
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>优惠券标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="cp_title" lay-verify="required|title" placeholder="请输入优惠券标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>优惠金额</label>
                    <div class="layui-input-inline">
                        <input type="text" onkeyup="this.value=this.value.replace(/\D/g, '')" name="cp_money" lay-verify="required" placeholder="请输入优惠金额" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">单位：元。</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>截止日期</label>
                    <div class="layui-input-inline">
                        <input type="text" readonly id="cp_deadline" name="cp_deadline" lay-verify="required" placeholder="请选择截止日期" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label"><span style="color: red;">*</span>优惠券摘要</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入优惠券摘要" lay-verify="required" name="cp_desc" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <span class="layui-btn" lay-submit lay-filter="saveInfo">发布</span>
                        <a class="layui-btn layui-btn-primary" href="<?=url('customer/conpon')?>">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    layui.use(['form', 'jquery','laydate'], function(){
        var form = layui.form
            ,laydate = layui.laydate
            ,$ = layui.jquery;
        //编辑器图片上传接口
        laydate.render({
            elem: '#cp_deadline',
            min: 0
        });
        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
        });

        //监听提交
        form.on('submit(saveInfo)', function(data){
            $.ajax({
                'type':"post",
                'url':"<?=url('customer/addconpon')?>",
                'data':$('#conponForm').serialize(),
                'success':function (result) {
                    console.log(result.data);
                    if(result.code == '1'){
                        layer.msg(result.msg, {icon: 1, time: 2000},function () {
                            window.location.href='<?=url('customer/conpon')?>';
                        });
                    }else{
                        layer.msg(result.msg, {icon: 2, time: 3000});
                    }
                },
                'error':function (error) {
                    console.log(error);
                }
            })
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
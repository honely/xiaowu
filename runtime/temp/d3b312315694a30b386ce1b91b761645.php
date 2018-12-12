<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"G:\xampp\htdocs\bbb\public/../application/admin\view\msg\msgtem.html";i:1527921126;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <a><cite>信息配置</cite></a>
    </span>
        <div style="float:right;">
            <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="addTem()"><i class="layui-icon"></i>添加短信模板</button>
        </div>
    </div>
    <hr/>
    <ul class="layui-tab-title">
        <li><a href="<?=url('msg/msg')?>">短信接口</a></li>
        <li><a href="<?=url('msg/msgsigns')?>">短信签名</a></li>
        <li class="layui-this"><a>短信模板</a></li>
    </ul>
    <table lay-skin="line" class="layui-table" lay-filter="demo" lay-data="{height: 'full-200', cellMinWidth:80, url:'/admin/msg/temData/', limit:20,limits:[20,30,50] ,id: 'testReload',page:true}" >
                    <thead>
                    <tr>
                        <th lay-data="{field:'sms_id', sort: true}">编号</th>
                        <th lay-data="{field:'sms_type', sort: true}">模板类型</th>
                        <th lay-data="{field:'sms_title'}">模板名称</th>
                        <th lay-data="{field:'sms_code'}">模板CODE</th>
                        <th lay-data="{field:'sms_addtime',  sort: true}">操作时间</th>
                        <th lay-data="{field:'ad_realname',  sort: true}">操作人</th>
                        <th lay-data="{ width:160,toolbar: '#barDemo'}">操作</th>
                    </tr>
                    </thead>
                </table>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
</script>
<script>
    layui.use(['table','laydate','form'], function(){
        var table = layui.table
            ,form = layui.form;
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            var sms_id = data.sms_id;
            if(obj.event === 'edit'){
                window.location.href='<?=url("msg/edittem")?>?sms_id='+ sms_id;
            }else if(obj.event === 'del'){
                layer.confirm('确定删除该模板？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('msg/delTem')?>",
                        'data':{sms_id:sms_id},
                        'success':function (result) {
                            if(result.code < 1){
                                layer.msg(result.msg);
                            }else {
                                layer.msg(result.msg);
                                layer.open({
                                    title: '信息'
                                    ,content: result.msg
                                    ,yes: function(index){
                                        layer.close(index);
                                        window.location.href='<?=url("msg/msgtem")?>';
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href='<?=url("msg/msgtem")?>';
                                    }
                                });
                            }
                        },
                        'error':function () {
                            console.log('error');
                        }
                    })
                },function(){
                    layer.msg('您已取消该操作！',{
                        time: 2000
                    });
                });
            }
        });
        //监听是否开启操作
        form.on('switch(sexDemo)', function(obj){
            var id = this.value;
            //如果选中状态是true,后台数据将要改为显示
            var change = obj.elem.checked;
            if(change){
                change = 1;
            }else{
                change = 0;
            }
            $.ajax({
                type: 'POST',
                url: "<?=url('setinfo/setstatus')?>?s_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });
    });
</script>
<script>
    function addTem(){
        window.location.href='<?=url('msg/addTem')?>';
    }
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
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\msg\msg.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
    </div>
    <hr/>
    <ul class="layui-tab-title">
            <li class="layui-this">短信接口</li>
            <li><a href="<?=url('msg/msgsigns')?>">短信签名</a></li>
            <li><a href="<?=url('msg/msgtem')?>">短信模板</a></li>
        </ul>
    <table lay-skin="line"  class="layui-table" lay-filter="demo" lay-data="{height: 'full-200',cellMinWidth:80,  url:'/admin/msg/setData/', limit:20,limits:[20,30,50] ,id: 'testReload'}" >
        <colgroup>
            <col width="150">
            <col width="200">
            <col width="150">
            <col width="200">
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th lay-data="{field:'s_id',width:165,sort: true}">编号</th>
            <th lay-data="{width:260,field:'s_key'}">配置key</th>
            <th lay-data="{width:290,field:'s_desc'}">名称</th>
            <th lay-data="{field:'s_value', width:500, sort: true}">配置值</th>
            <th lay-data="{width:210,field:'s_opeatime',  sort: true}">操作时间</th>
            <th lay-data="{width:200,field:'s_admin', sort: true}">操作人</th>
            <th lay-data="{ toolbar: '#barDemo',width:90}">操作</th>
        </tr>
        </thead>
    </table>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</a>
</script>
<script>
    layui.use(['table','laydate','form'], function(){
        var table = layui.table
            ,form = layui.form;
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            if(obj.event === 'edit'){
                var s_id = data.s_id;
                window.location.href='<?=url("setinfo/editSet")?>?s_id='+ s_id +'&type=1';
            } else if(obj.event === 'del'){
                var s_id = data.s_id;
                layer.confirm('确定删除该专题？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('setinfo/delSet')?>",
                        'data':{s_id:s_id},
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
                                        window.location.href='<?=url("setinfo/setlist")?>';
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href='<?=url("setinfo/setlist")?>';
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
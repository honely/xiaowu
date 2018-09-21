<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"G:\xampp\htdocs\bbb\public/../application/admin\view\setinfo\housetype.html";i:1536400412;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <a>类型参数</a>
        <a><cite>房屋配置</cite></a>
    </span>
        <div style="float:right;">
            <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="addType()"><i class="layui-icon"></i>添加配置</button>
        </div>
    </div>
    <hr/>
    <ul class="layui-tab-title">
        <li><a href="<?=url('setinfo/typelist')?>">房屋类型</a></li>
        <li><a href="<?=url('setinfo/houseArea')?>">月租范围</a></li>
        <li class="layui-this">房屋配置</li>
        </ul>
    <table lay-skin="line" class="layui-table" lay-filter="demo" lay-data="{height: 'full-200', cellMinWidth:80, url:'/admin/setinfo/houseData/', limit:20,limits:[20,30,50] ,id: 'testReload'}" >
                        <thead>
                        <tr>
                            <th lay-data="{field:'type_id',  sort: true}">编号</th>
                            <th lay-data="{field:'type_name'}">类型名称</th>
                            <th lay-data="{field:'type_img', templet: '#type_img',sort:true, unresize: true}">类型图片</th>
                            <th lay-data="{field:'type_isable', templet: '#switchTpl',sort:true, unresize: true}">是否显示</th>
                            <th lay-data="{field:'type_order', sort: true,edit: 'text',}">排序</th>
                            <th lay-data="{field:'type_addtime', sort: true}">操作时间</th>
                            <th lay-data="{field:'type_admin', sort: true}">操作人</th>
                            <th lay-data="{ toolbar: '#barDemo',width:160}">操作</th>
                        </tr>
                        </thead>
                    </table>
</div>
<script type="text/html" id="switchTpl">
    <input type="checkbox" name="sex" lay-skin="switch" value="{{d.type_id}}" lay-text="是|否" lay-filter="sexDemo" {{ d.type_isable == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="type_img">
    <div><img src="{{ d.type_img}}"></div>
</script>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
</script>
<script>
    layui.use(['table','form'], function(){
        var table = layui.table
            ,form = layui.form;
        // //修改排序
        table.on('edit(demo)', function(obj){
            var value = obj.value;
            var type_id = obj.data.type_id;
            $.ajax({
                type: 'POST',
                url: "<?=url('setinfo/reOrder')?>",
                data:{type_id:type_id,value:value},
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            if(obj.event === 'edit'){
                var type_id = data.type_id;
                window.location.href='<?=url("setinfo/editConfig")?>?type_id='+ type_id + '&type=4';
            } else if(obj.event === 'del'){
                var type_id = data.type_id;
                layer.confirm('确定删除该客户标签？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('setinfo/delType')?>",
                        'data':{type_id:type_id},
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
                                        window.location.href='<?=url("setinfo/typelist")?>';
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href='<?=url("setinfo/typelist")?>';
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
                url: "<?=url('setinfo/userStatus')?>?type_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    function addType(){
        window.location.href='<?=url('setinfo/addConfig')?>?type=4';
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
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\house\orders.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
        <a>房源管理</a>
        <a><cite>预约看房</cite></a>
    </span>
</div>
<hr/>
<section class="panel panel-padding">
    <table lay-skin="line" class="layui-table" lay-filter="demo" lay-data="{height: 'full-200', cellMinWidth:60, url:'/admin/house/orderData/', limit:20,limits:[20,30,50] ,id: 'testReload',page:true}" >
        <thead>
        <tr>
            <th lay-data="{field:'ho_id', width:150, sort: true}">编号</th>
            <th lay-data="{field:'ho_name'}">预约人</th>
            <th lay-data="{field:'ho_phone'}">联系电话</th>
            <th lay-data="{field:'ho_addtime', sort: true}">提交时间</th>
            <th lay-data="{field:'ho_remark', sort: true}">预约备注</th>
            <!--<th lay-data="{ width:220, toolbar: '#barDemo'}">操作</th>-->
        </tr>
        </thead>
    </table>
</section>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</a>
    <a class="layui-btn layui-btn-xs" lay-event="refresh"><i class="layui-icon">&#xe9aa;</i>刷新</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
</script>
<script type="text/html" id="switchTpl">
    <input type="checkbox" name="sex" lay-skin="switch" value="{{d.h_id}}" lay-text="可租|已租" lay-filter="sexDemo" {{ d.h_isable == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="switch">
    <input type="checkbox" name="sex" lay-skin="switch" value="{{d.h_id}}" lay-text="是|否" lay-filter="isTop" {{ d.h_istop == 1 ? 'checked' : '' }}>
</script>
<script>
    layui.use(['table','laydate','form'], function(){
        var table = layui.table
            ,laydate = layui.laydate
            ,form = layui.form;
        laydate.render({
            elem: '#case_decotime'
            ,range: true
        });
        var $ = layui.$, active = {
            //表格重载
            reload: function(){
                var keywords = $('#keywords').val();
                var case_area = $('#case_area').val();
                var case_admin = $('#case_admin').val()?$('#case_admin').val():0;
                var case_designer = $('#case_designer').val();
                var case_decotime = $('#case_decotime').val();
                //执行重载
                table.reload('testReload', {
                    url: '/admin/example/expData/'
                    ,page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        keywords: keywords,
                        case_p_id: p_id,
                        bu_c_id: c_id,
                        branch: b_id,
                        case_area: case_area,
                        case_decotime: case_decotime,
                        case_designer: case_designer,
                        case_admin: case_admin
                    },
                    success:function (data) {
                        console.log(data);
                    }
                });

                $.ajax({
                    type:'post',
                    url:'/admin/example/example',
                    data:{'keywords':keywords,'case_p_id':p_id,'bu_c_id':c_id,'branch':b_id,'case_area':case_area,'case_decotime':case_decotime,'case_designer':case_designer,'case_admin':case_admin,'style_id':'0'},
                    success:function (data) {
                        $('.display').html(data.display);
                        $('.none').html(data.none);
                        $('.all').html(data.all);
                        var style=data.decStyle;
                        for(var i = 0; i < style.length; i++) {
                            $('.style'+style[i].type_id).html(style[i].count)
                        }
                    },
                    error:function (data) {
                        console.log(data)
                    }
                })
            }

        };
        $('.demoTable .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            var h_id = data.h_id;
            if(obj.event === 'edit'){
                window.location.href='<?=url("house/edit")?>?h_id='+ h_id ;
            }else if(obj.event === 'refresh'){
                $.ajax({
                    'type':"get",
                    'url':"<?=url('house/refresh')?>",
                    'data':{h_id:h_id},
                    'success':function (result) {
                        if(result.code < 1){
                            layer.msg(result.msg);
                        }else {
                            layer.msg(result.msg,{
                                time: 2000,
                            },function () {
                                window.location.reload()
                            });
                        }
                    },
                    'error':function () {
                        console.log('error');
                    }
                })
            } else if(obj.event === 'del'){

                layer.confirm('确定删除该房源？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('house/del')?>",
                        'data':{h_id:h_id},
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
                                        window.location.href='<?=url("house/index")?>';
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href='<?=url("house/index")?>';
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
        form.on('select(bu_p_id)', function(data){
            var p_id=data.value;
            $('#city').show();
            $.ajax({
                type: 'POST',
                url: "<?=url('user/getCityName')?>?p_id="+p_id,
                data: {p_id:p_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#bu_c_id").html("<option value=''>请选择城市</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.c_id).text(val.c_name);
                        $("#bu_c_id").append(option1);
                        form.render('select');
                    });
                    $("#bu_c_id").get(0).selectedIndex=0;
                }
            });
        });
        //调用该城市下面的分站
        form.on('select(bu_c_id)', function(data){
            var c_id=data.value;
            $('#branchs').show();
            $.ajax({
                type: 'POST',
                url: "<?=url('admin/getBranchName')?>?c_id="+c_id,
                data: {c_id:c_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#branch").html("<option value=''>请选择站点</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.b_id).text(val.b_name);
                        $("#branch").append(option1);
                        form.render('select');
                    });
                    $("#branch").get(0).selectedIndex=0;
                }
            });
        });
        //调用该分站下面的管理员
        form.on('select(ba_branch)', function(data){
            var b_id=data.value;
            $.ajax({
                type: 'POST',
                url: "<?=url('admin/getAdminName')?>",
                data: {b_id:b_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#ba_admin").html("<option value=''>请选择操作人</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.ad_id).text(val.ad_realname);
                        $("#ba_admin").append(option1);
                        form.render('select');
                    });
                    $("#ba_admin").get(0).selectedIndex=0;
                }
            });
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
                url: "<?=url('house/status')?>?h_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });
        //监听是否置顶
        form.on('switch(isTop)', function(obj){
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
                url: "<?=url('house/top')?>?h_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
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
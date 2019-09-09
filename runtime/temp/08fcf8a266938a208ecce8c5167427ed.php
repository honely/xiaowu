<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\customer\index.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
    .layui-table-cell{
        height:36px !important;
        line-height:36px !important;
        clear: both;
    }
</style>
<div style="margin: 20px;">
        <span class="layui-breadcrumb" lay-separator=">">
            <a>会员管理</a>
            <a><cite>会员列表</cite></a>
        </span>
</div>
<hr/>
<section class="panel panel-padding" style="padding-top: 10px;padding-left: 10px;">
    <form class="layui-form layui-form-pane1">
        <div class="layui-form-item  demoTable">
            <div class="layui-inline">
                <div class="layui-input-inline" style="width: 250px;">
                    <input type="text" name="keywords" id="keywords"  placeholder="请输入客户姓名/手机/推广来源" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="text" name="cus_opptime" readonly class="layui-input" id="cus_opptime" placeholder="请选择客户预约日期">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <span class="layui-btn" data-type="reload">查询</span>
                    <a href="<?=url('customer/index')?>" class="layui-btn layui-btn-warm">刷新</a>
                </div>
            </div>
        </div>
    </form>
</section>
<table class="layui-table" lay-filter="demo" lay-size="sm" lay-skin="line" lay-data="{height: 'full-200', page:true, url:'/admin/customer/custData/', limit:20,limits:[20,30,50] ,id: 'testReload'}" >
    <thead>
    <tr>
        <th lay-data="{type:'checkbox', width:48}"></th>
        <th lay-data="{field:'cus_bid', width:150, sort: true}">客户编号</th>
        <th lay-data="{field:'c_name', width:180}">省份城市</th>
        <th lay-data="{field:'cus_name',  width:80}">客户姓名</th>
        <th lay-data="{field:'cus_phone', width:120}">联系电话</th>
        <th lay-data="{field:'cus_area', width:97}">房屋面积</th>
        <th lay-data="{field:'cus_backtime',width:160, sort: true,}">操作时间</th>
        <th lay-data="{field:'ad_realname',width:80}">操作人</th>
        <th lay-data="{width:150, toolbar: '#barDemo'}">操作</th>
    </tr>
    </thead>
</table>
<div id="batch" class="layui-btn-group demoTable" style="display: none;margin-left: 15px;">
    <button class="layui-btn layui-btn-xs" data-type="getCheckData">批量删除</button>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
</script>
<script>
    layui.use(['table','laydate','form'], function(){
        var table = layui.table
            ,form = layui.form
            ,laydate = layui.laydate;
        laydate.render({
            elem: '#cus_opptime'
            ,range: true
        });



        table.on('tool(demo)', function(obj){
            var data = obj.data;
            if(obj.event === 'edit'){
                var user_id = data.cus_id;
                layer.open({
                    type: 2,
                    title: '预约客户详细信息',
                    shadeClose: true,
                    shade: false,
                    maxmin: true,
                    area: ['893px', '600px'],
                    content: "<?=url('user/details')?>?user_id="+user_id
                });
            } else if(obj.event === 'del'){
                var cus_id = data.cus_id;
                layer.confirm('确定删除该客户？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('user/delUser')?>",
                        'data':{cus_id:cus_id},
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
                                        window.location.href='<?=url("user/user")?>';
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href='<?=url("user/user")?>';
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

        var $ = layui.$, active = {
            getCheckData: function(){ //获取选中数据
                layer.confirm('确定批量删除客户？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    var ids = '';
                    var checkStatus = table.checkStatus('testReload')
                        ,data = checkStatus.data;
                    for(var i=0;i<data.length;i++){
                        ids+=','+checkStatus.data[i].cus_id;
                    }
                    $.ajax({
                        type: 'POST',
                        url: "<?=url('user/delBatch')?>?ids="+ids,
                        data: {ids:ids},
                        dataType:  'json',
                        success: function(data){
                            if(data.code == '1'){
                                layer.alert('批量删除成功！', {
                                    icon: 1,
                                    skin: 'layer-ext-moon',
                                    time: 2000,
                                    end: function(){
                                        window.location.href='<?=url("user/user")?>';
                                    }
                                });
                            }
                        }
                    });
                },function(){
                    layer.msg('您已取消该操作！',{
                        time: 2000,
                        end: function(){
                            window.location.href='<?=url("user/user")?>';
                        }
                    });
                });
            },
            reload: function(){
                var keywords = $('#keywords').val();
                var cus_opptime = $('#cus_opptime').val();
                var case_admin = $('#case_admin').val();

                //执行重载
                table.reload('testReload', {
                    url: '/admin/user/userData/'
                    ,page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        keywords: keywords,
                        case_p_id: case_p_id,
                        bu_c_id: bu_c_id,
                        branch: branch,
                        case_admin: case_admin,
                        cus_opptime: cus_opptime
                    },
                    success:function (data) {
                        console.log(data);
                    }
                });

                $.ajax({
                    type:'post',
                    url:'/admin/user/user',
                    data:{'keywords':keywords,'case_p_id':case_p_id,'bu_c_id':bu_c_id,'branch':branch,'cus_opptime':cus_opptime,'case_admin':case_admin},
                    success:function (data) {
                        $('.display').html(data.display);
                        $('.nones').html(data.none);
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
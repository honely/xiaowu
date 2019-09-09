<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\customer\conpon.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
            <a><cite>营销管理</cite></a>
        </span>
    <div style="float:right;">
        <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="addArt()"><i class="layui-icon"></i>添加优惠券</button>
    </div>
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
                    <a href="<?=url('customer/conpon')?>" class="layui-btn layui-btn-warm">刷新</a>
                </div>
            </div>
        </div>
    </form>
</section>
<section class="panel panel-padding">
    <table lay-skin="line" class="layui-table" lay-filter="demo" lay-data="{height: 'full-200', cellMinWidth:60, url:'/admin/customer/conponData/', limit:20,limits:[20,30,50] ,id: 'testReload',page:true}" >
        <thead>
        <tr>
            <th lay-data="{field:'cp_bid', align:'left',  sort: true}">营销编号</th>
            <th lay-data="{field:'cp_title',width:550,  align:'left'}">优惠券标题</th>
            <th lay-data="{field:'cp_money', align:'left',  sort: true}">优惠金额</th>
            <th lay-data="{field:'cp_deadline',width:180, align:'left',  sort: true}">截止日期</th>
            <th lay-data="{field:'cp_addtime',width:180, align:'left',  sort: true}">操作时间</th>
            <th lay-data="{field:'ad_realname', align:'left',  sort: true}">操作人</th>
            <th lay-data="{field:'art_isable', align:'left' ,templet: '#switchTpl',sort:true, unresize: true}">是否显示</th>
            <th lay-data="{align:'left',width:220, toolbar: '#barDemo'}">操作</th>
        </tr>
        </thead>
    </table>
</section>
<div id="batch" class="layui-btn-group demoTable" style="display: none;margin-left: 15px;">
    <button class="layui-btn layui-btn-xs" data-type="getCheckData">批量删除</button>
</div>
<script type="text/html" id="barDemo">
    <button class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</button>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
</script>
<script type="text/html" id="switchTpl">
    <input type="checkbox" name="sex" lay-skin="switch" value="{{d.cp_id}}" lay-text="是|否" lay-filter="sexDemo" {{ d.cp_isable == 1 ? 'checked' : '' }}>
</script>
<script>
    function addArt() {
        window.location.href='<?=url('customer/addconpon')?>';
    }
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
                url: "<?=url('customer/status')?>?cp_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });


        table.on('tool(demo)', function(obj){
            var data = obj.data;
            var cp_id = data.cp_id;
            if(obj.event === 'edit'){
                window.location.href='<?=url("customer/editconpon")?>?cp_id='+cp_id;
            } else if(obj.event === 'del'){
                layer.confirm('确定删除该优惠券？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('customer/delconpon')?>",
                        'data':{cp_id:cp_id},
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
                                        window.location.href='<?=url("customer/conpon")?>';
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href='<?=url("customer/conpon")?>';
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
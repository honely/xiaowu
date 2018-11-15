<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\house\paylog.html";i:1542178263;}*/ ?>
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
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <script src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
    <script src="__LAY__/layui.js"></script>
    <style>
        .layui-form-mid{
            padding:0 !important;
            width: 45%;
        }
        .color-red{
            color:red;

        }
    </style>
</head>
<form class="layui-form" action="" id="cusInfo" method="post">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>房源编号【201811130005】的出租记录</legend>
    </fieldset>
    <section class="panel panel-padding" style="padding-top: 10px;padding-left: 10px;">
        <form class="layui-form layui-form-pane1">
            <div class="layui-form-item  demoTable">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" name="pay_time" readonly class="layui-input" id="pay_time" placeholder="请选择收租时间">
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <span class="layui-btn" data-type="reload">查询</span>
                        <span class="layui-btn layui-btn-warm" onclick="refresh()">刷新</span>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <div class="layui-form">
        <table class="layui-hide" id="test" lay-filter="demo"></table>
    </div>
</form>
</html>
<script type="text/html" id="barDemo">
    <span class="layui-btn layui-btn-xs" lay-event="detailsss">详情</span>
</script>
<script>
    layui.use(['table','laydate'], function(){
        var table = layui.table
            ,laydate=layui.laydate;
        var hrl_id=<?php echo $h_id; ?>;
        laydate.render({
            elem: '#pay_time'
            ,range: true
        });
        table.render({
            elem: '#test'
            ,url:'/admin/house/logData/'
            ,cols: [[
                {field:'hrpl_rent_name', title: '租客姓名',  sort: true}
                ,{field:'hrpl_rent_phone',title: '联系方式' }
                ,{field:'hrpl_addtime',width:180,title: '收租时间'}
                ,{field:'hrpl_money', title: '金额（元）'}
                ,{field:'hrpl_user', title: '收款人'}
                ,{toolbar: '#barDemo',title:'操作'}

            ]]
            ,id: 'testReload'
            ,page:true
            ,limit:15
            ,limits:[15,30,50]
            ,where: {
                hrl_id: hrl_id
            }
            ,method:'get'
        });
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            var hrpl_id = data.hrpl_id;
            if(obj.event === 'detailsss'){
                layer.open({
                    type: 2,
                    title: '收款详情',
                    shadeClose: true,
                    shade: false,
                    maxmin: true,
                    area: ['666px', '500px'],
                    content: "<?=url('house/paydetail')?>?hrpl_id="+hrpl_id
                });
            }
        });
        var $ = layui.$, active = {
            //表格重载
            reload: function(){
                var pay_time = $('#pay_time').val();
                //执行重载
                table.reload('testReload', {
                    url: '/admin/house/logData/'
                    ,page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        hrl_id: hrl_id,
                        pay_time: pay_time
                    },
                    success:function (data) {
                        console.log(data);
                    }
                });
            }

        };
        $('.demoTable .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
    function refresh() {
        var hrl_id=<?php echo $h_id; ?>;
        $('#pay_time').val('');
        var pay_time='';
        layui.use(['table','jquery'], function(){
            var table = layui.table;
            table.reload('testReload', {
                url: '/admin/house/logData/'
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: {
                    hrl_id: hrl_id,
                    pay_time: pay_time
                },
                success:function (data) {
                    console.log(data);
                }
            });
        })
    }
</script>
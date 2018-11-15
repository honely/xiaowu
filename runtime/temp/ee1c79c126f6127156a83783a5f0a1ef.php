<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"G:\xampp\htdocs\bbb\public/../application/admin\view\house\rent.html";i:1542177525;}*/ ?>
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
    <div class="layui-form-item" style="margin-left:20px">
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">小区名称: <?php if(isset($house['h_building'])): ?><?php echo $house['h_building']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">房屋面积: <?php if(isset($house['h_area'])): ?><?php echo $house['h_area']; ?>㎡<?php endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">房源地址：<?php if(isset($house['h_address'])): ?><?php echo $house['h_address']; endif; ?></div>
        </div>
    </div>
    <section class="panel panel-padding" style="padding-top: 10px;padding-left: 10px;">
        <form class="layui-form layui-form-pane1">
            <div class="layui-form-item  demoTable">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" name="keywords" id="keywords"  placeholder="请输入租客姓名或者手机号" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" name="rent_time" readonly class="layui-input" id="rent_time" placeholder="请选择出租时间">
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
    <a class="layui-btn layui-btn-xs" lay-event="rentDetail"><i class="layui-icon">&#xe65e;</i>出租详情</a>
    <a class="layui-btn layui-btn-xs" lay-event="payRent"><i class="layui-icon">&#xe631;</i>收租记录</a>
</script>
<script>
    layui.use(['table','laydate'], function(){
        var table = layui.table
            ,laydate=layui.laydate;
        laydate.render({
            elem: '#rent_time'
            ,range: true
        });
        var b_id=<?php echo $h_id; ?>;
        table.render({
            elem: '#test'
            ,url:'/admin/house/rentData/'
            ,cols: [[
                {field:'hr_name', width:100,title: '租客姓名'}
                ,{field:'hr_phone',title: '联系电话' }
                ,{field:'hrl_rent_time', width:100, title: '出租时间'}
                ,{field:'hrl_rent_price', width:80, title: '租金'}
                ,{field:'hrl_rent_type',width:100,  title: '出租类型'}
                ,{field:'hrl_dead_time',width:100,title: '到期时间'}
                ,{field:'hrc_title', width:100,title: '出租渠道'}
                ,{toolbar: '#barDemo',title:'操作'}

            ]]
            ,id: 'testReload'
            ,page:true
            ,limit:15
            ,limits:[15,30,50]
            ,where: {
                    b_id: b_id
            }
            ,method:'get'
        });
        var $ = layui.$, active = {
            //表格重载
            reload: function(){
                var keywords = $('#keywords').val();
                var rent_time = $('#rent_time').val();
                //执行重载
                table.reload('testReload', {
                    url: '/admin/house/rentData/'
                    ,page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        b_id: b_id,
                        keywords: keywords,
                        rent_time: rent_time
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
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            var hrl_id = data.hrl_id;
            if(obj.event === 'rentDetail'){
                layer.open({
                    type: 2,
                    title: '房屋出租详情',
                    shadeClose: true,
                    shade: false,
                    maxmin: true,
                    area: ['866px', '600px'],
                    content: "<?=url('house/rentdetail')?>?hrl_id="+hrl_id
                });
            }else if(obj.event === 'payRent')
            {
                layer.open({
                    type: 2,
                    title: '收租记录',
                    shadeClose: true,
                    shade: false,
                    maxmin: true,
                    area: ['866px', '600px'],
                    content: "<?=url('house/paylog')?>?hrl_id="+hrl_id
                });
            }
        });
    });
    function refresh() {
        var b_id=<?php echo $h_id; ?>;
        $('#keywords').val('');
        $('#rent_time').val('');
        var keywords='';
        var rent_time='';
        layui.use(['table','jquery'], function(){
            var table = layui.table;
            table.reload('testReload', {
                url: '/admin/house/rentData/'
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: {
                    b_id: b_id,
                    keywords: keywords,
                    rent_time: rent_time
                },
                success:function (data) {
                    console.log(data);
                }
            });
        })
    }
</script>
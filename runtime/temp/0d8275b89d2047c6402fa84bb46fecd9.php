<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\shop\index.html";i:1568109437;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
    #pages .layui-laypage-prev {
        padding: 0 12px;
    }
    #pages .layui-laypage-next{
        padding: 0 12px;
    }
    #pages .layui-laypage a{
        border:none;
    }
    #pages .layui-laypage-curr{
        padding: 0 11px;
        height: 24px;
        line-height: 24px;
    }
    #pages .layui-laypage input{
        padding: 0 11px;
        height: 26px;
        line-height: 26px;
    }
    #pages .layui-laypage input, .layui-laypage button{
        padding: 0 11px;
        height: 26px;
        line-height: 26px;
    }
    #pages .layui-laypage select{
        height: 18px;
    }
    em{
        font-style: normal;
    }
    .layui-table td{
        padding: 0px 15px;
        height: 40px !important;
    }
</style>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>商城管理</a>
        <a><cite>商品管理</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('shop/addProduct')?>" class="layui-btn layui-btn-primary layui-btn-sm" ><i class="layui-icon"></i>添加商品</a>
        </div>
    </div>
    <hr/>
    <section class="panel panel-padding layui-form" >
        <table lay-skin="line" class="layui-table" lay-filter="parse-table-demo" style="padding: 10px;text-align: left;border: 1px;solid-color: #28282c">
<!--            <colgroup>-->
<!--                <col width="120">-->
<!--                <col width="200">-->
<!--                <col width="200">-->
<!--                <col width="260">-->
<!--                <col width="260">-->
<!--                <col width="160">-->
<!--                <col width="160">-->
<!--            </colgroup>-->
            <thead>
            <tr>
                <th></th>
                <th>商品编号</th>
                <th>商品名称</th>
                <th>商品图片</th>
                <th>分类</th>
                <th>销量</th>
                <th>状态</th>
                <th>操作时间</th>
                <th>操作人</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if($list == null): ?>
            <tr><td colspan="8" style="text-align: center">暂无内容</td></tr>
            <?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$na): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td>
                    </td>
                    <td><?php echo $na['goods_id']; ?></td>
                    <td><?php echo $na['goods_name']; ?></td>
                    <td><img style="width: 30px;height: 30px;" src="<?php echo $na['goods_img']; ?>"/></td>
                    <td><?php echo $na['goods_sort']; ?></td>
                    <td><?php echo $na['goods_sales_num']; ?></td>
                    <td><?php echo $na['goods_del_flg']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$na['goods_change_date']); ?></td>
                    <td><?php echo $na['goods_admin']; ?></td>
                    <td >
                        <button class="layui-btn layui-btn-xs" onclick="onLine(<?php echo $na['goods_id']; ?>)"><i class="layui-icon">&#xe61f;</i>多规格</button>
                        <button class="layui-btn layui-btn-xs" onclick="onLine(<?php echo $na['goods_id']; ?>)"><i class="layui-icon">&#xe619;</i>上架</button>
                        <button class="layui-btn layui-btn-xs" onclick="offLine(<?php echo $na['goods_id']; ?>)"><i class="layui-icon">&#xe61a;</i>下架</button>
                        <button class="layui-btn layui-btn-xs" onclick="editPro(<?php echo $na['goods_id']; ?>)"><i class="layui-icon">&#xe642;</i>编辑</button>
                        <button class="layui-btn layui-btn-xs" onclick="delGoods(<?php echo $na['goods_id']; ?>)"><i class="layui-icon">&#xe640;</i>删除</button>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </section>
    <script>
        layui.use(['form','layer'], function(){
            var form = layui.form,
                layer = layui.layer; //独立版的layer无需执行这一句
            //监听指定开关
        });
    </script>
    <script type="text/javascript">
        //修改商品，上架的商品不能直接修改，要先下架，然后才能修改
        function editPro(g_id){
            window.location.href='<?=url("shop/editProduct")?>?g_id='+ g_id;
        }
        //删除商品，上架的商品不能直接删除，要先下架，然后才能删除，删除是软删除，之是前端不显示，不代表数据库数据的实际删除
        function delGoods(g_id){
            window.location.href='<?=url("shop/editProduct")?>?g_id='+ g_id;
        }
        //上架商品，添加或者修改完成的完善的商品，执行上架操作，上架后产品可以在前端显示给用户。
        function onLine(g_id){
            window.location.href='<?=url("shop/editProduct")?>?g_id='+ g_id;
        }
        //下架商品，在线上的商品，需要修改或者删除的，先要下架了，才能进行修改和删除的操作。下架后已在前端的显示的商品，前端讲不会再显示
        function offLine(g_id){
            window.location.href='<?=url("shop/editProduct")?>?g_id='+ g_id;
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
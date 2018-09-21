<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"G:\xampp\htdocs\bbb\public/../application/admin\view\district\district.html";i:1536387039;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <a><cite>区域管理</cite></a>
    </span>
        <div style="float:right;">
            <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="addProv()"><i class="layui-icon"></i>添加省份</button>
        </div>
    </div>
    <hr/>
    <ul class="layui-tab-title">
        <li class="layui-this">省份</li>
        <li><a href="<?=url('district/city')?>">城市</a></li>
        <li><a href="<?=url('district/area')?>">县区</a></li>
    </ul>
    <table lay-skin="line" class="layui-table" lay-filter="parse-table-demo" style="padding: 30px;text-align: center;border: 1px;solid-color: #28282c;text-align: left">
        <colgroup>
            <col width="500">
            <col width="1060">
            <col width="160">
        </colgroup>
        <thead>
            <tr>
                <td style="padding-left: 50px;" >编号</td>
                <td>省份名称</td>
                <td >操作</td>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($provInfo) || $provInfo instanceof \think\Collection || $provInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $provInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prov): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td style="padding-left: 50px;"><?php echo $prov['p_id']; ?></td>
                    <td ><?php echo $prov['p_name']; ?></td>
                    <td >
                    <button class="layui-btn layui-btn-xs" onclick="editProv(<?php echo $prov['p_id']; ?>)"><i class="layui-icon">&#xe642;</i>编辑</button>
                    <button class="layui-btn layui-btn-danger layui-btn-xs" onclick="delProv(<?php echo $prov['p_id']; ?>)" data-type="test2"><i class="layui-icon">&#xe640;</i>删除</button>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<script>
    layui.use('layer', function(){
        // $('.demo').on('click', function(){
        //     var type = $(this).data('type');
        //     active[type] ? active[type].call(this) : '';
        // });
    });
    function delProv(p_id) {
        layer.confirm('确定删除这个省份？删除后不可恢复！', {
            btn : [ '确定', '取消' ]//按钮
        }, function() {
            layer.msg('您已删除该省份', {icon: 1});
            window.location.href='<?=url("regin/delProv")?>?p_id='+ p_id ;
        },function(){
            layer.msg('您已取消该操作！',{
                time: 2000
            });
        });
    }
    function delCity(c_id) {
        layer.confirm('确定删除这个城市？删除后不可恢复！', {
            btn : [ '确定', '取消' ]//按钮
        }, function() {
            layer.msg('您已删除此城市', {icon: 1});
            window.location.href='<?=url("regin/delCity")?>?c_id='+ c_id ;
        },function(){
            layer.msg('您已取消该操作！',{
                time: 2000
            });
        });
    }
</script>
<script type="text/javascript">
    function addProv(){
        window.location.href='<?=url('regin/addProv')?>';
    }
    function editProv(p_id){
        window.location.href='<?=url("regin/editProv")?>?p_id='+ p_id ;
    }
    function addCity(){
        window.location.href='<?=url('regin/addCity')?>';
    }
    function editCity(c_id){
        window.location.href='<?=url("regin/editCity")?>?c_id='+ c_id ;
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
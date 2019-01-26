<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"G:\xampp\htdocs\bbb\public/../application/admin\view\channel\index.html";i:1543896580;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1543896579;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1543896579;}*/ ?>
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
        <a>房源管理</a>
        <a>出租渠道</a>
    </span>
        <div style="float:right;">
            <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="addType()"><i class="layui-icon"></i>添加渠道</button>
        </div>
    </div>
    <hr/>
    <div style="padding: 20px; background-color: #F2F2F2;">
        <div class="layui-row layui-col-space15">
            <?php if($channel != null): if(is_array($channel) || $channel instanceof \think\Collection || $channel instanceof \think\Paginator): $i = 0; $__LIST__ = $channel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$chan): $mod = ($i % 2 );++$i;?>
                    <div class="layui-col-md2">
                        <div class="grid-demo">
                            <div class="layui-card">
                                <div class="layui-card-header"><?php echo $chan['hrc_title']; ?></div>
                                <div class="layui-card-body">
                                    <img style="width: 180px;height: 130px;" src="<?php echo $chan['hrc_img']; ?>"/>
                                    <br>
                                    <div style="padding-top: 20px;padding-bottom: 12px;">
                                        <a class="layui-btn layui-btn-xs" href="<?=url('channel/edit')?>?hrc_id=<?php echo $chan['hrc_id']; ?>"><i class="layui-icon">&#xe642;</i>编辑</a>
                                        <a class="layui-btn layui-btn-danger layui-btn-xs" onclick="delChan(<?php echo $chan['hrc_id']; ?>)"><i class="layui-icon">&#xe640;</i>删除</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
    </div>
</div>
<script>
    layui.use(['table','form'], function(){
        var table = layui.table
            ,form = layui.form;
        // //修改排序
    });
</script>
<script type="text/javascript">
    function addType(){
        window.location.href="<?=url('channel/add')?>";
    }
    function delChan(hrc_id){
        window.location.href="<?=url('channel/del')?>?hrc_id="+hrc_id;
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
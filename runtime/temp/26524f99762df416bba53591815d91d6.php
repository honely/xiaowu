<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\shop\add.html";i:1568081242;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
        <a>商城管理</a>
        <a href="<?=url('shop/sort')?>">商品分类</a>
        <a><cite>添加分类</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('shop/sort')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1" action="<?=url('shop/add')?>" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">父级分类</label>
                <div class="layui-input-inline">
                    <select name="ss_f_id" lay-filter="nav">
                        <option value="">请选择父级分类</option>
                        <option value="0">顶级分类</option>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $nav['ss_id']; ?>"><?php echo $nav['ss_title']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">分类名称</label>
                <div class="layui-input-block">
                    <input type="text" name="ss_title" lay-verify="required|ss_title" required placeholder="请输入分类名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-inline">
                    <select name="ss_order" lay-filter="aihao">
                        <option value="">请选择排列顺序</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">数字越大越靠前!</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">分类图片</label>
                <div class="layui-upload">
                    <button type="button" class="layui-btn" id="uploadNav">上传图片</button>
                    <input type="hidden" name="ss_icon" id="ss_icon" value=""/>
                    <div class="layui-upload-list" style="margin-left: 100px;">
                        <img class="layui-upload-img" style="height: 100px;width:100px" id="navPre">
                    </div>
                </div>
                <div class="layui-form-mid layui-word-aux" style="margin-left: 100px; color:red !important;">备注：图片规格100*100px</div>
            </div>
            <div class="layui-form-item" pane>
                <label class="layui-form-label">是否可用</label>
                <div class="layui-input-block">
                    <input type="radio" name="ss_del_flg" value="1" title="是" checked>
                    <input type="radio" name="ss_del_flg" value="2" title="否">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="*">添加</button>
                    <a class="layui-btn layui-btn-primary" href="<?=url('shop/sort')?>">返回</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    layui.use(['form','upload'], function(){
        var form = layui.form
            ,upload = layui.upload;
        form.on('radio', function(data){
            console.log(data);
        });


        form.on('select(nav)', function(data){
            var nav_id=data.value;
            if(nav_id != 0){
                $('.dis-none').show();
            }else{
                $('.dis-none').hide();
            }
        });
        //导航图片上传
        upload.render({
            elem: '#uploadNav'
            ,url: '<?php echo url("shop/upload"); ?>'
            ,size:1200
            ,ext: 'jpg|png|gif'
            ,accept: 'images' //限制文件大小，单位 KB
            ,before: function(input){
                loading = layer.load(2, {
                    shade: [0.2,'#000']
                });
            }
            ,done: function(res){
                $('#navPre').removeAttr('src');
                $('#ss_icon').val('');
                console.log(res);
                layer.close(loading);
                $('#ss_icon').val(res.path);
                $('#navPre').attr('src',"__PUBLIC__"+res.path);
                layer.msg(res.msg, {icon: 1, time: 1000});
            }
            ,error: function(res){
                layer.msg(res.msg, {icon: 2, time: 1000});
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
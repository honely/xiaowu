<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"G:\xampp\htdocs\bbb\public/../application/admin\view\setinfo\editconfig.html";i:1536400952;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <a href="<?=url('setinfo/houseType')?>">房屋配置</a>
        <a><cite>修改配置</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('setinfo/houseType')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1" action="<?=url('setinfo/editConfig')?>?type_id=<?php echo $conf['type_id']; ?>" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>配置名称</label>
                <div class="layui-input-block">
                    <input type="text" name="type_name" value="<?php echo $conf['type_name']; ?>" lay-verify="required" placeholder="请输入配置名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>配置图片</label>
                <div class="layui-upload">
                    <input type="hidden" value="<?php echo $conf['type_img']; ?>" id="type_img" name="type_img"/>
                    <button type="button" class="layui-btn" id="test1">上传图片</button>
                    <div class="layui-upload-list">
                        <img class="layui-upload-img" src="__PUBLIC__<?php echo $conf['type_img']; ?>" style="margin-left: 30px;height: 100px;width: 100px;" id="logoPre">
                        <p id="demoText"></p>
                    </div>
                </div>
            </div>

            <div class="layui-form-item" pane>
                <label class="layui-form-label">是否可用</label>
                <div class="layui-input-block">
                    <input type="radio" name="type_isable" value="1" title="是" <?php if($conf['type_isable'] == 1): ?>checked<?php endif; ?>>
                    <input type="radio" name="type_isable" value="2" title="否" <?php if($conf['type_isable'] == 2): ?>checked<?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="*">修改</button>
                    <a class="layui-btn layui-btn-primary" href="<?=url('setinfo/houseType')?>">返回</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    layui.use(['form','upload'], function(){
        var form = layui.form,upload = layui.upload;
        form.on('radio', function(data){
            console.log(data);
        });
        upload.render({
            elem: '#test1'
            ,url: '<?php echo url("setinfo/upload"); ?>'
            ,size:600 //限制文件大小，单位 KB
            ,ext: 'jpg|png|gif'
            ,accept: 'images' //限制文件大小，单位 KB
            ,before: function(input){
                loading = layer.load(2, {
                    shade: [0.2,'#000']
                });
            }
            ,done: function(res){
                $('#logoPre').removeAttr('src');
                $('#type_img').val('');
                console.log(res);
                layer.close(loading);
                $('#type_img').val(res.path);
                $('#logoPre').css('width','100px');
                $('#logoPre').css('height','100px');
                $('#logoPre').attr('src',"__PUBLIC__"+res.path);
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
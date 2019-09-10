<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\shop\addspec.html";i:1568103062;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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

<form class="layui-form" style="margin-top: 20px;">
    <div class="layui-form-item">
        <label class="layui-form-label">规格名称</label>
        <div class="layui-input-block">
            <input type="text" name="gs_title" style="width: 320px;" lay-verify="title" autocomplete="off" placeholder="请输入规格名称" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item one-pan">
        <label class="layui-form-label"><span style="color: red;">*</span>封面图片</label>
        <div class="layui-upload-drag" id="uploadLogo" style="display:inline-block;">
            <image id="logoPre">
                <input type="hidden" lay-verify="imgReg"  name="gs_img" id="art_img" value=""/>
            </image>
            <div id="display">
                <i class="layui-icon"></i>
                <p>请点击此处上传封面图片</p>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"><span style="color: red;">*</span>商品原价</label>
        <div class="layui-input-inline">
            <input type="text" onkeyup="this.value=this.value.replace(/\D/g, '')" name="gs_price" lay-verify="required" placeholder="请输入商品原价" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">单位：元。</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"><span style="color: red;">*</span>折扣价</label>
        <div class="layui-input-inline">
            <input type="text" onkeyup="this.value=this.value.replace(/\D/g, '')" name="gs_discount" lay-verify="required" placeholder="请输入折扣价" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">用户实付金额，单位：元。</div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <span class="layui-btn" id="transmit">添加</span>
        </div>
    </div>
</form>
<script>
    layui.use(['form', 'jquery','upload','layer'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,layer = layui.layer
            ,$ = layui.jquery;
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
            ,imgReg:function (value) {
                if(value.length <= 0){
                    return '请上传图片';
                }
            }
        });
        //图片上传
        upload.render({
            elem: '#uploadLogo'
            ,url: '<?php echo url("article/upload"); ?>'
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
                $('#art_img').val('');
                console.log(res);
                layer.close(loading);
                $('#art_img').val(res.path);
                $('#uploadLogo').removeClass('layui-upload-drag');
                $('#logoPre').css('width','216px');
                $('#logoPre').css('height','150px');
                $('#logoPre').attr('src',"__PUBLIC__"+res.path);
                $('#display').hide();
                layer.msg(res.msg, {icon: 1, time: 1000});
            }
            ,error: function(res){
                layer.msg(res.msg, {icon: 2, time: 1000});
            }
        });
        var index = parent.layer.getFrameIndex(window.name);


        
        //给父页面传值
        $('#transmit').on('click', function(){
            var gs_title =  $("input[name ='gs_title']").val();
            var gs_img =  $("input[name ='gs_img']").val();
            var gs_price =  $("input[name ='gs_price']").val();
            var gs_discount =  $("input[name ='gs_discount']").val();
            var gs_stock =  $("input[name ='gs_stock']").val();
            parent.$('#specTable').append('<tr>\n' +
                '                            <td>'+gs_title+'</td>\n' +
                '                            <td>￥：'+gs_price+'</td>\n' +
                '                            <td>￥：'+gs_discount+'</td>\n' +
                '                            <td>\n' +
                '                                <img src="'+gs_img+'"/>\n' +
                '                            </td>\n' +
                '                            <td>2019-9-10</td>\n' +
                '                            <td>正常</td>\n' +
                '                            <td>\n' +
                '                                <a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</a>\n' +
                '                                <a class="layui-btn layui-btn-xs" lay-event="dels"><i class="layui-icon">&#xe640;</i>删除</a>\n' +
                '                            </td>\n' +
                '                        </tr>');
            parent.layer.tips('Look here', '#addSpec', {time: 5000});
            parent.layer.close(index);
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
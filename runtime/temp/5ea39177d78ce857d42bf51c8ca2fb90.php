<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"G:\xampp\htdocs\bbb\public/../application/admin\view\learn\editlession.html";i:1543896578;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1543896579;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1543896579;}*/ ?>
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
    .one-pan{
        position: relative;
    }
    .one{
        position: absolute;
        left:300px;
        top:0;
    }
    .logoPre{
        width: 216px;
        height: 150px;
    }
    .casePre{
        display:none;
    }
</style>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>培训管理</a>
        <a href="<?=url('learn/index')?>">课程列表</a>
        <a><cite>修改课程</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('learn/index')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="margin: 10px">
        <div style="padding: 15px;">
            <form class="layui-form" id="lessonForm">
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>课程标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="ls_title" value="<?php echo $lesson['ls_title']; ?>" lay-verify="required|title" placeholder="请输入课程标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <!--<div class="layui-form-item layui-form-text">-->
                    <!--<label class="layui-form-label"><span style="color: red;">*</span>课程简介</label>-->
                    <!--<div class="layui-input-block">-->
                        <!--<textarea placeholder="请输入课程简介" lay-verify="required" name="ls_remarks" class="layui-textarea"><?php echo $lesson['ls_remarks']; ?></textarea>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="layui-form-item">-->
                    <!--<label class="layui-form-label"><span style="color: red;">*</span>课程详情</label>-->
                    <!--<div class="layui-input-block">-->
                        <!--<input type="hidden" id="ls_description"  name="ls_description"  value=""/>-->
                        <!--<textarea id="demo" placeholder="请输入文章内容" lay-verify="content"style="display: none;"><?php echo $lesson['ls_description']; ?></textarea>-->
                    <!--</div>-->
                <!--</div>-->
                <div class="layui-form-item one-pan">
                    <label class="layui-form-label"><span style="color: red;">*</span>封面图片</label>
                    <div <?php if($lesson['ls_img'] == null): ?>class="layui-upload-drag"<?php endif; ?> id="uploadLogo" style="display:inline-block;">
                        <image id="logoPre"
                               <?php if($lesson['ls_img'] == null): else: ?>
                    src="__PUBLIC__<?php echo $lesson['ls_img']; ?>"
                    class="logoPre"
                    <?php endif; ?>
                        >
                            <input type="hidden" lay-verify="imgReg"  name="ls_img" id="ls_img" value="<?php echo $lesson['ls_img']; ?>"/>
                        </image>
                    <?php if($lesson['ls_img'] == null): ?>
                    <div id="display">
                        <i class="layui-icon"></i>
                        <p>请点击此处上传封面图片</p>
                    </div>
                    <?php endif; ?>
                    </div>
                    <div class="one">
                        <div class="layui-form-mid layui-word-aux" id="tips" style="margin-left: 39px; ">图片要求，最大600KB，支持JPG/JEPG/PNG格式</div>
                        <div class="layui-form-item">
                            <textarea name="ls_img_alt" style="resize:none;width: 1315px;height: 115px; margin-left:39px;"  placeholder="图片描述，建议不超过15个字（等同图片ALT属性）" class="layui-textarea"><?php echo $lesson['ls_img_alt']; ?></textarea>
                        </div>
                    </div>
                </div>
                <!--<div class="layui-form-item">-->
                    <!--<label class="layui-form-label">附件资料</label>-->
                    <!--<div class="layui-input-inline" style="width: 290px;">-->
                        <!--<input type="text" name="ls_video" value="<?php echo $lesson['ls_video']; ?>"  id="ls_videoas" placeholder="请上传附件资料"  readonly class="layui-input">-->
                    <!--</div>-->
                    <!--<div class="layui-input-inline">-->
                        <!--<button type="button" class="layui-btn" id="ls_video"><i class="layui-icon"></i>上传文件</button>-->
                    <!--</div>-->
                <!--</div>-->
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <span class="layui-btn" lay-submit lay-filter="saveInfo">发布</span>
                        <a class="layui-btn layui-btn-primary" href="<?=url('learn/index')?>">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    layui.use(['form', 'jquery','upload','layedit'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,layedit = layui.layedit
            ,$ = layui.jquery;
        //编辑器图片上传接口
        layedit.set({
            uploadImage: {
                url: '/admin/article/editUpload' //接口url
                ,type: 'post', //默认post
                success:function(res){
                    console.log(res);
                },
                error:function (res) {
                    console.log(res);
                }
            }
        });

        var index = layedit.build('demo');
        //自定义验证规则
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
            ,content: function(value){
                var cont=layedit.getContent(index); //获取编辑器内容
                if(cont.length <= 0){
                    return '请输入内容信息！';
                }
            }
        });

        //监听提交
        form.on('submit(saveInfo)', function(data){
            var ls_description=layedit.getContent(index);
            $('#ls_description').val(ls_description);
            $.ajax({
                'type':"post",
                'url':"<?=url('learn/editlession')?>?ls_id=<?php echo $lesson['ls_id']; ?>",
                'data':$('#lessonForm').serialize(),
                'success':function (result) {
                    console.log(result.data);
                    if(result.code == '1'){
                        layer.msg(result.msg, {icon: 1, time: 2000},function () {
                            window.location.href='<?=url('learn/index')?>';
                        });
                    }else if(result.code == '2'){
                        layer.msg(result.msg, {icon: 2, time: 3000});
                    }else if(result.code == '3'){
                        layer.msg(result.msg, {icon: 3, time: 3000});
                    }
                },
                'error':function (error) {
                    console.log(error);
                }
            })
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
                $('#ls_img').val('');
                console.log(res);
                layer.close(loading);
                $('#ls_img').val(res.path);
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

        //文件上传
        upload.render({
            elem: '#ls_video'
            ,url: '<?php echo url("learn/upload"); ?>'
            ,accept: 'file' //普通文件
            ,done: function(res){
                if(res.state == 1){
                    $("#ls_videoas").val(res.path);
                    layer.msg(res.msg, {icon: 1, time: 1000});
                }else{
                    layer.msg(res.msg, {icon:2, time: 1000});
                }
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
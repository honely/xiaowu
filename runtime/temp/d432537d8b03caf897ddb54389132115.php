<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"G:\xampp\htdocs\bbb\public/../application/admin\view\learn\editsubles.html";i:1537516902;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
</style>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>培训管理</a>
        <a href="<?=url('learn/index')?>">课程列表</a>
        <a href="<?=url('learn/sublesson')?>?ls_id=<?php echo $ls_id; ?>"><?php echo $ls_title; ?>章节列表</a>
        <a><cite>修改章节</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('learn/sublesson')?>?ls_id=<?php echo $ls_id; ?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="margin: 10px">
        <div style="padding: 15px;">
            <form class="layui-form" id="lessonForm">
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>章节标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="lc_title" value="<?php echo $chapter['lc_title']; ?>" lay-verify="required|title" placeholder="请输入章节标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>章节内容</label>
                    <div class="layui-input-block">
                        <input type="hidden" id="lc_content"  name="lc_content" />
                        <textarea id="demo" placeholder="请输入章节内容" lay-verify="lc_content"style="display: none;"><?php echo $chapter['lc_content']; ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">附件资料</label>
                    <div class="layui-input-inline" style="width: 290px;">
                        <input type="text" name="lc_files" value="<?php echo $chapter['lc_files']; ?>" id="lc_files" placeholder="请上传附件资料"  readonly class="layui-input">
                    </div>
                    <div class="layui-input-inline">
                        <button type="button" class="layui-btn" id="ls_videoas"><i class="layui-icon"></i>上传文件</button>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <span class="layui-btn" lay-submit lay-filter="saveInfo">发布</span>
                        <a class="layui-btn layui-btn-primary" href="<?=url('learn/sublesson')?>?ls_id=<?php echo $ls_id; ?>">返回</a>
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

        var index = layedit.build('demo', {
            tool: [  'strong' //加粗
                ,'italic' //斜体
                ,'underline' //下划线
                ,'del' //删除线
                ,'|' //分割线
                ,'left' //左对齐
                ,'center' //居中对齐
                ,'right' //右对齐
                ,'link' //超链接
                ,'unlink' //清除链接
                ,'image' //插入图片
            ]
            ,height: 450
        });
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
            var lc_content=layedit.getContent(index);
            $('#lc_content').val(lc_content);
            $.ajax({
                'type':"post",
                'url':"<?=url('learn/editsubles')?>?lc_id=<?php echo $chapter['lc_id']; ?>",
                'data':$('#lessonForm').serialize(),
                'success':function (result) {
                    console.log(result.data);
                    if(result.code == '1'){
                        layer.msg(result.msg, {icon: 1, time: 2000},function () {
                            window.location.href='<?=url('learn/sublesson')?>?ls_id=<?php echo $ls_id; ?>';
                        });
                    }else {
                        layer.msg(result.msg, {icon: 3, time: 3000});
                    }
                },
                'error':function (error) {
                    console.log(error);
                }
            })
        });

        //文件上传
        upload.render({
            elem: '#ls_videoas'
            ,url: '<?php echo url("learn/upload"); ?>'
            ,accept: 'file' //普通文件
            ,done: function(res){
                if(res.state == 1){
                    $("#lc_files").val(res.path);
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
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\article\addarticle.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.js"></script>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>内容管理</a>
        <a href="<?=url('article/article')?>">文章管理</a>
        <a><cite>发布文章</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('article/article')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="margin: 10px">
        <div style="padding: 15px;">
            <form class="layui-form" action="<?=url('article/addArticle')?>" method="post">
                <div class="layui-form-item" pane>
                    <label class="layui-form-label"><span style="color: red;">*</span>文章分类</label>
                    <div class="layui-input-block">
                        <input type="radio" name="art_type" value="1" title="房租优势" checked>
                        <input type="radio" name="art_type" value="2" title="精彩瞬间">
                        <input type="radio" name="art_type" value="3" title="企业优势">
                        <input type="radio" name="art_type" value="4" title="小屋快讯">
                        <input type="radio" name="art_type" value="5" title="装修风格">
                        <input type="radio" name="art_type" value="6" title="学习园地">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>文章标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="art_title" lay-verify="required|title" placeholder="请输入文章标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <!--1.房租优势；2精彩瞬间，3企业优势，4.小屋快讯，5.装修风格'-->
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>关键词</label>
                    <div class="layui-input-block">
                        <input type="text" name="art_keywords" lay-verify="required|title" placeholder="请输入关键词" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label"><span style="color: red;">*</span>文章摘要</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入文章摘要" lay-verify="required" name="art_subtitle" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">文章内容</label>
                    <div class="layui-input-block">
                        <textarea name="art_content" id="container"></textarea>
                    </div>
                </div>
                <div class="layui-form-item one-pan">
                    <label class="layui-form-label"><span style="color: red;">*</span>封面图片</label>
                    <div class="layui-upload-drag" id="uploadLogo" style="display:inline-block;">
                        <image id="logoPre">
                            <input type="hidden" lay-verify="imgReg"  name="art_img" id="art_img" value=""/>
                        </image>
                        <div id="display">
                            <i class="layui-icon"></i>
                            <p>请点击此处上传封面图片</p>
                        </div>
                    </div>
                    <div class="one">
                        <div class="layui-form-mid layui-word-aux" id="tips" style="margin-left: 39px; ">图片要求，最大600KB，支持JPG/JEPG/PNG格式</div>
                        <div class="layui-form-item">
                                <textarea name="art_img_alt" style="resize:none;width: 1315px;height: 115px; margin-left:39px;"  placeholder="图片描述，建议不超过15个字（等同图片ALT属性）" class="layui-textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item" pane>
                    <label class="layui-form-label">是否置顶</label>
                    <div class="layui-input-block">
                        <input type="radio" name="art_istop" value="2" title="常规" checked>
                        <input type="radio" name="art_istop" value="1" title="置顶">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="saveInfo">发布</button>
                        <a class="layui-btn layui-btn-primary" href="<?=url('article/article')?>">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var ue= UE.getEditor('container',{    //content为要编辑的textarea的id

        initialFrameWidth: 1100,   //初始化宽度

        initialFrameHeight: 500,   //初始化高度

    });
</script>
<script>
    layui.use(['form', 'jquery','upload','layedit'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,layedit = layui.layedit
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
            ,content: function(value){
                var cont=layedit.getContent(index); //获取编辑器内容
                if(cont.length <= 0){
                    return '请输入内容信息！';
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
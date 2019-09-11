<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\shop\addproduct.html";i:1568187731;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
    .item_img{
        width: 120px;
        height: 105px;
        float: left;
        margin-top: 20px;
    }
</style>
<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.js"></script>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>商城管理</a>
        <a href="<?=url('shop/index')?>">商品管理</a>
        <a><cite>发布商品</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('shop/index')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="margin: 10px">
        <div style="padding: 15px;">
            <form class="layui-form" id="myForm">
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>商品分类</label>
                    <div class="layui-input-inline">
                        <select lay-verify="required" lay-filter="bu_p_id">
                            <option value="">请选择一级分类</option>
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['ss_id']; ?>"><?php echo $vo['ss_title']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="goods_sort" lay-verify="required" id="bu_c_id" lay-filter="bu_c_id">
                            <option value="">请选择二级分类</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>商品标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="goods_name" lay-verify="required|title" placeholder="请输入商品标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item one-pan">
                    <label class="layui-form-label"><span style="color: red;">*</span>封面图片</label>
                    <div class="layui-upload-drag" id="uploadLogo" style="display:inline-block;">
                        <image id="logoPre">
                            <input type="hidden" lay-verify="imgReg"  name="goods_img" id="art_img" value=""/>
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
                        <input type="text" onkeyup="this.value=this.value.replace(/\D/g, '')" name="goods_price" lay-verify="required" placeholder="请输入商品原价" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">单位：元。</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>折扣价</label>
                    <div class="layui-input-inline">
                        <input type="text" onkeyup="this.value=this.value.replace(/\D/g, '')" name="goods_dis_price" lay-verify="required" placeholder="请输入折扣价" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">用户实付金额，单位：元。</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>商品库存</label>
                    <div class="layui-input-inline">
                        <input type="text" onkeyup="this.value=this.value.replace(/\D/g, '')" name="goods_stock" lay-verify="required" placeholder="请输入商品库存" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item" id="pics">
                    <div class="layui-form-label">商品图片</div>
                    <div class="layui-input-block" style="width: 70%;">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn layui-btn-sm layui-btn-normal pull-left" id="slide-pc">选择多图</button>
                            <div class="pic-more">
                                <ul class="pic-more-upload-list" id="slide-pc-priview">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="layui-form-item">-->
<!--                    <label class="layui-form-label">商品详情</label>-->
<!--                    <div class="layui-input-block">-->
<!--                        <textarea name="goods_details" id="container"></textarea>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="addPro">下一步</button>
                        <a class="layui-btn layui-btn-primary" href="<?=url('shop/index')?>">返回</a>
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
    layui.use(['form', 'jquery','upload','layedit','layer'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,$ = layui.jquery;
        //监听指定开关
        form.on('switch(switchTest)', function(){
            if(this.checked == true){
                $('#layui-form').show();
            }else{
                $('#layui-form').hide();
            }
        });
        //添加商品基本信息第一步
        form.on('submit(addPro)', function(){
            $.ajax({
                type: 'POST',
                url: "<?=url('shop/addProduct')?>",
                data:$('#myForm').serialize(),
                dataType:  'json',
                success: function(data){
                    if(data.code == 1){
                        var g_id = data.data;
                        window.location.href='<?=url("shop/stepTwo")?>?g_id='+ g_id;
                    }
                }
            });
        });

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
        form.on('select(bu_p_id)', function(data){
            var ss_id=data.value;
            $.ajax({
                type: 'POST',
                url: "<?=url('shop/getSubSort')?>",
                data: {ss_id:ss_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#bu_c_id").html("<option value=''>请选择二级分类</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.ss_id).text(val.ss_title);
                        $("#bu_c_id").append(option1);
                        form.render('select');
                    });
                    $("#bu_c_id").get(0).selectedIndex=0;
                }
            });
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
        upload.render({
            elem: '#slide-pc',
            url: '<?php echo url("admin/house/upload"); ?>',
            size: 5120,
            exts: 'jpg|png|jpeg',
            multiple: true,
            before: function(obj) {
                layer.msg('图片上传中...', {
                    icon: 16,
                    shade: 0.01,
                    time: 0
                })
            },
            done: function(res) {
                layer.close(layer.msg());//关闭上传提示窗口
                if(res.status == 0) {
                    return layer.msg(res.message);
                }
                console.log(res);
                $('#slide-pc-priview').append('' +
                    '<li class="item_img"><div class="operate"><i  class="close layui-icon"></i></div><img style="height: 80px;width:100px;" src="__PUBLIC__/' + res.filepath + '" class="img" ><input type="hidden" name="goods_img_more[]" value="' + res.filepath + '" /></li>');
            }
        });
    });
    //点击多图上传的X,删除当前的图片
    $("body").on("click",".close",function(){
        $(this).closest("li").remove();
    });

    $('#addSpec').click(function () {
        layer.open({
            type: 2,
            skin: 'layui-layer-rim',
            title: '规格产品',
            area: ['60%', '60%'],
            content: "<?=url('shop/addSpec')?>"
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
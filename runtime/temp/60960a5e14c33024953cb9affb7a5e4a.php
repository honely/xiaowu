<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"G:\xampp\htdocs\bbb\public/../application/admin\view\banner\addbanner.html";i:1544759393;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <a>广告管理</a>
        <a href="<?=url('banner/banner')?>">banner列表</a>
        <a><cite>添加banner</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('banner/banner')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div class="layui-tab">
        <div class="layui-tab-content">
            <!--基本信息-->
            <div class="layui-tab-item layui-show">
                <div style="margin: 10px">
                    <div style="padding: 15px;">
                        <form class="layui-form" action="<?=url('banner/addBanner')?>" method="post">
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>banner主题</label>
                                <div class="layui-input-block">
                                    <input type="text" name="ba_title" lay-verify="required|title" placeholder="请输入banner主题" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>基础信息</label>
                                <div class="layui-input-inline">
                                    <select name="ba_via" lay-verify="required" lay-filter="aihao">
                                        <option value="">请选择显示端</option>
                                        <?php if(is_array($bannerType) || $bannerType instanceof \think\Collection || $bannerType instanceof \think\Paginator): $i = 0; $__LIST__ = $bannerType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $key; ?>"><?php echo $items; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-input-inline">
                                    <select name="ba_order" lay-verify="required" lay-filter="aihao">
                                        <option value="">请选择排列顺序</option>
                                        <?php if(is_array($bannerOrder) || $bannerOrder instanceof \think\Collection || $bannerOrder instanceof \think\Paginator): $i = 0; $__LIST__ = $bannerOrder;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $key; ?>"><?php echo $items; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-form-mid layui-word-aux">数字越大越靠前，默认排序为时间倒序！</div>
                            </div>
                            <div class="layui-form-item one-pan">
                                <label class="layui-form-label"><span style="color: red;">*</span>banner图片</label>
                                <div class="layui-upload-drag" id="uploadLogo" style="display:inline-block;">
                                    <image id="logoPre">
                                        <input type="hidden" lay-verify="imgReg" name="ba_img" id="ba_img" value=""/>
                                    </image>
                                    <div id="display">
                                        <i class="layui-icon"></i>
                                        <p>请点击此处上传封面图片</p>
                                    </div>
                                </div>
                                <div class="one">
                                    <div class="layui-form-mid layui-word-aux" style="margin-left: 39px; ">图片要求，最大800KB，支持JPG/JEPG/PNG格式</div>
                                    <div class="layui-form-item">
                                        <textarea name="ba_alt" style="resize:none;width: 1315px;height: 115px; margin-left:39px;"  placeholder="图片描述，建议不超过15个字（等同图片ALT属性）" class="layui-textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">跳转链接</label>
                                <div class="layui-input-block">
                                    <input type="text" name="ba_url"  placeholder="请输入banner图片跳转链接" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item" pane>
                                <label class="layui-form-label">是否显示</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="ba_isable" value="1" title="是" checked>
                                    <input type="radio" name="ba_isable" value="2" title="否">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit lay-filter="saveInfo">添加</button>
                                    <a class="layui-btn layui-btn-primary" href="<?=url('banner/banner')?>">返回</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    layui.use(['form', 'jquery','upload'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,$ = layui.jquery;
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
        });
        form.on('select(bu_p_id)', function(data){
            var p_id=data.value;
            $.ajax({
                type: 'POST',
                url: "<?=url('user/getCityName')?>?p_id="+p_id,
                data: {p_id:p_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#bu_c_id").html("<option value=''>请选择城市</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.c_id).text(val.c_name);
                        $("#bu_c_id").append(option1);
                        form.render('select');
                    });
                    $("#bu_c_id").get(0).selectedIndex=0;
                }
            });
        });
        //调用该城市下面的分站
        form.on('select(bu_c_id)', function(data){
            var c_id=data.value;
            $.ajax({
                type: 'POST',
                url: "<?=url('admin/getBranchName')?>?c_id="+c_id,
                data: {c_id:c_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#branch").html("<option value=''>请选择站点</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.b_id).text(val.b_name);
                        $("#branch").append(option1);
                        form.render('select');
                    });
                    $("#branch").get(0).selectedIndex=0;
                }
            });
        });
        upload.render({
            elem: '#uploadLogo'
            ,url: '<?php echo url("banner/upload"); ?>'
            ,size:800 //限制文件大小，单位 KB
            ,ext: 'jpg|png|gif'
            ,accept: 'images' //限制文件大小，单位 KB
            ,before: function(input){
                loading = layer.load(2, {
                    shade: [0.2,'#000']
                });
            }
            ,done: function(res){
                $('#logoPre').removeAttr('src');
                $('#ba_img').val('');
                console.log(res);
                layer.close(loading);
                $('#ba_img').val(res.path);
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
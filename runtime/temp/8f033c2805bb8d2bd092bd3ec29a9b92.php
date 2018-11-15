<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\improve.html";i:1541755943;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>完善信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="__WAP__/css/app.css" />
    <link rel="stylesheet" type="text/css" href="__WAP__/css/mui.picker.min.css" />
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <style>
        h5 {
            margin: 5px 7px;
        }
        .color-red{
            color: red;
        }
        .item_img{
            width: 23%;
            float: left;
            height: 116px;
            overflow: hidden;
        }
        .img{
            width:100%; height: 92px
        }
    </style>
    <style type="text/css">
        .mui-preview-image.mui-fullscreen {
            position: fixed;
            z-index: 20;
            background-color: #000;
        }
        .mui-preview-header,
        .mui-preview-footer {
            position: absolute;
            width: 100%;
            left: 0;
            z-index: 10;
        }
        .mui-preview-header {
            height: 44px;
            top: 0;
        }
        .mui-preview-footer {
            height: 50px;
            bottom: 0px;
        }
        .mui-preview-header .mui-preview-indicator {
            display: block;
            line-height: 25px;
            color: #fff;
            text-align: center;
            margin: 15px auto 4;
            width: 70px;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 12px;
            font-size: 16px;
        }
        .mui-preview-image {
            display: none;
            -webkit-animation-duration: 0.5s;
            animation-duration: 0.5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        .mui-preview-image.mui-preview-in {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }
        .mui-preview-image.mui-preview-out {
            background: none;
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }
        .mui-preview-image.mui-preview-out .mui-preview-header,
        .mui-preview-image.mui-preview-out .mui-preview-footer {
            display: none;
        }
        .mui-zoom-scroller {
            position: absolute;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            -webkit-backface-visibility: hidden;
        }
        .mui-zoom {
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }
        .mui-slider .mui-slider-group .mui-slider-item img {
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }
        .mui-android-4-1 .mui-slider .mui-slider-group .mui-slider-item img {
            width: 100%;
        }
        .mui-android-4-1 .mui-slider.mui-preview-image .mui-slider-group .mui-slider-item {
            display: inline-table;
        }
        .mui-android-4-1 .mui-slider.mui-preview-image .mui-zoom-scroller img {
            display: table-cell;
            vertical-align: middle;
        }
        .mui-preview-loading {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: none;
        }
        .mui-preview-loading.mui-active {
            display: block;
        }
        .mui-preview-loading .mui-spinner-white {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -25px;
            margin-top: -25px;
            height: 50px;
            width: 50px;
        }
        .mui-preview-image img.mui-transitioning {
            -webkit-transition: -webkit-transform 0.5s ease, opacity 0.5s ease;
            transition: transform 0.5s ease, opacity 0.5s ease;
        }
        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        @-webkit-keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
        p img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">房源信息</h1>
</header>
<div class="mui-content">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>房源编号：【<?php echo $house['h_b_id']; ?>】</b>
                <span style="float: right;"><?php echo $house['p_name']; ?>-<?php echo $house['c_name']; ?>-<?php echo $house['area_name']; ?></span>
                </p>
            </div>
        </div>
    </div>
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group layui-form" id="attachForm" style="background-color: #efeff4">
            <div class="mui-card">
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>房源名称：</label>
                    <input type="text" value="<?php echo $house['h_name']; ?>" class="layui-input" lay-verify="required" id="h_name" name="h_name">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>房源地址：</label>
                    <input type="text" value="<?php echo $house['h_address']; ?>" class="layui-input" name="h_address">
                </div>
                <div class="mui-content-padded">
                    <select name="h_head" id="h_head" class="mui-btn mui-btn-block">
                        <option value="">请选择房屋朝向</option>
                        <option value="1" <?php if($house['h_head'] == 1): ?>selected<?php endif; ?>>东</option>
                        <option value="2" <?php if($house['h_head'] == 2): ?>selected<?php endif; ?>>南</option>
                        <option value="3" <?php if($house['h_head'] == 3): ?>selected<?php endif; ?>>西</option>
                        <option value="4" <?php if($house['h_head'] == 4): ?>selected<?php endif; ?>>北</option>
                        <option value="5" <?php if($house['h_head'] == 5): ?>selected<?php endif; ?>>东南</option>
                        <option value="6" <?php if($house['h_head'] == 6): ?>selected<?php endif; ?>>西南</option>
                        <option value="6" <?php if($house['h_head'] == 7): ?>selected<?php endif; ?>>东北</option>
                        <option value="6" <?php if($house['h_head'] == 8): ?>selected<?php endif; ?>>西北</option>
                    </select>
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>房源图片</label>第一张为封面图。
                    <span id="upload" class="mui-btn mui-btn-primary">上传</span>
                </div>
                <div id="imgPre">
                    <?php if(isset($house['h_img'])): if(is_array($house['h_img']) || $house['h_img'] instanceof \think\Collection || $house['h_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $house['h_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                    <li class="item_img">
                        <div class="operate">
                            <i class="close layui-icon"></i>
                        </div>
                        <img src="__PUBLIC__/<?php echo $items; ?>" class="img" data-preview-src="" data-preview-group="1">
                        <input type="hidden" name="h_img[]" lay-verify="imgReg" value="<?php echo $items; ?>" />
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>租金：</label>
                    <input type="text" lay-verify="required" onkeyup="this.value=this.value.replace(/\D/g, '')"  <?php if(isset($house['h_rent'])): ?> value="<?php echo $house['h_rent']; ?>" <?php endif; ?>  class="layui-input" id="h_rent" name="h_rent">
                </div>
                <div class="mui-content-padded">
                    <select name="h_rent_type" id="出租类型" class="mui-btn mui-btn-block">
                        <option value="">请选择出租类型</option>
                        <option value="1" <?php if($house['h_rent_type'] == 1): ?>selected<?php endif; ?>>月租</option>
                        <option value="2" <?php if($house['h_rent_type'] == 2): ?>selected<?php endif; ?>>日租</option>
                    </select>
                </div>
                <div class="layui-form-item" pane="">
                    <label class="layui-form-label" style="padding: 8px 0px">房屋配置</label>
                    <div class="layui-input-block">
                        <?php if(is_array($config) || $config instanceof \think\Collection || $config instanceof \think\Paginator): $i = 0; $__LIST__ = $config;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$conf): $mod = ($i % 2 );++$i;?>
                        <input type="checkbox" class="h_config" <?php if(is_array($type_list) || $type_list instanceof \think\Collection || $type_list instanceof \think\Paginator): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;if($item == $conf['type_id']): ?>checked<?php endif; endforeach; endif; else: echo "" ;endif; ?> lay-verify="h_config" name="h_config[<?php echo $conf['type_id']; ?>]" lay-skin="primary" title="<?php echo $conf['type_name']; ?>">
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <textarea id="textarea" name="h_nearbus" rows="5" placeholder="附近公交（必填）"><?php if(isset($house['h_nearbus'])): ?><?php echo $house['h_nearbus']; endif; ?></textarea>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <textarea name="h_subway" rows="5" placeholder="地铁沿线（必填）"><?php if(isset($house['h_subway'])): ?><?php echo $house['h_subway']; endif; ?></textarea>
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <textarea rows="5" readonly placeholder="房源简介（当前不支持房源简介移动端编辑，请在系统PC端后台填写。）"></textarea>
                </div>
            </div>
            <div id='result' class="ui-alert"></div>
            <span style="margin-top: 5px;" id="subBtn" lay-submit lay-filter="saveInfo" class="mui-btn mui-btn-primary mui-btn-block">保存信息</span>
        </form>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__LAY__/layui.js"></script>
<script src="__WAP__/js/mui.zoom.js"></script>
<script src="__WAP__/js/mui.previewimage.js"></script>
<script>
    mui.previewImage();
</script>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });

    layui.use( ['form','jquery','upload','laydate'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,laydate = layui.laydate
            ,$ = layui.jquery;
        laydate.render({
            elem: '#ha_deadline'
        });
        laydate.render({
            elem: '#ha_decorate_permit'
        });
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
            ,imgReg:function (value) {
                if(value.length <= 0){
                    return '请上传房源图片！';
                }else{
                    if(value.length <= 3){
                        return '请上传至少一张房源封面图，两张房源照片！';
                    }
                }
            }
        });
        //监听提交
        form.on('submit(saveInfo)', function(){
            $.ajax({
                type: 'POST',
                url: "<?=url('index/improve')?>?h_id=<?php echo $house['h_b_id']; ?>",
                data: $('#attachForm').serialize(),
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    if(data.code="1"){
                        mui.alert(data.msg, function() {
                            window.location.href="<?=url('index/index')?>";
                        });
                    }else{
                        mui.alert(data.msg);
                    }
                }
            });
        });
        //图片上传
        upload.render({
            elem: '#upload'
            ,url: '<?php echo url("common/upload"); ?>'
            ,size:600 //限制文件大小，单位 KB
            ,ext: 'jpg|png|gif'
            ,accept: 'images' //限制文件大小，单位 KB
            ,before: function(input){
                loading = layer.load(2, {
                    shade: [0.2,'#000']
                });
            }
            ,done: function(res){
                console.log(res);
                $('#img').val(res.path);
                $('#imgPre').append('' +
                    '<li class="item_img"><div class="operate"><i  class="close layui-icon"></i></div><img src="__PUBLIC__/' + res.path + '" class="img" ><input type="hidden" class="h_img" name="h_img[]" value="' + res.path + '" /></li>');
                layer.close(loading);
                layer.msg(res.msg, {icon: 1, time: 1000});
            }
            ,error: function(res){
                layer.msg(res.msg, {icon: 2, time: 1000});
            }
        });
    });
    //点击多图上传的X,删除当前的图片
    $("body").on("click",".close",function(){
        $(this).closest("li").remove();
    });
</script>
</body>

</html>
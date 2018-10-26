<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\bbb\public/../application/decoration\view\index\addlog.html";i:1540029230;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>添加监理日志</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <style>
        h5 {
            margin: 5px 7px;
        }
        .color-red{
            color: red;
        }
        .layui-upload-img { width: 90px; height: 90px; margin: 0; }
        .pic-more { width:100%; left; margin: 10px 0px 0px 0px;}
        .pic-more li { width:300px; float: left; margin-right: 5px;margin-top: 10px;list-style-type:none}
        /*.pic-more li .layui-input { display: initial; }*/
        .pic-more li a { position: absolute; top: 0; display: block; }
        #slide-pc-priview .item_img img{ width:277px; height: 177px}
        #slide-pc-priview li{position: relative;}
        #slide-pc-priview li .operate{ color: #000; display: none;}
        #slide-pc-priview li .toleft{ position: absolute;top: 40px; left: 1px; cursor:pointer;}
        #slide-pc-priview li .toright{ position: absolute;top: 40px; right: 1px;cursor:pointer;}
        #slide-pc-priview li .close{position: absolute;top: 5px; right: 5px;cursor:pointer;}
        #slide-pc-priview li:hover .operate{ display: block;}
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
    <a class="mui-icon mui-action-back mui-icon-left-nav mui-pull-left" href="<?=url('index/house')?>"></a>
    <h1 class="mui-title">添加监理日志</h1>
</header>
<div class="mui-content">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>当前装修阶段</b>
                    <span style="margin-left: 8px;" class="mui-badge mui-badge-danger mui-pull-right"><?php echo $statusStart; ?></span>
                </p>
                <p style="color: #333;">
                    小区名称：<?php echo $house['h_building']; ?>
                    <br/>
                    房源地址：<?php echo $house['h_address']; ?>
                    <br/>
                </p>
            </div>
        </div>
    </div>
    <div class="mui-content-padded " style="margin: 5px;">
        <form class="mui-input-group layui-form" id="payForm">
            <div class="mui-input-row">
                <label><span class="color-red">*</span>日志标题</label>
                <input type="text" class="layui-input" layui-verify="required" id="hdl_title" name="hdl_title" placeholder="请输入日志标题">
                <input name="h_id" type="text" value="<?php echo $h_id; ?>"/>
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>日志图片</label>
                <span id="upload" class="mui-btn mui-btn-primary">上传</span>
                <input type="hidden" id="img" layui-verify="required"  value=""/>
                <input type="hidden" name="isTrans" id="isTrans" value="2"/>
            </div>
            <div id="imgPre"></div>
            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <textarea id="textarea" name="hdl_content" rows="5" placeholder="日志内容"></textarea>
                    <textarea id="textareas" style="display: none" name="trans" rows="5" placeholder="日志内容"></textarea>
                </div>
            </div>
        </form>
    </div>
</div>
<?php if($status < 11): ?>
<div class="mui-card">
    <form class="mui-input-group">
        <div class="mui-input-row mui-checkbox mui-left">
            <label><?php echo $statusStart; ?>阶段已完工，转入
                <?php if($nextStatus == null): ?>
                    运营部
                <?php else: ?>
                <?php echo $nextStatus; endif; ?>。</label>
            <input name="checkbox"  type="checkbox" >
        </div>
        <div class="mui-card" id="transTips" style="display: none">
            <div class="mui-input-row" style="margin: 10px 5px;">
                <textarea id="transRemark" rows="5" placeholder="转接备注"></textarea>
            </div>
        </div>
    </form>
</div>
<?php endif; ?>

<span style="margin-top: 5px;" id="subBtn" lay-submit lay-filter="saveInfo" class="mui-btn mui-btn-primary mui-btn-block">确认添加</span>

<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__LAY__/layui.js"></script>
<script src="__WAP__/js/mui.zoom.js"></script>
<script src="__WAP__/js/mui.previewimage.js"></script>
<script>
    mui.previewImage();
    mui('.mui-input-group').on('change', 'input', function() {
        var value = this.checked?"true":"false";
        if(value == "true"){
            $("#transTips").show();
            $('#isTrans').val(1);
        }else{
            $("#transTips").hide();
            $('#isTrans').val(2);
        }
    });

</script>
<script>

    layui.use( ['form','jquery','upload',], function(){
        var form = layui.form
            ,upload = layui.upload
            ,$ = layui.jquery;
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
            ,imgReg:function (value) {
                if(value.length <= 0){
                    return '请上传日志图片！';
                }
            }
        });
        //监听提交
        form.on('submit(saveInfo)', function(){
            var transTip=$("#transRemark").val();
            $('#textareas').val(transTip);
            $.ajax({
                'type':"post",
                'url':"<?=url('index/addlogpro')?>",
                'data':$('#payForm').serialize(),
                'success':function (result) {
                    console.log(result);
                    if(result.code == '1'){
                        layer.msg(result.msg, {icon: 1, time: 2000},function () {
                            location.href="<?=url('index/dailylog')?>?h_id=<?php echo $h_id; ?>";
                        });
                    }else{
                        layer.msg(result.msg, {icon: 2, time: 3000});
                    }
                }
            })
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
                    '<li class="item_img"><div class="operate"><i  class="close layui-icon"></i></div>' +
                    '<img src="__PUBLIC__/' + res.path + '" data-preview-src="" data-preview-group="1"  class="img" >' +
                    '<input type="hidden" class="imgs" name="hdl_img[]" value="' + res.path + '" /></li>');
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
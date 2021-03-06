<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\editpay.html";i:1540889741;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>修改记录</title>
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
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-action-back mui-icon-left-nav mui-pull-left" href="<?=url('index/house')?>"></a>
    <h1 class="mui-title">添加回款记录</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded " style="margin: 5px;">
        <form class="mui-input-group layui-form" id="payForm">
            <div class="mui-input-row">
                <label><span class="color-red">*</span>回款金额</label>
                <input type="text" class="layui-input" id="hpl_money" onblur="checkVals()" lay-verify="required" name="hpl_money" placeholder="请输入回款金额">
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>打款凭证</label>
                <span id="upload" class="mui-btn mui-btn-primary">上传</span>
                <input type="hidden" id="img" lay-verify="imgReg" value=""/>
            </div>
            <div id="imgPre">

            </div>
            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <textarea id="textarea" name="hpl_tips" rows="5" placeholder="其他备注信息"></textarea>
                </div>
            </div>
            <span style="margin-top: 5px;" id="subBtn" lay-submit lay-filter="saveInfo" class="mui-btn mui-btn-primary mui-btn-block">确认添加</span>
        </form>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__LAY__/layui.js"></script>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
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
                    return '请上传打款凭证！';
                }
            }
        });
        //监听提交
        form.on('submit(saveInfo)', function(){
            var hpl_money=$('#hpl_money').val();
            if(hpl_money>will_pay){
                mui.alert('您输入的金额已超过余额！！', function() {
                });
            }else{
                $.ajax({
                    'type':"post",
                    'url':"<?=url('index/addpaylog')?>?h_id=",
                    'data':$('#payForm').serialize(),
                    'success':function (result) {
                        console.log(result);
                        if(result.code == '1'){
                            layer.msg(result.msg, {icon: 1, time: 2000},function () {
                                location.href="<?=url('index/payment')?>?h_id=";
                            });
                        }else{
                            layer.msg(result.msg, {icon: 2, time: 3000});
                        }
                    }
                })
            }
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
                    '<li class="item_img"><div class="operate"><i  class="close layui-icon"></i></div><img src="__PUBLIC__/' + res.path + '" class="img" ><input type="hidden" name="hpl_img[]" value="' + res.path + '" /></li>');
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
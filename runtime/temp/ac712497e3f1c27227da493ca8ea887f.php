<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\addpaylog.html";i:1540533901;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>添加收租</title>
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
    <h1 class="mui-title">添加收租</h1>
</header>
<div class="mui-content">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p style="color: #333;">
                    房客：【<?php echo $renter['hr_name']; ?>】，电话：<?php echo $renter['hr_phone']; ?>，租住房源编号为【<?php echo $rent['hrl_house_code']; ?>】的房屋，<?php echo $rent['hrl_dead_time']; ?>合同到期。
                </p>
            </div>
        </div>
    </div>
    <div class="mui-content-padded " style="margin: 5px;">
        <form class="mui-input-group layui-form" id="payForm">
            <div class="mui-input-row">
                <label><span class="color-red">*</span>收租金额</label>
                <input type="text" class="layui-input" id="hrpl_money" lay-verify="required" name="hrpl_money" placeholder="请输入收租金额">
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>收款凭证</label>
                <span id="upload" class="mui-btn mui-btn-primary">上传</span>
                <input type="hidden" id="img" lay-verify="imgReg" value=""/>
            </div>
            <div id="imgPre">

            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>续租日期</label>
                <input type="text" class="layui-input" readonly id="hrpl_next_rent" lay-verify="required" name="hrpl_next_rent" placeholder="请选择续租日期">
            </div>
            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <textarea id="textarea" name="hrpl_tips" rows="5" placeholder="备注信息"></textarea>
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

    layui.use( ['form','jquery','upload','laydate'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,laydate = layui.laydate
            ,$ = layui.jquery;
        laydate.render({
            elem: '#hrpl_next_rent'
        });
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
            ,imgReg:function (value) {
                if(value.length <= 0){
                    return '请上传收款凭证！';
                }
            }
        });
        //监听提交
        form.on('submit(saveInfo)', function(){
            $.ajax({
                'type':"post",
                'url':"<?=url('index/addpaylog')?>?h_id=<?php echo $hr_id; ?>",
                'data':$('#payForm').serialize(),
                'success':function (result) {
                    console.log(result);
                    if(result.code == '1'){
                        layer.msg(result.msg, {icon: 1, time: 2000},function () {
                            location.href="<?=url('index/paylog')?>?h_id=<?php echo $hr_id; ?>";
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
                    '<li class="item_img"><div class="operate"><i  class="close layui-icon"></i></div><img src="__PUBLIC__/' + res.path + '" class="img" ><input type="hidden" name="hrpl_img[]" value="' + res.path + '" /></li>');
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
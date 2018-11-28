<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\addpaylog.html";i:1543284445;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>添加记录</title>
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
        .item_img{
            width: 23%;
            float: left;
            height: 116px;
            overflow: hidden;
        }
        .img{
            width:100%; height: 92px
        }
        a{
            color: #007aff;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/payment')?>?h_id=<?php echo $h_b_id; ?>"></a>
    <h1 class="mui-title">添加回款记录</h1>
</header>
<div class="mui-content">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p style="color: #333;line-height: 26px;">
                    总装修款：<?php echo $payMoney['hp_money']; ?>元，已回款：<?php echo $payMoney['hp_paid']; ?>元。未回款： <?php echo $payMoney['hp_will_pay']; ?>元，回款比率:<?php echo $payMoney['hp_paid_ratio']; ?>。
                </p>
            </div>
        </div>
    </div>
    <div class="mui-content-padded " style="margin: 5px;">
        <form class="mui-input-group layui-form" id="payForm">
            <div class="mui-input-row">
                <label><span class="color-red">*</span>回款金额</label>
                <input type="text" class="layui-input" id="hpl_money" onkeyup="this.value=this.value.replace(/\D/g, '')"  lay-verify="required" name="hpl_money" placeholder="请输入回款金额">
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>打款凭证</label>
                <span id="uploads" class="mui-btn mui-btn-primary uploadasd">上传</span>
                <input type="hidden" id="img" lay-verify="imgReg" value=""/>
            </div>
            <div id="imgPre" style="overflow: hidden">

            </div>
            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;height: 131px;">
                    <textarea id="textarea" style="height: 131px;" name="hpl_tips" rows="10" placeholder="其他备注信息"></textarea>
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
            var will_pay=<?php echo $payMoney['hp_will_pay']; ?>;
            var hpl_money=$('#hpl_money').val();
            if(hpl_money>will_pay){
                mui.alert('您输入的金额已超过余额！！', function() {
                });
            }else{
                var btnArray = ['否', '是'];
                mui.confirm('请检查信息是否准确无误填写？', '提交后不可修改！', btnArray, function(e) {
                    if (e.index == 1) {
                        $.ajax({
                            'type':"post",
                            'url':"<?=url('index/addpaylog')?>?h_id=<?php echo $h_b_id; ?>",
                            'data':$('#payForm').serialize(),
                            'success':function (result) {
                                console.log(result);
                                if(result.code == '1'){
                                    layer.msg(result.msg, {icon: 1, time: 2000},function () {
                                        location.href="<?=url('index/payment')?>?h_id=<?php echo $h_b_id; ?>";
                                    });
                                }else{
                                    layer.msg(result.msg, {icon: 2, time: 3000});
                                }
                            }
                        })
                    }
                });

            }
        });
        //图片上传
        upload.render({
            elem: '.uploadasd'
            ,url: '<?php echo url("common/upload"); ?>'
            ,size:5000
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
                    '<li class="item_img"><div class="operate"><i  class="close layui-icon"></i></div><img  src="__PUBLIC__/' + res.path + '" class="img" ><input type="hidden" name="hpl_img[]" value="' + res.path + '" /></li>');
                layer.close(loading);
                layer.msg(res.msg, {icon: 1, time: 1000});
                var simg=$('.img').length;
                if(simg>=2){
                    $('#uploads').removeClass('uploadasd');
                    $('#uploads').removeClass('mui-btn-primary');
                    $('#uploads').addClass('mui-btn-warning');
                }
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
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\renter.html";i:1541747010;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>租客信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style>
        h5 {
            margin: 5px 7px;
        }
        .color-red{
            color: red;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back" ></a>
    <h1 class="mui-title">租客信息</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group layui-form" id="renterForm">
            <div class="mui-input-row">
                <label><span class="color-red">*</span>租客姓名</label>
                <input type="text" name="hr_name" class="layui-input" lay-verify="required"  <?php if(isset($renter['hr_name'])): ?> value="<?php echo $renter['hr_name']; ?>" <?php endif; ?> id="hr_name" placeholder="请输入租客姓名">
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>联系电话</label>
                <input type="text" name="hr_phone" class="layui-input" lay-verify="required|phone" onkeyup="this.value=this.value.replace(/\D/g, '')" <?php if(isset($renter['hr_phone'])): ?> value="<?php echo $renter['hr_phone']; ?>" <?php endif; ?> id="hr_phone" placeholder="请输入租客联系电话">
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>身份证号码</label>
                <input type="text" name="hr_idcard" class="layui-input" lay-verify="required|identity" <?php if(isset($renter['hr_idcard'])): ?> value="<?php echo $renter['hr_idcard']; ?>" <?php endif; ?>  id="hr_idcard" placeholder="请输入身份证号码">
                <textarea name="hr_remarks" style="display: none" id="hr_remarks" cols="30" rows="10"></textarea>
            </div>
            <div class="mui-input-row">
                <label>录入人</label>
                <input type="text" readonly value="<?php echo $renter['hr_admin']; ?>">
            </div>
            <div class="mui-input-row">
                <label>录入时间</label>
                <input type="text" readonly value="<?php echo $renter['hr_addtime']; ?>" />
            </div>
        </form>
        <div class="mui-input-row" style="margin: 10px 5px;">
            <textarea id="textarea" rows="5" placeholder="租客其他备注信息"><?php if(isset($renter['hr_remarks'])): ?><?php echo $renter['hr_remarks']; endif; ?> </textarea>
        </div>
        <div class="mui-content-padded">
            <span type="button"  lay-submit lay-filter="saveInfo"  class="mui-btn mui-btn-primary mui-btn-block">提交</span>
        </div>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__LAY__/layui.js"></script>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });

    layui.use( ['form','jquery'], function(){
        var form = layui.form
            ,$ = layui.jquery;
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
        });
        //监听提交
        form.on('submit(saveInfo)', function(){
            $('#hr_remarks').html('');
            var textarea=$('#textarea').val();
            $('#hr_remarks').html(textarea);
            $.ajax({
                type: 'POST',
                url: "<?=url('index/renter')?>?hr_id=<?php echo $renter['hr_id']; ?>",
                data: $('#renterForm').serialize(),
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    if(data.code="1"){
                        mui.alert(data.msg, function() {
                            window.location.href="<?=url('index/rentlog')?>?h_id=<?php echo $renter['hr_house_code']; ?>";
                        });
                    }else{
                        mui.alert(data.msg);
                    }
                }
            });
        });
    });
</script>
</body>

</html>
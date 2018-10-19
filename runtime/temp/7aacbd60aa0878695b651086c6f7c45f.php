<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\master.html";i:1539660298;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>户主信息</title>
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
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/house')?>"></a>
    <h1 class="mui-title">户主信息</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group" id="loginForm">
            <div class="mui-input-row">
                <label><span class="color-red">*</span>户主姓名</label>
                <input type="text" name="hm_name"  <?php if(isset($master['hm_name'])): ?> value="<?php echo $master['hm_name']; ?>" <?php endif; ?> id="hm_name" placeholder="请输入户主姓名">
                <input type="hidden" name="hm_house_code" value="<?php echo $h_b_id; ?>"/>
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>联系电话</label>
                <input type="text" name="hm_phone" onkeyup="this.value=this.value.replace(/\D/g, '')" <?php if(isset($master['hm_phone'])): ?> value="<?php echo $master['hm_phone']; ?>" <?php endif; ?> id="hm_phone" placeholder="请输入户主联系电话">
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>身份证号码</label>
                <input type="text" name="hm_idcard"  <?php if(isset($master['hm_idcard'])): ?> value="<?php echo $master['hm_idcard']; ?>" <?php endif; ?>  id="hm_idcard" placeholder="请输入身份证号码">
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>银行卡号</label>
                <input type="text" name="hm_bank_card" onkeyup="this.value=this.value.replace(/\D/g, '')" <?php if(isset($master['hm_bank_card'])): ?> value="<?php echo $master['hm_bank_card']; ?>" <?php endif; ?>  id="hm_bank_card" placeholder="请输入银行卡号">
            </div>
            <div class="mui-input-row">
                <label><span class="color-red">*</span>现居地址</label>
                <input type="text" name="hm_address"  <?php if(isset($master['hm_address'])): ?> value="<?php echo $master['hm_address']; ?>" <?php endif; ?>  id="hm_address" placeholder="请输入地址">
                <textarea name="hm_remarks" id="hm_remarks"></textarea>
            </div>
            <?php if($master != null): ?>
                <div class="mui-input-row">
                    <label>录入人</label>
                    <input type="text" readonly value="<?php echo $master['hm_admin']; ?>">
                </div>
                <div class="mui-input-row">
                    <label>录入时间</label>
                    <input type="text" readonly value="<?php echo $master['hm_addtime']; ?>" />
                </div>
            <?php endif; ?>

        </form>
        <div class="mui-input-row" style="margin: 10px 5px;">
            <textarea id="textarea" rows="5" placeholder="户主其他备注信息"><?php if(isset($master['hm_remarks'])): ?><?php echo $master['hm_remarks']; endif; ?> </textarea>
        </div>
        <div class="mui-content-padded">
            <span type="button" id="subBtn" class="mui-btn mui-btn-primary mui-btn-block">提交</span>
        </div>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    $('#subBtn').click(function () {
        $('#hm_remarks').html('');
        var textarea=$('#textarea').val();
        $('#hm_remarks').html(textarea);
        var hm_name=$('#hm_name').val();
        var hm_phone=$('#hm_phone').val();
        var hm_idcard=$('#hm_idcard').val();
        var hm_bank_card=$('#hm_bank_card').val();
        var hm_address=$('#hm_address').val();
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        var idCard=/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[012])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i;
        if(!myreg.test(hm_phone)){
            mui.alert('请填写正确的手机号码！', function() {
                $('#hm_phone').focus();
            });
        }else{
            if(!idCard.test(hm_idcard)){
                mui.alert('请填写正确的身份证号！', function() {
                    $('#hm_idcard').focus();
                });
            }else{
                if(
                    hm_name.length<=0
                    || hm_phone.length<=0
                    || hm_idcard.length<=0
                    || hm_bank_card.length<=0
                    || hm_address.length<=0
                ){
                    mui.alert('请检查必填信息是否准确无误填写！', function() {
                    });
                }else{
                    var btnArray = ['否', '是'];
                    mui.confirm('请检查信息是否准确无误填写？', 'Hello MUI', btnArray, function(e) {
                        if (e.index == 1) {
                            $.ajax({
                                'type':"post",
                                'url':"<?=url('index/master')?>?h_id=<?php echo $h_b_id; ?>",
                                'data':$('#loginForm').serialize(),
                                'success':function (result) {
                                    console.log(result);
                                    if(result.code == '1'){
                                        mui.alert(result.msg, function() {
                                            window.location.href="<?=url('index/house')?>";
                                        });
                                    }else{
                                        mui.toast(result.msg);
                                    }
                                },
                                'error':function (error) {
                                    console.log(error);
                                }
                            })
                        }
                    });
                }
            }
        }
    });
</script>
</body>

</html>
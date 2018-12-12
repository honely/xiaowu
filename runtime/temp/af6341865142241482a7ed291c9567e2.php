<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"G:\xampp\htdocs\bbb\public/../application/decoration\view\index\editbase.html";i:1544411865;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>房源信息</title>
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
        label,input,textarea{
            font-size: 14px;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/details')?>?h_id=<?php echo $h_b_id; ?>&type=<?php echo $type; ?>"></a>
    <h1 class="mui-title">房源信息</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group" id="loginForm">
            <div class="mui-input-row">
                <label><span class="color-red">*</span>房源编号</label>
                <input type="text" readonly <?php if(isset($h_b_id)): ?> value="<?php echo $h_b_id; ?>" <?php endif; ?>/>
            </div>
            <div class="mui-input-row">
                <label>房屋面积 ㎡</label>
                <input type="text" name="h_area" onkeyup="this.value=this.value.replace(/\D/g, '')" <?php if(isset($house['h_area'])): ?> value="<?php echo $house['h_area']; ?>" <?php endif; ?> id="h_area" placeholder="请输入房屋面积">
            </div>
            <div class="mui-input-row">
                <label>小区名称</label>
                <input type="text" name="h_building"  <?php if(isset($house['h_building'])): ?> value="<?php echo $house['h_building']; ?>" <?php endif; ?>  id="h_building" placeholder="请输入小区名称">
            </div>
            <div class="mui-input-row">
                <label>房源地址</label>
                <input type="text" name="h_address" <?php if(isset($house['h_address'])): ?> value="<?php echo $house['h_address']; ?>" <?php endif; ?>  id="h_address" placeholder="请输入房源地址">
            </div>
        </form>
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
        var btnArray = ['否', '是'];
        mui.confirm('确认修改？', 'Hello MUI', btnArray, function (e) {
            if (e.index == 1) {
                $.ajax({
                    'type': "post",
                    'url': "<?=url('index/editbase')?>?h_id=<?php echo $h_b_id; ?>",
                    'data': $('#loginForm').serialize(),
                    'success': function (result) {
                        console.log(result);
                        if (result.code == '1') {
                            mui.alert(result.msg, function () {
                                window.location.href = "<?=url('index/details')?>?h_id=<?php echo $h_b_id; ?>&type=<?php echo $type; ?>";
                            });
                        } else {
                            mui.toast(result.msg);
                        }
                    },
                    'error': function (error) {
                        console.log(error);
                    }
                })
            }
        });
    });
</script>
</body>

</html>
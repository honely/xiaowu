<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\renter.html";i:1543289118;}*/ ?>
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
        label,input,textarea{
            font-size: 14px;
        }
    </style>
</head>

<body style="background-color: #efeff4">
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/rentlog')?>?h_id=<?php echo $renter['hr_house_code']; ?>"></a>
    <h1 class="mui-title">户主信息</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group" id="loginForm">
            <div class="mui-input-row">
                <label>户主姓名</label>
                <input type="text" readonly <?php if(isset($renter['hr_name'])): ?> value="<?php echo $renter['hr_name']; ?>" <?php endif; ?>>
            </div>
            <div class="mui-input-row">
                <label>联系电话</label>
                <input type="text" readonly <?php if(isset($renter['hr_phone'])): ?> value="<?php echo $renter['hr_phone']; ?>" <?php endif; ?>/>
            </div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <p>备注信息：<?php if(isset($renter['hr_remarks'])): ?><?php echo $renter['hr_remarks']; endif; ?>
                    </p>
                </div>
            </div>
            <div class="mui-card-content" style="padding-bottom: 20px;">
                <div class="mui-card-content-inner">
                    <p class="mui-pull-right">
                        <b>提交人</b>：<?php echo $renter['u_job']; ?>---<?php echo $renter['hr_admin']; ?>
                    </p>
                    <hr style="opacity:0;width: 100%;"/>
                    <p class="mui-pull-right">
                        <b>时间</b>：<?php echo $renter['hr_addtime']; ?>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui('body').on('tap','a',function(){
        if(this.href){
            window.top.location.href=this.href;
        }
    });
</script>
</body>
</html>
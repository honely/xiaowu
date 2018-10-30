<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\masters.html";i:1540885616;}*/ ?>
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
    <a class="mui-icon mui-icon-compose mui-icon-right-nav mui-pull-right" href="<?=url('index/master')?>?h_id=<?php echo $h_b_id; ?>&m_id=2"></a>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group" id="loginForm">
            <div class="mui-input-row">
                <label>户主姓名</label>
                <input type="text" readonly value="<?php echo $master['hm_name']; ?>">
            </div>
            <div class="mui-input-row">
                <label>联系电话</label>
                <input type="text" readonly value="<?php echo $master['hm_phone']; ?>">
            </div>
            <div class="mui-input-row">
                <label>身份证号码</label>
                <input type="text" readonly value="<?php echo $master['hm_idcard']; ?>">
            </div>
            <div class="mui-input-row">
                <label>银行卡号</label>
                <input type="text" readonly value="<?php echo $master['hm_bank_card']; ?>">
            </div>
            <div class="mui-input-row">
                <label>现居地址</label>
                <input type="text" readonly value="<?php echo $master['hm_address']; ?>" >
            </div>
            <div class="mui-input-row">
                <label>录入人</label>
                <input type="text" readonly value="<?php echo $master['hm_admin']; ?>">
            </div>
            <div class="mui-input-row">
                <label>录入时间</label>
                <input type="text" readonly value="<?php echo $master['hm_addtime']; ?>" />
            </div>
        </form>
        <div class="mui-input-row" style="margin: 10px 5px;">
            <textarea id="textarea" readonly rows="5" placeholder="户主其他备注信息"><?php echo $master['hm_remarks']; ?></textarea>
        </div>
    </div>
</div>
</body>
</html>
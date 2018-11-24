<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"G:\xampp\htdocs\bbb\public/../application/manager\view\admin\alldetails.html";i:1542784918;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>转交详情</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/index')?>"></a>
    <h1 class="mui-title">转交详情</h1>
</header>
<div class="mui-content" style="padding-top: 40px;">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>房源信息</b>
                </p>
                <p style="color: #333;">
                    房源编号：【<?php echo $hatInfo['hat_house_code']; ?>】
                    <br/>
                    小区名称：<?php echo $hatInfo['h_building']; ?>
                    <br/>
                    房屋面积：<?php echo $hatInfo['h_area']; ?>（㎡）
                    <br/>
                    房源地址：<?php echo $hatInfo['h_address']; ?>
                    <br/>
                </p>
            </div>
            <hr/>
            <div class="mui-card-content-inner">
                <p><b>转交信息</b>
                </p>
                <p style="color: #333;">
                    转交人：【<?php echo $hatInfo['hat_admin']; ?>】
                    <br/>
                    转交时间：<?php echo $hatInfo['hat_add_time']; ?>
                    <br/>
                    转交备注：<?php echo $hatInfo['hat_sub_tips']; ?>
                </p>
            </div>
            <hr/>
            <div class="mui-card-content-inner">
                <p><b>分配信息</b>
                </p>
                <p style="color: #333;">
                    分配人：【<?php echo $hatInfo['hat_assigner']; ?>】
                    <br/>
                    分配时间：<?php echo $hatInfo['hat_assign_time']; ?>
                    <br/>
                    分配给：<?php echo $hatInfo['hat_assign_to_job']; ?>---<?php echo $hatInfo['hat_assign_too']; ?>
                    <br/>
                    分配备注：<?php echo $hatInfo['hat_assign_tips']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__WAP__/js/mui.zoom.js"></script>
<script src="__WAP__/js/mui.previewimage.js"></script>
<script>
    mui.previewImage();
</script>
</body>
</html>
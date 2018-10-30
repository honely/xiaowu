<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\xampp\htdocs\bbb\public/../application/decoration\view\index\index.html";i:1540881185;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>小屋智能公寓工程部</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">房源列表</h1>
    <a class="mui-icon mui-icon-person mui-icon-right-nav mui-pull-right" href="<?=url('index/person')?>" ></a>
</header>
<div class="mui-content" style="background:#fff;">
    <div class="mui-content-padded">
        <input style="float: left;width: 80%" id="keywords" type="text" placeholder="请输入房源编号进行搜索"<?php if(isset($keywords)): ?> value="<?php echo $keywords; ?>" <?php endif; ?> />
        <span onclick="formQuery()" style="float: left;width: 18%;margin-left: 5px;padding-left: 5px;margin-top: 5px;padding-top: 5px;" class="mui-btn mui-btn-primary mui-icon mui-icon-search">
            搜索
        </span>
    </div>
</div>
<div class="mui-content" style="padding-top: 40px;">
    <?php if($houses == null): ?>
    <div class="mui-card">
        <div class="mui-card-content" style="height: 40px;text-align: center;line-height: 36px;">
            暂无房源
        </div>
    </div>
    <?php else: if(is_array($houses) || $houses instanceof \think\Collection || $houses instanceof \think\Paginator): $i = 0; $__LIST__ = $houses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hous): $mod = ($i % 2 );++$i;?>
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>房源编号：【<?php echo $hous['h_b_id']; ?>】</b>
                    <?php if($hous['is_paid_ratio'] == 1): ?>
                    <span style="float: right;">回款率：<span style="margin-left: 8px;" class="mui-badge mui-badge-success"><?php echo $hous['paid_ratio']; ?></span></span>
                    <?php endif; ?>
                </p>
                <p><b>小区名称</b>：<?php echo $hous['h_building']; ?>
                    <span style="float: right;">装修阶段：<span style="margin-left: 8px;" class="mui-badge mui-badge-purple"><?php echo $hous['hd_status']; ?></span></span>
                </p>
                <p style="color: #333;">
                    <!--房源标题：<?php echo $hous['h_name']; ?>-->
                    <!--&lt;!&ndash;<br/>&ndash;&gt;-->
                    <!--小区名称：<?php echo $hous['h_building']; ?>-->
                    <!--<br/>-->
                    <?php if($hous['is_paid_ratio'] == 1): ?>
                    装修款额：<?php echo $hous['h_money']; ?>（元）
                    <br/>
                    <?php endif; ?>
                    房屋面积：<?php echo $hous['h_area']; ?>（㎡）
                    <br/>
                    <?php if(isset($hous['h_contract_code'])): ?>
                    合同编号：<?php echo $hous['h_contract_code']; ?>（元）
                    <br/>
                    <?php endif; ?>
                    签订日期：<?php echo $hous['h_addtime']; ?>
                    <br/>
                    房源地址：<?php echo $hous['h_address']; ?>
                    <br/>
                </p>
            </div>
        </div>
        <div class="mui-card-footer">
            <a class="mui-card-link" href="<?=url('index/details')?>?h_id=<?php echo $hous['h_b_id']; ?>">房源详情</a>
            <a class="mui-card-link" href="<?=url('index/timeline')?>?h_id=<?php echo $hous['h_b_id']; ?>">装修进度</a>
            <a class="mui-card-link" href="<?=url('index/dailylog')?>?h_id=<?php echo $hous['h_b_id']; ?>">监理记录</a>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
<script>
    function formQuery(){
        var keywords=$('#keywords').val();
        location.href="<?=url('index/index')?>?&keywords="+keywords;
    }
</script>
</body>

</html>
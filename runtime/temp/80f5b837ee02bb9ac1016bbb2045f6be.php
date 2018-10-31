<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\house.html";i:1540973293;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1538205562;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1538103965;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>大城小屋智能公寓-知名的白领公寓|合租公寓|单身公寓出租</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" href="__WAP__/css/icons-extra.css">
</head>
<body style="background:#fff;width:100%">
<header class="mui-bar mui-bar-nav">
    <a href="<?=url('index/index')?>" class="mui-icon-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">房源管理</h1>
    <a class="mui-icon mui-icon-bars mui-icon-right-nav mui-pull-right" href="<?=url('index/nav')?>"></a>
</header>
<div class="mui-content" style="background:#fff;">
    <div class="mui-content-padded">
        <input style="float: left;width: 80%" id="keywords" type="text" placeholder="点击搜索房源"<?php if(isset($keywords)): ?> value="<?php echo $keywords; ?>" <?php endif; ?> />
        <span onclick="formQuery()" style="float: left;width: 18%;margin-left: 5px;padding-left: 5px;margin-top: 5px;padding-top: 5px;" class="mui-btn mui-btn-primary mui-icon mui-icon-search">
            搜索
        </span>
    </div>
</div>
<div class="mui-content" style="background:#fff;">
    <?php if($house != null): if(is_array($house) || $house instanceof \think\Collection || $house instanceof \think\Paginator): $i = 0; $__LIST__ = $house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['h_isable'] == 2): ?>
    <div class="mui-card">
        <a>
            <div class="mui-card-header mui-card-media" style="height:58vw;background-image:url(__WEB__/img/decorating.png)"></div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <p style="color: #333;"><?php echo $vo['h_building']; ?> <?php echo $vo['h_area']; ?>㎡</p>
                    <p style="color: #333;"><?php echo $vo['h_address']; ?></p>
                </div>
            </div>
        </a>
    </div>
    <?php else: ?>
    <div class="mui-card">
        <a href="<?=url('index/details')?>?h_id=<?php echo $vo['h_id']; ?>">
            <div class="mui-card-header mui-card-media" style="height:58vw;background-image:url(<?php echo $vo['h_house_img']; ?>)"></div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <p style="color: #333;"><?php echo $vo['h_name']; ?>  <?php echo $vo['h_area']; ?>㎡&nbsp;<?php echo $vo['h_rent']; ?>元/<?php if($vo['h_rent_type'] == 1): ?>月<?php else: ?>日<?php endif; ?></p>
                    <p style="color: #333;"><?php echo $vo['h_address']; ?>-<?php echo $vo['h_building']; ?>-<?php echo $vo['h_subway']; ?>-<?php echo $vo['h_nearbus']; ?></p>
                </div>
            </div>
        </a>
    </div>
    <?php endif; endforeach; endif; else: echo "" ;endif; else: ?>
    <div class="mui-card" style="text-align: center;height: 150px;">
       暂无信息！
    </div>
    <?php endif; ?>

</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script type="text/javascript" charset="utf-8">
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
</body>

</html>

<script>
    function formQuery(){
        var keywords=$('#keywords').val();
        location.href="<?=url('index/house')?>?keywords="+keywords;
    }
</script>

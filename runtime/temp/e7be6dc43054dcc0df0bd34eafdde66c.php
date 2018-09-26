<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\about.html";i:1537944383;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1537929394;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1537931404;}*/ ?>
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
<body>
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">关于我们</h1>
    <a class="mui-icon mui-icon-bars mui-icon-right-nav mui-pull-right" href="<?=url('index/nav')?>"></a>
</header>
<div class="mui-content">
    <div class="mui-card">
        <div class="mui-card-header mui-card-media" style="height:40vw;background-image:url(__WAP__/images/cbd.jpg)"></div>
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <h4>一、公司定位和发展目标</h4>
                <p style="color: #333;">
                    陕西大城小屋不动产管理有限公司成立于2018年3月22日，位于西安市高新区沣惠南路16号泰华金贸国际7号楼24层。是一家涉及房产管理、交易服务、金融服务、后房地产市场服务为一体的综合性不动产服务企业。
                </p>
                <h4>二、产品服务</h4>
                <p style="color: #333;">
                    公司业务覆盖房产租赁、房产买卖、海外置业、标准装修、家政服务等领域。公司致力于为闲置房屋业主提供一站式托管服务，打造闲置房屋共享经济时代，同时也为城市租房人群提供高档社区管理+星级酒店服务+智能与科技完美融合为一体的高档智能型公寓。
                </p>
                <h4>三、组织架构</h4>
                <p style="color: #333;">
                    陕西大城小屋不动产管理有限公司由三大机构组成，分别为决策机构、执行机构、监督建构。公司采用“C管理模式（智慧型管理模式）”，C管理模式是以人为核心，凝聚吸收人才为主体，使得企业适应能力性更强，应变能力更为灵活，同时也使得企业所开发的项目更为精良，让企业具有更健康的根基和更广阔的视野。
                </p>
                <h4>四、发展模式</h4>
                <p style="color: #333;">
                    大城小屋行走于新型房服务行业前沿，引领全新的智能公寓模式，策略于将毛坯房进行超高性价比回租、整租、合租，优化房屋资源配置，进行所有房屋资源共享，取得1+1大于2的成果。让各房主均能直观感受到持续性的价值回报。
                </p>
                <h4>五、联系我们</h4>
                <p style="color: #333;">
                    联系地址：陕西省西安市高新区沣惠南路16号7号楼2401，邮编710065
                </p>
            </div>
            <div class="mui-card">
                <div class="mui-card-content" id="baiduMap" style="height: 250px;" >
                </div>
            </div>
        </div>
        <div class="mui-content">
                <a href="tel:400-996-1585" type="button" style="width: 50%;float: left;padding: 5px;" class="mui-btn">前往这里</a>
                <a href="tel:400-996-1585" type="button" style="width: 50%;float: left;padding: 5px;" class="mui-btn">联系我们</a>
        </div>
    </div>
</div>
<script src="__WAP__/js/mui.min.js"></script>
<script type="text/javascript" charset="utf-8">
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });

</script>
</body>

</html>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=OGTwaNvPpPjfAmiUQ3mQtSkt"></script>
<script>
    var map = new BMap.Map('baiduMap');//创建Map实
    var point = new BMap.Point(108.89285,34.230224);//初始化地图,设置中心点坐标
    map.centerAndZoom(point, 15);//地图级别
    map.enableScrollWheelZoom(true);//开启鼠标滚轮缩放
    map.addControl(new BMap.NavigationControl());//添加带有定位的导航控件
    map.addControl(new BMap.MapTypeControl());//添加地图类型控件
    var marker = new BMap.Marker(point);//创建标注
    map.addOverlay(marker);//将标注添加到地图中
    setTimeout(function(){
        map.centerAndZoom(point, 18);//地图级别
    },100);

</script>
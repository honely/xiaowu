<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"E:\houtai\xiaowu\xiaowu\public/../application/index\view\index\index.html";i:1567735110;s:75:"E:\houtai\xiaowu\xiaowu\public/../application/index\view\common\footer.html";i:1567735110;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>大城小屋智能公寓-知名的白领公寓|合租公寓|单身公寓出租</title>
    <meta name="keywords" content="白领公寓,合租公寓,单身公寓出租,智能公寓,陕西租房,大城小屋,陕西房屋托管,公寓出租,小屋智能公寓,陕西大城小屋,陕西大城小屋不动产管理有限公司,陕西毛坯房出租,大城小屋" />
    <meta name="description" content="大城小屋智能公寓,知名的智能租房网,房源遍布西安成都各区,专为城市白领打造时尚公寓出租服务,统一时尚装修,免中介费,定期保洁,拎包即住,可整租,可合租,临近地铁,交通便利,租房形式灵活多样,满足您的各种租房需求!" />
    <link rel="stylesheet" type="text/css" href="__WEB__/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="__WEB__/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__WEB__/css/public.css"/>
    <script src="__WEB__/js/jquery-1.10.2.min.js"></script>
    <script src="__WEB__/js/bootstrap.min.js"></script>
    <script src="__WEB__/js/swiper.min.js"></script>
    <link rel="stylesheet" href="__WEB__/css/index.css">
</head>
<style>
    .navbar{
        background:#FFF;
        width: 100%;
        position: fixed;
        z-index: 300;
    }
</style>
<body>
<nav class="navbar navbar-default no-margin">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0);"><img src="__WEB__/img/logo.png" style="max-width:100px;margin-top:-7px;"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if(is_array($navinfo) || $navinfo instanceof \think\Collection || $navinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $navinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
                <li>
                    <a style="color: #5b5b5b;font-size: 16px;" href="/index/<?php echo $nav['nav_url']; ?>.html"><?php echo $nav['nav_title']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <li>
                    <a style="color:#5b5b5b;font-size: 16px;" >看房热线
                        <em style="color: #ff6000;font-size: 22px;font-weight: bold;margin-top: 5px;">
                            <?php echo $hotLine; ?>
                        </em>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--banner-->
<div class="hidden-xs">
    <div class="index-banner">
        <div class="swiper-container">
            <div class="swiper-wrapper" style="margin-top: 54px;" >
                <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ban): $mod = ($i % 2 );++$i;?>
                <a <?php if($ban['ba_url'] != null): ?>href="<?php echo $ban['ba_url']; ?>" target="_blank"<?php endif; ?> class="swiper-slide">
                <img style="width: 100%;height: 490px" src="__PUBLIC__/<?php echo $ban['ba_img']; ?>" alt="<?php echo $ban['ba_img']; ?>"/>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<!--banner-->
<!--闲置房屋托管运营-->
<h2 class="page-title text-center">
    托管热线&nbsp;&nbsp;<?php echo $hotLine; ?>
</h2>

<h1 class="text-center no-margin">
    <small>一站式托管服务</small>
</h1>
<div class="container week">
    <div class="row">
        <div class="layui-col-xs6" style="margin:0 15px">
            <a class="img-filter center-block" href="javascript:void(0)">
                <img src="__WEB__/img/week01.jpg"/>
                <div class="img-info">
                    <p>一站式托管毛坯房、简装房、精装房</p>
                    <span><b>优化整合共享市场资源&nbsp;&nbsp;&nbsp;给业主租客更好的体验</b></span>
                </div>
            </a>
        </div>
    </div>
</div>

<!--精选房源-->
<h2 class="page-title text-center margin-bot-md">
    精选房源
</h2>
<div class="container">
    <div class="bs-example bs-example-tabs" style="padding-bottom:0px !important;" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="false">房源</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="expeditions" aria-labelledby="expeditions-tab">
                <div class="tab-info" >
                    <div class="row">
                        <span id="ajaxElement_1_734">
                            <?php if($house != null): if(is_array($house) || $house instanceof \think\Collection || $house instanceof \think\Paginator): $i = 0; $__LIST__ = $house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hou): $mod = ($i % 2 );++$i;?>
                            <div class="col-sm-4 col-xs-12" style="height:350px;">
                                <a class="img-filter center-block" href="<?=url('seek/details')?>?h_id=<?php echo $hou['h_id']; ?>">
                                    <img style="width: 350px;height: 262px;" src="__PUBLIC__/<?php echo $hou['h_house_img']; ?>" alt="<?php echo $hou['h_img_alt']; ?>">
                                    <div class="img-info selected-info">
                                        <p><?php echo $hou['h_name']; ?></p>
                                        <span>租金：<?php echo $hou['h_rent']; ?>元/<?php if($hou['h_rent_type'] == 1): ?>月<?php else: ?>日<?php endif; ?>&nbsp;&nbsp;&nbsp;<?php echo $hou['h_address']; ?></span>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <div class="col-sm-4 col-xs-12" style="height:350px;">
                                暂无信息
                            </div>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="text-center" style="padding-bottom: 20px;">
                <a class="btn btn-sm btn-warning" href="<?=url('seek/index')?>">浏览更多</a>
            </div>
        </div>
    </div>
</div>

<h2 class="page-title text-center">
    小屋智能公寓 ——<span style="font-size: 23px;">心安处&#9642; 方为家</span>
</h2>
<h1 class="text-center no-margin">
    <small>构筑科技、便捷、舒适、温馨的城市智能公寓，打造全新的都市生活居家模式</small>
</h1>
<div class="container week">
    <div class="row">
        <div class="col-sm-4">
            <a class="yingzheng-boxbody center-block" href="javascript:void(0)">
                <img src="__WEB__/img/yingzheng01.jpg"/>
                <div class="img-info text-center">
                    <!--<div>大城小屋提供</div>-->
                    <!--<div>毛坯、简装、精装等所有房屋的回租和托管业务</div>-->
                </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a class="yingzheng-boxbody center-block" href="javascript:void(0)">
                <img src="__WEB__/img/yingzheng02.jpg"/>
                <div class="img-info text-center">
                    <!--<div>给全国城市房屋实现闲置变现的优良服务</div>-->
                    <!--<div>产权要求：产权清晰，合法</div>-->
                </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a class="yingzheng-boxbody center-block" href="javascript:void(0)">
                <img src="__WEB__/img/yingzheng03.jpg"/>
                <div class="img-info text-center">
                    <!--<div>统一的智能化、现代化的装修标准，集中租客资源</div>-->
                    <!--<div>共享回租房屋，让业主收益更加轻松和直观</div>-->
                </div>
            </a>
        </div>
    </div>
</div>

<div class="white-bg">
    <h2 class="text-center service-tit">
        大城小屋智能公寓一站式托管的七大优势
    </h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 service-list">
                <h4>一站式托管的七大优势</h4>
                <p>【无空租期、收益稳定】3年起租，最长15年，月月固定收租金，没有空租风险；</p>
                <p>【短租模式、超高收益】日租、短租、整租的互联网共享营销模式，租金收入高于业主直租；</p>
                <p>【费用全包、轻松无忧】租赁期内的物业费、水电费、宽带费、采暖费等所有的费用由我们承担，您只坐收租金就行</p>
                <p>【产品丰富、覆盖面广】不论您的房子是毛坯还是精装；</p>
                <p>【安全保证、租客认证】所有入住您的房子的租客都要通过我们的“租客认证”，必须有正式的工作，企事业白领居多；</p>
                <p>【定期保洁、原样返还】我们由专业的服务团队为您的房屋进行查验、保洁、维修等服务，最大程度维护您的房产；</p>
                <p>【装修家电、全额分期】我们为您提供本息全额36个月超低利息装修分期、家具家电分期购买。</p>
            </div>
            <div class="col-sm-6">
                <img src="__WEB__/img/service01.jpg"/>
            </div>
        </div>
    </div>
</div>
<!--<div class="container">
    <div class="bs-example bs-example-tabs" style="padding-bottom:0px !important;" role="tabpanel" data-example-id="togglable-tabs">
        <h2 class="text-center service-tit">
            战略合作伙伴
        </h2>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" aria-labelledby="expeditions-tab">
                <div class="tab-info" >
                    <div class="row">
                        <div>
                            <?php if($house != null): if(is_array($house) || $house instanceof \think\Collection || $house instanceof \think\Paginator): $i = 0; $__LIST__ = $house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hou): $mod = ($i % 2 );++$i;?>
                            <div class="col-sm-4 col-xs-12">
                                <a class="img-filter center-block" >
                                    <img style="width: 350px;height: 262px;" title="<?php echo $hou['h_name']; ?>" src="<?php echo $hou['h_house_img']; ?>">
                                </a>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <div class="col-sm-4 col-xs-12" style="height:350px;">
                                暂无信息
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!--footer-->
<div class="footer" style="padding-top: 30px;height: 169px;">
    <!--  -->
    <div class="footer-con con clearfix">
        <div class="footer-left pull-left">
            <p>
                <img style="width: 231px;height: 43px;" src="__WEB__/img/footer-logo.png" alt="小屋智能公寓LOGO">
            </p>
            <p>
                <img style="width: 235px;height: 43px;" src="__WEB__/img/footer-adv.png" alt="小屋智能公寓LOGO">
            </p>
        </div>
        <div class="footer-center pull-left">
            <ul class="clearfix">
                <li>
                    <a href="<?=url('seek/index')?>">轻松找房</a>
                </li>
                <li>
                    <a href="<?=url('news/index')?>">新闻资讯</a>
                </li>
                <li>
                    <a href="<?=url('house/index')?>">房屋托管</a>
                </li>
                <li>
                    <a href="<?=url('about/index')?>">关于我们</a>
                </li>
            </ul>
        </div>
        <div class="footer-right pull-left">
            <div class="left pull-left">
                <h3>
                    <img class="pull-left" style="width: 22px;height: 22px;" src="__WEB__/img/footer-ph.png" alt="">
                    <span>
                        <?php echo $hotLine; ?>


                    </span>
                    <span><em style="line-height: 30px;">房屋托管：18291435205</em></span>
                    <span><em style="line-height: 30px;">公寓租赁：17792870379</em></span>

                </h3>
            </div>
            <div class="right pull-left">
                <span>
                    <img style="width: 88px;height: 88px;" src="__WEB__/img/weibo.jpg" alt="小屋智能公寓微博">
                    <em>关注微博</em>
                </span>
                <span>
                    <img style="width: 88px;height: 88px;" src="__WEB__/img/wechat.jpg" alt="小屋智能公寓微信">
                    <em>关注微信</em>
                </span>
            </div>
        </div>
    </div>
</div>
<footer style="height: auto;padding: 10px 0px;color: white;line-height: 1.8;background: #212121;">
    <div class="container text-center">
        <p>总部地址：陕西省西安市高新区沣惠南路16号7号楼2401 &nbsp;&nbsp;  电话：029-8755-8112</p>
    </div>
</footer>
<!--<footer style="height: auto;padding: 10px 0px;color: white;line-height: 1.8;background: #212121;">-->
    <!--<div class="container text-center">-->
        <!--<p>成都分公司：四川省成都市高新区环球中心E1 1-2-702 &nbsp;&nbsp; 电话：028-69215061&nbsp;&nbsp;&nbsp;&nbsp;028-69215051</p>-->
    <!--</div>-->
<!--</footer>-->
<!--<footer style="height: auto;padding: 10px 0px;color: white;line-height: 1.8;background: #212121;">-->
    <!--<div class="container text-center">-->
        <!--<p>重庆分公司：重庆市江北区江北城IFS国金中心T2栋610 &nbsp;&nbsp; 电话：023-67753595&nbsp;&nbsp;&nbsp;&nbsp;023-67753685</p>-->
    <!--</div>-->
<!--</footer>-->
<!--<footer style="height: auto;padding: 10px 0px;color: white;line-height: 1.8;background: #212121;">-->
    <!--<div class="container text-center">-->
        <!--<p>南京分公司：南京市鼓楼区集庆门大街268号（苏宁慧谷E08-2-1004室）</p>-->
    <!--</div>-->
<!--</footer>-->
<!--<footer style="height: auto;padding: 10px 0px;color: white;line-height: 1.8;background: #212121;">-->
    <!--<div class="container text-center">-->
        <!--<p>杭州分公司：杭州市江干区钱江新城新业路228号来福士广场（塔一3603）</p>-->
    <!--</div>-->
<!--</footer>-->
<footer style="height: auto;padding: 10px 0px;color: #5b5b5b;line-height: 1.8;background: #212121;">
    <div class="container text-center">
        <p>Copyright © 2018 www.xiaowugroup.com 陕西大城小屋不动产管理有限公司 版权所有 陕ICP备18007211号</p>
    </div>
</footer>
</body>
</html>
<script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        }
    });
</script>
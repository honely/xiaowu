<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"G:\xampp\htdocs\bbb\public/../application/index\view\about\index.html";i:1542008794;s:71:"G:\xampp\htdocs\bbb\public/../application/index\view\common\header.html";i:1541063850;s:71:"G:\xampp\htdocs\bbb\public/../application/index\view\common\footer.html";i:1542016255;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>大城小屋智能公寓-知名的白领公寓|合租公寓|单身公寓出租</title>
    <meta name="keywords" content="白领公寓,合租公寓,单身公寓出租,智能公寓,陕西租房,大城小屋,陕西房屋托管,公寓出租,小屋智能公寓,陕西大城小屋,陕西大城小屋不动产管理有限公司,陕西毛坯房出租,大城小屋" />
    <meta name="description" content="大城小屋智能公寓,知名的智能租房网,房源遍布西安成都各区,专为城市白领打造时尚公寓出租服务,统一时尚装修,免中介费,定期保洁,拎包即住,可整租,可合租,临近地铁,交通便利,租房形式灵活多样,满足您的各种租房需求!" />
    <link rel="stylesheet" type="text/css" href="__WEB__/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__WEB__/css/public.css"/>
    <script src="__WEB__/js/jquery-1.10.2.min.js"></script>
    <script src="__WEB__/js/bootstrap.min.js"></script>
    <script src="__WEB__/js/swiper.min.js"></script>
    <script src="__LAY__/layui.js"></script>
    <link rel="stylesheet" href="__WEB__/css/common.css">
    <link rel="stylesheet" href="__WEB__/css/swiper.css">
    <link rel="stylesheet" href="__WEB__/css/index.css">
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <link href="__WEB__/css/style.css" rel="stylesheet" type="text/css" />
    <link href="__WEB__/css/reset.css" rel="stylesheet" type="text/css" />

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
                    <a href="#" target="_blank" style="color:#5b5b5b;font-size: 16px;" >看房热线：8:00~22:00
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <em style="color: #ff6000;font-size: 22px;font-weight: bold;margin-top: 5px;">
                            <?php echo $hotLine; ?>
                        </em>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--部分页面需要-->
<style>
    .layui-breadcrumb {
        visibility: visible;
        font-size: 0;
    }
    .content-p{
        margin-top: 0px; margin-bottom: 0px; margin-top: 8px;padding: 0px 0px 24px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; font-family: &#39;Microsoft Yahei&#39;, 新宋体, 宋体, Verdana; text-indent: 2em; line-height: 24px; white-space: normal; background: rgb(255, 255, 255);
    }
    .content-h4{
        margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; font-family: &#39;Microsoft Yahei&#39;, 新宋体, 宋体, Verdana; line-height: 26px; text-indent: 2em; white-space: normal; background: rgb(255, 255, 255);    color: #ff3535;"
    }
    .content-hp{
        margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; font-family: &#39;Microsoft Yahei&#39;, 新宋体, 宋体, Verdana; text-indent: 2em; line-height: 24px; white-space: normal; background: rgb(255, 255, 255);
    }
</style>
<div class="body-box-bg">
    <!-- 面包屑 -->
    <div class="breadcrumb con">
        <span class="layui-breadcrumb" lay-separator=">">
            <em>当前位置：</em>
            <a href="<?=url('index/index')?>">首页</a>
              <a>></a>
            <a href="">
                <cite>关于我们</cite>
            </a>
        </span>
    </div>
    <!-- 当前页面内容 -->
    <div class="decor-show-con con clearfix">
        <!-- 左 -->
        <div class="decor-show-left pull-left">
            <!-- 上 -->
            <div class="decor-show-title">
                <h1>关于我们</h1>
            </div>
            <hr class="layui-bg-red">
            <!-- 下 -->
            <div class="BoxCtThree">
                <h4 class="content-h4">一、公司简介</h4>
                <p class="content-p">
                    陕西大城小屋不动产管理有限公司成立于2018年3月22日，位于西安市高新区沣惠南路16号泰华金贸国际7号楼24层。是一家涉及房产管理、交易服务、金融服务、后房地产市场服务为一体的综合性不动产服务企业。
                </p>
                <h4 class="content-h4">二、产品服务</h4>

                <p class="content-p">
                    公司业务覆盖房产租赁、房产买卖、海外置业、标准装修、家政服务等领域。公司致力于为闲置房屋业主提供一站式托管服务，打造闲置房屋共享经济时代，同时也为城市租房人群提供高档社区管理+星级酒店服务+智能与科技完美融合为一体的高档智能型公寓。
                </p>

                <h4 class="content-h4">三、组织架构</h4>

                <p class="content-p">

                    陕西大城小屋不动产管理有限公司由三大机构组成，分别为决策机构、执行机构、监督建构。公司采用“C管理模式（智慧型管理模式）”，C管理模式是以人为核心，凝聚吸收人才为主体，使得企业适应能力性更强，应变能力更为灵活，同时也使得企业所开发的项目更为精良，让企业具有更健康的根基和更广阔的视野。

            </p>
                <h4 class="content-h4">四、发展模式</h4>

                <p class="content-p">

                大城小屋行走于新型房服务行业前沿，引领全新的智能公寓模式，策略于将毛坯房进行超高性价比回租、整租、合租，优化房屋资源配置，进行所有房屋资源共享，取得1+1大于2的成果。让各房主均能直观感受到持续性的价值回报。

            </p>

                <h4 class="content-h4">五、联系我们</h4>
                <p class="content-hp" style="margin-top: 20px;">
                    总部地址：陕西省西安市高新区沣惠南路16号7号楼2401</p>
                <p class="content-hp">
                    电话：029-8755-8112&nbsp;&nbsp;&nbsp;&nbsp;
                </p><br/><p class="content-hp">
                    成都分公司：四川省成都市高新区环球中心E1 1-2-702</p>

                <p class="content-hp">
                电话：028-69215061&nbsp;&nbsp;&nbsp;&nbsp;028-69215051
                </p><br/><p class="content-hp">
                重庆分公司：重庆市江北区江北城IFS国金中心T2栋610</p>
                <p class="content-hp">
                电话：023-67753595&nbsp;&nbsp;&nbsp;&nbsp;023-67753685
                </p>
                <div class="map" style="width: 810px;height: 500px;margin-top: 10px;" id="baiduMap">
                </div>
                <p><br/></p>
            </div>
        </div>
        <!-- 右 -->
        <div class="decor-con-right pull-right ">
            <figure>
                <a href="#">
                    <img src="__WEB__/img/news1.jpg" style="width: 337px" alt="">
                </a>
            </figure>
            <!-- 热门推荐 -->
            <div class="decor-hot" style="width: 337px">
                <h1>热门文章推荐</h1>
                <ul>
                    <?php if(is_array($hotArt) || $hotArt instanceof \think\Collection || $hotArt instanceof \think\Paginator): $i = 0; $__LIST__ = $hotArt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?>
                    <li class="clearfix">
                        <a href="<?=url('news/details')?>?art_id=<?php echo $hot['art_id']; ?>">
                            <figure class="pull-left">
                                <img src="<?php echo $hot['art_img']; ?>" alt="<?php echo $hot['art_img_alt']; ?>">
                            </figure>
                            <div class="pull-right" style="width: 184px;" >
                                <p><?php echo $hot['art_title']; ?></p>
                                <a href="<?=url('news/details')?>?art_id=<?php echo $hot['art_id']; ?>" class="layui-btn layui-btn-red layui-btn-xs">查看详情</a>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="hinfoRborder clearfix" style="width: 337px">
                <h3 class="AimTit">小屋向您保证</h3>
                <div class="AimTopCon clearfix">
                    <span class="aCon01">安全承诺</span>
                    <span class="aCon02">服务承诺</span>
                    <span class="aCon03">保洁承诺</span>
                </div>
                <p class="aimSubText" style="text-align: left !important;">小屋服务全程保障您的权益，租客认证、一客一锁解决您在租房过程中各种担忧，专人保洁、专业维修免除您在居住期间的后顾之忧。通过投诉全公示、400热线等确保您的权益得到落实。</p>
                <ul class="aimList">
                    <li>
                        <p><em class="num_01 fL">ONE</em><span class="fR aimLine"></span></p>
                        <div class="aimText" style="text-align: left !important;">租客认证&nbsp;凡有意向入住小屋的租客，需要提供相关证明，通过我们的租客认证。新客首次入住可享受三天免费退房。</div>
                    </li>
                    <li>
                        <p><em class="num_02 fL">TWO</em><span class="fR aimLine"></span></p>
                        <div class="aimText" style="text-align: left !important;">一客一锁&nbsp;每间房间都设置不同的密码锁，电子控制。</div>
                    </li>
                    <li>
                        <p><em class="num_03 fL">THREE</em><span class="fR aimLine"></span></p>
                        <div class="aimText" style="text-align: left !important;">专人保洁&nbsp;为了给小屋客户创造品质的租住生活，每周2次公共区域保洁。</div>
                    </li>
                    <li>
                        <p><em class="num_04 fL">FOUR</em><span class="fR aimLine"></span></p>
                        <div class="aimText" style="text-align: left !important;" >专业维修&nbsp;小屋针对房屋主体，电路，灯具等提供24小时内响应，48小时上门，三个工作日完成的维修服务。</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 当前页面底部 -->
    <div class="decor-show-foot">
        <div class="con"></div>
    </div>
</div>
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
<footer style="height: auto;padding: 10px 0px;color: white;line-height: 1.8;background: #212121;">
    <div class="container text-center">
        <p>成都分公司：四川省成都市高新区环球中心E1 1-2-702 &nbsp;&nbsp; 电话：028-69215061&nbsp;&nbsp;&nbsp;&nbsp;028-69215051</p>
    </div>
</footer>
<footer style="height: auto;padding: 10px 0px;color: white;line-height: 1.8;background: #212121;">
    <div class="container text-center">
        <p>重庆分公司：重庆市江北区江北城IFS国金中心T2栋610 &nbsp;&nbsp; 电话：023-67753595&nbsp;&nbsp;&nbsp;&nbsp;023-67753685</p>
    </div>
</footer>
<footer style="height: auto;padding: 10px 0px;color: #5b5b5b;line-height: 1.8;background: #212121;">
    <div class="container text-center">
        <p>Copyright © 2018 www.xiaowugroup.com 陕西大城小屋不动产管理有限公司 版权所有 陕ICP备18007211号</p>
    </div>
</footer>
</body>
</html>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=OGTwaNvPpPjfAmiUQ3mQtSkt"></script>
<script>
    // 百度地图API功能
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
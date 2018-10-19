<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"G:\xampp\htdocs\bbb\public/../application/index\view\seek\details.html";i:1539661829;s:71:"G:\xampp\htdocs\bbb\public/../application/index\view\common\header.html";i:1536805330;s:71:"G:\xampp\htdocs\bbb\public/../application/index\view\common\footer.html";i:1537069564;}*/ ?>
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
<!-- 主体 -->
<style>
    .layui-breadcrumb {
    visibility: visible;
    font-size: 0;
}
    .mod-title {
        padding-top: 11px !important;
        line-height: 46px;
        font-size: 20px;
        color: #333;
        width: 100%;
    }
    .house-info-peitao {
        margin-bottom: -10px;
        font-size: 14px;
        color: #ccc;
    }
    .house-info-peitao .has {
        color: #666;
    }
    .house-info-peitao .peitao-item {
        float: left;
        text-align: center;
        width: 80px;
        padding: 0;
    }
</style>
<div class="body-box-bg">
    <!-- 主体 -->
    <div class="breadcrumb con">
        <em>当前位置：</em>
        <a href="<?=url('index/index')?>" >首页</a>
        <a>></a>
        <a href="<?=url('seek/index')?>">轻松找房</a>
        <a>></a>
        <a href="">
            <cite><?php echo $house['h_name']; ?></cite>
        </a>
    </div>
    <div class="case-show-con clearfix con">
        <!-- 左 -->
        <div class="case-show-left pull-left">
            <!-- 上 -->
            <div class="top">
                <?php if($house['h_video'] != null): ?>
                <a class="case-roaming" target="_blank" href="">
                    360°看房
                    <i class="arrow-right"></i>
                </a>
                <?php endif; ?>
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <?php if(is_array($house['h_img']) || $house['h_img'] instanceof \think\Collection || $house['h_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $house['h_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                        <div class="swiper-slide">
                            <img src="__PUBLIC__/<?php echo $item; ?>" alt="">
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
            </div>
            <!-- 下 -->
            <div class="bto">
                <table class="layui-table">
                    <colgroup>
                        <col width="96">
                        <col width="208">
                        <col width="96">
                        <col width="208">
                        <col width="96">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td>所在区域</td>
                        <td><?php echo $house['h_address']; ?></td>
                        <td>租金</td>
                        <td><?php echo $house['h_rent']; ?>元/<?php if($house['h_rent_type'] == 1): ?>月<?php else: ?>日<?php endif; ?></td>
                        <td>小区名称</td>
                        <td><?php echo $house['h_building']; ?></td>
                    </tr>
                    <tr>
                        <td>朝向</td>
                        <td><?php echo $house['h_head']; ?></td>
                        <td>附近公交</td>
                        <td><?php echo $house['h_nearbus']; ?></td>
                        <td>沿线地铁</td>
                        <td><?php echo $house['h_subway']; ?></td>
                    </tr>  <tr>
                        <td>面积</td>
                        <td><?php echo $house['h_area']; ?>㎡</td>
                        <td>楼层</td>
                        <td><?php echo $house['h_floor']; ?></td>
                        <td>租赁类型</td>
                        <td><?php if($house['h_iscop'] == 1): ?>整租<?php else: ?>合租<?php endif; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="bto">
                <div class="mod-title bottomed">
                    <h3 class="title">房屋配套</h3>
                </div>
                <ul class="house-info-peitao cf" style="padding-top: 15px;"  data-trace="{'pc_zfdy_fypt_show':1}">
                    <!-- 带有此功能则加has -->
                    <?php if(is_array($house['config_img']) || $house['config_img'] instanceof \think\Collection || $house['config_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $house['config_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgs): $mod = ($i % 2 );++$i;?>
                    <li class="peitao-item has">
                        <img src="<?php echo $imgs['type_img']; ?>" style="height: 50px;width: 50px;padding: 8px;"/>
                        <div class="peitao-info"><?php echo $imgs['type_name']; ?></div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>

            <div class="bto" style="margin-top: 100px;">
                <div class="mod-title bottomed">
                    <h3 class="title">房源简介</h3>
                </div>
                <div class="decor-show-content" >
                    <?php echo $house['h_description']; ?>
                </div>
            </div>
        </div>
        <!-- 右 -->
        <div class="case-show-right pull-left">
        <div class="HouInfoR">
            <!--   特价显示-->
            <?php if($house['h_discount'] != null): ?>
                <div class="houPrice">
                    <div class="price_txt  price_txt02">
                        <h4><?php echo $house['h_discount']; ?></h4>
                    </div>
                </div>
            <?php endif; ?>
            <div class="sharePhone">
                <div class="houPhone" style="text-align: center;"><?php echo $hotLine; ?></div>
                <p class="houShareText" style="text-align: center;"><em><?php echo $house['h_view']; ?>人浏览</em></p>
            </div>
            <div class="ljdf">
                <div class="ljdf-btn" onclick="makePoint()" id="ljdf-btn"></div>
                <div class="flip-wx">
                    <div class="flip-box">
                        <div class="wx-pic" id="qrcode"></div><br>
                        <p>使用手机小屋app或微信扫码订房</p>
                    </div>
                </div>
            </div>
            <dl class="houTopInfo clearfix">

            </dl>
            <div class="hinfoRborder clearfix">
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
    </div>
    <!-- 相关案例 -->
    <div class="case-foot-test con">
        <div class="case-foot-title">
            <span>热门房源</span>
        </div>
        <ul class="clearfix">
            <?php if(is_array($hotHouse) || $hotHouse instanceof \think\Collection || $hotHouse instanceof \think\Paginator): $i = 0; $__LIST__ = $hotHouse;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?=url('seek/details')?>?h_id=<?php echo $vo['h_id']; ?>">
                                <span>
                                    <img src="<?php echo $vo['h_house_img']; ?>" alt="<?php echo $vo['h_img_alt']; ?>">
                                </span>
                    <em><?php echo $vo['h_name']; ?></em>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<div id="layers-sign" class="none">
    <form class="layui-form" id="houseForm" >
        <div class="layui-form-item">
            <label class="layui-form-label">您的称呼</label>
            <div class="layui-input-inline">
                <input type="hidden" name="ho_remark" value="立即订房屋编号为<?php echo $house['h_b_id']; ?>的房"/>
                <input type="text" class="layui-input" lay-verify="required" name="ho_name" placeholder="请输入您的姓名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">您的电话</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" lay-verify="required|phone" name="ho_phone" placeholder="请输入您的电话号码">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block" style="margin-left: 140px;">
                <span class="layui-btn layui-btn-red" lay-submit  lay-filter="saveInfo">立即预约</span>
            </div>
        </div>
    </form>
</div>
<!--footer-->
<div class="footer" style="padding-top: 30px;height: 180px;">
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
                    <span >
                        <?php echo $hotLine; ?>
                    </span>
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
<footer style="height: auto;padding: 10px 0px;color: #5b5b5b;line-height: 1.8;background: #212121;">
    <div class="container text-center">
        <p>Copyright © 2018 www.xiaowugroup.com 陕西大城小屋不动产管理有限公司 版权所有 陕ICP备18007211号</p>
    </div>
</footer>
</body>
</html>
<!-- Initialize Swiper -->
<script>
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
<script>
    function makePoint() {
        layui.use(['layer', 'form', 'element'], function () {
            var layer = layui.layer,
                form = layui.form;
            layer.open({
                type: 1,
                title: '立即订房',
                area: '420px',
                btnAlign: 'c',
                content: $('#layers-sign'),
                success: function (layero) {

                }
            });
            form.on('submit(saveInfo)', function(data){
                $.ajax({
                    'type':"post",
                    'url':"<?=url('seek/houseOrder')?>",
                    'data':$('#houseForm').serialize(),
                    'success':function (result) {
                        if(result.code == '1'){
                            layer.msg(result.msg, {icon: 1, time: 2000},function () {
                                window.location.reload();
                            });
                        }else{
                            layer.msg(result.msg, {icon: 2, time: 3000});
                        }
                    }
                })
            });
        })
    }
</script>
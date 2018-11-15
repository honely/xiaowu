<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"G:\xampp\htdocs\bbb\public/../application/index\view\house\index.html";i:1536889401;s:71:"G:\xampp\htdocs\bbb\public/../application/index\view\common\header.html";i:1541063850;s:71:"G:\xampp\htdocs\bbb\public/../application/index\view\common\footer.html";i:1542016255;}*/ ?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="zh"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>房屋托管|大城小屋-中国公共租赁房屋提供商</title>
    <meta name="description" content="大城小屋,上海知名租房品牌,免中介费,真实租房房源,宜家风格环保装修,管家服务,免费维修,每周保洁,上海租房最佳选择!">
    <meta name="keywords" content="出租毛坯房,出租房屋,房屋托管,出租信息网,房屋托管网">
    <link href="__WEB__/css/css.css" rel="stylesheet" type="text/css">
    <link href="__WEB__/css/head.css" rel="stylesheet" type="text/css">
    <link href="__WEB__/css/footer.css" rel="stylesheet" type="text/css">
    <link href="__WEB__/css/bjFooter.css" rel="stylesheet" type="text/css">
</head>
<body>
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
<!-- banner -->
<div class="ownerBanner">
    <ul class="zfb_datu_ul">
        <li class="datu_li2">
            <a title="大城小屋智能公寓" class="cur" href="#" target="">
                <img alt="大城小屋智能公寓" src="__WEB__/img/dp_banner.jpg" />
            </a>
        </li>
        <li class="datu_li3">
            <a title="大城小屋智能公寓" class="cur" href="#" target="">
                <img alt="大城小屋智能公寓" src="__WEB__/img/dp_banner2.jpg" />
            </a>
        </li>
        <li class="datu_li3">
            <a title="大城小屋智能公寓" class="cur" href="#" target="">
                <img alt="大城小屋智能公寓" src="__WEB__/img/dp_banner3.jpg" />
            </a>
        </li>
    </ul>
</div>

<!-- owner -->
<div class="owner">
    <h3><span>房东</span>选择我们的理由</h3>

    <div class="ownerTit">
        <img src="__WEB__/img/topLine.png">
        <img style="width: 113px;height: 12px;" src="__WEB__/img/ownerTit.png">
    </div>
    <div class="ownerList">
        <ul>
            <li class="listLf">
                <p class="p1">一键托管躺着赚钱</p>
                <h4>省心</h4>

                <p class="p2">租期灵活代租代卖</p>
            </li>
            <li class="listMid">
                <p class="p1">资金雄厚按时付款</p>
                <h4>安心</h4>

                <p class="p2">公安对接严选租客</p>
            </li>
            <li class="listRig">
                <p class="p1">品牌家电环保装修</p>
                <h4>贴心</h4>

                <p class="p2">专业维修没有烦恼</p>
            </li>
        </ul>
    </div>
</div>
<div class="tgFlow">
    <div class="flowBox">
        <h2>托管流程</h2>

        <div class="choice"><img src="__WEB__/img/flowBox_tit.png"/></div>
        <div class="flowPic">
            <ul>
                <li>
                    <img src="__WEB__/img/phoneBg.png"/>

                    <p>拨打热线电话<br/><?php echo $hotLine; ?></p>
                </li>
                <li class="mark">
                    <img src="__WEB__/img/arrow_mark.png"/>
                </li>
                <li>
                    <img src="__WEB__/img/time.png"/>

                    <p>约定上门<br/>看房时间</p>
                </li>
                <li class="mark">
                    <img src="__WEB__/img/arrow_mark.png"/>
                </li>
                <li>
                    <img src="__WEB__/img/speak.png"/>

                    <p>勘察房屋、面谈</p>
                </li>
                <li class="mark">
                    <img src="__WEB__/img/arrow_mark.png"/>
                </li>
                <li>
                    <img src="__WEB__/img/write.png"/>
                    <p>完成签约</p>
                </li>
            </ul>
            <div class="flowTxt">您可以预留联系方式，管家将在1小时内将与您取得联系</div>
            <div class="click"><a onclick="makePoint()">一键托管房屋</a></div>
        </div>
    </div>
</div>
<div class="decor-show-foot">
    <div class="con">
    </div>
</div>
<div id="layers-sign" class="none">
    <form class="layui-form" id="houseForm" >
        <div class="layui-form-item">
            <label class="layui-form-label">您的称呼</label>
            <div class="layui-input-inline">
                <input type="hidden" class="bu_id" name="cus_case" value=""/>
                <input type="text" class="layui-input" lay-verify="required" name="dp_name" placeholder="请输入您的姓名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">您的电话</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" lay-verify="required|phone" name="dp_phone" placeholder="请输入您的电话号码">
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
<script src="__WEB__/js/houseTG.js" type="text/javascript"></script>
<script>
    function makePoint() {
        layui.use(['layer', 'form', 'element'], function () {
            var layer = layui.layer,
                form = layui.form;
            layer.open({
                type: 1,
                title: '房屋托管',
                area: '420px',
                btnAlign: 'c',
                content: $('#layers-sign'),
                success: function (layero) {

                }
            });
            form.on('submit(saveInfo)', function(data){
                $.ajax({
                    'type':"post",
                    'url':"<?=url('house/deposit')?>",
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


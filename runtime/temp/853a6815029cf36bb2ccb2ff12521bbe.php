<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"G:\xampp\htdocs\bbb\public/../application/index\view\seek\index.html";i:1540008375;s:71:"G:\xampp\htdocs\bbb\public/../application/index\view\common\header.html";i:1536805330;s:71:"G:\xampp\htdocs\bbb\public/../application/index\view\common\footer.html";i:1540457310;}*/ ?>
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
</style>
<div class="body-box-bg">
    <div class="packed-ban" style="margin-top: 0;">
        <div class="packed-ban-con con">
            <h1>找附近房源，快速了解最热信息!</h1>
            <!-- 搜索 -->
            <div class="packed-search">
                <input type="text" <?php if(isset($keywords)): ?> value="<?php echo $keywords; ?>" <?php endif; ?> id="keywords" placeholder="点击搜索即可展示附近房源">
                <span onclick="formQuery()"></span>
            </div>
            <p>
            </p>
        </div>
    </div>
    <!-- 面包屑 -->
    <div class="breadcrumb con">
            <em>当前位置：</em>
            <a href="<?=url('index/index')?>" >首页</a>
             <a>></a>
            <a href="">
                <cite>轻松找房</cite>
            </a>
    </div>
    <!-- 分类筛选 -->
    <div class="common-filter con clearfix">
        <ul class="common-filter-con">
            <li class="clearfix">
                <span class="pull-left">位置：</span>
                <div class="pull-left">
                    <a href="<?=url('seek/index')?>?area_id=0&style_id=<?php echo $style_id; ?>&rent_id=<?php echo $rent_id; ?>" <?php if($area_id == 0): ?>class="active"<?php endif; ?>>全部</a>
                </div>
                <?php if(is_array($area) || $area instanceof \think\Collection || $area instanceof \think\Paginator): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?>
                    <div class="pull-left">
                        <a href="<?=url('seek/index')?>?area_id=<?php echo $vos['area_id']; ?>&style_id=<?php echo $style_id; ?>&rent_id=<?php echo $rent_id; ?>" <?php if($area_id == $vos['area_id']): ?>class="active"<?php endif; ?>><?php echo $vos['area_name']; ?></a>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </li>

            <li class="clearfix">
                <span class="pull-left">房型：</span>
                <div class="pull-left">
                    <a  href="<?=url('seek/index')?>?area_id=<?php echo $area_id; ?>&style_id=0&rent_id=<?php echo $rent_id; ?>" <?php if($style_id == 0): ?>class="active"<?php endif; ?>>全部</a>
                </div>
                <?php if(is_array($houseType) || $houseType instanceof \think\Collection || $houseType instanceof \think\Paginator): $i = 0; $__LIST__ = $houseType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?>
                <div class="pull-left">
                    <a href="<?=url('seek/index')?>?area_id=<?php echo $area_id; ?>&style_id=<?php echo $vos['type_id']; ?>&rent_id=<?php echo $rent_id; ?>" <?php if($style_id == $vos['type_id']): ?>class="active"<?php endif; ?>><?php echo $vos['type_name']; ?></a>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </li>

            <li class="clearfix">
                <span class="pull-left">月租：</span>
                <div class="pull-left">
                    <a  href="<?=url('seek/index')?>?area_id=<?php echo $area_id; ?>&style_id=<?php echo $style_id; ?>&rent_id=0"<?php if($rent_id == 0): ?>class="active"<?php endif; ?>>全部</a>
                </div>
                <?php if(is_array($rent) || $rent instanceof \think\Collection || $rent instanceof \think\Paginator): $i = 0; $__LIST__ = $rent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?>
                <div class="pull-left" >
                    <a href="<?=url('seek/index')?>?area_id=<?php echo $area_id; ?>&style_id=<?php echo $style_id; ?>&rent_id=<?php echo $vos['type_id']; ?>" <?php if($rent_id == $vos['type_id']): ?>class="active"<?php endif; ?> ><?php echo $vos['type_name']; ?></a>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </li>
        </ul>
    </div>

    <!-- 房源列表 -->
    <div class="case-test con">
        <li class="clearfix">
            <!-- 1 -->
            <?php if($houseInfo != null): if(is_array($houseInfo) || $houseInfo instanceof \think\Collection || $houseInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $houseInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$house): $mod = ($i % 2 );++$i;?>
            <div class="case-test-box">
                <?php if($house['h_video'] != null): ?>
                <a class="case-roaming" target="_blank" href="<?php echo $house['h_video']; ?>">
                    360°看房
                    <i class="arrow-right"></i>
                </a>
                <?php endif; ?>

                <div class="top">
                    <a href="<?=url('seek/details')?>?h_id=<?php echo $house['h_id']; ?>">
                        <img src="<?php echo $house['h_house_img']; ?>" alt="<?php echo $house['h_img_alt']; ?>">
                    </a>
                </div>
                <div class="bto clearfix">
                    <div class="pull-left">
                        <p><b style="font-size: larger"><?php echo $house['h_name']; ?><?php echo $house['h_subway']; ?></b> </p>
                        <em><?php echo $house['h_rent']; ?>元/<?php if($house['h_rent_type'] == 1): ?>月<?php else: ?>日<?php endif; ?></em>
                        <p  class="pull-left">
                            <i style="width:170px;"><?php echo $house['h_address']; ?></i>
                            <a class="layui-btn layui-btn-primary" href="<?=url('seek/details')?>?h_id=<?php echo $house['h_id']; ?>">查看详情</a>
                            <a class="layui-btn" onclick="makePoint(<?php echo $house['h_building']; ?>)">预约看房</a>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <div class="case-test-box">
                暂无信息
            </div>
            <?php endif; ?>
        </li>
    </div>
    <!-- 分页 -->
    <div id="pages" style="text-align: center;padding: 7px;"></div>
</div>
<div id="layers-sign" class="none">
    <form class="layui-form" id="houseForm" >
        <div class="layui-form-item">
            <label class="layui-form-label">您的称呼</label>
            <div class="layui-input-inline">
                <input type="hidden" name="ho_remark" class="ho_remark" />
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
<!-- Initialize Swiper -->
<script>
    layui.use(['laypage'], function () {
        var laypage = layui.laypage;
        laypage.render({
            //自定义每页条数的选择项
            elem: 'pages'
            ,first: false
            ,last: false
            ,count: <?php echo $count; ?>
            ,limit: <?php echo $limit; ?>
            ,curr: <?php echo $page; ?>
            ,layout: ['count', 'prev', 'page', 'next']
            ,jump: function(obj,frist){
                var keywords=$('#keywords').val();
                var area_id=<?php echo $area_id; ?>;
                var style_id=<?php echo $style_id; ?>;
                var rent_id=<?php echo $rent_id; ?>;
                if(!frist){
                    if(keywords.length>0){
                        window.location.href="<?=url('seek/index')?>?area_id="+area_id+"&style_id="+style_id+"&rent_id="+rent_id+"&keywords="+keywords+"&page="+obj.curr+"&limit="+obj.limit;
                    }else{
                        window.location.href="<?=url('seek/index')?>?area_id="+area_id+"&style_id="+style_id+"&rent_id="+rent_id+"&keywords="+keywords+"&page="+obj.curr+"&limit="+obj.limit;
                    }
                }
            }
        });
    });
    //查找
    function formQuery(){
        var keywords=$('#keywords').val();
        location.href="<?=url('seek/index')?>?area_id=<?php echo $area_id; ?>&style_id=<?php echo $style_id; ?>&rent_id=<?php echo $rent_id; ?>&keywords="+keywords;
    }
    var swiper = new Swiper('.swiper-container1', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var swiper = new Swiper('.swiper-container2', {
        spaceBetween: 30,
        centeredSlides: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
<script>
    function makePoint(h_b_id) {
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
                    $('.ho_remark').val('立即订小区名称为'+h_b_id+'的房');
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
<footer style="height: auto;padding: 10px 0px;color: #5b5b5b;line-height: 1.8;background: #212121;">
    <div class="container text-center">
        <p>Copyright © 2018 www.xiaowugroup.com 陕西大城小屋不动产管理有限公司 版权所有 陕ICP备18007211号</p>
    </div>
</footer>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\index.html";i:1540972982;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1538205562;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\footer.html";i:1538103965;}*/ ?>
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
    <h1 class="mui-title">大城小屋智能公寓</h1>
    <a class="mui-icon mui-icon-bars mui-icon-right-nav mui-pull-right" href="<?=url('index/nav')?>"></a>
</header>
<div class="mui-content">
    <div id="slider" class="mui-slider" >
        <div class="mui-slider-group mui-slider-loop">
            <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ban): $mod = ($i % 2 );++$i;?>
            <div class="mui-slider-item">
                <a>
                    <img style="height: 255px;" src="<?php echo $ban['ba_img']; ?>">
                </a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="mui-slider-indicator">
            <div class="mui-indicator mui-active"></div>
            <div class="mui-indicator"></div>
            <div class="mui-indicator"></div>
            <div class="mui-indicator"></div>
        </div>
    </div>
</div>
<div class="mui-content" style="padding-top: 0px;background:#fff;">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <h4 style="text-align: center;">托管热线  400-996-1585</h4>
                <p></p>
                <p style="color: #333;text-align: center;">一站式托管服务</p>
            </div>
        </div>
        <div class="mui-card-header mui-card-media" style="height:48vw;background-image:url(__WEB__/img/week01.jpg)"></div>
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <h4 style="text-align: center;">一站式托管毛坯房、简装房、精装房</h4>
                <p></p>
                <p style="color: #333;text-align: center;">优化整合共享市场资源&nbsp;&nbsp;&nbsp;给业主租客更好的体验</p>
            </div>
        </div>
    </div>
</div>
<div class="mui-content" style="background-color:#fff;padding-top: 0px;">
    <div class="mui-card">
    <div class="mui-card-content">
        <div class="mui-card-content-inner" style="padding: 8px">
            <h4 style="text-align: left;">热门房源
                <a class="mui-icon mui-icon-arrowright mui-icon-right-nav mui-pull-right" href="<?=url('index/house')?>"></a>
            </h4>
        </div>
    </div>
    <ul class="mui-table-view mui-grid-view">
            <?php if(is_array($house) || $house instanceof \think\Collection || $house instanceof \think\Paginator): $i = 0; $__LIST__ = $house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hous): $mod = ($i % 2 );++$i;if($hous['h_isable'] == 2): ?>
                    <li class="mui-table-view-cell mui-media mui-col-xs-6">
                        <a>
                            <img style="height: 130px;" class="mui-media-object" src="__WEB__/img/decorating.png">
                            <div class="mui-media-body"><?php echo $hous['h_building']; ?><?php echo $hous['h_area']; ?>m²</div>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="mui-table-view-cell mui-media mui-col-xs-6">
                        <a href="<?=url('index/details')?>?h_id=<?php echo $hous['h_id']; ?>">
                            <img style="height: 130px;" class="mui-media-object" src="<?php echo $hous['h_house_img']; ?>">
                            <div class="mui-media-body"><?php echo $hous['h_name']; ?></div>
                        </a>
                    </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<!--热门资讯-->
<div class="mui-content" style="background-color:#fff;padding-top: 0px;">
    <div class="mui-card-content">
        <div class="mui-card-content-inner" style="padding: 8px">
            <h4 style="text-align: left;">热门资讯
                <a class="mui-icon mui-icon-arrowright mui-icon-right-nav mui-pull-right" href="<?=url('index/news')?>"></a>
            </h4>
        </div>
    </div>
    <?php if($news != null): ?>
    <div class="mui-card" >
        <ul class="mui-table-view">
            <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$chap): $mod = ($i % 2 );++$i;?>
            <li class="mui-table-view-cell mui-media">
                <a href="<?=url('index/detail')?>?art_id=<?php echo $chap['art_id']; ?>">
                    <img class="mui-media-object mui-pull-left" src="<?php echo $chap['art_img']; ?>">
                    <div class="mui-media-body">
                        <?php echo $chap['art_title']; ?>
                        <p class='mui-ellipsis'><?php echo $chap['art_subtitle']; ?></p>
                    </div>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php else: ?>
    <div class="title">
        暂无相关课程
    </div>
    <?php endif; ?>
</div>
<!--房屋托管-->
<div class="mui-content" style="background-color:#fff;padding-top: 0px;">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner" style="padding: 8px">
                <h4 style="text-align: center;">房屋托管</h4>
            </div>
        </div>
        <hr>
        <form id="order">
            <div class="mui-input-row">
                <label style="color: #909090;">姓名</label>
                <input type="text" name="dp_name" id="dp_name" placeholder="请输入您的姓名">
            </div>
            <div class="mui-input-row">
                <label style="color: #909090;">电话</label>
                <input type="text" name="dp_phone" id="dp_phone" placeholder="请输入您的手机号">
            </div>
            <span onclick="makeOrders()" style="margin-top: 8px;" class="mui-btn mui-btn-danger mui-btn-block">一键托管</span>
        </form>
    </div>
</div>
<div class="mui-content" style="margin-top: 8px;background:#fff;padding-top: 0px;">
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <p style="color: #5b5b5b;text-align: center;">Copyright © 2018 <a style="color: #5b5b5b" href="<?=url('index/index')?>">www.xiaowugroup.com</a>
                <br/>
                陕西大城小屋不动产管理有限公司
                <br/>
                版权所有 陕ICP备18007211号</p>
        </div>
    </div>
</div>
<div class="mui-content" style="margin-bottom: 8px;background:#fff;padding-top: 0px;">
    <span class="mui-btn mui-btn-warning" style="width: 48%;height: 36px;margin-left: 5px;"><a style="color:#fff" href="tel:18291435205">房屋托管</a></span>
    <span class="mui-btn mui-btn-warning" style="width: 48%;height: 36px"><a style="color:#fff" href="tel:17792870379">公寓租赁</a></span>
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
    function makeOrders(){
        var dp_name=$('#dp_name').val();
        var dp_phone=$('#dp_phone').val();
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        if(dp_name.length<=0){
            mui.alert("请输入您的姓名！", function() {
                $('#dp_name').focus();
            });
        }else{
            if(dp_phone.length != 11 || dp_phone.length<=0 ||!myreg.test(dp_phone)){
                mui.alert("请输入正确的手机号码！", function() {
                    $('#dp_phone').focus();
                });
            }else{
                $.ajax({
                    'type':"post",
                    'url':"<?=url('index/deposit')?>",
                    'data':$('#order').serialize(),
                    'success':function (result) {
                        if(result.code == '1'){
                            mui.alert(result.msg);
                            window.reload();
                        }else{
                            mui.alert(result.msg);
                        }
                    },
                    'error':function (error) {
                        console.log(error);
                    }
                })
            }
        }
    }
</script>
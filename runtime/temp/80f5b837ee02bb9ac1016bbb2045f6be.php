<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\house.html";i:1541236326;s:72:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\header.html";i:1541226131;s:70:"G:\xampp\htdocs\bbb\public/../application/mobile\view\common\foot.html";i:1541150867;}*/ ?>
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
    <link rel="stylesheet" href="__WAP__/css/style.css">
    <link rel="stylesheet" href="__WEB__/css/swiper-3.4.2.min.css">
</head>
<body style="background:#fff;width:100%">
<header class="mui-bar mui-bar-nav">
    <a href="<?=url('index/index')?>" class="mui-icon-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">房源管理</h1>
    <a id="menu" class="mui-action-menu mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
</header>
<style>

    .mui-plus .plus{
        display: inline;
    }

    .plus{
        display: none;
    }

    #topPopover {
         position: absolute;
        top: 16px;
        right: 6px;
    }
    #topPopover .mui-popover-arrow {
        left: auto;
        right: 6px;
    }
    p {
        text-indent: 22px;
    }
    span.mui-icon {
        font-size: 14px;
        margin-left: -15px;
        padding-right: 10px;
    }
    .mui-popover {
        height: 355px;
    }
    .mui-content {
        padding: 10px;
    }
</style>
<div id="topPopover" class="mui-popover">
    <div class="mui-popover-arrow"></div>
    <div class="mui-scroll-wrapper">
        <div class="mui-scroll">
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/index')?>">网站首页</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/deposit')?>">房屋托管</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/promise')?>">品质承诺</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/advance')?>">托管优势</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/news')?>">新闻资讯</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?=url('index/about')?>">关于我们</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="tel:400-996-1585">联系我们</a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="http://api.map.baidu.com/marker?location=34.230218,108.892857&title=陕西大城小屋不动产管理有限公司&content=陕西大城小屋不动产管理有限公司&output=html">公司地址</a>
                </li>
            </ul>
        </div>
    </div>

</div>
<div class="mui-content" style="background:#fff;">
    <div class="mui-content-padded">
        <input style="float: left;width: 80%" id="keywords" type="text" placeholder="点击搜索房源"<?php if(isset($keywords)): ?> value="<?php echo $keywords; ?>" <?php endif; ?> />
        <span onclick="formQuery()" style="float: left;width: 18%;margin-left: 5px;padding-left: 5px;margin-top: 5px;padding-top: 5px;" class="mui-btn mui-btn-primary mui-icon mui-icon-search">
            搜索
        </span>
    </div>
</div>
<div class="mui-content" id="getMore" style="background:#fff;">
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
<input type="hidden" value="1" id="page"/>
<div id="moreBtn" class="mui-btn" style="text-align: center;width: 100%;<?php if($count > 2): ?>display: block<?php else: ?>display: none<?php endif; ?>">加载更多</div>
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
<script>
    $('#moreBtn').click(function () {
        var keywords=$('#keywords').val();
        var page=parseInt($('#page').val());
        var  pages=page+1;
        $('#page').val(pages);
        $.ajax({
            'type':"post",
            'url':"<?=url('index/housemore')?>",
            'data':{'page':pages,'keywords':keywords},
            'success':function (result) {
                var data=result.data;
                console.log(data);
                if(data.length<=0){
                    $('#moreBtn').html('到底了哦！');
                }else{
                    var html="";
                    for (var i=0;i<data.length;i++) {
                        if(data[i].h_isable == 2){
                            html +='<div class="mui-card">' +
                                '        <a>' +
                                '            <div class="mui-card-header mui-card-media" style="height:58vw;background-image:url(__WEB__/img/decorating.png)"></div>' +
                                '            <div class="mui-card-content">' +
                                '                <div class="mui-card-content-inner">' +
                                '                    <p style="color: #333;">'+data[i].h_building+' '+data[i].h_area+'㎡</p>' +
                                '                    <p style="color: #333;">'+data[i].h_address+'</p>' +
                                '                </div>\n' +
                                '            </div>\n' +
                                '        </a>\n' +
                                '    </div>';
                        }else{
                            html += '<div class="mui-card">' +
                                '        <a href="<?=url('index/details')?>?h_id='+data[i].h_id+'">' +
                            '            <div class="mui-card-header mui-card-media" style="height:58vw;background-image:url('+data[i].h_house_img+')"></div>' +
                            '            <div class="mui-card-content">' +
                            '                <div class="mui-card-content-inner">' +
                            '                    <p style="color: #333;">'+data[i].h_name+'  '+data[i].h_area+'㎡&nbsp; '+data[i].h_rent+'元';
                            if(data[i].h_rent_type == 1){
                                html +='/月'
                            }else{
                                html += '/日'
                            }
                            html +='</p>' +
                                '                    <p style="color: #333;">'+data[i].h_address+'-'+data[i].h_building+'-'+data[i].h_subway+'-'+data[i].h_nearbus+'</p>' +
                                '                </div>' +
                                '            </div>' +
                                '        </a>' +
                                '    </div>';
                        }
                    }
                    $('#getMore').append(html);
                }
            },
            'error':function (error) {
                console.log(error);
            }
        })
    })
</script>

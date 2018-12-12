<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\tab.html";i:1541223954;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello MUI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!--标准mui.css-->
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <!--App自定义的css-->
    <link rel="stylesheet" type="text/css" href="__WAP__/css/app.css"/>
    <style>
        .title{
            margin: 20px 15px 7px;
            color: #6d6d72;
            font-size: 15px;
        }

    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">普通列表</h1>
</header>
<div class="mui-content">
    <ul class="mui-table-view" id="getMore" >
        <li class="mui-table-view-cell">Item 1</li>
        <li class="mui-table-view-cell">Item 2</li>
        <li class="mui-table-view-cell">Item 3</li>
        <li class="mui-table-view-cell">Item 4</li>
        <li class="mui-table-view-cell">Item 5</li>
        <li class="mui-table-view-cell">Item 6</li>
        <li class="mui-table-view-cell">Item 7</li>
        <li class="mui-table-view-cell">Item 8</li>
        <li class="mui-table-view-cell">Item 9</li>
        <li class="mui-table-view-cell">Item 10</li>
        <li class="mui-table-view-cell">Item 11</li>
        <li class="mui-table-view-cell">Item 12</li>
        <li class="mui-table-view-cell">Item 13</li>
        <li class="mui-table-view-cell">Item 14</li>
        <li class="mui-table-view-cell">Item 15</li>
    </ul>
    <input type="text" value="1" id="page"/>
    <span id="moreBtn">加载更多</span>
</div>
</body>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    $('#moreBtn').click(function () {
        var page=parseInt($('#page').val());
        var  pages=page+1;
        $('#page').val(pages);
        $('#getMore').append('');
    })
</script>
<style>
    .nav_tu{
        display: block;
        width: 1.5rem;
        height: 1.5rem;
        background-size: contain;
        background-position: center;
        margin: 0 auto;
        box-sizing: border-box;
        /*display: flex;*/
    }
</style>
<div class="mui-content snav" style="padding-top: 24px;" >
    <div class="swiper-slide nav-show swiper-slide-active" style="width: 25%">
        <a href="<?=url('index/deposit')?>" >
            <span class="nav_tu" style="background-image:url('__WEB__/img/navicon01.png');background-repeat:no-repeat;"></span>
            <p class="nav_p">房屋托管</p>
        </a>
    </div>
    <div class="swiper-slide nav-show swiper-slide-next" style="width: 25%">
        <a href="<?=url('index/house')?>">
            <span class="nav_tu" style="background-image:url('__WEB__/img/navicon02.png');background-repeat:no-repeat;"></span>
            <p class="nav_p">快速找房</p>
        </a>
    </div>
    <div style="width: 25%">
        <a href="<?=url('index/promise')?>">
            <span class="nav_tu" style="background-image:url('__WEB__/img/navicon03.png');background-repeat:no-repeat;"></span>
            <p class="nav_p">品质承诺</p>
        </a>

    </div>
    <div style="width: 25%">
        <a href="<?=url('index/advance')?>">
            <span class="nav_tu" style="background-image:url('__WEB__/img/navicon04.png');background-repeat:no-repeat;"></span>
            <p class="nav_p">托管优势</p>
        </a>
    </div>
    <div style="width: 25%">
        <a href="<?=url('index/news')?>">
            <span class="nav_tu" style="background-image:url('__WEB__/img/navicon05.png');background-repeat:no-repeat;"></span>
            <p class="nav_p">新闻资讯</p>
        </a>
    </div>
    <div style="width: 25%">
        <a href="<?=url('index/about')?>">
            <span class="nav_tu" style="background-image:url('__WEB__/img/navicon06.png');background-repeat:no-repeat;"></span>
            <p class="nav_p">关于我们</p>
        </a>
    </div>
    <div style="width: 25%">
        <a href="tel:400-996-1585">
            <span class="nav_tu" style="background-image:url('__WEB__/img/navicon07.png');background-repeat:no-repeat;"></span>
            <p class="nav_p">联系我们</p>
        </a>
    </div>
    <div style="width: 25%">
        <a href="http://api.map.baidu.com/marker?location=34.230218,108.892857&title=陕西大城小屋不动产管理有限公司&content=陕西大城小屋不动产管理有限公司&output=html">
            <span class="nav_tu" style="background-image:url('__WEB__/img/navicon08.png');background-repeat:no-repeat;"></span>
            <p class="nav_p">导航到店</p>
        </a>
    </div>
</div>


<style>
    .nav_tu{
        display: block;
        width: 48px;
        height: 48px;
        background-size: contain;
        background-position: center;
        margin: 0 auto;
        box-sizing: border-box;
        /*display: flex;*/
    }
</style>
<div class="mui-content" style="padding-top: 0px;background:#fff;">
    <div class="mui-card">
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="<?=url('index/deposit')?>" >
                    <span class="nav_tu" style="background-image:url('__WEB__/img/navicon01.png');background-repeat:no-repeat;"></span>
                    <p class="nav_p">房屋托管</p>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="<?=url('index/house')?>">
                    <span class="nav_tu" style="background-image:url('__WEB__/img/navicon02.png');background-repeat:no-repeat;"></span>
                    <p class="nav_p">快速找房</p>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="<?=url('index/promise')?>">
                    <span class="nav_tu" style="background-image:url('__WEB__/img/navicon03.png');background-repeat:no-repeat;"></span>
                    <p class="nav_p">品质承诺</p>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="<?=url('index/advance')?>">
                    <span class="nav_tu" style="background-image:url('__WEB__/img/navicon04.png');background-repeat:no-repeat;"></span>
                    <p class="nav_p">托管优势</p>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="<?=url('index/news')?>">
                    <span class="nav_tu" style="background-image:url('__WEB__/img/navicon05.png');background-repeat:no-repeat;"></span>
                    <p class="nav_p">新闻资讯</p>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="<?=url('index/about')?>">
                    <span class="nav_tu" style="background-image:url('__WEB__/img/navicon06.png');background-repeat:no-repeat;"></span>
                    <p class="nav_p">关于我们</p>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="tel:400-996-1585">
                    <span class="nav_tu" style="background-image:url('__WEB__/img/navicon07.png');background-repeat:no-repeat;"></span>
                    <p class="nav_p">联系我们</p>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="http://api.map.baidu.com/marker?location=34.230218,108.892857&title=陕西大城小屋不动产管理有限公司&content=陕西大城小屋不动产管理有限公司&output=html">
                    <span class="nav_tu" style="background-image:url('__WEB__/img/navicon08.png');background-repeat:no-repeat;"></span>
                    <p class="nav_p">导航到店</p>
                </a>
            </li>
        </ul>
    </div>
</div>
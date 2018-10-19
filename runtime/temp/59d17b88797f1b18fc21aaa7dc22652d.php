<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"G:\xampp\htdocs\bbb\public/../application/mobile\view\index\tab.html";i:1539049581;}*/ ?>
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
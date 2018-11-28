<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\bbb\public/../application/manager\view\allot\allocated.html";i:1543283758;}*/ ?>
﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>分配列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <link rel="stylesheet" href="__WAP__/css/icons-extra.css">
    <link rel="stylesheet" type="text/css" href="__WAP__/css/mui.picker.min.css" />
    <style>
        .mui-card .mui-control-content {
            padding: 10px;
        }
        .mui-table-cell h4{
            line-height: 23px;
        }
        .mui-table-cell h5{
            line-height: 23px;
        }
        .mui-card-link{
            color: #007aff;
        }
        .spans {
            background-color: #007aff;
            color: #ffffff;
            border: 1px solid #8f8f94;
        }
        .divs{
            width: 33.3%;
            line-height: 36px;
            float: left;
            text-align: center;
            border: 1px solid #8f8f94;
        }
        .actives{
            background-color: #ffffff;
            color: #007aff;
        }
        .allocate-top{
            padding-top:10px;
            padding-left:10px;
            padding-right:10px;
            position:fixed;
            overflow:hidden;
            z-index:3333;
            width: 100%;
            opacity:1;
        }
        .mui-icon-extra-calendar{
            color: #007aff;font-size: 24px;line-height: 40px;margin-top: 3px;
        }
        html,
        body,
        .mui-content {
            height: 0px;
            margin: 0px;
            background-color: #efeff4;
        }
        h5.mui-content-padded {
            margin-left: 3px;
            margin-top: 20px !important;
        }
        h5.mui-content-padded:first-child {
            margin-top: 12px !important;
        }
        .mui-btn {
            font-size: 16px;
            padding: 8px;
            margin: 3px;
        }
        .ui-alert {
            text-align: center;
            padding: 20px 10px;
            font-size: 16px;
        }
        * {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
        }
        .mui-card-link{
            color:#007aff ;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-person mui-pull-left" style=" color: #007aff;" href="<?=url('index/person')?>"></a>
    <h1 class="mui-title">分配列表</h1>
    <span id='demo6' data-options='{"type":"month"}' class="btn mui-icon-extra mui-icon-extra-calendar mui-pull-right"></span>
    <span id='result' class="ui-alert mui-pull-right"><?php if(isset($date)): ?><?php echo $date; endif; ?></span>
</header>
<div class="mui-content">
    <div style="height: 44px;width: 100%">
        <div class="allocate-top">
            <a href="<?=url('allot/index')?>"><div class="spans actives divs">待分配</div></a>
            <a><div class="spans divs">已分配</div></a>
            <a href="<?=url('allot/all')?>"><div class="spans actives divs">全部</div></a>
        </div>
    </div>
    <div class="mui-content">
        <?php if($allocate == null): ?>
        <div class="mui-card">
            <div class="mui-card-content" style="height: 40px;text-align: center;line-height: 36px;">
                暂无房源
            </div>
        </div>
        <?php else: if(is_array($allocate) || $allocate instanceof \think\Collection || $allocate instanceof \think\Paginator): $i = 0; $__LIST__ = $allocate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div id="getMore">
            <div class="mui-card">
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <p style="line-height: 26px"><b>房源编号：【<?php echo $vo['hat_house_code']; ?>】</b>
                            <span style="float: right;"><span style="margin-left: 8px;" class="mui-badge mui-badge-warning mui-badge-inverted">已分配</span></span>
                        </p>
                        <p style="line-height: 26px"><b>小区名称</b>：<?php echo $vo['h_building']; ?>

                        </p>
                        <p style="color: #333;line-height: 26px;">
                            装修款额：<?php echo $vo['decorate_money']; ?>（元）
                            <br/>
                            房屋面积：<?php echo $vo['h_area']; ?>（㎡）
                            <br/>
                            房屋地址：<?php echo $vo['h_address']; ?>
                            <br/>
                            此房源信息在<?php echo $vo['hat_add_time']; ?>由<?php echo $vo['hat_admin_job']; ?>---<?php echo $vo['hat_admin']; ?>提交<?php if($vo['hat_sub_tips'] != null): ?>，备注信息为<?php echo $vo['hat_sub_tips']; endif; ?>。
                            <br/>
                            此房源已在<?php echo $vo['hat_assign_time']; ?>由<?php echo $vo['hat_assigner_job']; ?>---<?php echo $vo['hat_assigner']; ?>分配给<?php echo $vo['hat_assign_to_job']; ?>---<?php echo $vo['hat_assign_too']; ?>，备注信息为<?php echo $vo['hat_assign_tips']; ?>。

                        </p>
                    </div>
                </div>
                <div class="mui-card-footer">
                    <a class="mui-card-link" href="<?=url('allot/details')?>?h_id=<?php echo $vo['hat_house_code']; ?>">房源详情</a>
                    <a class="mui-card-link" href="<?=url('allot/alldetails')?>?hat_id=<?php echo $vo['hat_id']; ?>">分配详情</a>
                </div>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="mui-card">
        <input type="hidden" value="1" id="page1"/>
        <div id="moreBtn" class="mui-card-content" style="height: 40px;text-align: center;line-height: 36px;<?php if($count > 1): ?>display: block<?php else: ?>display: none<?php endif; ?>">
            加载更多
        </div>
    </div>
        <?php endif; ?>

    </div>

</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__LAY__/layui.js"></script>
<script src="__WAP__/js/mui.picker.min.js"></script>
<script>
    (function($) {
        $.init();
        var result = $('#result')[0];
        var btns = $('.btn');
        btns.each(function(i, btn) {
            btn.addEventListener('tap', function() {
                var _self = this;
                if(_self.picker) {
                    _self.picker.show(function (rs) {
                        result.innerText =rs.text;
                        console.log(result.innerText+'1111');
                        _self.picker.dispose();
                        _self.picker = null;
                    });
                } else {
                    var optionsJson = this.getAttribute('data-options') || '{}';
                    var options = JSON.parse(optionsJson);
                    var id = this.getAttribute('id');
                    _self.picker = new $.DtPicker(options);
                    _self.picker.show(function(rs) {
                        result.innerText =rs.text;
                        console.log(result.innerText+'2222');
                        var date=result.innerText;
                        _self.picker.dispose();
                        _self.picker = null;
                        window.location.href="<?=url('allot/allocated')?>?date="+date;
                    });
                }

            }, false);
        });
    })(mui);
</script>
<script>
    mui.init({
        swipeBack: true
    });
</script>
<script>
    $('#moreBtn').click(function () {
        var page1=parseInt($('#page1').val());
        var date=$('#result').html();
        var  pages1=page1+1;
        $('#page1').val(pages1);
        $.ajax({
            'type':"post",
            'url':"<?=url('allot/allomore')?>",
            'data':{'page':pages1,'date':date},
            'success':function (result) {
                var data=result.data;
                console.log(data);
                if(data.length<=0){
                    $('#moreBtn').html('到底了哦！');
                }else{
                    var html="";
                    for (var i=0;i<data.length;i++) {
                        html+='<div class="mui-card">' +
                            '            <div class="mui-card-content">' +
                            '                <div class="mui-card-content-inner">' +
                            '                    <p><b>房源编号：【'+data[i].hat_house_code+'】</b>' +
                            '                         <span style="float: right;"><span style="margin-left: 8px;" class="mui-badge mui-badge-warning mui-badge-inverted">已分配</span></span>' +
                            '                        </span>' +
                            '                    </p>' +
                            '                    <p><b>小区名称</b>：'+data[i].h_building+
                            '                    </p>' +
                            '                    <p style="color: #333;line-height: 26px;">' +
                            '                        装修款额：'+data[i].decorate_money+'（元）' +
                            '                        <br/>' +
                            '                        房屋面积：'+data[i].h_area+'（㎡）' +
                            '                        <br/>' +
                            '                        房屋地址：'+data[i].h_address+''+
                            '此房源信息在'+data[i].hat_add_time+'由'+data[i].hat_admin_job+'---'+data[i].hat_admin+'提交';
                        if(data[i].hat_sub_tips != null ){
                            html+='，备注信息为'+data[i].hat_sub_tips+'';
                        }
                        html+='。<br/>此房源已在'+data[i].hat_assign_time+'由'+data[i].hat_assigner_job+'---'+data[i].hat_assigner+'分配给'+data[i].hat_assign_to_job+'---'+data[i].hat_assign_too+'，';
                        if(data[i].hat_assign_tips != null ){
                            html+='备注信息为'+data[i].hat_assign_tips+'。';
                        }
                        html+= '                    </p>' +
                            '                </div>' +
                            '            </div>' +
                            '            <div class="mui-card-footer">' +
                            '            <a class="mui-card-link" href="<?=url('allot/details')?>?h_id='+data[i].hat_house_code+'">房源详情</a>' +
                        '            <a class="mui-card-link" href="<?=url('allot/alldetails')?>?hat_id='+data[i].hat_id+'">分配详情</a>' +
                        '            </div>' +
                        '        </div>';
                    }
                }
                $('#getMore').append(html);
            },
            'error':function (error) {
                console.log(error);
            }
        })
    })
</script>

</body>

</html>
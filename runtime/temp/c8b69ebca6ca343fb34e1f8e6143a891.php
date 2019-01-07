<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"G:\xampp\htdocs\bbb\public/../application/decoration\view\index\decorating.html";i:1544579067;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>小屋智能公寓工程部</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style>
        input{
            font-size: 14px;
        }
    </style>
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
    <h1 class="mui-title">房源列表</h1>
    <a class="mui-icon mui-icon-person mui-icon-right-nav mui-pull-right" href="<?=url('marketm/index/person')?>?role=3" ></a>
</header>
<div class="mui-content">
    <div style="height: 44px;width: 100%">
        <div class="allocate-top">
            <a><div class="spans divs">装修中（<?php echo $count; ?>）</div></a>
            <a href="<?=url('index/allocated')?>"><div class="spans actives divs">已转交</div></a>
            <a href="<?=url('index/index')?>"><div class="spans actives divs">全部</div></a>
        </div>
        <div class="allocate-top" style="margin-top: 50px;">
            <input style="float: left;width: 77%" id="keywords" type="text" placeholder="请输入房源编号进行搜索"<?php if(isset($keywords)): ?> value="<?php echo $keywords; ?>" <?php endif; ?> />
            <span onclick="formQuery()" style="float: left;width: 19%;margin-left: 5px;padding-left: 5px;margin-top: 5px;padding-top: 5px;" class="mui-btn mui-btn-primary mui-icon mui-icon-search">
            搜索
        </span>
        </div>
    </div>
    <div class="mui-content" style="margin-top: 67px;">
        <?php if($houses == null): ?>
        <div class="mui-card">
            <div class="mui-card-content" style="height: 40px;text-align: center;line-height: 36px;">
                暂无房源
            </div>
        </div>
        <?php else: ?>
        <div id="getMore" >
        <?php if(is_array($houses) || $houses instanceof \think\Collection || $houses instanceof \think\Paginator): $i = 0; $__LIST__ = $houses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hous): $mod = ($i % 2 );++$i;?>
            <div class="mui-card">
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <p><b>房源编号：【<?php echo $hous['h_b_id']; ?>】</b>
                            <?php if($hous['is_paid_ratio'] == 1): ?>
                            <span style="float: right;">回款率：<span style="margin-left: 8px;" class="mui-badge mui-badge-success"><?php echo $hous['paid_ratio']; ?></span></span>
                            <?php endif; ?>
                        </p>
                        <p><b>小区名称</b>：<?php echo $hous['h_building']; ?>
                            <span style="float: right;">装修状态：<span style="margin-left: 8px;" class="mui-badge mui-badge-purple"><?php echo $hous['hd_status']; ?></span></span>
                        </p>
                        <p style="color: #333;">
                            <?php if($hous['is_paid_ratio'] == 1): ?>
                            装修款额：<?php echo $hous['h_money']; ?>（元）
                            <br/>
                            <?php endif; ?>
                            房屋面积：<?php echo $hous['h_area']; ?>（㎡）
                            <br/>
                            <?php if(isset($hous['h_contract_code'])): ?>
                            合同编号：<?php echo $hous['h_contract_code']; ?>（元）
                            <br/>
                            <?php endif; ?>
                            签订日期：<?php echo $hous['h_addtime']; ?>
                            <br/>
                            房源地址：<?php echo $hous['h_address']; ?>
                            <br/>
                        </p>
                    </div>
                </div>
                <div class="mui-card-footer">
                    <a class="mui-card-link" href="<?=url('index/details')?>?h_id=<?php echo $hous['h_b_id']; ?>&type=1">房源详情</a>
                    <a class="mui-card-link" href="<?=url('index/timeline')?>?h_id=<?php echo $hous['h_b_id']; ?>&type=1">装修进度</a>
                    <a class="mui-card-link" href="<?=url('index/dailylog')?>?h_id=<?php echo $hous['h_b_id']; ?>&type=1">监理记录</a>
                </div>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <?php endif; ?>
        <div class="mui-card">
            <input type="hidden" value="1" id="page"/>
            <div id="moreBtn" class="mui-card-content" style="height: 40px;text-align: center;line-height: 36px;<?php if($count > 2): ?>display: block<?php else: ?>display: none<?php endif; ?>">
                加载更多
            </div>
        </div>
    </div>

</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
<script>
    function formQuery(){
        var keywords=$('#keywords').val();
        location.href="<?=url('index/decorating')?>?&keywords="+keywords;
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
            'url':"<?=url('index/decingmore')?>",
            'data':{'page':pages,'keywords':keywords},
            'success':function (result) {
                var data=result.data;
                console.log(result);
                if(data.length<=0){
                    $('#moreBtn').html('到底了哦！');
                }else{
                    var html="";
                    for (var i=0;i<data.length;i++) {
                        html+='<div class="mui-card">' +
                            '        <div class="mui-card-content">' +
                            '            <div class="mui-card-content-inner">' +
                            '                <p><b>房源编号：【'+data[i].h_b_id+'】</b>';
                        if(data[i].is_paid_ratio == 1){
                            html+='<span style="float: right;">回款率：<span style="margin-left: 8px;" class="mui-badge mui-badge-success">'+data[i].paid_ratio+'</span></span>';
                        }
                        html+='                </p>' +
                            '                <p><b>小区名称</b>：【'+data[i].h_building+'】' +
                            '                    <span style="float: right;">装修状态：<span style="margin-left: 8px;" class="mui-badge mui-badge-purple">'+data[i].hd_status+'</span></span>' +
                            '                </p>'+
                            '                <p style="color: #333;">' ;
                        if(data[i].is_paid_ratio = 1){
                            html+='装修款额：'+data[i].h_money+'（元）<br/>';
                        }
                        html+='房屋面积：'+data[i].h_area+'（㎡）<br/>';
                        if(data[i].h_contract_code != null){
                            html+='合同编号：'+data[i].h_contract_code+'<br/>';
                        }
                        html+=' 签订日期：'+data[i].h_addtime+'<br/>'+
                            '                    房源地址：'+data[i].h_address+
                            '                    <br/>' +
                            '                </p>' +
                            '            </div>' +
                            '        </div>' +
                            '<div class="mui-card-footer">' +
                            '            <a class="mui-card-link" href="<?=url('index/details')?>?h_id='+data[i].h_b_id+'&type=1">房源详情</a>' +
                        '            <a class="mui-card-link" href="<?=url('index/timeline')?>?h_id='+data[i].h_b_id+'&type=1">装修进度</a>' +
                        '            <a class="mui-card-link" href="<?=url('index/dailylog')?>?h_id='+data[i].h_b_id+'&type=1">监理记录</a>' +
                        '        </div></div>';
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
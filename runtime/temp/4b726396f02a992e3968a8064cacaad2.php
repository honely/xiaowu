<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\index.html";i:1543560308;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>小屋智能公寓运营部</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style>
        input{
            font-size: 14px;
        }
    </style>
</head>
<body style="background-color: #fff">
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">房源列表</h1>
    <a class="mui-icon mui-icon-person mui-icon-right-nav mui-pull-right" href="<?=url('marketm/index/person')?>?role=5" ></a>
</header>
<div class="mui-content" style="background:#fff;">
    <div class="mui-content-padded">
        <input style="float: left;width: 80%" id="keywords" type="text" placeholder="请输入房源编号进行搜索"<?php if(isset($keywords)): ?> value="<?php echo $keywords; ?>" <?php endif; ?> />
        <span onclick="formQuery()" style="float: left;width: 18%;margin-left: 5px;padding-left: 5px;margin-top: 5px;padding-top: 5px;" class="mui-btn mui-btn-primary mui-icon mui-icon-search">
            搜索
        </span>
    </div>
</div>
<div class="mui-content" id="getMore" style="background:#fff;padding-top: 40px;">
    <?php if($houses == null): ?>
    <div class="mui-card">
        <div class="mui-card-content" style="height: 40px;text-align: center;line-height: 36px;">
            暂无房源
        </div>
    </div>
    <?php else: if(is_array($houses) || $houses instanceof \think\Collection || $houses instanceof \think\Paginator): $i = 0; $__LIST__ = $houses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hous): $mod = ($i % 2 );++$i;?>
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>房源编号：【<?php echo $hous['h_b_id']; ?>】</b>
                    <span style="float: right;">房屋状态：
                        <?php switch($hous['h_isable']): case "4": ?><span style="margin-left: 8px;" class="mui-badge mui-badge-warning">待出租</span><?php break; case "5": ?><span style="margin-left: 8px;" class="mui-badge mui-badge-success">已出租</span><?php break; case "3": ?><span style="margin-left: 8px;" class="mui-badge mui-badge-primary">配置中</span><?php break; endswitch; ?>
                    </span>
                </p>
                <p><b>小区名称</b>：<?php echo $hous['h_building']; ?>

                </p>
                <p style="color: #333;">
                    <!--房源标题：<?php echo $hous['h_name']; ?>-->
                    <!--<br/>-->
                    <!--小区名称：<?php echo $hous['h_building']; ?>-->
                    <!--<br/>-->
                    <?php if($hous['h_money'] != null): ?>
                    装修款额：<?php echo $hous['h_money']; ?>（元）
                    <br/>
                    <?php endif; ?>
                    房屋面积：<?php echo $hous['h_area']; ?>（㎡）
                    <br/>
                    <?php if(isset($hous['h_contract_code'])): ?>
                    合同编号：<?php echo $hous['h_contract_code']; ?>（元）
                    <br/>
                    <?php endif; ?>
                    房屋地址：<?php echo $hous['h_address']; ?>
                </p>
            </div>
        </div>
        <div class="mui-card-footer">
            <a class="mui-card-link" href="<?=url('index/details')?>?h_id=<?php echo $hous['h_b_id']; ?>">房源详情</a>
            <a class="mui-card-link" href="<?=url('index/decorate')?>?b_id=<?php echo $hous['h_b_id']; ?>">装修信息</a>
            <a class="mui-card-link" href="<?=url('index/improve')?>?h_id=<?php echo $hous['h_b_id']; ?>">信息完善</a>
            <a class="mui-card-link" href="<?=url('index/maintlog')?>?h_id=<?php echo $hous['h_b_id']; ?>">房源维护</a>
            <a class="mui-card-link" href="<?=url('index/rentlog')?>?h_id=<?php echo $hous['h_b_id']; ?>">出租记录</a>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
<div class="mui-card">
    <input type="hidden" value="1" id="page"/>
    <div id="moreBtn" class="mui-btn" style="text-align: center;width: 100%;<?php if($count > 8): ?>display: block<?php else: ?>display: none<?php endif; ?>">加载更多</div>
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
        location.href="<?=url('index/index')?>?&keywords="+keywords;
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
                        html+='<div class="mui-card">' +
                            '        <div class="mui-card-content">' +
                            '            <div class="mui-card-content-inner">' +
                            '                <p><b>房源编号：【'+data[i].h_b_id+'】</b>' +
                            '<span style="float: right;">房屋状态：';
                        switch (data[i].h_isable) {
                            case 4:
                                html +='<span style="margin-left: 8px;" class="mui-badge mui-badge-warning">待出租</span>';
                                break;
                            case 5:
                            html+='<span style="margin-left: 8px;" class="mui-badge mui-badge-success">已出租</span>';
                                break;
                            case 3:
                            html+='<span style="margin-left: 8px;" class="mui-badge mui-badge-primary">配置中</span>';
                                break;
                        }
                        html+='                </p>' +
                            '                <p><b>小区名称</b>：【'+data[i].h_building+'】' +
                            '                </p>'+
                            '                <p style="color: #333;">'+
                            '房屋面积：'+data[i].h_area+'（㎡）<br/>'+
                            '                    房源地址：'+data[i].h_address+
                            '                    <br/>' +
                            '                </p>' +
                            '            </div>' +
                            '        </div>' +
                            '<div class="mui-card-footer">' +
                            '            <a class="mui-card-link" href="<?=url('index/details')?>?h_id='+data[i].h_b_id+'">房源详情</a>' +
                        '            <a class="mui-card-link" href="<?=url('index/improve')?>?h_id='+data[i].h_b_id+'">信息完善</a>' +
                        '            <a class="mui-card-link" href="<?=url('index/rentlog')?>?h_id='+data[i].h_b_id+'">出租记录</a>' +
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
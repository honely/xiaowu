<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\house.html";i:1542866009;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>房源列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-person mui-icon-right-navmui-pull-left " href="<?=url('index/person')?>" ></a>
    <h1 class="mui-title">房源列表</h1>
    <a class="mui-icon mui-icon-plusempty mui-pull-right" href="<?=url('index/index')?>"></a>
</header>
<div class="mui-content" style="background:#fff;">
    <div class="mui-content-padded">
        <input style="float: left;width: 80%" id="keywords" type="text" placeholder="请输入房源编号进行搜索" <?php if(isset($keywords)): ?> value="<?php echo $keywords; ?>" <?php endif; ?> />
        <span onclick="formQuery()" style="float: left;width: 18%;margin-left: 5px;padding-left: 5px;margin-top: 5px;padding-top: 5px;" class="mui-btn mui-btn-primary mui-icon mui-icon-search">
            搜索
        </span>
    </div>
</div>
<div class="mui-content" id="getMore" style="padding-top: 40px;">
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
                    <?php if($hous['is_paid_ratio'] == 1): ?>
                    <span style="float: right;">回款率：<span style="margin-left: 8px;" class="mui-badge mui-badge-danger"><?php echo $hous['paid_ratio']; ?></span></span>
                    <?php endif; ?>
                </p>
                <p><b>小区名称</b>：【<?php echo $hous['h_building']; ?>】
                    <span style="float: right;">房屋状态：<span style="margin-left: 8px;" class="mui-badge mui-badge-primary"><?php echo $hous['h_isable']; ?></span></span>
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
            <a class="mui-card-link" href="<?=url('index/master')?>?h_id=<?php echo $hous['h_b_id']; ?>&m_id=<?php echo $hous['m_id']; ?>">户主信息</a>
            <a class="mui-card-link" href="<?=url('index/payment')?>?h_id=<?php echo $hous['h_b_id']; ?>">回款信息</a>
            <a class="mui-card-link" href="<?=url('index/attach')?>?h_id=<?php echo $hous['h_b_id']; ?>&a_id=<?php echo $hous['a_id']; ?>">房屋附属</a>
            <a class="mui-card-link" href="<?=url('index/preview')?>?h_id=<?php echo $hous['h_b_id']; ?>">房源预览</a>
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
        location.href="<?=url('index/house')?>?&keywords="+keywords;
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
                            '                <p><b>房源编号：【'+data[i].h_b_id+'】</b>';
                                if(data[i].is_paid_ratio == 1){
                                    html+='<span style="float: right;">回款率：<span style="margin-left: 8px;" class="mui-badge mui-badge-danger">'+data[i].paid_ratio+'</span></span>';
                                }
                            html+='                </p>' +
                            '                <p><b>小区名称</b>：【'+data[i].h_building+'】' +
                            '                    <span style="float: right;">房屋状态：<span style="margin-left: 8px;" class="mui-badge mui-badge-primary">'+data[i].h_isable+'</span></span>' +
                            '                </p>'+
                            '                <p style="color: #333;">' ;
                                if(data[i].is_paid_ratio = 1){
                                    html+='装修款额：'+data[i].h_money+'（元）';
                                }
                                html+='房屋面积：'+data[i].h_area+'（㎡）<br/>';
                                if(data[i].h_contract_code != null){
                                    html+='合同编号：'+data[i].h_contract_code+'<br/>';
                                }
                                html+=' 签订日期：'+data[i].h_addtime+'<br/>'+
                                    '                    房源地址：'+data[i].h_address+'' +
                                    '                    <br/>' +
                                    '                </p>' +
                                    '            </div>' +
                                    '        </div>'+
                            '        <div class="mui-card-footer">' +
                            '            <a class="mui-card-link" href="<?=url('index/master')?>?h_id='+data[i].h_id+'&m_id='+data[i].m_id+'">户主信息</a>' +
                            '            <a class="mui-card-link" href="<?=url('index/payment')?>?h_id='+data[i].h_b_id+'">回款信息</a>' +
                            '            <a class="mui-card-link" href="<?=url('index/attach')?>?h_id='+data[i].h_b_id+'&a_id='+data[i].a_id+'">房屋附属</a>' +
                            '            <a class="mui-card-link" href="<?=url('index/preview')?>?h_id='+data[i].h_b_id+'">房源预览</a>' +
                            '        </div>' +
                            '    </div>';
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
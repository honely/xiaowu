<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\rentlog.html";i:1542509269;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>房屋出租记录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/index')?>"></a>
    <h1 class="mui-title">房屋出租记录</h1>
    <?php if($house['h_isable'] == 4): ?>
    <a class="mui-icon-plusempty mui-icon mui-icon-right-nav mui-pull-right" href="<?=url('index/addrent')?>?h_id=<?php echo $h_id; ?>"></a>
    <?php endif; ?>
</header>
<div class="mui-content" style="background:#fff;">
    <div class="mui-content-padded">
        <input style="float: left;width: 80%" id="keywords" class="mui-input-clear" type="text" placeholder="请输入租客姓名或电话进行搜索"<?php if(isset($keywords)): ?> value="<?php echo $keywords; ?>" <?php endif; ?> />
        <span onclick="formQuery()" style="float: left;width: 18%;margin-left: 5px;padding-left: 5px;margin-top: 5px;padding-top: 5px;" class="mui-btn mui-btn-primary mui-icon mui-icon-search">
            搜索
        </span>
    </div>
</div>
<div class="mui-content" id="getMore" style="padding-top: 40px;">
    <?php if($rentLog == null): ?>
        <div class="mui-card">
            <div class="mui-card-content" style="height: 40px;text-align: center;line-height: 36px;">
                暂无出租信息
            </div>
        </div>
    <?php else: ?>
    <div class="mui-card" >
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>房源编号：【<?php echo $house['h_b_id']; ?>】</b>
                <p style="color: #333;">
                    小区名称：<?php echo $house['h_building']; ?>
                    <br/>
                    房屋面积：<?php echo $house['h_area']; ?>（㎡）
                    <br/>
                    房源地址：<?php echo $house['h_address']; ?>
                </p>
            </div>
        </div>
    </div>
    <?php if(is_array($rentLog) || $rentLog instanceof \think\Collection || $rentLog instanceof \think\Paginator): $i = 0; $__LIST__ = $rentLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
        <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p>租客姓名：<?php echo $log['hr_name']; if($log['hrl_status'] == 1): ?>
                    <span style="margin-left: 8px;" class="mui-pull-right mui-badge mui-badge-warning">出租中</span>
                    <?php else: ?>
                    <span style="margin-left: 8px;" class=" mui-pull-right mui-badge mui-badge-success">已完成</span>
                    <?php endif; ?>
                </p>
                <p style="color: #333;">
                    联系电话：<?php echo $log['hr_phone']; ?>
                    <br/> 租赁时间：<?php echo $log['hrl_rent_time']; ?>—<?php echo $log['hrl_dead_time']; ?>
                    <br/>
                    出租渠道：<?php echo $log['hrc_title']; ?>
                </p>
            </div>
        </div>
        <div class="mui-card-footer">
            <a class="mui-card-link" href="<?=url('index/renter')?>?hr_id=<?php echo $log['hrl_renter_id']; ?>">租客信息</a>
            <a class="mui-card-link" href="<?=url('index/rentdetail')?>?hrl_id=<?php echo $log['hrl_id']; ?>">出租详情</a>
            <a class="mui-card-link" href="<?=url('index/paylog')?>?h_id=<?php echo $log['hrl_id']; ?>">收租记录</a>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
<div class="mui-card">
    <input type="hidden" value="1" id="page"/>
    <div id="moreBtn" class="mui-btn" style="text-align: center;width: 100%;<?php if($count > 4): ?>display: block<?php else: ?>display: none<?php endif; ?>">加载更多</div>
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
        location.href="<?=url('index/rentlog')?>?h_id=<?php echo $h_id; ?>&keywords="+keywords;
    }
</script>
<script>
    $('#moreBtn').click(function () {
        var h_id=<?php echo $h_id; ?>;
        var keywords=$('#keywords').val();
        var page=parseInt($('#page').val());
        var  pages=page+1;
        $('#page').val(pages);
        $.ajax({
            'type':"post",
            'url':"<?=url('index/logmore')?>",
            'data':{'page':pages,'keywords':keywords,'h_id':h_id},
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
                            '                <p><b>租客姓名：【'+data[i].hr_name+'】</b>' +
                            '<span style="float: right;">出租状态：';
                        switch (data[i].hrl_status) {
                            case 1:
                                html +='<span style="margin-left: 8px;" class="mui-pull-right mui-badge mui-badge-warning">出租中</span></p>';
                                break;
                            case 2:
                                html+='<span style="margin-left: 8px;" class=" mui-pull-right mui-badge mui-badge-success">已完成</span></p>';
                                break;
                        }
                        html+='<p style="color: #333;">' +
                            '                     联系电话：'+data[i].hr_phone+
                            '                    <br/> 租赁时间：'+data[i].hrl_rent_time+'—'+data[i].hrl_dead_time+'' +
                            '                    <br/>' +
                            '                    出租渠道：'+data[i].hrc_title+
                            '                </p>' +
                            '            </div>' +
                            '        </div>'+
                            '<div class="mui-card-footer">' +
                            '            <a class="mui-card-link" href="<?=url('index/renter')?>?hr_id='+data[i].hrl_renter_id+'">租客信息</a>' +
                        '            <a class="mui-card-link" href="<?=url('index/rentdetail')?>?hrl_id='+data[i].hrl_id+'">出租详情</a>' +
                        '            <a class="mui-card-link" href="<?=url('index/paylog')?>?h_id='+data[i].hrl_id+'">出租记录</a>' +
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
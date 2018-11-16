<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"G:\xampp\htdocs\bbb\public/../application/manager\view\index\paylog.html";i:1542360325;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>租金缴纳记录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/rent')?>?h_id=<?php echo $h_b_id; ?>"></a>
    <h1 class="mui-title">租金缴纳记录</h1>
</header>
<div class="mui-content" style="padding-top: 40px;">
    <div class="mui-card">
        <div class="mui-card-content">
            <ul class="mui-table-view mui-table-view-chevron" id="getMore">
                <?php if($payLog == null): ?>
                    <li class="mui-table-view-cell mui-media">
                        暂无数据！
                    </li>
                <?php else: if(is_array($payLog) || $payLog instanceof \think\Collection || $payLog instanceof \think\Paginator): $i = 0; $__LIST__ = $payLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
                    <li class="mui-table-view-cell mui-media">
                        <a class="mui-navigate-right" href="<?=url('index/paydetail')?>?hdl_id=<?php echo $log['hrpl_id']; ?>">
                            <img class="mui-media-object mui-pull-left" src="<?php echo $log['hrpl_img']; ?>">
                            <div class="mui-media-body">
                                <?php echo $log['hrpl_addtime']; ?>
                            </div>
                            <p class='mui-ellipsis'>
                                <?php echo $log['hrpl_addtimes']; ?>收到房客<?php echo $log['hrpl_rent_name']; ?>电话<?php echo $log['hrpl_rent_phone']; ?>房租<?php echo $log['hrpl_money']; ?>元.
                            </p>
                        </a>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
    </div>
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
    $('#moreBtn').click(function () {
        var keywords=$('#keywords').val();
        var page=parseInt($('#page').val());
        var h_id=parseInt(<?php echo $h_id; ?>);
        var  pages=page+1;
        $('#page').val(pages);
        $.ajax({
            'type':"post",
            'url':"<?=url('index/paymore')?>",
            'data':{'page':pages,'keywords':keywords,'h_id':h_id},
            'success':function (result) {
                var data=result.data;
                console.log(data);
                if(data.length<=0){
                    $('#moreBtn').html('到底了哦！');
                }else{
                    var html="";
                    for (var i=0;i<data.length;i++) {
                        html+='<li class="mui-table-view-cell mui-media">' +
                    '                        <a class="mui-navigate-right" href="<?=url('index/paydetail')?>?hdl_id='+data[i].hrpl_id+'">' +
                    '                            <img class="mui-media-object mui-pull-left" src="'+data[i].hrpl_img+'">' +
                    '                            <div class="mui-media-body">' +data[i].hrpl_addtime+
                    '                            </div>' +
                    '                            <p class="mui-ellipsis">'+data[i].hrpl_addtimes+'收到房客'+data[i].hrpl_rent_name+'电话'+data[i].hrpl_rent_phone+'房租'+data[i].hrpl_money+'元。' +
                    '                            </p>' +
                    '                        </a>' +
                    '                    </li>';
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
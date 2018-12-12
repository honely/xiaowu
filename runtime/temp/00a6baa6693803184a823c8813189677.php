<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\maintlog.html";i:1543634580;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>监理日记</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/index')?>"></a>
    <h1 class="mui-title">维护记录</h1>
    <a class="mui-icon-plusempty mui-icon mui-icon-right-nav mui-pull-right" href="<?=url('index/addlog')?>?h_id=<?php echo $h_id; ?>"></a>
</header>
<div class="mui-content" style="padding-top: 40px;">
    <div class="mui-card">
        <div class="mui-card-content">
            <ul class="mui-table-view mui-table-view-chevron" id="getMore" >
                <?php if($maintLog == null): ?>
                <li class="mui-table-view-cell mui-media">
                    暂无数据！
                </li>
                <?php else: if(is_array($maintLog) || $maintLog instanceof \think\Collection || $maintLog instanceof \think\Paginator): $i = 0; $__LIST__ = $maintLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
                <li class="mui-table-view-cell mui-media">
                    <a class="mui-navigate-right" href="<?=url('index/logdetails')?>?hmt_id=<?php echo $log['hmt_id']; ?>">
                        <img class="mui-media-object mui-pull-left" src="<?php echo $log['hmt_img']; ?>">
                        <div class="mui-media-body">
                            <?php echo $log['hmt_add_time']; ?>
                        </div>
                        <p class='mui-ellipsis'>
                            <?php echo $log['hmt_title']; ?>
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
    <div id="moreBtn" class="mui-btn" style="text-align: center;width: 100%;<?php if($count > 10): ?>display: block<?php else: ?>display: none<?php endif; ?>">加载更多</div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
<script>
    mui('body').on('tap','a',function(){
        if(this.href){
            window.top.location.href=this.href;
        }
    });
</script>
<script>
    $('#moreBtn').click(function () {
        var page=parseInt($('#page').val());
        var h_id=parseInt(<?php echo $h_id; ?>);
        var  pages=page+1;
        $('#page').val(pages);
        $.ajax({
            'type':"post",
            'url':"<?=url('index/mainmore')?>",
            'data':{'page':pages,'h_id':h_id},
            'success':function (result) {
                var data=result.data;
                console.log(data);
                if(data.length<=0){
                    $('#moreBtn').html('到底了哦！');
                }else{
                    var html="";
                    for (var i=0;i<data.length;i++) {
                        html+='<li class="mui-table-view-cell mui-media">' +
                            '                            <a class="mui-navigate-right" href="<?=url('index/logdetails')?>?hmt_id='+data[i].hmt_id+'">' +
                        '                                <img class="mui-media-object mui-pull-left" src="'+data[i].hmt_img+'">'+
                        '                                <div class="mui-media-body">' +
                        data[i].hmt_add_time+
                        '                                </div>' +
                        '                                <p class="mui-ellipsis">' +
                        data[i].hmt_title+''+
                        '                                </p>' +
                        '                            </a>' +
                        '                        </li>';
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
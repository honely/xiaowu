<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"G:\xampp\htdocs\bbb\public/../application/decoration\view\index\dailylog.html";i:1540027947;}*/ ?>
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
    <h1 class="mui-title">监理日记</h1>
    <?php if($status < 11): ?>
        <a class="mui-icon-plusempty mui-icon mui-icon-right-nav mui-pull-right" href="<?=url('index/addlog')?>?h_id=<?php echo $h_id; ?>"></a>
    <?php endif; ?>

</header>
<div class="mui-content" style="padding-top: 40px;">
    <div class="mui-card">
        <div class="mui-card-content">
            <ul class="mui-table-view mui-table-view-chevron">
                <?php if($dailyLog == null): ?>
                <li class="mui-table-view-cell mui-media">
                   暂无数据！
                </li>
                <?php else: if(is_array($dailyLog) || $dailyLog instanceof \think\Collection || $dailyLog instanceof \think\Paginator): $i = 0; $__LIST__ = $dailyLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
                        <li class="mui-table-view-cell mui-media">
                        <a class="mui-navigate-right" href="<?=url('index/logdetails')?>?hdl_id=<?php echo $log['hdl_id']; ?>">
                            <img class="mui-media-object mui-pull-left" src="<?php echo $log['hdl_img']; ?>">
                            <div class="mui-media-body">
                                <?php echo $log['hdl_addtime']; ?>
                                <!--<span class="mui-pull-right"><?php echo $log['hdl_addtime']; ?></span>-->
                            </div>
                            <p class='mui-ellipsis'>
                                <?php echo $log['hdl_title']; ?>
                            </p>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
    //监听提交
    $('#subBtn').click(function(){
        $.ajax({
            'type':"post",
            'url':"<?=url('index/addpay')?>",
            'data':$('#loginForm').serialize(),
            'success':function (result) {
                console.log(result.data);
                if(result.code == '1'){
                    layer.msg(result.msg, {icon: 1, time: 2000},function () {
                        window.reload();
                    });
                }else{
                    layer.msg(result.msg, {icon: 2, time: 3000});
                }
            },
            'error':function (error) {
                console.log(error);
            }
        })
    });
</script>
</body>

</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\payment.html";i:1543048493;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>回款信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style>
        label,input,textarea{
            font-size: 14px;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/house')?>"></a>
    <h1 class="mui-title">回款信息</h1>
</header>
<div class="mui-content" style="padding-top: 40px;">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>房源编号：【<?php echo $h_b_id; ?>】</b>
                </p>
                <p style="color: #333;">
                    户主信息：<?php echo $master['hm_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;电话：<?php echo $master['hm_phone']; ?>
                    <br/>
                    客户经理：<?php echo $manager['u_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;电话：<?php echo $manager['u_phone']; ?> <?php echo $manager['u_job']; ?>
                    <br/>
                </p>
            </div>
        </div>
    </div>
    <?php if($payMoney == null): ?>
        <form class="mui-input-group" id="loginForm">
            <div class="mui-input-row">
                <label>总装修款</label>
                <input type="text" name="hp_money" onkeyup="this.value=this.value.replace(/\D/g, '')" id="hp_money" placeholder="请输入总装修款，单位（元）">
                <input type="hidden" name="hp_house_code" value="<?php echo $h_b_id; ?>"/>
            </div>
            <div class="mui-content-padded">
                <span type="button" id="subBtn" class="mui-btn mui-btn-primary mui-btn-block">提交</span>
            </div>
        </form>
    <?php else: ?>
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p style="color: #333;">
                   总装修款：<?php echo $payMoney['hp_money']; ?>元，已回款：<?php echo $payMoney['hp_paid']; ?>元。未回款： <?php echo $payMoney['hp_will_pay']; ?>元，回款比率:<?php echo $payMoney['hp_paid_ratio']; ?>。
                </p>
            </div>
        </div>
    </div>
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner" style="padding: 8px">
                <h4 style="text-align: left;">回款记录
                    <?php if($payMoney['hp_paid'] < $payMoney['hp_money']): ?>
                    <a href="<?=url('index/addpaylog')?>?h_id=<?php echo $payMoney['hp_house_code']; ?>" class="mui-icon mui-icon-plusempty"></a>
                    <?php endif; if($count > 8): ?>
                        <a class="mui-pull-right" style="color:#8f8f94;font-size: 14px;" href="<?=url('index/paylog')?>?h_id=<?php echo $payMoney['hp_house_code']; ?>">查看更多</a>
                    <?php endif; ?>
                </h4>
            </div>
        </div>
        <?php if($payLog == null): ?>
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p style="color: #333;">
                    暂无回款记录
                </p>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="mui-card-content">
        <ul class="mui-table-view mui-table-view-chevron">
            <?php if(is_array($payLog) || $payLog instanceof \think\Collection || $payLog instanceof \think\Paginator): $i = 0; $__LIST__ = $payLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
            <li class="mui-table-view-cell mui-media">
                <a class="mui-navigate-right" href="<?=url('index/logdetails')?>?hpl_id=<?php echo $log['hpl_id']; ?>">
                    <img class="mui-media-object mui-pull-left" src="<?php echo $log['hpl_img']; ?>">
                    <div class="mui-media-body">
                        <?php echo $log['hpl_addtime']; ?>
                        <p class='mui-ellipsis'>房源编号【<?php echo $log['hpl_house_code']; ?>】回款<?php echo $log['hpl_money']; ?>元，备注信息：<?php echo $log['hpl_tips']; ?>
                            本条记录由【<?php echo $log['hpl_addtime']; ?>】在<?php echo $log['hpl_addtime']; ?>提交。</p>
                    </div>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
</div>
    <?php endif; ?>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
    //监听提交
    $('#subBtn').click(function(){
        var hp_money=$('#hp_money').val();
        if(hp_money.length<=0){
            mui.alert('请填写装修款！', function() {
            });
        }else{
            var btnArray = ['否', '是'];
            mui.confirm('请检查信息是否填写无误？', 'Hello MUI', btnArray, function(e) {
                if (e.index == 1) {
                    $.ajax({
                        'type':"post",
                        'url':"<?=url('index/addpay')?>",
                        'data':$('#loginForm').serialize(),
                        'success':function (result) {
                            console.log(result.data);
                            if(result.code == '1'){
                                mui.alert(result.msg, function() {
                                    window.location.href="<?=url('index/payment')?>?h_id=<?php echo $h_b_id; ?>";
                                });
                            }else{
                                mui.alert(result.msg, function() {
                                });
                            }
                        },
                        'error':function (error) {
                            console.log(error);
                        }
                    })
                }
            });
        }
    });
</script>
</body>

</html>
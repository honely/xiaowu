<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"G:\xampp\htdocs\bbb\public/../application/admin\view\house\payment.html";i:1542173411;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <script src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
    <script src="__LAY__/layui.js"></script>
    <style>
        .layui-form-mid{
            padding:0 !important;
            width: 45%;
        }
        .color-red{
            color:red;

        }
    </style>
</head>
<form class="layui-form" action="" id="cusInfo" method="post">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>户主信息</legend>
    </fieldset>
    <div class="layui-form-item" style="margin-left:20px">
        <?php if($manager != null): ?>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">
                客户经理: <?php if(isset($manager['u_name'])): ?><?php echo $manager['u_name']; endif; ?>
                - <?php if(isset($manager['u_phone'])): ?><?php echo $manager['u_phone']; endif; ?>
                - <?php if(isset($manager['u_job'])): ?><?php echo $manager['u_job']; endif; ?>
            </div>
        </div>
        <?php endif; if($master != null): ?>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">户主姓名: <?php if(isset($master['hm_name'])): ?><?php echo $master['hm_name']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">联系电话: <?php if(isset($master['hm_phone'])): ?><?php echo $master['hm_phone']; endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">身份证号: <?php if(isset($master['hm_idcard'])): ?><?php echo $master['hm_idcard']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">银行卡号: <?php if(isset($master['hm_bank_card'])): ?><?php echo $master['hm_bank_card']; endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">现居地址: <?php if(isset($master['hm_address'])): ?><?php echo $master['hm_address']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">备注信息：<?php if(isset($master['hm_remarks'])): ?><?php echo $master['hm_remarks']; endif; ?></div>
        </div>
        <div class="layui-form-item">
            <div class="layui-form-mid layui-word-aux">录入人: <?php if(isset($master['hm_admin'])): ?><?php echo $master['hm_admin']; endif; ?></div>
            <div class="layui-form-mid layui-word-aux">录入时间：<?php if(isset($master['hm_addtime'])): ?><?php echo $master['hm_addtime']; endif; ?></div>
        </div>
        <?php else: ?>
        暂无数据！
        <?php endif; ?>
    </div>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>回款信息</legend>
    </fieldset>
    <blockquote class="layui-elem-quote">
        总装修款：
        <?php if($payMoney != null): ?>
            <span class="color-red"><b><?php echo $payMoney['hp_money']; ?></b></span>
            元，已回款：
            <span class="color-red"><b><?php echo $payMoney['hp_paid']; ?></b></span>
            元。未回款：
            <span class="color-red"><b><?php echo $payMoney['hp_will_pay']; ?></b></span>
            元，回款比率:
            <span class="color-red"><b><?php echo $payMoney['hp_paid_ratio']; ?></b></span>。
        <?php else: endif; ?>
    </blockquote>
        <div class="layui-form">
            <table class="layui-table">
                <colgroup>
                    <col width="150">
                    <col width="150">
                    <col width="200">
                    <col width="200">
                    <col width="100">
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th>回款金额（元）</th>
                    <th>回款时间</th>
                    <th>备注信息</th>
                    <th>操作人</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($payLog) || $payLog instanceof \think\Collection || $payLog instanceof \think\Paginator): $i = 0; $__LIST__ = $payLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $log['hpl_money']; ?></td>
                    <td><?php echo $log['hpl_addtime']; ?></td>
                    <td><?php echo $log['hpl_tips']; ?></td>
                    <td><?php echo $log['hpl_user']; ?></td>
                    <td><span class="layui-btn layui-btn-xs" onclick="showPay(<?php echo $log['hpl_id']; ?>)"><i class="layui-icon">&#xe705;</i>详情</span></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
</form>
</html>
<script>
    function showPay(hpl_id) {
        layui.use(['layer'], function(){
            var layer = layui.layer;
        layer.open({
            type: 2,
            title: '回款详情',
            shadeClose: true,
            shade: false,
            maxmin: true,
            area: ['866px', '600px'],
            content: "<?=url('house/showdetail')?>?hpl_id="+hpl_id
        });
        })
    }
</script>
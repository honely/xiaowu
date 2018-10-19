<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"G:\xampp\htdocs\bbb\public/../application/market\view\house\paylog.html";i:1539334837;}*/ ?>
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
</head>
<body>
<div class="layui-form-item" style="margin-top: 10px;">
    <div class="layui-inline">
        <label class="layui-form-label">客户经理</label>
        <div class="layui-input-inline">
            <input type="text" readonly value="<?php echo $manager['u_name']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">联系方式</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $manager['u_phone']; ?>" class="layui-input">
        </div>
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-inline">
        <label class="layui-form-label">户主姓名</label>
        <div class="layui-input-inline">
            <input type="text" readonly value="<?php echo $master['hm_name']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">联系方式</label>
        <div class="layui-input-inline">
            <input type="text" readonly value="<?php echo $master['hm_phone']; ?>" class="layui-input">
        </div>
    </div>
</div>
<?php if($payMoney == null): ?>
<!--装修款未录入；-->
<form id="payForm">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">总装修款额</label>
            <div class="layui-input-inline">
                <input type="text" name="hp_money" onkeyup="this.value=this.value.replace(/\D/g, '')" placeholder="总装修款额" class="layui-input">
                <input type="text" name="hp_house_code" value="<?php echo $h_b_id; ?>" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">单位：元。</div>
        </div>
        <div class="layui-inline">
            <div class="layui-input-inline">
                <span lay-submit lay-filter="payBtn" class="layui-btn">提交</span>
            </div>
        </div>
    </div>
</form>
<?php else: ?>
<div class="layui-form-item">
    <div class="layui-inline">
        <label class="layui-form-label">总装修款额</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $payMoney['hp_money']; ?>" readonly class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">单位：元。装修款总额在【<?php echo $payMoney['hp_addtime']; ?>】由【<?php echo $payMoney['u_name']; ?>】添加。</div>
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-inline">
        <label class="layui-form-label">已收装修款</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $payMoney['hp_paid']; ?>" readonly class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">单位：元。</div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">未收装修款</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $payMoney['hp_will_pay']; ?>" name="hp_money" readonly class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">单位：元。</div>
    </div>
</div>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>回款记录</legend>
</fieldset>
<blockquote class="layui-elem-quote">
    回款信息 总装修款<span style="color: #ff0e36;font-size: larger"><b><?php echo $payMoney['hp_money']; ?></b></span>元，已回款<span style="color: #ff0e36;font-size: larger"><b><?php echo $payMoney['hp_paid']; ?></b></span>，未回款<span style="color: #ff0e36;font-size: larger"><b><?php echo $payMoney['hp_will_pay']; ?></b></span>，回款比率<span style="color: #ff0e36;font-size: larger"><b><?php echo $payMoney['hp_paid_ratio']; ?></b></span>。
</blockquote>
<?php if($payLog == null): ?>
<div class="layui-form-mid layui-word-aux" style="margin-left: 20px;">暂无回款记录</div>
<?php else: ?>
    <div class="layui-form">
        <table class="layui-table">
        <colgroup>
            <col width="100">
            <col width="100">
            <col width="150">
            <col width="200">
            <col width="150">
            <col width="150">
            <col width="150">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>打款编号</th>
            <th>房屋编号</th>
            <th>回款时间</th>
            <th>回款金额(元)</th>
            <th>备注</th>
            <th>录入人</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($payLog) || $payLog instanceof \think\Collection || $payLog instanceof \think\Paginator): $i = 0; $__LIST__ = $payLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $log['hpl_id']; ?></td>
                <td><?php echo $log['hpl_house_code']; ?></td>
                <td><?php echo $log['hpl_addtime']; ?></td>
                <td><?php echo $log['hpl_money']; ?></td>
                <td><?php echo $log['hpl_tips']; ?></td>
                <td><?php echo $log['u_name']; ?></td>
                <td>
                    <span class="layui-btn layui-btn-xs" onclick="showDetails(<?php echo $log['hpl_id']; ?>,<?php echo $log['hpl_house_code']; ?>)"><i class="layui-icon">&#xe66f;</i>查看详情</span>
                </td>
            </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
    </div>
<?php endif; if($payMoney['hp_paid'] < $payMoney['hp_money']): ?>
<div class="layui-form-item">
    <div class="layui-input-block">
        <input type="hidden" value="<?php echo $h_b_id; ?>" id="h_id"/>
        <span class="layui-btn" id="addPayLog">添加回款记录</span>
    </div>
</div>
<?php endif; endif; ?>
</body>
</html>
<script>

    function showDetails(hl_id,house_code){
        layer.open({
            type: 2,
            title: '查看房源编号：【'+house_code+'】的回款凭证',
            shadeClose: true,
            shade: false,
            maxmin: true,
            area: ['893px', '700px'],
            content: "<?=url('house/details')?>?h_id="+hl_id
        });
    }

    layui.use(['form', 'jquery'], function(){
        var form = layui.form
            ,$ = layui.jquery;
        
        //添加回款记录
        $('#addPayLog').click(function () {
            var h_id=$('#h_id').val();
            layer.open({
                type: 2,
                title: '添加房源编号：【'+h_id+'】的回款凭证',
                shadeClose: true,
                shade: false,
                maxmin: true,
                area: ['893px', '700px'],
                content: "<?=url('house/addpaylog')?>?h_id="+h_id
            });
        });
        
        //监听提交
        form.on('submit(payBtn)', function(){
            $.ajax({
                'type':"post",
                'url':"<?=url('house/addpay')?>",
                'data':$('#payForm').serialize(),
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
        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '标题至少得2个字符啊';
                }
            }
        });
    });
</script>
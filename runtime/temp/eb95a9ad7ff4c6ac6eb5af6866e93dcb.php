<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"G:\xampp\htdocs\bbb\public/../application/market\view\house\preview.html";i:1539334086;}*/ ?>
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
<form class="layui-form" id="cusInfo" style="margin-top: 20px;">
    <blockquote class="layui-elem-quote">
        【房主信息】 姓名：<?php echo $master['hm_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;电话：<?php echo $master['hm_phone']; ?> &nbsp;&nbsp;&nbsp;&nbsp;现居地：<?php echo $master['hm_address']; ?>
        <br/>
        【客户经理】 姓名：<?php echo $manager['u_name']; ?>  &nbsp;&nbsp;&nbsp;&nbsp; 电话：<?php echo $manager['u_phone']; ?>  &nbsp;&nbsp;&nbsp;&nbsp;工作职位：<?php echo $manager['u_job']; ?>
    </blockquote>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>房源信息</legend>
    </fieldset>
    <div class="layui-form-item" style="margin-left:20px">
        <div class="layui-row">
            <div class="layui-col-md4">
                <div class="grid-demo grid-demo-bg1">
                    <div class="layui-form-item">
                        <div class="layui-form-mid layui-word-aux">房源编号: <?php echo $house['h_b_id']; ?></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md4">
                <div class="grid-demo">
                    <div class="layui-form-item">
                        <div class="layui-form-mid layui-word-aux">房源名称: <?php echo $house['h_name']; ?></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md4">
                <div class="grid-demo grid-demo-bg1">
                    <div class="layui-form-item">
                        <div class="layui-form-mid layui-word-aux">房源地址：<?php echo $house['h_address']; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-row">
            <div class="layui-col-md4">
                <div class="grid-demo grid-demo-bg1">
                    <div class="layui-form-item">
                        <div class="layui-form-mid layui-word-aux">房屋朝向：<?php echo $house['h_head']; ?></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md4">
                <div class="grid-demo">
                    <div class="layui-form-item">
                        <div class="layui-form-mid layui-word-aux">房屋面积：<?php echo $house['h_area']; ?></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md4">
                <div class="grid-demo grid-demo-bg1">
                    <div class="layui-form-item">
                        <div class="layui-form-mid layui-word-aux">附近公交：<?php echo $house['h_nearbus']; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-md4">
                <div class="grid-demo grid-demo-bg1">
                    <div class="layui-form-item">
                        <div class="layui-form-mid layui-word-aux">附近地铁：<?php echo $house['h_subway']; ?></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md4">
                <div class="grid-demo">
                    <div class="layui-form-item">
                        <div class="layui-form-mid layui-word-aux">小区名称：<?php echo $house['h_building']; ?></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md4">
                <div class="grid-demo grid-demo-bg1">
                    <div class="layui-form-item">
                        <div class="layui-form-mid layui-word-aux">签订日期：<?php echo $house['h_addtime']; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <blockquote class="layui-elem-quote">
        回款信息 总装修款<span style="color: #ff0e36;font-size: larger"><b><?php echo $payMoney['hp_money']; ?></b></span>元，已回款<span style="color: #ff0e36;font-size: larger"><b><?php echo $payMoney['hp_paid']; ?></b></span>，未回款<span style="color: #ff0e36;font-size: larger"><b><?php echo $payMoney['hp_will_pay']; ?></b></span>，回款比率<span style="color: #ff0e36;font-size: larger"><b><?php echo $payMoney['hp_paid_ratio']; ?></b></span>。
    </blockquote>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>回款记录</legend>
    </fieldset>
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
    <?php endif; ?>
</form>
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
    });
</script>
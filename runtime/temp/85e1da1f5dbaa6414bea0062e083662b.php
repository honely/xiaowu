<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"G:\xampp\htdocs\bbb\public/../application/admin\view\house\decorate.html";i:1542335354;}*/ ?>
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
        .hovers:hover{
            cursor:pointer;
            text-decoration:none !important;
        }
    </style>
</head>
<body>
<ul class="layui-timeline" style="padding-left: 50px;padding-top: 30px">
    <?php if($step != null): if(is_array($step) || $step instanceof \think\Collection || $step instanceof \think\Paginator): $i = 0; $__LIST__ = $step;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
        <li class="layui-timeline-item">
            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
            <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title"><b><?php echo $log['hds_end_statuss']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-size: smaller;color:#999 !important;"><?php echo $log['hds_change_time']; ?></span>
                </h3>
                <p>
                <ul>
                <?php if(is_array($log['decorate_log']) || $log['decorate_log'] instanceof \think\Collection || $log['decorate_log'] instanceof \think\Paginator): $i = 0; $__LIST__ = $log['decorate_log'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li>
                        <p>
                            <?php echo date("Y年m月d日 H时i分",$vo['hdl_addtime']); ?>
                            <br>日志标题：<?php echo $vo['hdl_title']; ?>
                            <br>提交人：<?php echo $vo['hdl_admin']; ?>
                            <br><a class="hovers" onclick="detail(<?php echo $vo['hdl_id']; ?>,'<?php echo date("Y年m月d日",$vo['hdl_addtime']); ?>')">查看详情</a>
                        </p>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                </p>
            </div>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
    <li class="layui-timeline-item">
        <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
        <div class="layui-timeline-content layui-text">
            <h3 class="layui-timeline-title">暂无装修记录</h3>
        </div>
    </li>
    <?php endif; ?>
</ul>
</body>
</html>
<script>
    function detail(hdl_id,hdl_addtime) {
        layui.use(['layer'], function(){
            var layer = layui.layer;
            layer.open({
                type: 2,
                title: hdl_addtime+'【日志详情】',
                shadeClose: true,
                shade: false,
                maxmin: true,
                area: ['866px', '600px'],
                content: "<?=url('house/declog')?>?hdl_id="+hdl_id
            });
        })
    }
</script>



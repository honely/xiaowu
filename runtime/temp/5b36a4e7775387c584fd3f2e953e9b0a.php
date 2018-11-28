<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\xampp\htdocs\bbb\public/../application/manager\view\allot\allocate.html";i:1543285239;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" href="__WAP__/css/icons-extra.css">
    <style>
        .mui-card .mui-control-content {
            padding: 10px;
        }
        .mui-table-cell h4{
            line-height: 23px;
        }
        .mui-table-cell h5{
            line-height: 23px;
        }
        .mui-card-link{
            color: #007aff;
        }
        .spans {
            background-color: #007aff;
            color: #ffffff;
            border: 1px solid #8f8f94;
        }
        .divs{
            width: 33.3%;
            line-height: 36px;
            float: left;
            text-align: center;
            border: 1px solid #8f8f94;
        }
        .actives{
            background-color: #ffffff;
            color: #007aff;
        }
        .allocate-top{
            padding-top:10px;
            padding-left:10px;
            padding-right:10px;
            position:fixed;
            overflow:hidden;
            z-index:3333;
            width: 100%;
            opacity:1;
        }
        .mui-icon-extra-calendar{
            color: #007aff;font-size: 24px;line-height: 40px;margin-top: 3px;
        }
        input,select,option,textarea{
            font-size: 14px;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left"  href="<?=url('allot/index')?>"></a>
    <h1 class="mui-title">分配房源</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group layui-form" id="attachForm" style="background-color: #efeff4">
            <div class="mui-card">
                <div class="mui-input-row">
                    <p style="line-height: 36px;margin-left:10px;margin-right: 10px;">
                        <b>房源编号：【<?php echo $allocate['hat_house_code']; ?>】</b>
                        <span style="float: right;"><span style="margin-left: 8px;" class="mui-badge mui-badge-primary mui-badge-inverted">未分配</span>
                    </span>
                    </p>
                </div>
                <div class="mui-input-row">
                    <label>小区名称：</label>
                    <input type="text" onkeyup="this.value=this.value.replace(/\D/g, '')" readonly <?php if(isset($allocate['h_building'])): ?> value="<?php echo $allocate['h_building']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>房屋地址：</label>
                    <input type="text" readonly <?php if(isset($allocate['h_address'])): ?> value="<?php echo $allocate['h_address']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>转交时间：</label>
                    <input type="text" readonly <?php if(isset($allocate['hat_add_time'])): ?> value="<?php echo $allocate['hat_add_time']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>转交人：</label>
                    <input type="text" readonly <?php if(isset($allocate['hat_admin'])): ?> value="<?php echo $allocate['hat_admin']; ?>" <?php endif; ?>>
                </div>
                <div class="mui-input-row">
                    <label>分配给：</label>
                    <select name="hat_assign_to" id="hat_assign_to" class="mui-btn mui-btn-block" style="width: 64%;font-size: 14px;">
                        <option value="">请选择运营专员</option>
                        <?php if(is_array($admins) || $admins instanceof \think\Collection || $admins instanceof \think\Paginator): $i = 0; $__LIST__ = $admins;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adm): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $adm['u_id']; ?>"><?php echo $adm['u_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <input id="hat_id" type="hidden" value="<?php echo $allocate['hat_id']; ?>"/>
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <textarea id="hat_assign_tips" name="hat_assign_tips" rows="5" placeholder="其他备注信息"></textarea>
                </div>
                <div class="mui-input-row">
                    <span class="mui-btn mui-btn-primary mui-btn-block" id="subBtn" style="width: 100%;">确认分配</span>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui('body').on('tap','a',function(){
        if(this.href){
            window.top.location.href=this.href;
        }
    });
</script>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    $('#subBtn').click(function () {
        var hat_assign_to=$('#hat_assign_to').val();
        var hat_assign_tips=$('#hat_assign_tips').val();
        var hat_id=$('#hat_id').val();
        if(hat_assign_to.length<=0){
            mui.alert('请选择将要分配的监理！', function() {
                $('#hat_assign_to').focus();
            });
        }else{
            $.ajax({
                type: 'POST',
                url: "<?=url('allot/assigned')?>",
                data: {'hat_assign_to':hat_assign_to,'hat_assign_tips':hat_assign_tips,'hat_id':hat_id},
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    if(data.code="1"){
                        mui.alert(data.msg, function() {
                            window.location.href="<?=url('allot/index')?>";
                        });
                    }else{
                        mui.alert(data.msg);
                    }
                }
            });
        }
    });
</script>
</body>

</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\xampp\htdocs\bbb\public/../application/manager\view\allot\allocate.html";i:1544061752;}*/ ?>
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
    <link rel="stylesheet" href="__LAY__/css/layui.css">
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
        a{
            color: #007aff;
        }
        input,select,option,textarea{
            font-size: 14px;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left"
        <?php switch($type): case "1": ?>href="<?=url('allot/index')?>"<?php break; case "2": ?>href="<?=url('allot/allocated')?>"<?php break; case "3": ?>href="<?=url('allot/all')?>"<?php break; endswitch; ?>
    ></a>
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
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: 87px;">是否接受</label>
                    <div class="layui-input-block">
                        <input type="radio" lay-filter="isaccept" name="isaccept" value="1" title="同意接受">
                        <input type="radio" lay-filter="isaccept" name="isaccept" value="2" title="拒绝转接">
                    </div>
                </div>
                <div class="agrees" style="display: none">
                    <form class="mui-input-group layui-form" id="agreeForm">
                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 87px;">分配给：</label>
                            <div class="layui-input-block">
                                <select name="hat_assign_to" id="hat_assign_to" >
                                    <option value="">请选择运营专员</option>
                                    <?php if(is_array($admins) || $admins instanceof \think\Collection || $admins instanceof \think\Paginator): $i = 0; $__LIST__ = $admins;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adm): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $adm['u_id']; ?>"><?php echo $adm['u_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 87px;">发送短信</label>
                            <div class="layui-input-block">
                                <input type="radio" lay-filter="ismsg" name="hat_is_msg" value="1" title="发送">
                                <input type="radio" lay-filter="ismsg" name="hat_is_msg" value="2" title="不发">
                                <input type="hidden" id="hat_is_msg" value="2">
                            </div>
                        </div>
                        <input id="hat_id" type="hidden" value="<?php echo $allocate['hat_id']; ?>"/>
                        <div class="mui-input-row" style="margin: 10px 5px;height: 131px;">
                            <textarea name="hat_assign_tips" id="hat_assign_tips" style="height: 131px;" rows="5" placeholder="转接备注"></textarea>
                        </div>
                        <div class="mui-input-row">
                            <span class="mui-btn mui-btn-primary mui-btn-block" id="subBtn" style="width: 100%;">确认分配</span>
                        </div>
                    </form>
                </div>
                <div class="refuse" style="display: none">
                    <form class="mui-input-group layui-form" id="refuseForm">
                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 87px;">发送短信</label>
                            <div class="layui-input-block">
                                <input type="radio" lay-filter="ismsgs" name="hat_is_msgs" value="1" title="发送">
                                <input type="radio" lay-filter="ismsgs" name="hat_is_msgs" value="2" title="不发">
                                <input type="hidden" id="ris_msg" value="2">
                            </div>
                        </div>
                        <div class="mui-input-row" style="margin: 10px 5px;height: 131px;">
                            <textarea id="hat_refuse_tips" style="height: 131px;" rows="5" placeholder="拒绝原因"></textarea>
                        </div>
                        <div class="mui-input-row">
                            <span class="mui-btn mui-btn-primary mui-btn-block" id="refBtn" style="width: 100%;">提交</span>
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__LAY__/layui.js"></script>
<script>
    layui.use(['form','jquery'], function(){
        var form = layui.form,
            $ = layui.jquery;
        form.on('radio(isaccept)', function(data){
            if(data.value==1){
                $('.agrees').show();
                $('.refuse').hide();
            }else if (data.value==2) {
                $('.agrees').hide();
                $('.refuse').show();
            }
        });
        form.on('radio(ismsg)', function(data){
            if(data.value==1){
                $('#hat_is_msg').val(1);
            }else if (data.value==2) {
                $('#hat_is_msg').val(2);
            }
        });
        form.on('radio(ismsgs)', function(data){
            if(data.value==1){
                $('#ris_msg').val(1);
            }else if (data.value==2) {
                $('#ris_msg').val(2);
            }
        });
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
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    $('#subBtn').click(function () {
        var hat_assign_to=$('#hat_assign_to').val();
        var hat_is_msg=$('#hat_is_msg').val();
        var hat_assign_tips=$('#hat_assign_tips').val();
        var hat_id=$('#hat_id').val();
        if(hat_assign_to.length<=0){
            mui.alert('请选择将要分派的运营专员！', function() {
                $('#hat_assign_to').focus();
            });
        }else{
            $.ajax({
                type: 'POST',
                url: "<?=url('allot/assigned')?>",
                data: {'hat_is_msg':hat_is_msg,'hat_assign_to':hat_assign_to,'hat_assign_tips':hat_assign_tips,'hat_id':hat_id},
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

    $('#refBtn').click(function () {
        var hat_refuse_tips=$('#hat_refuse_tips').val();
        var hat_id=$('#hat_id').val();
        var ris_msg=$('#ris_msg').val();
        $.ajax({
            type: 'POST',
            url: "<?=url('allot/refuse')?>",
            data: {'hat_refuse_tips':hat_refuse_tips,'hat_id':hat_id,'ris_msg':ris_msg},
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
    });
</script>
</body>

</html>
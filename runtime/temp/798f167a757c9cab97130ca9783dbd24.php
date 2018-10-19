<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\index.html";i:1539829883;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>小屋智能公寓事业部</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <style>
        h5 {
            margin: 5px 7px;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">添加房源</h1>
    <a class="mui-icon mui-icon-bars mui-icon-right-nav mui-pull-right" href="<?=url('index/house')?>"></a>
</header>
<div class="mui-content">
    <div class="mui-content-padded">
        <h5 class="mui-content-padded">请依次选择省市县区</h5>
        <select name="h_p_id" id="h_p_id" class="mui-btn mui-btn-block">
            <option value="">请选择省份</option>
            <?php if(is_array($prov) || $prov instanceof \think\Collection || $prov instanceof \think\Paginator): $i = 0; $__LIST__ = $prov;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $vo['p_id']; ?>"><?php echo $vo['p_name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <select name="h_c_id" id="h_c_id" class="mui-btn mui-btn-block">
            <option value="">请选择城市</option>
        </select>
        <select name="h_a_id" id="h_a_id" class="mui-btn mui-btn-block">
            <option value="">请选择县区</option>
        </select>
    </div>
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group">
            <div class="mui-input-row">
                <label>小区名称</label>
                <input type="text" id="h_building" name="h_building" placeholder="请输入小区名称">
            </div>
            <div class="mui-input-row">
                <label>房屋面积</label>
                <input type="text" id="h_area" onkeyup="this.value=this.value.replace(/\D/g, '')" name="h_area"  placeholder="请输入房屋面积，单位（㎡）">
            </div>
            <div class="mui-input-row">
                <label>房屋户型</label>
                <input type="text" id="h_house_type" name="h_house_type"  placeholder="请输入几室几厅几厨几卫">
            </div>
            <div class="mui-input-row">
                <label>房屋朝向</label>
                <input type="text" id="h_head" name="h_head" placeholder="请输入房屋朝向">
            </div>
            <div class="mui-input-row">
                <label>房源地址</label>
                <input type="text" id="h_address" name="h_address" placeholder="请输入房源地址精确到门牌号" >
            </div>
            <span style="margin-top: 5px;" id="subBtn" class="mui-btn mui-btn-primary mui-btn-block">确认添加</span>
        </form>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    $('#h_p_id').change(function () {
        var p_id=$('#h_p_id').val();
        $.ajax({
            type: 'POST',
            url: "<?=url('common/getCityName')?>?p_id="+p_id,
            data: {p_id:p_id},
            dataType:  'json',
            success: function(data){
                var code=data.data;
                $("#h_c_id").html("<option value=''>请选择城市</option>");
                $("#h_a_id").html("<option value=''>请选择县区</option>");
                $.each(code, function(i, val) {
                    var option1 = $("<option>").val(val.c_id).text(val.c_name);
                    $("#h_c_id").append(option1);
                });
            }
        });
    });
    $('#h_c_id').change(function () {
        var c_id=$('#h_c_id').val();
        $.ajax({
            type: 'POST',
            url: "<?=url('common/getAreaName')?>?c_id="+c_id,
            data: {c_id:c_id},
            dataType:  'json',
            success: function(data){
                var code=data.data;
                $("#h_a_id").html("<option value=''>请选择县区</option>");
                $.each(code, function(i, val) {
                    var option1 = $("<option>").val(val.area_id).text(val.area_name);
                    $("#h_a_id").append(option1);
                });
            }
        });
    });
    $('#subBtn').click(function () {
        var p_id=$('#h_p_id').val();
        var c_id=$('#h_c_id').val();
        var a_id=$('#h_a_id').val();
        var h_house_type=$('#h_house_type').val();
        var h_building=$('#h_building').val();
        var h_area=$('#h_area').val();
        var h_head=$('#h_head').val();
        var h_address=$('#h_address').val();

        if(p_id.length<=0){
            mui.alert('请选择省份！', function() {
                $('#h_p_id').focus();
            });
        }else{
            if(c_id.length<=0){
                mui.alert('请选择城市！', function() {
                    $('#h_c_id').focus();
                });
            }else{
                if(a_id.length<=0){
                    mui.alert('请选择县区！', function() {
                        $('#h_a_id').focus();
                    });
                }else{
                        if(
                            h_building<=0
                            || h_area.length<=0
                            || h_head.length<=0
                            || h_house_type.length<=0
                            || h_address<=0
                        ){
                            mui.alert('请确定以上内容填写完成后提交！', function() {
                            });
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: "<?=url('index/index')?>",
                                data: {'h_p_id':p_id,'h_c_id':c_id,'h_a_id':a_id,'h_house_type':h_house_type,'h_building':h_building,'h_area':h_area,'h_head':h_head,'h_address':h_address},
                                dataType:  'json',
                                success: function(data){
                                    if(data.code="1"){
                                        mui.alert(data.msg, function() {
                                            window.location.href="<?=url('index/house')?>";
                                        });
                                    }else{
                                        mui.alert(data.msg);
                                    }
                                }
                            });
                    }
                }
            }
        }
    });
</script>
</body>

</html>
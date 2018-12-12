<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\bbb\public/../application/operation\view\index\addrent.html";i:1543298297;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>添加出租信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="__WAP__/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="__WAP__/css/app.css" />
    <link rel="stylesheet" type="text/css" href="__WAP__/css/mui.picker.min.css" />
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <style>
        h5 {
            margin: 5px 7px;
        }
        .color-red{
            color: red;
        }
        .item_img{
            width: 23%;
            float: left;
            height: 116px;
            overflow: hidden;
        }
        .img{
            width:100%; height: 92px
        }
        a{
            color: #007aff;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="<?=url('index/rentlog')?>?h_id=<?php echo $h_id; ?>"></a>
    <h1 class="mui-title">添加出租信息</h1>
</header>
<div class="mui-content">
    <div class="mui-card">
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p><b>房源编号：【<?php echo $h_id; ?>】</b>
                </p>
            </div>
        </div>
    </div>
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group layui-form" id="attachForm" style="background-color: #efeff4">
            <div class="mui-card">
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>租客姓名：</label>
                    <input type="text" class="layui-input" lay-verify="required" id="hr_name" name="hr_name">
                    <input type="text" name="hrl_house_code" value="<?php echo $h_id; ?>">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>联系方式：</label>
                    <input type="text" class="layui-input" lay-verify="required|phone" onkeyup="this.value=this.value.replace(/\D/g, '')"  id="hr_phone" name="hr_phone" >
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>租房单价：</label>
                    <input type="text" class="layui-input" lay-verify="required" onkeyup="clearNoNum(this)"  id="hrl_rent_price" name="hrl_rent_price">
                </div>
                <div class="mui-content-padded">
                    <h5 class="mui-content-padded"><span class="color-red">*</span>出租渠道</h5>
                    <select name="hrl_rent_channel" id="hrl_rent_channel" class="mui-btn mui-btn-block">
                        <?php if(is_array($rentChannel) || $rentChannel instanceof \think\Collection || $rentChannel instanceof \think\Paginator): $i = 0; $__LIST__ = $rentChannel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$channel): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $channel['hrc_id']; ?>"><?php echo $channel['hrc_title']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="mui-content-padded">
                    <h5 class="mui-content-padded"><span class="color-red">*</span>出租类型</h5>
                    <select name="hrl_rent_type" id="hrl_rent_type" class="mui-btn mui-btn-block">
                        <option value="2">月租</option>
                        <option value="1">日租</option>
                    </select>
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>租房押金：</label>
                    <input type="text" class="layui-input" onkeyup="clearNoNum(this)" lay-verify="required"  id="hrl_foregift" name="hrl_foregift">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>支付方式：</label>
                    <input type="text" class="layui-input"  lay-verify="required"  id="hrl_pay_type" name="hrl_pay_type">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>电表底数：</label>
                    <input type="text" class="layui-input" onkeyup="clearNoNum(this)" lay-verify="required"  id="hrl_elect_start" name="hrl_elect_start">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>水表底数：</label>
                    <input type="text" class="layui-input" onkeyup="clearNoNum(this)" lay-verify="required" id="hrl_water_start" name="hrl_water_start" >
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>燃气底数：</label>
                    <input type="text" class="layui-input" onkeyup="clearNoNum(this)" lay-verify="required" id="hrl_air_start" name="hrl_air_start" >
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>合同编号：</label>
                    <input type="text" class="layui-input" lay-verify="required" id="hrl_contact_code" name="hrl_contact_code">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>合同扫描件</label>
                    <span id="upload" class="mui-btn mui-btn-primary">上传</span>
                    <input type="hidden" id="img" lay-verify="imgReg" value=""/>
                </div>
                <div id="imgPre" style="overflow: hidden">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>租房日期：</label>
                    <input type="text" readonly class="layui-input" lay-verify="required" id="hrl_rent_time" name="hrl_rent_time">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>到期时间：</label>
                    <input type="text" readonly class="layui-input" lay-verify="required" id="hrl_dead_time" name="hrl_dead_time">
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <textarea id="textarea" name="hrl_remark" rows="5" placeholder="备注信息"></textarea>
                </div>
            </div>
            <div id='result' class="ui-alert"></div>
            <span style="margin-top: 5px;" id="subBtn" lay-submit lay-filter="saveInfo" class="mui-btn mui-btn-primary mui-btn-block">保存信息</span>
        </form>
    </div>
</div>
<script src="__WEB__/js/jquery-1.10.2.min.js"></script>
<script src="__WAP__/js/mui.min.js"></script>
<script src="__LAY__/layui.js"></script>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    function clearNoNum(obj){
        if(obj.value !=''&& obj.value.substr(0,1) == '.'){
            obj.value="";
        }
        obj.value = obj.value.replace(/^0*(0\.|[1-9])/, '$1');
        obj.value = obj.value.replace(/[^\d.]/g,"");
        obj.value = obj.value.replace(/\.{2,}/g,".");
        obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
        obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3');
        if(obj.value.indexOf(".")< 0 && obj.value !=""){
            if(obj.value.substr(0,1) == '0' && obj.value.length == 2){
                obj.value= obj.value.substr(1,obj.value.length);
            }
        }
    }
    layui.use( ['form','jquery','upload','laydate'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,laydate = layui.laydate
            ,$ = layui.jquery;
        laydate.render({
            elem: '#hrl_rent_time'
        });
        laydate.render({
            elem: '#hrl_dead_time'
        });
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
            ,imgReg:function (value) {
                if(value.length <= 0){
                    return '请上传合同扫描件！';
                }
            }
        });
        //监听提交
        form.on('submit(saveInfo)', function(){
            $.ajax({
                type: 'POST',
                url: "<?=url('index/addrent')?>?h_id=<?php echo $h_id; ?>",
                data: $('#attachForm').serialize(),
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    if(data.code="1"){
                        mui.alert(data.msg, function() {
                            window.location.href="<?=url('index/rentlog')?>?h_id=<?php echo $h_id; ?>";
                        });
                    }else{
                        mui.alert(data.msg);
                    }
                }
            });
        });
        //图片上传
        upload.render({
            elem: '#upload'
            ,url: '<?php echo url("common/upload"); ?>'
            ,size:5000
            ,ext: 'jpg|png|gif'
            ,accept: 'images'
            ,before: function(input){
                loading = layer.load(2, {
                    shade: [0.2,'#000']
                });
            }
            ,done: function(res){
                console.log(res);
                $('#img').val(res.path);
                $('#imgPre').append('' +
                    '<li class="item_img"><div class="operate"><i  class="close layui-icon"></i></div><img src="__PUBLIC__/' + res.path + '" class="img" ><input type="hidden" name="hrl_contact_img[]" value="' + res.path + '" /></li>');
                layer.close(loading);
                layer.msg(res.msg, {icon: 1, time: 1000});
            }
            ,error: function(res){
                layer.msg(res.msg, {icon: 2, time: 1000});
            }
        });
    });
    //点击多图上传的X,删除当前的图片
    $("body").on("click",".close",function(){
        $(this).closest("li").remove();
    });
</script>
</body>

</html>
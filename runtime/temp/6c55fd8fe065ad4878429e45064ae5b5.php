<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"G:\xampp\htdocs\bbb\public/../application/marketm\view\index\attachs.html";i:1543048601;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>房屋附属</title>
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
        .mui-btn-block {
            font-size: 14px;
            padding: 0 0 0 6px;
        }
        .mui-btn-primary{
            padding: 10px 0 10px;
        }
        label,input,textarea{
            font-size: 14px;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">房屋附属</h1>
</header>
<div class="mui-content">
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
    <div class="mui-content-padded" style="margin: 5px;">
        <form class="mui-input-group" id="attachForm" style="background-color: #efeff4">
            <div class="mui-card">
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>合同编号：</label>
                    <input type="text" <?php if(isset($attach['ha_contact_code'])): ?> value="<?php echo $attach['ha_contact_code']; ?>" <?php endif; ?> class="layui-input" lay-verify="required" id="ha_contact_code" name="ha_contact_code">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>合同扫描件</label>
                    <span id="upload" class="mui-btn mui-btn-primary">上传</span>
                    <input type="hidden" id="img" lay-verify="imgReg" value="123"/>
                </div>
                <div id="imgPre">
                <?php if(isset($attach['ha_contact_img'])): if(is_array($attach['ha_contact_img']) || $attach['ha_contact_img'] instanceof \think\Collection || $attach['ha_contact_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $attach['ha_contact_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                    <li class="item_img">
                        <div class="operate">
                            <i  class="close layui-icon"></i>
                        </div>
                        <img src="__PUBLIC__/<?php echo $items; ?>" class="img" >
                        <input type="hidden" name="ha_contact_img[]" value="<?php echo $items; ?>" />
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>租金(每月)：</label>
                    <input type="text" lay-verify="required" <?php if(isset($attach['ha_rent_price'])): ?> value="<?php echo $attach['ha_rent_price']; ?>" <?php endif; ?>  class="layui-input" id="ha_rent_price" name="ha_rent_price">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>租期（月）：</label>
                    <input type="text" lay-verify="required" <?php if(isset($attach['ha_rent_time'])): ?> value="<?php echo $attach['ha_rent_time']; ?>" <?php endif; ?>  class="layui-input" id="ha_rent_time" name="ha_rent_time">
                </div>
                <div class="mui-input-row">
                    <label><span class="color-red">*</span>到期时间：</label>
                    <input type="text" lay-verify="required" readonly <?php if(isset($attach['ha_deadline'])): ?> value="<?php echo $attach['ha_deadline']; ?>" <?php endif; ?>  class="layui-input" id="ha_deadline" name="ha_deadline">
                </div>
                <div class="mui-input-row">
                    <label>装修许可时间：</label>
                    <input type="text" readonly <?php if(isset($attach['ha_decorate_permit'])): ?> value="<?php echo $attach['ha_decorate_permit']; ?>" <?php endif; ?> class="layui-input" id="ha_decorate_permit" name="ha_decorate_permit">
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>钥匙：</label>
                    <input type="text" <?php if(isset($attach['ha_keys'])): ?> value="<?php echo $attach['ha_keys']; ?>" <?php endif; ?> class="layui-input" id="ha_keys" name="ha_keys">
                    <input type="text" name="ha_house_code" value="<?php echo $h_b_id; ?>">
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text" <?php if(isset($attach['ha_keys_remarks'])): ?> value="<?php echo $attach['ha_keys_remarks']; ?>" <?php endif; ?> id="ha_keys_remarks" name="ha_keys_remarks" >
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>门禁：</label>
                    <input type="text" <?php if(isset($attach['ha_door_ban'])): ?> value="<?php echo $attach['ha_door_ban']; ?>" <?php endif; ?>  class="layui-input" id="ha_door_ban" name="ha_door_ban">
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text" <?php if(isset($attach['ha_door_ban_remarks'])): ?> value="<?php echo $attach['ha_door_ban_remarks']; ?>" <?php endif; ?> id="ha_door_ban_remarks" name="ha_door_ban_remarks" >
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>电卡：</label>
                    <input type="text" <?php if(isset($attach['ha_elect_card'])): ?> value="<?php echo $attach['ha_elect_card']; ?>" <?php endif; ?> id="ha_elect_card" class="layui-input" name="ha_elect_card">
                </div>
                <div class="mui-input-row">
                    <label>电表底数：</label>
                    <input type="text" <?php if(isset($attach['ha_elect_start'])): ?> value="<?php echo $attach['ha_elect_start']; ?>" <?php endif; ?> class="layui-input" id="ha_elect_start" name="ha_elect_start">
                </div>
                <div class="mui-input-row">
                    <label>电费单价：</label>
                    <input type="text" <?php if(isset($attach['ha_elect_price'])): ?> value="<?php echo $attach['ha_elect_price']; ?>" <?php endif; ?> id="ha_elect_price" class="layui-input" name="ha_elect_price" >
                </div>
                <div class="mui-content-padded">
                    <select name="ha_elect_type" id="ha_elect_type" class="mui-btn mui-btn-block">
                        <option value="">请选择电费缴纳方式</option>
                        <?php if(is_array($electType) || $electType instanceof \think\Collection || $electType instanceof \think\Paginator): $i = 0; $__LIST__ = $electType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $key; ?>">缴纳方式：<?php echo $items; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text"  <?php if(isset($attach['ha_elect_card_tips'])): ?> value="<?php echo $attach['ha_elect_card_tips']; ?>" <?php endif; ?>  id="ha_elect_card_tips" name="ha_elect_card_tips" >
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>水卡：</label>
                    <input type="text"  <?php if(isset($attach['ha_water_card'])): ?> value="<?php echo $attach['ha_water_card']; ?>" <?php endif; ?>  class="layui-input" id="ha_water_card" name="ha_water_card">
                </div>
                <div class="mui-input-row">
                    <label>水表底数：</label>
                    <input type="text" <?php if(isset($attach['ha_water_start'])): ?> value="<?php echo $attach['ha_water_start']; ?>" <?php endif; ?> class="layui-input" id="ha_water_start" name="ha_water_start">
                </div>
                <div class="mui-input-row">
                    <label>水费单价：</label>
                    <input type="text" <?php if(isset($attach['ha_water_price'])): ?> value="<?php echo $attach['ha_water_price']; ?>" <?php endif; ?> class="layui-input" id="ha_water_price" name="ha_water_price" >
                </div>
                <div class="mui-input-row">
                    <label>缴费方式：</label>
                    <input type="text" <?php if(isset($attach['ha_water_type'])): ?> value="<?php echo $attach['ha_water_type']; ?>" <?php endif; ?> class="layui-input" id="ha_water_type" name="ha_water_type" >
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text"  <?php if(isset($attach['ha_water_card_tips'])): ?> value="<?php echo $attach['ha_water_card_tips']; ?>" <?php endif; ?>  id="ha_water_card_tips" name="ha_water_card_tips" >
                </div>
            </div>

            <div class="mui-card">
                <div class="mui-content-padded">
                    <select name="ha_warm_type" id="ha_warm_type" class="mui-btn mui-btn-block">
                        <option value="">请选择供暖方式</option>
                        <?php if(is_array($warmType) || $warmType instanceof \think\Collection || $warmType instanceof \think\Paginator): $i = 0; $__LIST__ = $warmType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $key; ?>">供暖方式：<?php echo $items; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="mui-input-row">
                    <label>暖气单价：</label>
                    <input type="text" <?php if(isset($attach['ha_warm_price'])): ?> onkeyup="this.value=this.value.replace(/\D/g, '')" value="<?php echo $attach['ha_warm_price']; ?>" <?php endif; ?>  class="layui-input" id="ha_warm_price" name="ha_warm_price" >
                </div>
                <div class="mui-input-row">
                    <label>缴费方式：</label>
                    <input type="text" <?php if(isset($attach['ha_warm_tips'])): ?> value="<?php echo $attach['ha_warm_tips']; ?>" <?php endif; ?>  class="layui-input" id="ha_warm_tips" name="ha_warm_tips" >
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>猫眼：</label>
                    <input type="text" <?php if(isset($attach['ha_cat_eye'])): ?> value="<?php echo $attach['ha_cat_eye']; ?>" <?php endif; ?> id="ha_cat_eye" name="ha_cat_eye">
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text" <?php if(isset($attach['ha_cat_eye_tips'])): ?> value="<?php echo $attach['ha_cat_eye_tips']; ?>" <?php endif; ?> id="ha_cat_eye_tips" name="ha_cat_eye_tips" >
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>可视电话：</label>
                    <input type="text" <?php if(isset($attach['ha_view_phone'])): ?> value="<?php echo $attach['ha_view_phone']; ?>" <?php endif; ?> class="layui-input" id="ha_view_phone" name="ha_view_phone">
                </div>
                <div class="mui-input-row">
                    <label>备注：</label>
                    <input type="text"  <?php if(isset($attach['ha_view_phone_tips'])): ?> value="<?php echo $attach['ha_view_phone_tips']; ?>" <?php endif; ?>  id="ha_view_phone_tips" name="ha_view_phone_tips" >
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>燃气底数：</label>
                    <input type="text"  <?php if(isset($attach['ha_air_start'])): ?> value="<?php echo $attach['ha_air_start']; ?>" <?php endif; ?>   class="layui-input" id="ha_air_start" name="ha_air_start">
                </div>
                <div class="mui-input-row">
                    <label>燃气备注：</label>
                    <input type="text"  <?php if(isset($attach['ha_air_tips'])): ?> value="<?php echo $attach['ha_air_tips']; ?>" <?php endif; ?>  id="ha_air_tips" name="ha_air_tips">
                </div>
            </div>
            <div class="mui-card">
                <div class="mui-input-row">
                    <label>车位情况：</label>
                    <input type="text"   <?php if(isset($attach['ha_car_park'])): ?> value="<?php echo $attach['ha_car_park']; ?>" <?php endif; ?>  class="layui-input" id="ha_car_park" name="ha_car_park">
                </div>
                <div class="mui-input-row">
                    <label>物业电话：</label>
                    <input type="text" <?php if(isset($attach['ha_wuye_phone'])): ?> value="<?php echo $attach['ha_wuye_phone']; ?>" <?php endif; ?>  class="layui-input" id="ha_wuye_phone" name="ha_wuye_phone">
                </div>
                <div class="mui-input-row">
                    <label>物业费用：</label>
                    <input type="text" <?php if(isset($attach['ha_wuye_fee'])): ?> onkeyup="this.value=this.value.replace(/\D/g, '')" value="<?php echo $attach['ha_wuye_fee']; ?>" <?php endif; ?>  class="layui-input" id="ha_wuye_fee" name="ha_wuye_fee">
                </div>
                <div class="mui-content-padded">
                    <select name="ha_wuye_fee_type" id="ha_wuye_fee_type" class="mui-btn mui-btn-block">
                        <option value="">请选择物业费类型</option>
                        <?php if(is_array($wuyeFeeType) || $wuyeFeeType instanceof \think\Collection || $wuyeFeeType instanceof \think\Paginator): $i = 0; $__LIST__ = $wuyeFeeType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $key; ?>">物业费类型：<?php echo $items; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>

            <div class="mui-card">
                <div class="mui-input-row" style="margin: 10px 5px;">
                    <textarea id="textarea" name="ha_remarks" rows="5" placeholder="其他备注信息"><?php if(isset($attach['ha_remarks'])): ?><?php echo $attach['ha_remarks']; endif; ?></textarea>
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

    layui.use( ['form','jquery','upload','laydate'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,laydate = layui.laydate
            ,$ = layui.jquery;
        laydate.render({
            elem: '#ha_deadline'
        });
        laydate.render({
            elem: '#ha_decorate_permit'
        });
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
            ,imgReg:function (value) {
                if(value.length <= 0){
                    return '请上传打款凭证！';
                }
            }
        });
        //监听提交
        form.on('submit(saveInfo)', function(){
            var ha_contact_code=$('#ha_contact_code').val();
            var img=$('#img').val();
            var ha_rent_price=$('#ha_rent_price').val();
            var ha_rent_time=$('#ha_rent_time').val();
            var ha_deadline=$('#ha_deadline').val();
            var ha_decorate_permit=$('#ha_decorate_permit').val();
            if(
                ha_contact_code<=0
                || img.length<=0
                || ha_rent_price.length<=0
                || ha_rent_time.length<=0
                || ha_deadline<=0
                || ha_decorate_permit<=0
            ) {
                mui.alert('请确定以上必填内容填写完成后提交！', function () {
                });
            }else{
                $.ajax({
                    type: 'POST',
                    url: "<?=url('index/addattach')?>?h_id=<?php echo $h_b_id; ?>",
                    data: $('#attachForm').serialize(),
                    dataType:  'json',
                    success: function(data){
                        console.log(data);
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
        });
        //图片上传
        upload.render({
            elem: '#upload'
            ,url: '<?php echo url("common/upload"); ?>'
            ,size:5000 //限制文件大小，单位 KB
            ,ext: 'jpg|png|gif'
            ,accept: 'images' //限制文件大小，单位 KB
            ,before: function(input){
                loading = layer.load(2, {
                    shade: [0.2,'#000']
                });
            }
            ,done: function(res){
                console.log(res);
                $('#img').val(res.path);
                $('#imgPre').append('' +
                    '<li class="item_img"><div class="operate"><i  class="close layui-icon"></i></div><img src="__PUBLIC__/' + res.path + '" class="img" ><input type="hidden" name="ha_contact_img[]" value="' + res.path + '" /></li>');
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
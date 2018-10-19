<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\bbb\public/../application/market\view\house\attachment.html";i:1539324124;}*/ ?>
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
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">钥匙</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_keys" <?php if(isset($attach['ha_keys'])): ?> value="<?php echo $attach['ha_keys']; ?>" <?php endif; ?> lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">门禁</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_door_ban" <?php if(isset($attach['ha_door_ban'])): ?> value="<?php echo $attach['ha_door_ban']; ?>" <?php endif; ?> lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">水费</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_water" <?php if(isset($attach['ha_water'])): ?> value="<?php echo $attach['ha_water']; ?>" <?php endif; ?> lay-verify="required"  autocomplete="off" class="layui-input">
                <input type="hidden" name="ha_house_code" value="<?php echo $h_id; ?>"/>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">水卡</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_water_card" <?php if(isset($attach['ha_water_card'])): ?> value="<?php echo $attach['ha_water_card']; ?>" <?php endif; ?>  lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">电费</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_elect" <?php if(isset($attach['ha_elect'])): ?> value="<?php echo $attach['ha_elect']; ?>" <?php endif; ?> lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">电卡</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_elect_card" <?php if(isset($attach['ha_elect_card'])): ?> value="<?php echo $attach['ha_elect_card']; ?>" <?php endif; ?>  lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">燃气费</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_air" <?php if(isset($attach['ha_air'])): ?> value="<?php echo $attach['ha_air']; ?>" <?php endif; ?> lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">气卡</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_air_card" <?php if(isset($attach['ha_air_card'])): ?> value="<?php echo $attach['ha_air_card']; ?>" <?php endif; ?>  lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">暖气</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_warm" <?php if(isset($attach['ha_warm'])): ?> value="<?php echo $attach['ha_warm']; ?>" <?php endif; ?> lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item one-pan">
        <label class="layui-form-label"><span style="color: red;">*</span>租赁合同</label>
        <div <?php if(isset($attach['ha_contact_img'])): else: ?>class="layui-upload-drag" id="uploadLogo"<?php endif; ?>   style="display:inline-block;">
            <image id="logoPre"
               <?php if(isset($attach['ha_contact_img'])): ?>
                src="__PUBLIC__<?php echo $attach['ha_contact_img']; ?>"
                class="logoPre"
                <?php endif; ?>
            >
                <input type="hidden" lay-verify="imgReg" <?php if(isset($attach['ha_contact_img'])): ?> value="<?php echo $attach['ha_contact_img']; ?>" <?php else: ?> value="" <?php endif; ?>  name="ha_contact_img" id="ha_contact_img"/>
            </image>
            <?php if(isset($attach['ha_contact_img'])): else: ?>
            <div id="display">
                <i class="layui-icon"></i>
                <p>请点击此处上传封面图片</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">到期时间</label>
            <div class="layui-input-inline">
                <input type="text" name="ha_deadline" id="ha_deadline" <?php if(isset($attach['ha_deadline'])): ?> value="<?php echo $attach['ha_deadline']; ?>" <?php endif; ?> lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">其他附属</label>
        <div class="layui-input-block">
            <textarea name="ha_remarks" class="layui-textarea"><?php if(isset($attach['ha_remarks'])): ?> <?php echo $attach['ha_remarks']; endif; ?></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">录入人</label>
            <div class="layui-input-inline">
                <input type="text" <?php if(isset($attach['ha_user'])): ?> value="<?php echo $attach['ha_user']; ?>"<?php endif; ?> readonly class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">录入时间</label>
            <div class="layui-input-inline">
                <input type="text" <?php if(isset($attach['ha_addtime'])): ?> value="<?php echo $attach['ha_addtime']; ?>"<?php endif; ?> readonly class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <span class="layui-btn" lay-submit="" lay-filter="editCus">保存</span>
        </div>
    </div>
</form>
</html>
<script>
    layui.use(['form', 'jquery','laydate','upload'], function(){
        var form = layui.form
            ,laydate = layui.laydate
            ,upload = layui.upload
            ,$ = layui.jquery;
        //常规用法
        laydate.render({
            elem: '#ha_deadline',
            min: 0
        });
        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '标题至少得2个字符啊';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']

        });
        //图片上传
        upload.render({
            elem: '#uploadLogo'
            ,url: '<?php echo url("common/upload"); ?>'
            ,size:600 //限制文件大小，单位 KB
            ,ext: 'jpg|png|gif'
            ,accept: 'images' //限制文件大小，单位 KB
            ,before: function(input){
                loading = layer.load(2, {
                    shade: [0.2,'#000']
                });
            }
            ,done: function(res){
                $('#logoPre').removeAttr('src');
                $('#ha_contact_img').val('');
                console.log(res);
                layer.close(loading);
                $('#ha_contact_img').val(res.path);
                $('#uploadLogo').removeClass('layui-upload-drag');
                $('#logoPre').css('width','216px');
                $('#logoPre').css('height','150px');
                $('#logoPre').attr('src',"__PUBLIC__"+res.path);
                $('#display').hide();
                layer.msg(res.msg, {icon: 1, time: 1000});
            }
            ,error: function(res){
                layer.msg(res.msg, {icon: 2, time: 1000});
            }
        });
        //ajax提交表单数据
        form.on('submit(editCus)', function(){
            $.ajax({
                'type':"post",
                'url':"<?=url('house/attachment')?>?h_id=<?php echo $h_id; ?>",
                'data':$("#cusInfo").serialize(),
                'success':function (result) {
                    if(result.code == '1'){
                        layer.alert(result.msg,function () {
                            var index=parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                            window.parent.location.reload();
                        });
                    }else{
                        console.log(result);
                    }
                },
                'error':function (error) {
                    console.log(error);
                }
            })
        });
    });
</script>
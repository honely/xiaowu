<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"G:\xampp\htdocs\bbb\public/../application/market\view\house\master.html";i:1539333343;}*/ ?>
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
<form class="layui-form" action="" id="cusInfo" style="margin-top: 20px;" method="post">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">户主姓名</label>
            <div class="layui-input-inline">
                <input type="text" name="hm_name" <?php if(isset($master['hm_name'])): ?> value="<?php echo $master['hm_name']; ?>" <?php endif; ?> lay-verify="required"  autocomplete="off" placeholder="请输入户主姓名" class="layui-input">
                <input type="hidden" name="hm_house_code" id="h_b_id" value="<?php echo $h_b_id; ?>"/>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">联系方式</label>
            <div class="layui-input-inline">
                <input type="text" name="hm_phone" <?php if(isset($master['hm_phone'])): ?> value="<?php echo $master['hm_phone']; ?>" <?php endif; ?>  lay-verify="required|phone" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-block">
            <label class="layui-form-label">现居地址</label>
            <div class="layui-input-block">
                <input type="tel" name="hm_address" <?php if(isset($master['hm_address'])): ?> value="<?php echo $master['hm_address']; ?>" <?php endif; ?> autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">客户备注</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入客户备注" name="hm_remarks" class="layui-textarea"><?php if(isset($master['hm_address'])): ?> <?php echo $master['hm_address']; endif; ?></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">录入时间</label>
            <div class="layui-input-inline">
                <input type="text" <?php if(isset($master['hm_addtime'])): ?> value="<?php echo $master['hm_addtime']; ?>"<?php endif; ?> readonly class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">录入人</label>
            <div class="layui-input-inline">
                <input type="text" <?php if(isset($master['hm_admin'])): ?> value="<?php echo $master['hm_admin']; ?>"<?php endif; ?> readonly class="layui-input">
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
    layui.use(['form', 'jquery'], function(){
        var form = layui.form
            ,$ = layui.jquery;
        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '标题至少得2个字符啊';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']

        });
        //ajax提交表单数据
        form.on('submit(editCus)', function(data){
            $.ajax({
                'type':"post",
                'url':"<?=url('house/master')?>?h_id=<?php echo $h_b_id; ?>",
                'data':$("#cusInfo").serialize(),
                'success':function (result) {
                    if(result.code == '1'){
                        layer.alert(result.msg,function () {
                            var index=parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                            window.parent.location.reload();
                        });

                    }
                },
                'error':function (error) {
                    console.log(error);
                }
            })
        });
    });
</script>
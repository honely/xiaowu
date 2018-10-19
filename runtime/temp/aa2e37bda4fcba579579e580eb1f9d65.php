<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\xampp\htdocs\bbb\public/../application/market\view\house\addpaylog.html";i:1539313380;}*/ ?>
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
        .one-pan{
            position: relative;
        }
        .one{
            position: absolute;
            left:300px;
            top:0;
        }
    </style>
</head>
<form class="layui-form" action="" id="cusInfo" style="margin-top: 20px;">
    <blockquote class="layui-elem-quote">
        注意：房屋编号【<?php echo $pays['hp_house_code']; ?>】总装修款<b><?php echo $pays['hp_money']; ?></b>元，剩下余款<span style="color: #ff0e36;font-size: larger"><b><?php echo $pays['hp_will_pay']; ?></b></span>元,已回款<span style="color: #ff0e36;font-size: larger"><b><?php echo $pays['hp_paid_ratio']; ?></b></span>。
    </blockquote>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label"><span style="color: red;">*</span>回款金额</label>
            <div class="layui-input-inline">
                <input type="text" name="hpl_money" id="hpl_money" onblur="checkVals()" onkeyup="this.value=this.value.replace(/\D/g, '')" lay-verify="required" placeholder="请输入回款金额" class="layui-input">
                <input type="hidden" value="<?php echo $h_id; ?>" name="hpl_house_code"/>
            </div>
            <div class="layui-form-mid layui-word-aux" >单位：元。</div>
            <div class="layui-form-mid layui-word-aux" id="tips" style="color: red !important;" ></div>
        </div>
    </div>
    <div class="layui-form-item one-pan">
        <label class="layui-form-label"><span style="color: red;">*</span>打款凭证</label>
        <div class="layui-upload-drag" id="uploadLogo" style="display:inline-block;">
            <image id="logoPre">
                <input type="hidden" lay-verify="imgReg"  name="hpl_img" id="hpl_img" value=""/>
            </image>
            <div id="display">
                <i class="layui-icon"></i>
                <p>请点击此处上传打款凭证</p>
            </div>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">打款备注</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入内容" name="hpl_tips" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <span class="layui-btn" lay-submit="" lay-filter="editCus">添加</span>
        </div>
    </div>
</form>
</html>
<script>
    function checkVals(){
        var hpl_money=$('#hpl_money').val();
        var will_pay=<?php echo $pays['hp_will_pay']; ?>;
        if(hpl_money>will_pay){
            $('#hpl_money').focus();
            $('#tips').html('您输入的金额已超过余额！');
        }
    }
    layui.use(['form', 'jquery','upload'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,$ = layui.jquery;
        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '标题至少得2个字符啊';
                }
            }
            ,imgReg:function (value) {
                if(value.length <= 0){
                    return '请上传打款凭证！';
                }
            }
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
                $('#hpl_img').val('');
                console.log(res);
                layer.close(loading);
                $('#hpl_img').val(res.path);
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
        form.on('submit(editCus)', function(data){
            $.ajax({
                'type':"post",
                'url':"<?=url('house/addpaylogpro')?>",
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
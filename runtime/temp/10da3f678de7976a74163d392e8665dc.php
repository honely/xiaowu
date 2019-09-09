<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\resetpwd.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
    <title>大城小屋后台管理系统</title>
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <script src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
    <script src="__LAY__/layui.js"></script>
	<style>
		.layui-body{
			left:0!important
		}
	</style>
</head>
<body class="layui-layout-body">

<div class="layui-body">
    <fieldset class="layui-elem-field layui-field-title" style="margin: 20px 30px 20px 20px;">
        <legend>密码修改</legend>
    </fieldset>
    <form class="layui-form bform" id="reform" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" class="layui-input" name="ad_id" value="<?php echo $admin_id; ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">原密码</label>
            <div class="layui-input-inline">
                <input type="password" name="oldPwd" id="oldPwd" lay-verify="require|pass" placeholder="请输入原密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新密码</label>
            <div class="layui-input-inline">
                <input type="password" name="newPwd" id="newPwd" lay-verify="require|pass" placeholder="请输入新密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">重复新密码</label>
            <div class="layui-input-inline">
                <input type="password" name="newPwd2" id="newPwd2" lay-verify="require|pass" placeholder="请重复新密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <span class="layui-btn" onclick="resetPwd(this)" id="sub">确认修改</span>
            </div>
        </div>
    </form>
</div>
<script>
    layui.use(['element','jquery','layer'], function(){
        var element = layui.element,
            $ = layui.jquery,
            layer = layui.layer;
    });
    function resetPwd(e) {
        $.ajax({
            'type':"post",
            'url':"<?=url('index/resetpass')?>",
            'data':$("#reform").serialize(),
            'success':function (result) {
                if(result.code < 1){
                    layer.msg(result.msg);
                }else {
                    layer.msg(result.msg);
                    layer.open({
                        title: '信息'
                        ,content: result.msg
                        ,yes: function(index, layero){
                            layer.close(index);
                            window.parent.location.reload();
                        }
                        ,cancel:function (index, layero) {
                            layer.close(index);
                            window.parent.location.reload();
                        }
                    });
                }
            },
            'error':function () {
                console.log('error');
            }
        })
    }
</script>
</div>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>
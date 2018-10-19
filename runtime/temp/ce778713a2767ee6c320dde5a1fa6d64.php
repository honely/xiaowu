<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"G:\xampp\htdocs\bbb\public/../application/market\view\index\welcome.html";i:1539075777;s:71:"G:\xampp\htdocs\bbb\public/../application/market\view\common\toper.html";i:1539075681;s:72:"G:\xampp\htdocs\bbb\public/../application/market\view\common\footer.html";i:1539074576;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>大城小屋平台管理系统-事业部端</title>
    <link rel="stylesheet" href="__LAY__/css/layui.css">

<div class="layui-body">
    <fieldset class="layui-elem-field layui-field-title" >
        <legend>网站首页</legend>
    </fieldset>
</div>

</div>
<script src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
<script src="__LAY__/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use(['element','jquery','layer'], function(){
        var element = layui.element,
            $ = layui.jquery;
        element.on('nav(test)',function(elem){
            var $url = $(elem).eq(0).attr('data-url');
            $("#option").attr('src',$url)
        })
    });
</script>
</body>
</html>

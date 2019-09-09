<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\index.html";i:1567735110;}*/ ?>
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
    <title><?php echo $siteName; ?>后台管理系统</title>
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <script src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
    <script src="__LAY__/layui.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><?php echo $siteName; ?>后台管理系统</div>
        <ul class="layui-nav layui-layout-left">
            <div style="line-height: 60px;">
                <span>欢迎您，<?php echo $admin['r_name']; ?> &nbsp;
                    <?php if($ad_role == 1): ?>
                    总站
                    <?php else: ?>
                    <?php echo $admin['b_name']; endif; ?>
                    &nbsp;<?php echo $admin['ad_realname']; ?> </span>
            </div>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"><a style="padding-left: 10px !important;" href="javascript:location.reload();" >后台主页</a></li>
            <li class="layui-nav-item"><a style="padding-left: 10px !important;"  href="http://www.xiaowugroup.com/" target="_blank">打开首页</a></li>
            <li class="layui-nav-item"><a style="padding-left: 10px !important;"  id="resetPwd">修改账户</a></li>
            <li class="layui-nav-item"><a style="padding-left: 10px !important;"  href="<?=url('login/loginOut')?>">退出登录</a></li>
        </ul>
    </div>
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll" >
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <?php if($menuList != null): if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;if(isset($menu['child']) && $menu['child']): ?>
                <li class="layui-nav-item">
                    <a href="javascript:;"><?php echo $menu['m_name']; ?></a>
                    <?php if(isset($menu['child']) && $menu['child'] != null): if(is_array($menu['child']) || $menu['child'] instanceof \think\Collection || $menu['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $menu['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                    <dl class="layui-nav-child">
                        <dd><a href='javascript:' data-url="/admin/<?php echo $child['m_control']; ?>/<?php echo $child['m_action']; ?>.html"><?php echo $child['m_name']; ?></a></dd>
                    </dl>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </li>
                <?php else: ?>
                <li  class="layui-nav-item">
                    <a href="<?php echo $menu['m_name']; ?>"><?php echo $menu['m_name']; ?></a>
                </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
    </div>
	<div class='layui-body'>
		<iframe id='option' src="<?=url('index/welcome')?>" frameborder='no' width='100%' height='99%'>
        </iframe>
	</div>
	<div class="layui-footer">
    服务支持QQ：1549089944
</div>
</div>	
<script>
    //JavaScript代码区域
    layui.use(['element','jquery','layer'], function(){
        var element = layui.element,
		$ = layui.jquery;
		element.on('nav(test)',function(elem){
			var $url = $(elem).eq(0).attr('data-url');
			$("#option").attr('src',$url)
		})

        //修改密码；
        $('#resetPwd').click(function () {
            layer.open({
                type: 2,
                title: '修改密码',
                shadeClose: true,
                shade: false,
                maxmin: true,
                area: ['893px', '600px'],
                content: "<?=url('index/resetpwd')?>"
            });
        });
        //修改密码；
        $('#adminDetails').click(function () {
            layer.open({
                type: 2,
                title: '完善信息',
                shadeClose: true,
                shade: false,
                maxmin: true,
                area: ['893px', '600px'],
                content: "<?=url('index/adminDetails')?>"
            });
        })
    });
</script>
</body>
</html>
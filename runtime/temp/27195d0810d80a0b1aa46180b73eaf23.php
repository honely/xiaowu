<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"G:\xampp\htdocs\bbb\public/../application/admin\view\department\index.html";i:1537594281;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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

<style>
    #pages .layui-laypage-prev {
        padding: 0 12px;
    }
    #pages .layui-laypage-next{
        padding: 0 12px;
    }
    #pages .layui-laypage a{
        border:none;
    }
    #pages .layui-laypage-curr{
        padding: 0 11px;
        height: 24px;
        line-height: 24px;
    }
    #pages .layui-laypage input{
        padding: 0 11px;
        height: 26px;
        line-height: 26px;
    }
    #pages .layui-laypage input, .layui-laypage button{
        padding: 0 11px;
        height: 26px;
        line-height: 26px;
    }
    #pages .layui-laypage select{
        height: 18px;
    }
</style>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>部门管理</a>
        <a><cite>部门列表</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('department/add')?>?d_f_id=<?php echo $m_fid; ?>" class="layui-btn layui-btn-primary layui-btn-sm" ><i class="layui-icon"></i>新增部门</a>
        </div>
    </div>
    <hr/>
    <section class="panel panel-padding" >
        <table lay-skin="line" class="layui-table" lay-filter="parse-table-demo" style="padding: 10px;text-align: left;border: 1px;solid-color: #28282c">
            <colgroup>
                <col width="120">
                <col width="200">
                <col width="200">
                <col width="260">
                <col width="160">
            </colgroup>
            <thead>
            <tr>
                <td>编号</td>
                <td>部门名称</td>
                <td>添加时间</td>
                <td style="text-align: right;padding-right: 138px;">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php if($menuList == null): ?>
            <tr><td colspan="6">暂无内容</td></tr>
            <?php endif; if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$na): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $na['d_id']; ?></td>
                <td><?php echo $na['d_name']; ?></td>
                <td><?php echo $na['d_addtime']; ?></td>
                <td style="text-align: right;padding-right: 28px;">
                    <button class="layui-btn layui-btn-xs" onclick="editMenu(<?php echo $na['d_id']; ?>)"><i class="layui-icon">&#xe642;</i>编辑</button>
                    <button class="layui-btn layui-btn-xs" onclick="showSub(<?php echo $na['d_id']; ?>)"><i class="layui-icon">&#xe61a;</i>下级部门</button>
                    <!--<button class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(<?php echo $na['d_id']; ?>)"><i class="layui-icon">&#xe640;</i>删除</button>-->
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div id="pages" style="text-align: left;padding: 7px;"></div>
    </section>
    <script>
        layui.use(['form','laypage','layer'], function(){
            var form = layui.form,
                laypage = layui.laypage,
                layer = layui.layer; //独立版的layer无需执行这一句
            laypage.render({
                //自定义每页条数的选择项
                elem: 'pages'
                ,count: <?php echo $count; ?>
                ,limit: <?php echo $limit; ?>
                ,curr: <?php echo $page; ?>
                ,limits: [10, 15, 20]
                ,prev:'<i class="layui-icon">&#xe603;</i>'
                ,next:'<i class="layui-icon">&#xe602;</i>'
                ,layout: ['prev', 'page', 'next', 'skip','count',  'limit']
                ,jump: function(obj,frist){
                    if(!frist){
                        window.location.href="<?=url('admin/menu')?>?page="+obj.curr+"&limit="+obj.limit;
                    }
                }
            });
            //监听指定开关
            form.on('switch(switchTest)', function(data){
                layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                    offset: '6px'
                });
                layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
            });
        });
    </script>
    <script type="text/javascript">
        function editMenu(m_id){
            window.location.href='<?=url("department/edit")?>?d_id='+ m_id +"&d_f_id="+<?php echo $m_fid; ?> ;
        }

        function showSub(m_id) {
            window.location.href='<?=url("department/index")?>?d_id='+m_id+ "&m_fid=" +<?php echo $m_fid; ?>;
        }
        // function del(m_id) {
        //     layer.confirm('确定删除这个部门？删除后不可恢复！', {
        //         btn : [ '确定', '取消' ]
        //     }, function() {
        //         layer.msg('您已删除此菜单', {icon: 1});
        //         window.location.href='<?=url("admin/delmenu")?>?m_id='+ m_id ;
        //     },function(){
        //         layer.msg('您已取消该操作！',{
        //             time: 2000
        //         });
        //     });
        // }
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
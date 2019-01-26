<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"G:\xampp\htdocs\bbb\public/../application/admin\view\nav\navlist.html";i:1543896577;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1543896579;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1543896579;}*/ ?>
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
    em{
        font-style: normal;
    }
    .layui-table td{
        padding: 0px 15px;
        height: 40px !important;
    }
</style>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>导航管理</a>
        <a><cite>导航列表</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('nav/add')?>" class="layui-btn layui-btn-primary layui-btn-sm" ><i class="layui-icon"></i>添加导航</a>
        </div>
    </div>
    <hr/>
    <section class="panel panel-padding layui-form" >
        <table lay-skin="line" class="layui-table" lay-filter="parse-table-demo" style="padding: 10px;text-align: left;border: 1px;solid-color: #28282c">
            <colgroup>
                <col width="120">
                <col width="200">
                <col width="200">
                <col width="260">
                <col width="260">
                <col width="160">
                <col width="160">
            </colgroup>
            <thead>
            <tr>
                <th></th>
                <th>导航编号</th>
                <th>导航名称</th>
                <th>导航图标</th>
                <th>导航排序</th>
                <th>是否显示</th>
                <th>操作时间</th>
                <th>操作人</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if($navList == null): ?>
            <tr><td colspan="8" style="text-align: center">暂无内容</td></tr>
            <?php endif; if(is_array($navList) || $navList instanceof \think\Collection || $navList instanceof \think\Paginator): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$na): $mod = ($i % 2 );++$i;?>
            <tr>
                <td>
                    <?php if($na['subNav'] != null): ?>
                    <i onclick="subNav(this)" data-type="1" data-id="<?php echo $na['nav_id']; ?>" class="layui-icon">&#xe654;</i>
                    <?php else: ?>
                    <i class="layui-icon">—</i>
                    <?php endif; ?>
                </td>
                <td><b><?php echo $na['nav_id']; ?></b></td>
                <td><b><?php echo $na['nav_title']; ?></b></td>
                <td><img src="<?php echo $na['nav_hover_img']; ?>"/></td>
                <td><?php echo $na['nav_order']; ?></td>
                <td>
                    <input type="checkbox" value="<?php echo $na['nav_id']; ?>" <?php if($na['nav_isable'] == 1): ?>checked<?php endif; ?> lay-filter="isShow" lay-skin="switch" lay-text="是|否">
                </td>
                <td><?php echo date('Y-m-d H:i:s',$na['nav_opeatime']); ?></td>
                <td><?php echo $na['ad_realname']; ?></td>
                <td >
                    <button class="layui-btn layui-btn-xs" onclick="editMenu(<?php echo $na['nav_id']; ?>,<?php echo $na['nav_fid']; ?>)"><i class="layui-icon">&#xe642;</i>编辑</button>
                </td>
            </tr>
            <?php if(is_array($na['subNav']) || $na['subNav'] instanceof \think\Collection || $na['subNav'] instanceof \think\Paginator): $i = 0; $__LIST__ = $na['subNav'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                <tr style="display: none" class="sub<?php echo $sub['nav_fid']; ?>">
                    <td></td>
                    <td>&nbsp;&nbsp;&nbsp;----<?php echo $sub['nav_id']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;----<?php echo $sub['nav_title']; ?></td>
                    <td><img style="width: 30px; height: 30px;" src="<?php echo $sub['nav_hover_img']; ?>"/></td>
                    <td><?php echo $sub['nav_order']; ?></td>
                    <td>
                        <input type="checkbox" value="<?php echo $sub['nav_id']; ?>" <?php if($sub['nav_isable'] == 1): ?>checked<?php endif; ?> lay-filter="isShow" lay-skin="switch" lay-text="是|否">
                    </td>
                    <td><?php echo date('Y-m-d H:i:s',$sub['nav_opeatime']); ?></td>
                    <td><?php echo $sub['ad_realname']; ?></td>
                    <td >
                        <button style="background-color: #5FB878" class="layui-btn layui-btn-xs" onclick="editMenu(<?php echo $sub['nav_id']; ?>,<?php echo $sub['nav_fid']; ?>)"><i class="layui-icon">&#xe642;</i>编辑</button>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </section>
    <script>
        layui.use(['form','layer'], function(){
            var form = layui.form,
                layer = layui.layer; //独立版的layer无需执行这一句
            //监听指定开关
            form.on('switch(isShow)', function(obj){
                var change = obj.elem.checked;
                if(change){
                    change = 1;
                }else{
                    change = 0;
                }
                //状态表示将要更改成为的状态
                var nav_id = obj.value;
                $.ajax({
                    type:"post",
                    url:"<?=url('nav/status')?>",
                    dataType: 'json',
                    data:{
                        "change":change,
                        'nav_id':nav_id
                    },
                    success:function (data) {
                        console.log(data);
                        layer.msg(data.msg);
                    },
                    error:function (error) {
                        console.log(error);
                    }
                })
            });
        });
        //显示二级导航
        function subNav(e){
            var data_type=$(e).attr('data-type');
            var f_id=$(e).attr('data-id');
            if(data_type == 1){
                $('.sub'+f_id).show();
                $(e).html('—');
                $(e).attr('data-type','0')
            }else if(data_type == 0){
                var f_id=$(e).attr('data-id');
                $('.sub'+f_id).hide();
                $(e).html('&#xe654;');
                $(e).attr('data-type','1')
            }
        }
    </script>
    <script type="text/javascript">
        function editMenu(nav_id,nav_fid){
            window.location.href='<?=url("nav/edit")?>?nav_id='+ nav_id +"&nav_fid="+nav_fid;
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
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\shop\sort.html";i:1568013580;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
        <a>商城管理</a>
        <a><cite>商品分类</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('shop/add')?>" class="layui-btn layui-btn-primary layui-btn-sm" ><i class="layui-icon"></i>添加分类</a>
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
                <th>分类编号</th>
                <th>分类名称</th>
                <th>分类图标</th>
                <th>分类排序</th>
                <th>是否显示</th>
                <th>操作时间</th>
                <th>操作人</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if($list == null): ?>
            <tr><td colspan="8" style="text-align: center">暂无内容</td></tr>
            <?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$na): $mod = ($i % 2 );++$i;?>
            <tr>
                <td>
                    <?php if($na['subSort'] != null): ?>
                    <i onclick="subNav(this)" data-type="1" data-id="<?php echo $na['ss_id']; ?>" class="layui-icon">&#xe654;</i>
                    <?php else: ?>
                    <i class="layui-icon">—</i>
                    <?php endif; ?>
                </td>
                <td><b><?php echo $na['ss_id']; ?></b></td>
                <td><b><?php echo $na['ss_title']; ?></b></td>
                <td><img src="<?php echo $na['ss_icon']; ?>"/></td>
                <td><?php echo $na['ss_order']; ?></td>
                <td>
                    <input type="checkbox" value="<?php echo $na['ss_id']; ?>" <?php if($na['ss_del_flg'] == 1): ?>checked<?php endif; ?> lay-filter="isShow" lay-skin="switch" lay-text="是|否">
                </td>
                <td><?php echo date('Y-m-d H:i:s',$na['ss_change_date']); ?></td>
                <td><?php echo $na['ss_admin']; ?></td>
                <td >
                    <button class="layui-btn layui-btn-xs" onclick="editMenu(<?php echo $na['ss_id']; ?>,<?php echo $na['ss_f_id']; ?>)"><i class="layui-icon">&#xe642;</i>编辑</button>
                </td>
            </tr>
            <?php if(is_array($na['subSort']) || $na['subSort'] instanceof \think\Collection || $na['subSort'] instanceof \think\Paginator): $i = 0; $__LIST__ = $na['subSort'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
            <tr style="display: none" class="sub<?php echo $sub['ss_f_id']; ?>">
                <td></td>
                <td>&nbsp;&nbsp;&nbsp;----<?php echo $sub['ss_id']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;----<?php echo $sub['ss_title']; ?></td>
                <td><img style="width: 30px; height: 30px;" src="<?php echo $sub['ss_icon']; ?>"/></td>
                <td><?php echo $sub['ss_order']; ?></td>
                <td>
                    <input type="checkbox" value="<?php echo $sub['ss_id']; ?>" <?php if($sub['ss_del_flg'] == 1): ?>checked<?php endif; ?> lay-filter="isShow" lay-skin="switch" lay-text="是|否">
                </td>
                <td><?php echo date('Y-m-d H:i:s',$sub['ss_change_date']); ?></td>
                <td><?php echo $sub['ss_admin']; ?></td>
                <td >
                    <button style="background-color: #5FB878" class="layui-btn layui-btn-xs" onclick="editMenu(<?php echo $sub['ss_id']; ?>,<?php echo $sub['ss_f_id']; ?>)"><i class="layui-icon">&#xe642;</i>编辑</button>
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
                    url:"<?=url('shop/status')?>",
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
        //显示二级分类
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
            window.location.href='<?=url("shop/edit")?>?nav_id='+ nav_id +"&nav_fid="+nav_fid;
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
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"G:\xampp\htdocs\bbb\public/../application/admin\view\admin\admin.html";i:1536485716;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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

<div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>员工管理</a>
        <a><cite>员工列表</cite></a>
    </span>
    <div style="float:right;">
        <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="addAdmin()"><i class="layui-icon"></i>添加员工</button>
    </div>
</div>
<hr/>
<section class="panel panel-padding" style="padding-top: 10px;padding-left: 10px;">
    <form class="layui-form layui-form-pane1">
        <div class="layui-form-item  demoTable">
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="text" name="keywords" id="keywords"  placeholder="请输入姓名/邮箱/手机号" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <select name="ad_role" id="ad_role">
                        <option value="">请选择权限</option>
                        <?php if(is_array($roleInfo) || $roleInfo instanceof \think\Collection || $roleInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $roleInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$role): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $role['r_id']; ?>"><?php echo $role['r_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <span class="layui-btn" data-type="reload">查询</span>
                    <a href="<?=url('admin/admin')?>" class="layui-btn layui-btn-warm">刷新</a>
                </div>
            </div>
        </div>
    </form>
</section>
<section class="panel panel-padding" style="padding-left: 10px;padding-right: 10px;">
    <div class="layui-inline">
        <div class="layui-input-inline">
            <span onclick="query(0)" class="layui-btn layui-btn-xs layui-btn-primary">当前全部员工&nbsp;&nbsp;(<span class="all"><?php echo $count; ?></span>)</span>
        </div>
    </div>
    <div class="layui-inline" style="float: right;margin-right: 8px;">
        <div class="layui-input-inline" style="margin-left: 8px;">
            <span onclick="sysQuery(1)" class="layui-btn layui-btn-primary layui-btn-xs">在职&nbsp;&nbsp;(<span class="display"><?php echo $display; ?></span>)</span>
        </div>
        <div class="layui-input-inline" style="margin-left: 8px;">
            <span onclick="sysQuery(2)"  class="layui-btn layui-btn-primary layui-btn-xs">离职&nbsp;&nbsp;(<span class="none"><?php echo $none; ?></span>)</span>
        </div>
    </div>
</section>
<section class="panel panel-padding">
    <table lay-skin="line" class="layui-table" lay-filter="demo" lay-data="{height: 'full-200', cellMinWidth:80, url:'/admin/admin/adminData/', limit:20,limits:[20,30,50] ,id: 'testReload',page:true}" >
            <thead>
            <tr>
                <th lay-data="{field:'ad_bid', align:'left',  sort: true}">员工编号</th>
                <th lay-data="{field:'b_name', align:'left'}">省份城市</th>
                <th lay-data="{field:'r_name', align:'left'}">所属权限</th>
                <th lay-data="{field:'ad_realname',  align:'left'}">员工姓名</th>
                <th lay-data="{field:'ad_phone', align:'left'}">员工电话</th>
                <th lay-data="{field:'ad_email', align:'left'}">员工邮箱</th>
                <th lay-data="{field:'ad_isable',width:120, align:'left' ,templet: '#switchTpl',sort:true, unresize: true}">是否在职</th>
                <th lay-data="{align:'center',width:160, toolbar: '#barDemo'}">操作</th>
            </tr>
            </thead>
        </table>
</section>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</a>
    {{#  if(d.ad_id == '1'){ }}
    <a class="layui-btn layui-btn-disabled layui-btn-xs" lay-event="dels"><i class="layui-icon">&#xe640;</i>删除</a>
    {{#  } else { }}
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
    {{#  } }}
</script>
<script type="text/html" id="switchTpl">
    {{#  if(d.ad_id == '1'){ }}
    {{#  } else { }}
    <input type="checkbox" name="sex" lay-skin="switch" value="{{d.ad_id}}" lay-text="在职|离职" lay-filter="sexDemo" {{ d.ad_isable == 1 ? 'checked' : '' }}>
    {{#  } }}
</script>
<script>
    layui.use(['table','laydate','form'], function(){
        var table = layui.table
            ,form = layui.form;
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            if(obj.event === 'edit'){
                var ad_id = data.ad_id;
                window.location.href='<?=url("admin/edit")?>?ad_id='+ ad_id ;
            }else if(obj.event === 'dels'){
                layer.msg('超级管理员禁止删除！',{
                    time: 2000
                });
            } else if(obj.event === 'del'){
                var ad_id = data.ad_id;
                layer.confirm('确定删除该员工？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('admin/del')?>",
                        'data':{ad_id:ad_id},
                        'success':function (result) {
                            if(result.code < 1){
                                layer.msg(result.msg);
                            }else {
                                layer.msg(result.msg);
                                layer.open({
                                    title: '信息'
                                    ,content: result.msg
                                    ,yes: function(index){
                                        layer.close(index);
                                        window.location.href='<?=url("admin/admin")?>';
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href='<?=url("admin/admin")?>';
                                    }
                                });
                            }
                        },
                        'error':function () {
                            console.log('error');
                        }
                    })
                },function(){
                    layer.msg('您已取消该操作！',{
                        time: 2000
                    });
                });
            }
        });
        //监听是否开启操作
        form.on('switch(sexDemo)', function(obj){
            var id = this.value;
            //如果选中状态是true,后台数据将要改为显示
            var change = obj.elem.checked;
            if(change){
                change = 1;
            }else{
                change = 0;
            }
            $.ajax({
                type: 'POST',
                url: "<?=url('admin/status')?>?ad_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });

        var $ = layui.$, active = {
            reload: function(){
                var keywords = $('#keywords').val();
                var ad_role = $('#ad_role').val();
                //执行重载
                table.reload('testReload', {
                    url: '/admin/admin/adminData/'
                    ,page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        keywords: keywords,
                        ad_p_id: ad_p_id,
                        ad_c_id: ad_c_id,
                        ad_branch: ad_branch,
                        ad_role: ad_role
                    },
                    success:function (data) {
                        console.log(data);
                    }
                });
                $.ajax({
                    type:'post',
                    url:'/admin/admin/admin',
                    data:{'keywords':keywords,'ad_p_id':ad_p_id,'ad_c_id':ad_c_id,'ad_branch':ad_branch,'ad_role':ad_role},
                    success:function (data) {
                        console.log(data);
                        $('.all').html(data.all);
                        $('.display').html(data.display);
                        $('.none').html(data.none);
                    },
                    error:function (data) {
                        console.log(data)
                    }
                })
            }

        };
        $('.demoTable .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
    function sysQuery(ad_isable){
        var keywords = $('#keywords').val();
        var sp=$('.pick-area').attr('data-areacode').split(',');
        var ad_p_id = sp[0] == undefined ? '0' : sp[0];
        var ad_c_id = sp[1] == undefined ? '0' : sp[1];
        var ad_branch = sp[2] == undefined ? '0' : sp[2];
        var ad_role = $('#ad_role').val();
        //执行重载
        layui.use(['table','jquery'], function(){
            var table = layui.table;
            table.reload('testReload', {
                url: '/admin/admin/adminData/'
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: {
                    keywords: keywords,
                    ad_p_id: ad_p_id,
                    ad_c_id: ad_c_id,
                    ad_branch: ad_branch,
                    ad_isable: ad_isable,
                    ad_role: ad_role
                },
                success:function (data) {
                    console.log(data);
                }
            });
            $.ajax({
                type:'post',
                url:'/admin/admin/admin',
                data:{'keywords':keywords,'ad_p_id':ad_p_id,'ad_c_id':ad_c_id,'ad_branch':ad_branch,'ad_role':ad_role},
                success:function (data) {
                    console.log(data);
                    $('.all').html(data.all);
                    $('.display').html(data.display);
                    $('.none').html(data.none);
                },
                error:function (data) {
                    console.log(data)
                }
            })
        })
    }
</script>
<script type="text/javascript">
    function addAdmin(){
        window.location.href='<?=url('admin/add')?>';
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
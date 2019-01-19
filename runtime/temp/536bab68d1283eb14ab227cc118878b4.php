<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"G:\xampp\htdocs\bbb\public/../application/admin\view\learn\sublesson.html";i:1543896578;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1543896579;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1543896579;}*/ ?>
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
    <div style="margin: 20px;">
        <span class="layui-breadcrumb" lay-separator=">">
            <a>培训管理</a>
            <a href="<?=url('learn/index')?>">课程列表</a>
            <a><cite><?php echo $ls_title; ?>---章节列表</cite></a>
        </span>
        <div style="float:right;">
            <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="addArt()"><i class="layui-icon"></i>添加章节</button>
        </div>
    </div>
    <hr/>
    <!--<section class="panel panel-padding" style="padding-top: 10px;padding-left: 10px;">-->
        <!--<form id="queryForm" class="layui-form layui-form-pane1" action="<?=url('user/user')?>">-->
            <!--<div class="layui-form-item">-->
                <!--<div class="layui-inline">-->
                    <!--<div class="layui-input-inline">-->
                        <!--<input type="text" id="keywords" name="keywords" value="<?php if(isset($keywords)): ?><?php echo $keywords; endif; ?>"  placeholder="请输入章节标题" class="layui-input">-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="layui-inline">-->
                    <!--<div class="layui-input-inline">-->
                        <!--<button class="layui-btn "  lay-submit lay-filter="*">查询</button>-->
                        <!--<a href="<?=url('learn/sublesson')?>?ls_id=<?php echo $ls_id; ?>" class="layui-btn layui-btn-warm">刷新</a>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</form>-->
    <!--</section>-->
    <section class="panel panel-padding">
        <table lay-skin="line" class="layui-table" lay-filter="demo" lay-data="{height: 'full-200', cellMinWidth:60, url:'/admin/learn/chapterData/',where:{ls_id:<?php echo $ls_id; ?>}, limit:20,limits:[20,30,50] ,id: 'testReload',page:true}" >
            <thead>
            <tr>
                <th lay-data="{field:'lc_id', width:150, sort: true}">课程编号</th>
                <th lay-data="{field:'lc_title'}">课程标题</th>
                <th lay-data="{field:'lc_view', sort: true}">浏览热度</th>
                <th lay-data="{field:'lc_order', edit:'text',sort: true}">排序</th>
                <th lay-data="{field:'lc_addtime',width:180,  sort: true}">操作时间</th>
                <th lay-data="{field:'ad_realname',   sort: true}">操作人</th>
                <th lay-data="{field:'lc_isable', templet: '#switchTpl',sort:true, unresize: true}">是否显示</th>
                <th lay-data="{ width:220, toolbar: '#barDemo'}">操作</th>
            </tr>
            </thead>
        </table>
    </section>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
</script>
<script type="text/html" id="switchTpl">
    <input type="checkbox" name="sex" lay-skin="switch" value="{{d.lc_id}}" lay-text="是|否" lay-filter="sexDemo" {{ d.lc_isable == 1 ? 'checked' : '' }}>
</script>
<script>
    function addArt(){
        window.location.href='<?=url('learn/addsubles')?>?ls_id=<?php echo $ls_id; ?>';
    }
</script>
<script>
    layui.use(['table','laydate','form'], function(){
        var table = layui.table
            ,laydate = layui.laydate
            ,form = layui.form;
        laydate.render({
            elem: '#case_decotime'
            ,range: true
        });

        // //修改排序
        table.on('edit(demo)', function(obj){
            var value = obj.value;
            var lc_id = obj.data.lc_id;
            $.ajax({
                type: 'POST',
                url: "<?=url('learn/subreOrder')?>",
                data:{lc_id:lc_id,value:value},
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });

        var $ = layui.$, active = {
            //表格重载
            reload: function(){
                var keywords = $('#keywords').val();
                var case_area = $('#case_area').val();
                var case_admin = $('#case_admin').val()?$('#case_admin').val():0;
                var case_designer = $('#case_designer').val();
                var case_decotime = $('#case_decotime').val();
                //执行重载
                table.reload('testReload', {
                    url: '/admin/example/expData/'
                    ,page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        keywords: keywords,
                        case_p_id: p_id,
                        bu_c_id: c_id,
                        branch: b_id,
                        case_area: case_area,
                        case_decotime: case_decotime,
                        case_designer: case_designer,
                        case_admin: case_admin
                    },
                    success:function (data) {
                        console.log(data);
                    }
                });

                $.ajax({
                    type:'post',
                    url:'/admin/example/example',
                    data:{'keywords':keywords,'case_p_id':p_id,'bu_c_id':c_id,'branch':b_id,'case_area':case_area,'case_decotime':case_decotime,'case_designer':case_designer,'case_admin':case_admin,'style_id':'0'},
                    success:function (data) {
                        $('.display').html(data.display);
                        $('.none').html(data.none);
                        $('.all').html(data.all);
                        var style=data.decStyle;
                        for(var i = 0; i < style.length; i++) {
                            $('.style'+style[i].type_id).html(style[i].count)
                        }
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
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            var lc_id = data.lc_id;
            if(obj.event === 'edit'){
                window.location.href='<?=url("learn/editsubles")?>?lc_id='+ lc_id ;
            }else{
                layer.confirm('确定删除该课程？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('learn/delchapter')?>",
                        'data':{lc_id:lc_id},
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
                                        window.location.href="<?=url('learn/sublesson')?>?ls_id=<?php echo $ls_id; ?>";
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href="<?=url('learn/sublesson')?>?ls_id=<?php echo $ls_id; ?>";
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
                url: "<?=url('learn/substatus')?>?lc_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });
    });
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
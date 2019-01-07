<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"G:\xampp\htdocs\bbb\public/../application/admin\view\article\article.html";i:1543896581;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1543896579;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1543896579;}*/ ?>
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
        <a>内容管理</a>
        <a><cite>文章管理</cite></a>
    </span>
    <div style="float:right;">
        <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="addArt()"><i class="layui-icon"></i>添加文章</button>
    </div>
</div>
<hr/>
<section class="panel panel-padding" style="padding-top: 10px;padding-left: 10px;">
    <form class="layui-form layui-form-pane1">
        <div class="layui-form-item  demoTable">
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="text" name="keywords" id="keywords"  placeholder="请输入文章标题/编号" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="text" name="art_createtime" readonly class="layui-input" id="art_createtime" placeholder="请选择发布时间">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <select name="art_admin" id="art_admin">
                        <option value="">请选择操作人</option>
                        <?php if(is_array($admin) || $admin instanceof \think\Collection || $admin instanceof \think\Paginator): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $ad['ad_id']; ?>"><?php echo $ad['ad_realname']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>

            <div class="layui-inline">
                <div class="layui-input-inline">
                    <span class="layui-btn"  data-type="reload">查询</span>
                    <a href="<?=url('article/article')?>" class="layui-btn layui-btn-warm">刷新</a>
                </div>
            </div>
        </div>
    </form>
</section>
<style>
    table tr td {
        height: 30px;
    }
</style>
<section class="panel panel-padding">
    <table lay-skin="line" class="layui-table" lay-filter="demo" lay-data="{height: 'full-200', cellMinWidth:60, url:'/admin/article/artData/', limit:20,limits:[20,30,50] ,id: 'testReload',page:true}" >
            <thead>
            <tr>
                <th lay-data="{field:'art_bid', align:'left',  sort: true}">文章编号</th>
                <th lay-data="{field:'art_type', align:'left',  sort: true}">文章类型</th>
                <th lay-data="{field:'art_title',width:550,  align:'left'}">文章标题</th>
                <th lay-data="{field:'art_view', align:'left',  sort: true}">浏览热度</th>
                <th lay-data="{field:'art_updatetime',width:180, align:'left',  sort: true}">操作时间</th>
                <th lay-data="{field:'ad_realname', align:'left',  sort: true}">操作人</th>
                <th lay-data="{field:'art_istop', align:'left' ,templet: '#topTpl',sort:true, unresize: true}">是否置顶</th>
                <th lay-data="{field:'art_isable', align:'left' ,templet: '#switchTpl',sort:true, unresize: true}">是否显示</th>
                <th lay-data="{align:'left',width:220, toolbar: '#barDemo'}">操作</th>
            </tr>
            </thead>
        </table>
</section>
<script type="text/html" id="barDemo">
    <button class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</button>
    <a class="layui-btn layui-btn-xs" lay-event="refresh"><i class="layui-icon">&#xe9aa;</i>刷新</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
</script>
<script type="text/html" id="topTpl">
    <input type="checkbox" name="sex" lay-skin="switch" value="{{d.art_id}}" lay-text="是|否" lay-filter="topDemo" {{ d.art_istop == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="switchTpl">
    <input type="checkbox" name="sex" lay-skin="switch" value="{{d.art_id}}" lay-text="是|否" lay-filter="sexDemo" {{ d.art_isable == 1 ? 'checked' : '' }}>
</script>
<script>
    layui.use(['table','laydate','form','jquery'], function(){
        var table = layui.table
            ,$=layui.jquery
            ,laydate = layui.laydate
            ,form = layui.form;
        laydate.render({
            elem: '#art_createtime'
            ,range: true
        });
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            if(obj.event === 'edit'){
                var art_id = data.art_id;
                window.location.href='<?=url("article/editArticle")?>?art_id='+ art_id ;
            }else if(obj.event === 'refresh'){
                var art_id = data.art_id;
                $.ajax({
                    'type':"get",
                    'url':"<?=url('article/refresh')?>",
                    'data':{art_id:art_id},
                    'success':function (result) {
                        if(result.code < 1){
                            layer.msg(result.msg);
                        }else {
                            layer.msg(result.msg,{
                                time: 2000,
                            },function () {
                                window.location.reload()
                            });
                        }
                    },
                    'error':function () {
                        console.log('error');
                    }
                })
            } else if(obj.event === 'del'){
                var art_id = data.art_id;
                layer.confirm('确定删除该文章？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('article/delArticle')?>",
                        'data':{art_id:art_id},
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
                                        window.location.href='<?=url("article/article")?>';
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href='<?=url("article/article")?>';
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
                url: "<?=url('article/status')?>?art_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });
        //监听是否置顶操作
        form.on('switch(topDemo)', function(obj){
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
                url: "<?=url('article/top')?>?art_id="+id+ "&change="+change,
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
                var art_createtime = $('#art_createtime').val();
                var art_admin = $('#art_admin').val();
                //执行重载
                table.reload('testReload', {
                    url: '/admin/article/artData/'
                    ,page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        keywords: keywords,
                        art_admin: art_admin,
                        art_createtime: art_createtime
                    },
                    success:function (data) {
                        console.log(data);
                    }
                });
                $.ajax({
                    type:'post',
                    url:'/admin/article/article',
                    data:{'art_admin':art_admin,'keywords':keywords,'art_createtime':art_createtime},
                    success:function (data) {
                        $('.all').html(data.all);
                        $('.userSaid').html(data.userSaid);
                        $('.design').html(data.design);
                        $('.display').html(data.display);
                        $('.fengshui').html(data.fengshui);
                        $('.media').html(data.media);
                        $('.metral').html(data.metral);
                        $('.none').html(data.none);
                        $('.strategy').html(data.strategy);
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
    function artType(art_type){
        var keywords = $('#keywords').val();
        var art_createtime = $('#art_createtime').val();
        var art_admin = $('#art_admin').val();
        //执行重载
        layui.use(['table','laydate','form','jquery'], function(){
            var table = layui.table;
            table.reload('testReload', {
                url: '/admin/article/artData/'
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: {
                    keywords: keywords,
                    art_admin: art_admin,
                    art_createtime: art_createtime,
                    art_type:art_type
                },
                success:function (data) {
                    console.log(data);
                }
            });
            $.ajax({
                type:'post',
                url:'/admin/article/article',
                data:{'art_admin':art_admin,'keywords':keywords,'art_createtime':art_createtime},
                success:function (data) {
                    $('.all').html(data.all);
                    $('.userSaid').html(data.userSaid);
                    $('.design').html(data.design);
                    $('.display').html(data.display);
                    $('.fengshui').html(data.fengshui);
                    $('.media').html(data.media);
                    $('.metral').html(data.metral);
                    $('.none').html(data.none);
                    $('.strategy').html(data.strategy);
                },
                error:function (data) {
                    console.log(data)
                }
            })
        })
    }
    function display(display){
        var keywords = $('#keywords').val();
        var art_createtime = $('#art_createtime').val();
        var art_admin = $('#art_admin').val();
        //执行重载
        layui.use(['table','laydate','form','jquery'], function(){
            var table = layui.table;
            table.reload('testReload', {
                url: '/admin/article/artData/'
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: {
                    keywords: keywords,
                    art_admin: art_admin,
                    art_createtime: art_createtime,
                    display:display
                },
                success:function (data) {
                    console.log(data);
                }
            });
            $.ajax({
                type:'post',
                url:'/admin/article/article',
                data:{'art_admin':art_admin,'keywords':keywords,'art_createtime':art_createtime},
                success:function (data) {
                    $('.all').html(data.all);
                    $('.userSaid').html(data.userSaid);
                    $('.design').html(data.design);
                    $('.display').html(data.display);
                    $('.fengshui').html(data.fengshui);
                    $('.media').html(data.media);
                    $('.metral').html(data.metral);
                    $('.none').html(data.none);
                    $('.strategy').html(data.strategy);
                },
                error:function (data) {
                    console.log(data)
                }
            })
        })
    }
</script>
<script type="text/javascript">
    function addArt(){
        window.location.href='<?=url('article/addArticle')?>';
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
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"G:\xampp\htdocs\bbb\public/../application/market\view\house\index.html";i:1539333573;s:71:"G:\xampp\htdocs\bbb\public/../application/market\view\common\toper.html";i:1539075681;s:72:"G:\xampp\htdocs\bbb\public/../application/market\view\common\footer.html";i:1539074576;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>大城小屋平台管理系统-事业部端</title>
    <link rel="stylesheet" href="__LAY__/css/layui.css">

<div class="layui-body">
<div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>房源管理</a>
        <a><cite>房源列表</cite></a>
    </span>
    <div style="float:right;">
        <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="addArt()"><i class="layui-icon"></i>添加房源</button>
    </div>
</div>
<hr/>
<section class="panel panel-padding" style="padding-top: 10px;padding-left: 10px;">
    <form class="layui-form layui-form-pane1">
        <div class="layui-form-item  demoTable">
            <div class="layui-inline">
                <div class="layui-input-inline" style="width: 300px;">
                    <input type="text" style="width: 300px;" name="keywords" id="keywords"  placeholder="请输入房源名称/房源编号/合同编号/客户经理" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="text" name="case_decotime" readonly class="layui-input" id="case_decotime" placeholder="请选择签订日期">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <span class="layui-btn" data-type="reload">查询</span>
                    <a href="<?=url('house/index')?>" class="layui-btn layui-btn-warm">刷新</a>
                </div>
            </div>
        </div>
    </form>
</section>
<section class="panel panel-padding">
    <table lay-skin="line" class="layui-table" lay-filter="demo" lay-data="{height: 'full-200', cellMinWidth:60, url:'/market/house/houseData/', limit:20,limits:[20,30,50] ,id: 'testReload',page:true}" >
        <thead>
        <tr>
            <th lay-data="{field:'h_b_id', width:150, sort: true}">房源编号</th>
            <th lay-data="{field:'h_contract_code', width:150}">合同编号</th>
            <th lay-data="{field:'c_name'}">省份城市</th>
            <th lay-data="{field:'h_name'}">房源标题</th>
            <th lay-data="{field:'h_building'}">小区名称</th>
            <th lay-data="{field:'h_money'}">装修款（元）</th>
            <th lay-data="{field:'paid_ratio'}">回款比率</th>
            <th lay-data="{field:'h_addtime',width:180,  sort: true}">签订日期</th>
            <th lay-data="{field:'u_name',   sort: true}">客户经理</th>
            <th lay-data="{ width:450, toolbar: '#barDemo'}">操作</th>
        </tr>
        </thead>
    </table>
</section>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="master"><i class="layui-icon">&#xe66f;</i>户主信息</a>
    <a class="layui-btn layui-btn-xs" lay-event="payLog"><i class="layui-icon">&#xe60e;</i>回款信息</a>
    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="attachment"><i class="layui-icon">&#xe631;</i>房屋附属</a>
    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="preview"><i class="layui-icon">&#xe60b;</i>房源预览</a>
    <a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="toWork"><i class="layui-icon">&#xe65b;</i>转施工</a>
</script>
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
<script>
    layui.use(['table','laydate','form'], function(){
        var table = layui.table
            ,laydate = layui.laydate
            ,form = layui.form;
        laydate.render({
            elem: '#case_decotime'
            ,range: true
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
            //房源编号
            var h_id = data.h_b_id;
            if(obj.event === 'master'){
                layer.open({
                    type: 2,
                    title: '房源编号：【'+h_id+'】的户主信息',
                    shadeClose: true,
                    shade: false,
                    maxmin: true,
                    area: ['1300px', '800px'],
                    content: "<?=url('house/master')?>?h_id="+h_id
                });
            }else if(obj.event === 'payLog'){
                layer.open({
                    type: 2,
                    title: '房源编号：【'+h_id+'】的回款情况',
                    shadeClose: true,
                    shade: false,
                    maxmin: true,
                    area: ['1300px', '800px'],
                    content: "<?=url('house/paylog')?>?h_id="+h_id
                });
            }else if(obj.event === 'attachment'){
                layer.open({
                    type: 2,
                    title: '房源编号：【'+h_id+'】的附属物品',
                    shadeClose: true,
                    shade: false,
                    maxmin: true,
                    area: ['1300px', '800px'],
                    content: "<?=url('house/attachment')?>?h_id="+h_id
                });
            }else if(obj.event === 'preview'){
                layer.open({
                    type: 2,
                    title: '房源预览 编号：【'+h_id+'】',
                    shadeClose: true,
                    shade: false,
                    maxmin: true,
                    area: ['1300px', '800px'],
                    content: "<?=url('house/preview')?>?h_id="+h_id
                });
            } else if(obj.event === 'del'){

                layer.confirm('确定删除该房源？删除后不可恢复！', {
                    btn : [ '确定', '取消' ]//按钮
                }, function() {
                    $.ajax({
                        'type':"get",
                        'url':"<?=url('house/del')?>",
                        'data':{h_id:h_id},
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
                                        window.location.href='<?=url("house/index")?>';
                                    }
                                    ,cancel:function (index) {
                                        layer.close(index);
                                        window.location.href='<?=url("house/index")?>';
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
        form.on('select(bu_p_id)', function(data){
            var p_id=data.value;
            $('#city').show();
            $.ajax({
                type: 'POST',
                url: "<?=url('user/getCityName')?>?p_id="+p_id,
                data: {p_id:p_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#bu_c_id").html("<option value=''>请选择城市</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.c_id).text(val.c_name);
                        $("#bu_c_id").append(option1);
                        form.render('select');
                    });
                    $("#bu_c_id").get(0).selectedIndex=0;
                }
            });
        });
        //调用该城市下面的分站
        form.on('select(bu_c_id)', function(data){
            var c_id=data.value;
            $('#branchs').show();
            $.ajax({
                type: 'POST',
                url: "<?=url('admin/getBranchName')?>?c_id="+c_id,
                data: {c_id:c_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#branch").html("<option value=''>请选择站点</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.b_id).text(val.b_name);
                        $("#branch").append(option1);
                        form.render('select');
                    });
                    $("#branch").get(0).selectedIndex=0;
                }
            });
        });
        //调用该分站下面的管理员
        form.on('select(ba_branch)', function(data){
            var b_id=data.value;
            $.ajax({
                type: 'POST',
                url: "<?=url('admin/getAdminName')?>",
                data: {b_id:b_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#ba_admin").html("<option value=''>请选择操作人</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.ad_id).text(val.ad_realname);
                        $("#ba_admin").append(option1);
                        form.render('select');
                    });
                    $("#ba_admin").get(0).selectedIndex=0;
                }
            });
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
                url: "<?=url('house/status')?>?h_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });
        //监听是否置顶
        form.on('switch(isTop)', function(obj){
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
                url: "<?=url('house/top')?>?h_id="+id+ "&change="+change,
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    layer.msg(data.msg);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    function addArt(){
        window.location.href='<?=url('house/add')?>';
    }
</script>

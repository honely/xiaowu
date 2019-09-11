<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\shop\steptwo.html";i:1568197619;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\header.html";i:1567735110;s:74:"E:\houtai\xiaowu\xiaowu\public/../application/admin\view\index\footer.html";i:1567735110;}*/ ?>
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
    .one-pan{
        position: relative;
    }
    .item_img{
        width: 120px;
        height: 105px;
        float: left;
        margin-top: 20px;
    }
</style>
<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.js"></script>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
        <a>商城管理</a>
        <a href="<?=url('shop/index')?>">商品管理</a>
        <a><cite>发布商品【第二步】</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('shop/index')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="margin: 10px">
        <div style="padding: 15px;">
            <form class="layui-form" id="myForm">
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>商品分类</label>
                    <div class="layui-input-inline">
                        <input type="text" value="<?php echo $list['goods_sort']; ?>" class="layui-input">
                        <input type="hidden" id="g_id" name="goods_id" value="<?php echo $list['goods_id']; ?>" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>商品标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="goods_name" value="<?php echo $list['goods_name']; ?>" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">封面图片</label>
                    <div class="layui-upload">
                        <div class="layui-upload-list" style="margin-left: 100px;">
                            <img class="layui-upload-img" src="__PUBLIC__<?php echo $list['goods_img']; ?>" style="height: 100px;width:100px" id="navPre">
                            <input type="hidden" name="goods_img" value="<?php echo $list['goods_img']; ?>" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>商品原价</label>
                    <div class="layui-input-inline">
                        <input type="text" name="goods_price" value="<?php echo $list['goods_price']; ?>" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">单位：元。</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color: red;">*</span>折扣价</label>
                    <div class="layui-input-inline">
                        <input type="text" name="goods_dis_price" value="<?php echo $list['goods_dis_price']; ?>" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">用户实付金额，单位：元。</div>
                </div>
                <div class="layui-form-item" id="pics">
                    <div class="layui-form-label">商品多图</div>
                    <div class="layui-input-block" style="width: 70%;">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn layui-btn pull-left" id="slide-pc">选择多图</button>
                            <div class="pic-more">
                                <ul class="pic-more-upload-list" id="slide-pc-priview">
                                    <?php if(is_array($list['goods_img_more']) || $list['goods_img_more'] instanceof \think\Collection || $list['goods_img_more'] instanceof \think\Paginator): $k = 0; $__LIST__ = $list['goods_img_more'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($k % 2 );++$k;?>
                                    <li class="item_img">
                                        <div class="operate">
                                            <i  class="close layui-icon"></i>
                                        </div>
                                        <img src="__PUBLIC__/<?php echo $items; ?>" class="img" style="width:277px; height: 177px" >
                                        <input type="hidden" name="h_img[]" value="<?php echo $items; ?>" />
                                    </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item" id="spec">
                    <div class="layui-form-label">多规格产品</div>
                    <div class="layui-input-block">
                        <input type="checkbox"
                           <?php if($list['goods_specs'] != null): ?>
                               checked
                               <?php endif; ?>
                        lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
                    </div>
                </div>
                <div class="layui-form" id="layui-form" style="<?php if($list['goods_specs'] != null): ?>
                display: block
                <?php endif; ?>;">
                    <div class="layui-input-block">
                        <button type="button" id="addSpec" class="layui-btn layui-btn-sm layui-btn-normal pull-left">添加规格</button>
                    </div>
                    <table class="layui-table" style="margin-left: 111px;width: 85%;">
                        <thead>
                        <tr>
                            <th>规格名称</th>
                            <th>价格（单位：元）</th>
                            <th>折后价（单位：元）</th>
                            <th>商品库存</th>
                            <th>规格图片</th>
                            <th>添加时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody id="specTable">
                        <?php if($list['goods_specs'] == null): ?>
                        <tr><td colspan="8" style="text-align: center">暂无内容</td></tr>
                        <?php endif; if(is_array($list['goods_specs']) || $list['goods_specs'] instanceof \think\Collection || $list['goods_specs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['goods_specs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$na): $mod = ($i % 2 );++$i;?>
                        <tr class="tr">
                            <td class="gs_title"><?php echo $na['gs_title']; ?></td>
                            <td class="gs_price"><?php echo $na['gs_price']; ?></td>
                            <td class="gs_discont"><?php echo $na['gs_discont']; ?></td>
                            <td class="gs_stock"><?php echo $na['gs_stock']; ?></td>
                            <td class="gs_img" data-src="<?php echo $na['gs_img']; ?>">
                                <img src="<?php echo $na['gs_img']; ?>"/>
                            </td>
                            <td class="gs_addtime"><?php echo $na['gs_addtime']; ?></td>
                            <td class="gs_status"><?php echo $na['gs_status']; ?></td>
                            <td>
                                <a class="layui-btn layui-btn-xs" onclick="editSpec('<?php echo $na['gs_id']; ?>')"><i class="layui-icon">&#xe642;</i>编辑</a>
                                <a class="layui-btn layui-btn-xs" onclick="delSpec('<?php echo $na['gs_id']; ?>','<?php echo $na['gs_goods_id']; ?>')"><i class="layui-icon">&#xe640;</i>删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">商品详情</label>
                    <div class="layui-input-block">
                        <textarea name="goods_details" id="container"><?php echo $list['goods_details']; ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <span class="layui-btn" lay-submit lay-filter="update">完成</span>
                        <a class="layui-btn layui-btn-primary" href="<?=url('shop/index')?>">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var ue= UE.getEditor('container',{    //content为要编辑的textarea的id

        initialFrameWidth: 1100,   //初始化宽度

        initialFrameHeight: 500,   //初始化高度

    });
</script>
<script>
    layui.use(['form', 'jquery','upload','layedit','layer'], function(){
        var form = layui.form
            ,upload = layui.upload
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,$ = layui.jquery;

        //
        form.on('submit(update)', function(){
            $.ajax({
                type: 'POST',
                url: "<?=url('shop/updateTwo')?>",
                data:$('#myForm').serialize(),
                dataType:  'json',
                success: function(data){
                    if(data.code == 1){
                        window.location.href='<?=url("shop/index")?>';
                    }
                }
            });
        });


        //监听指定开关
        form.on('switch(switchTest)', function(){
            if(this.checked == true){
                $('#layui-form').show();
            }else{
                $('#layui-form').hide();
            }
        });


        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '至少得2个字符啊';
                }
            }
            ,imgReg:function (value) {
                if(value.length <= 0){
                    return '请上传图片';
                }
            }
            ,content: function(value){
                var cont=layedit.getContent(index); //获取编辑器内容
                if(cont.length <= 0){
                    return '请输入内容信息！';
                }
            }
        });
    });


    //添加商品规格
    $('#addSpec').click(function () {
        var g_id = $('#g_id').val();
        layer.open({
            type: 2,
            skin: 'layui-layer-rim',
            title: '规格产品',
            area: ['60%', '60%'],
            content: "<?=url('shop/addSpec')?>?g_id=" +g_id
        });
    });

    function editSpec(gs_id) {
        layer.open({
            type: 2,
            skin: 'layui-layer-rim',
            title: '规格产品',
            area: ['60%', '60%'],
            content: "<?=url('shop/editSpec')?>?gs_id="+gs_id
        });
    }

    function delSpec(gs_id,g_id) {
        layer.confirm('确定删除该商品规格？删除后不可恢复！', {
            btn : [ '确定', '取消' ]//按钮
        }, function() {
            $.ajax({
                'type':"get",
                'url':"<?=url('shop/delSpec')?>",
                'data':{gs_id:gs_id},
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
                                window.location.href='<?=url("shop/stepTwo")?>?g_id='+g_id;
                            }
                            ,cancel:function (index) {
                                layer.close(index);
                                window.location.href='<?=url("shop/stepTwo")?>?g_id='+g_id;
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
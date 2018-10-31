<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"G:\xampp\htdocs\bbb\public/../application/admin\view\house\add.html";i:1540974159;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
    .one{
        position: absolute;
        left:300px;
        top:0;
    }
     .layui-upload-img { width: 90px; height: 90px; margin: 0; }
    .pic-more { width:100%; left; margin: 10px 0px 0px 0px;}
    .pic-more li { width:300px; float: left; margin-right: 5px;margin-top: 10px;}
    .pic-more li .layui-input { display: initial; }
    .pic-more li a { position: absolute; top: 0; display: block; }
    #slide-pc-priview .item_img img{ width:277px; height: 177px}
    #slide-pc-priview li{position: relative;}
    #slide-pc-priview li .operate{ color: #000; display: none;}
    #slide-pc-priview li .toleft{ position: absolute;top: 40px; left: 1px; cursor:pointer;}
    #slide-pc-priview li .toright{ position: absolute;top: 40px; right: 1px;cursor:pointer;}
    #slide-pc-priview li .close{position: absolute;top: 5px; right: 5px;cursor:pointer;}
    #slide-pc-priview li:hover .operate{ display: block;}
</style>
<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.js"></script>
<div class="layui-body">
    <div style="margin: 20px;">
    <span class="layui-breadcrumb" lay-separator=">">
       <a>房源管理</a>
        <a href="<?=url('house/index')?>">房源列表</a>
        <a><cite>发布房源</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('house/index')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div class="layui-tab">
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <div style="margin: 10px">
                    <div style="padding: 15px;">
                        <form class="layui-form" id="houseForm">
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>房源名称</label>
                                <div class="layui-input-block">
                                    <input type="text" onblur="checkBulids()" id="case_title" name="h_name" lay-verify="required|title" placeholder="请输入房源名称" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>基础信息</label>
                                <div class="layui-input-inline">
                                    <select name="h_p_id" lay-verify="required" lay-filter="bu_p_id">
                                        <option value="">请选择省份</option>
                                        <?php if(is_array($prov) || $prov instanceof \think\Collection || $prov instanceof \think\Paginator): $i = 0; $__LIST__ = $prov;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $vo['p_id']; ?>"><?php echo $vo['p_name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-input-inline">
                                    <select name="h_c_id" lay-verify="required" id="bu_c_id" lay-filter="bu_c_id">
                                        <option value="">请选择城市</option>
                                    </select>
                                </div>
                                <div class="layui-input-inline">
                                    <select name="h_a_id" id="branch" lay-verify="required">
                                        <option value="">请选择县区</option>
                                    </select>
                                </div>
                                <div class="layui-input-inline">
                                </div>
                                <div class="layui-input-inline">
                                    <select name="h_type"   lay-filter="case_style">
                                        <option value="">请选择房屋类型</option>
                                        <?php if(is_array($houseType) || $houseType instanceof \think\Collection || $houseType instanceof \think\Paginator): $i = 0; $__LIST__ = $houseType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $type['type_id']; ?>"><?php echo $type['type_name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>租金</label>
                                <div class="layui-input-inline">
                                    <input type="text" onkeyup="this.value=this.value.replace(/\D/g, '')" name="h_rent" lay-verify="required" placeholder="请输入租金" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">单位：元。</div>
                                <div class="layui-input-inline">
                                    <input type="radio" name="h_rent_type" value="1" title="月租" checked>
                                    <input type="radio" name="h_rent_type" value="2" title="日租">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">视频url</label>
                                <div class="layui-input-block">
                                    <input type="text" name="h_video" lay-verify="urlTest" placeholder="请输入视频url" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>小区名称</label>
                                <div class="layui-input-block">
                                    <input type="text" name="h_building" lay-verify="required" placeholder="请输入小区名称" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item one-pan">
                                <label class="layui-form-label"><span style="color: red;">*</span>封面图片</label>
                                <div class="layui-upload-drag" id="uploadLogo" style="display:inline-block;">
                                    <image id="logoPre">
                                        <input type="hidden" lay-verify="imgReg"  name="h_house_img" id="art_img" value=""/>
                                    </image>
                                    <div id="display">
                                        <i class="layui-icon"></i>
                                        <p>请点击此处上传封面图片</p>
                                    </div>
                                </div>
                                <div class="one">
                                    <div class="layui-form-mid layui-word-aux" id="tips" style="margin-left: 39px; ">图片要求，最大600KB，支持JPG/JEPG/PNG格式</div>
                                    <div class="layui-form-item">
                                        <textarea name="h_img_alt" style="resize:none;width: 1315px;height: 115px; margin-left:39px;"  placeholder="图片描述，建议不超过15个字（等同图片ALT属性）" class="layui-textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>房屋面积</label>
                                <div class="layui-input-inline">
                                    <input type="text" onkeyup="this.value=this.value.replace(/\D/g, '')" name="h_area" lay-verify="required" placeholder="请输入房屋面积" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">单位：平方米。</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>房屋朝向</label>
                                <div class="layui-input-inline">
                                    <select name="h_head"   lay-filter="case_style">
                                        <option value="">请选择房屋朝向</option>
                                        <option value="1">东</option>
                                        <option value="2">南</option>
                                        <option value="3">西</option>
                                        <option value="4">北</option>
                                        <option value="5">东南</option>
                                        <option value="6">西南</option>
                                        <option value="7">东北</option>
                                        <option value="8">西北</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">房屋楼层</label>
                                <div class="layui-input-block">
                                    <input type="text" name="h_floor" placeholder="请输入房屋楼层" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>房源地址</label>
                                <div class="layui-input-block">
                                    <input type="text" name="h_address" lay-verify="required" placeholder="请输入房源地址" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label"><span style="color: red;">*</span>房屋配置</label>
                                <div class="layui-input-block">
                                    <?php if(is_array($houseConf) || $houseConf instanceof \think\Collection || $houseConf instanceof \think\Paginator): $i = 0; $__LIST__ = $houseConf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$conf): $mod = ($i % 2 );++$i;?>
                                    <input type="checkbox" class="h_config" lay-verify="h_config" name="h_config[<?php echo $conf['type_id']; ?>]" lay-skin="primary" title="<?php echo $conf['type_name']; ?>">
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">是否为特价</label>
                                <div class="layui-input-block">
                                    <input type="text" name="h_discount" placeholder="是否为特价，为空不是特价，反之为特价，内容为特价内容。" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>附近交通</label>
                                <div class="layui-input-block">
                                    <input type="text" name="h_nearbus" lay-verify="required" placeholder="请输入附近交通" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>附近地铁</label>
                                <div class="layui-input-block">
                                    <input type="text" name="h_subway" placeholder="请输入附近地铁" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item" id="pics">
                                <div class="layui-form-label">房源图片</div>
                                <div class="layui-input-block" style="width: 70%;">
                                    <div class="layui-upload">
                                        <button type="button" class="layui-btn layui-btn pull-left" id="slide-pc">选择多图</button>
                                        <div class="pic-more">
                                            <ul class="pic-more-upload-list" id="slide-pc-priview">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item" style="margin-top: 65px;">
                                <label class="layui-form-label">房源简介</label>
                                <div class="layui-input-block">
                                    <textarea name="h_description" id="container"></textarea>
                                </div>
                            </div>
                            <div class="layui-form-item" pane style="width: 300px;">
                                <label class="layui-form-label">是否置顶</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="h_istop" value="2" title="常规" checked>
                                    <input type="radio" name="h_istop" value="1" title="置顶">
                                </div>
                            </div>
                            <div class="layui-form-item" pane style="width: 300px;">
                                <label class="layui-form-label">是否最新</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="h_isnew" value="1" title="是" checked>
                                    <input type="radio" name="h_isnew" value="2" title="否">
                                </div>
                            </div>
                            <div class="layui-form-item" pane style="width: 300px;">
                                <label class="layui-form-label">是否合租</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="h_iscop" value="1" title="是" checked>
                                    <input type="radio" name="h_iscop" value="2" title="否">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <span class="layui-btn" lay-submit lay-filter="saveInfo">发布</span>
                                    <a class="layui-btn layui-btn-primary" href="<?=url('house/index')?>">返回</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
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
    layui.use(['form', 'jquery','upload','laytpl','layedit'], function(){
        var form = layui.form
            ,upload = layui.upload
            , laytpl = layui.laytpl
            ,layedit = layui.layedit
            ,$ = layui.jquery;
        //编辑器图片上传接口
        layedit.set({
            uploadImage: {
                url: '/admin/article/editUpload' //接口url
                ,type: 'post', //默认post
                success:function(res){
                    console.log(res);
                },
                error:function (res) {
                    console.log(res);
                }
            }
        });
        $("#addCaseIma").click(function () {
            layer.open({
                type: 2,
                title: '添加案例全景图',
                shadeClose: true,
                shade: false,
                maxmin: true,
                area: ['893px', '600px'],
                content: "<?=url('example/addimg')?>",
            });

        });
        var index = layedit.build('demo');

        //编辑器外部操作
        var active = {
            content: function(){
                alert(layedit.getContent(index)); //获取编辑器内容
            }
            ,text: function(){
                alert(layedit.getText(index)); //获取编辑器纯文本内容
            }
            ,selection: function(){
                alert(layedit.getSelection(index));
            }
        };
        //监听提交
        form.on('submit(saveInfo)', function(data){
            var h_imgs=$('#h_imgs').html();
            $('#h_img').val(h_imgs);
            var h_desc=layedit.getContent(index);
            $('#h_description').val(h_desc);
            $.ajax({
                'type':"post",
                'url':"<?=url('house/add')?>",
                'data':$('#houseForm').serialize(),
                'success':function (result) {
                    console.log(result.data);
                    if(result.code == '1'){
                        layer.msg(result.msg, {icon: 1, time: 2000},function () {
                            window.location.href='<?=url('house/index')?>';
                        });
                    }else if(result.code == '2'){
                        layer.msg(result.msg, {icon: 2, time: 3000});
                    }else if(result.code == '3'){
                        layer.msg(result.msg, {icon: 3, time: 3000});
                    }
                },
                'error':function (error) {
                    console.log(error);
                }
            })
        });


        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 2){
                    return '标题至少得2个字符啊';
                }
            }
            ,imgRegCaseType:function (value) {
                if(value.length <= 0){
                    return '请上传户型图';
                }
            }
            ,urlTest:function(value){
                if(value.length >0 ){
                    var Expression=/http(s)?:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
                    if(Expression.test(value)){
                    }else{
                        return "请输入正确的链接！";
                    }
                }
            }
            ,des_tanlent:function () {
                if (!$(".h_config").is(":checked")) {
                    return "一个房屋配置都没有嘛？";
                }
            }
        });
        form.on('select(bu_p_id)', function(data){
            var p_id=data.value;
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
            $.ajax({
                type: 'POST',
                url: "<?=url('admin/getAreaName')?>?c_id="+c_id,
                data: {c_id:c_id},
                dataType:  'json',
                success: function(data){
                    var code=data.data;
                    $("#branch").html("<option value=''>请选择县区</option>");
                    $.each(code, function(i, val) {
                        var option1 = $("<option>").val(val.area_id).text(val.area_name);
                        $("#branch").append(option1);
                        form.render('select');
                    });
                    $("#branch").get(0).selectedIndex=0;
                }
            });
        });
        //户型图片上传
        upload.render({
            elem: '#uploadLogo'
            ,url: '<?php echo url("example/upload"); ?>'
            ,size:1024 //限制文件大小，单位 KB
            ,ext: 'jpg|png|gif'
            ,accept: 'images' //限制文件大小，单位 KB
            ,before: function(input){
                loading = layer.load(2, {
                    shade: [0.2,'#000']
                });
            }
            ,done: function(res){
                $('#logoPre').removeAttr('src');
                $('#art_img').val('');
                console.log(res);
                layer.close(loading);
                $('#art_img').val(res.path);
                $('#uploadLogo').removeClass('layui-upload-drag');
                $('#logoPre').css('width','216px');
                $('#logoPre').css('height','150px');
                $('#logoPre').attr('src',"__PUBLIC__"+res.path);
                $('#display').hide();
                layer.msg(res.msg, {icon: 1, time: 1000});
            }
            ,error: function(res){
                layer.msg(res.msg, {icon: 2, time: 1000});
            }
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
<script>
    layui.use('upload', function(){
        var $ = layui.jquery;
        var upload = layui.upload;
        upload.render({
            elem: '#slide-pc',
            url: '<?php echo url("admin/house/upload"); ?>',
            size: 5120,
            exts: 'jpg|png|jpeg',
            multiple: true,
            before: function(obj) {
                layer.msg('图片上传中...', {
                    icon: 16,
                    shade: 0.01,
                    time: 0
                })
            },
            done: function(res) {
                layer.close(layer.msg());//关闭上传提示窗口
                if(res.status == 0) {
                    return layer.msg(res.message);
                }
                console.log(res);
                $('#slide-pc-priview').append('' +
                    '<li class="item_img"><div class="operate"><i  class="close layui-icon"></i></div><img src="__PUBLIC__/' + res.filepath + '" class="img" ><input type="hidden" name="h_img[]" value="' + res.filepath + '" /></li>');
            }
        });
    });
    //点击多图上传的X,删除当前的图片
    $("body").on("click",".close",function(){
        $(this).closest("li").remove();
    });
</script>
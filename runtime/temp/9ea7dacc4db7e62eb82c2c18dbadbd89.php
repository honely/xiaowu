<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"G:\xampp\htdocs\bbb\public/../application/admin\view\regin\editarea.html";i:1541388916;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <a>系统配置</a>
        <a href="<?=url('district/area')?>">区域管理-县区</a>
        <a><cite>修改县区</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('district/area')?>" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-return"></i>
                返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1">
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>省份</label>
                <div class="layui-input-block">
                    <select name="area_p_id" lay-verify="required" id="area_p_id" lay-filter="getCity">
                        <option value="">请选择省份</option>
                        <?php if(is_array($prov) || $prov instanceof \think\Collection || $prov instanceof \think\Paginator): $i = 0; $__LIST__ = $prov;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['p_id']; ?>" <?php if($vo['p_id'] == $area['area_p_id']): ?>selected<?php endif; ?>><?php echo $vo['p_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>城市</label>
                <div class="layui-input-block">
                    <select name="area_c_id" lay-verify="required" id="bu_c_id" lay-filter="bu_c_id">
                        <option value="">请选择城市</option>
                        <?php if(is_array($city) || $city instanceof \think\Collection || $city instanceof \think\Paginator): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['c_id']; ?>" <?php if($vo['c_id'] == $area['area_c_id']): ?>selected<?php endif; ?>><?php echo $vo['c_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>县区</label>
                <div class="layui-input-block">
                    <input type="text" name="c_name" id="area_name" value="<?php echo $area['area_name']; ?>" lay-verify="required" placeholder="请输入县区名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>县区编码</label>
                <div class="layui-input-inline">
                    <input type="text" name="area_code" id="area_code" value="<?php echo $area['area_code']; ?>" lay-verify="required" placeholder="请输入县区编码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux" style="color: red !important;">此编码用来生成房源编号，一旦填写请勿随意修改！</div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <span class="layui-btn" id="saveInfo" >修改</span>
                    <a class="layui-btn" href="<?=url('district/area')?>">返回</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    layui.use(['form','jquery'], function(){
        var form = layui.form
            ,$ = layui.jquery;
        form.on('select(getCity)', function(data){
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
        $('#saveInfo').click(function () {
            var area_id=<?php echo $area['area_id']; ?>;
            var area_p_id=$('#area_p_id').val();
            var area_c_id=$('#bu_c_id').val();
            var area_name=$('#area_name').val();
            var area_code=$('#area_code').val();
            $.ajax({
                type: 'POST',
                url: "<?=url('regin/editArea')?>?area_id=" +area_id,
                data: {area_p_id:area_p_id,area_c_id:area_c_id,area_name:area_name,area_code:area_code},
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    console.log(data.code);
                    if(data.code == 1){
                        layer.alert('修改成功！', {
                            icon: 1,
                            skin: 'layer-ext-moon',
                            time: 2000,
                            end: function(){
                                window.location.href='<?=url("district/area")?>';
                            }
                        });
                    }
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
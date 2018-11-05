<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"G:\xampp\htdocs\bbb\public/../application/admin\view\regin\addcity.html";i:1541388469;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <a href="<?=url('district/city')?>">区域管理-城市</a>
        <a><cite>添加城市</cite></a>
    </span>
        <div style="float:right;">
            <a href="<?=url('district/city')?>" class="layui-btn layui-btn-primary layui-btn-sm">
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
                    <select name="p_id" lay-verify="required" id="p_id">
                        <option value="">请选择省份</option>
                        <?php if(is_array($prov) || $prov instanceof \think\Collection || $prov instanceof \think\Paginator): $i = 0; $__LIST__ = $prov;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['p_id']; ?>"><?php echo $vo['p_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>城市</label>
                <div class="layui-input-block">
                    <input type="text" name="c_name" id="c_name" lay-verify="required" placeholder="请输入城市名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>城市编码</label>
                <div class="layui-input-inline">
                    <input type="text" name="c_code" id="c_code" lay-verify="required" placeholder="请输入城市编码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux" style="color: red !important;">此编码用来生成房源编号，一旦填写请勿随意修改！</div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <span class="layui-btn" id="saveInfo" >添加</span>
                    <a class="layui-btn" href="<?=url('district/city')?>">返回</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    layui.use(['form','jquery'], function(){
        var     $ = layui.jquery;
        $('#saveInfo').click(function () {
            //品质id
            var p_id=$('#p_id').val();
            var c_name=$('#c_name').val();
            var c_code=$('#c_code').val();
            $.ajax({
                type: 'POST',
                url: "<?=url('regin/addcity')?>",
                data: {p_id:p_id,c_name:c_name,c_code:c_code},
                dataType:  'json',
                success: function(data){
                    console.log(data);
                    console.log(data.code);
                    if(data.code == 1){
                        layer.alert('添加成功！', {
                            icon: 1,
                            skin: 'layer-ext-moon',
                            time: 2000,
                            end: function(){
                                window.location.href='<?=url("district/city")?>';
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
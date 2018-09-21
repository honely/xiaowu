<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"G:\xampp\htdocs\bbb\public/../application/admin\view\setinfo\edittype.html";i:1529824684;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\header.html";i:1536287308;s:70:"G:\xampp\htdocs\bbb\public/../application/admin\view\index\footer.html";i:1525742360;}*/ ?>
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
        <?php if($type == 1): ?>
         <a href="<?=url('setinfo/typelist')?>">类型参数-客户标记</a>
        <?php elseif($type == 2): ?>
         <a href="<?=url('setinfo/decStyle')?>">类型参数-装修风格</a>
        <?php elseif($type == 3): ?>
         <a href="<?=url('setinfo/decLevel')?>">类型参数-装修品质</a>
        <?php elseif($type == 4): ?>
         <a href="<?=url('setinfo/houseType')?>">类型参数-房屋类型</a>
        <?php elseif($type == 5): ?>
         <a href="<?=url('setinfo/houseArea')?>">类型参数-房屋面积</a>
        <?php elseif($type == 6): ?>
         <a href="<?=url('setinfo/from')?>">类型参数-推广来源</a>
        <?php elseif($type == 7): ?>
         <a href="<?=url('setinfo/origin')?>">类型参数-推广创意</a>
        <?php endif; if($type == 1): ?>
            <a><cite>修改标记</cite></a>
        <?php elseif($type == 2): ?>
            <a><cite>修改风格</cite></a>
        <?php elseif($type == 3): ?>
            <a><cite>修改品质</cite></a>
        <?php elseif($type == 4): ?>
            <a><cite>修改类型</cite></a>
        <?php elseif($type == 5): ?>
            <a><cite>修改面积</cite></a>
        <?php elseif($type == 6): ?>
            <a><cite>修改来源</cite></a>
        <?php elseif($type == 7): ?>
            <a><cite>修改创意</cite></a>
        <?php endif; ?>
    </span>
        <div style="float:right;">
            <a
                    <?php if($type == 1): ?>
                    href="<?=url('setinfo/typelist')?>"
                    <?php elseif($type == 2): ?>
                    href="<?=url('setinfo/decStyle')?>"
                    <?php elseif($type == 3): ?>
                    href="<?=url('setinfo/decLevel')?>"
                    <?php elseif($type == 4): ?>
                    href="<?=url('setinfo/houseType')?>"
                    <?php elseif($type == 5): ?>
                    href="<?=url('setinfo/houseArea')?>"
                    <?php elseif($type == 6): ?>
                    href="<?=url('setinfo/from')?>"
                    <?php elseif($type == 7): ?>
                    href="<?=url('setinfo/origin')?>"
                    <?php endif; ?>
            class="layui-btn layui-btn-primary layui-btn-sm">
            <i class="layui-icon layui-icon-return"></i>
            返回列表</a>
        </div>
    </div>
    <hr/>
    <div style="padding: 15px;">
        <form class="layui-form layui-form-pane1" action="<?=url('setinfo/edittype')?>?type=<?php echo $type; ?>&type_id=<?php echo $typeInfo['type_id']; ?>" method="post">
            <input type="hidden" value="<?php echo $type; ?>"/>
            <div class="layui-form-item">
                <label class="layui-form-label"><span style="color: red;">*</span>
                    <?php if($type == 1): ?>
                    类型名称
                    <?php elseif($type == 2): ?>
                    风格名称
                    <?php elseif($type == 3): ?>
                    品质名称
                    <?php elseif($type == 4): ?>
                    房屋类型
                    <?php elseif($type == 5): ?>
                    房屋面积
                    <?php elseif($type == 6): ?>
                    来源名称
                    <?php elseif($type == 7): ?>
                    创意名称
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <input type="text" name="type_name" value="<?php echo $typeInfo['type_name']; ?>" lay-verify="required" placeholder=
                            <?php if($type == 1): ?>
                    '请输入类型名称'
                    <?php elseif($type == 2): ?>
                    '请输入风格名称'
                    <?php elseif($type == 3): ?>
                    '请输入品质名称'
                    <?php elseif($type == 4): ?>
                    '请输入房屋类型'
                    <?php elseif($type == 5): ?>
                    '请输入房屋面积'
                    <?php elseif($type == 6): ?>
                    '请输入推广来源'
                    <?php elseif($type == 7): ?>
                    '请输入推广创意'
                    <?php endif; ?>
                    autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">
                    <?php if($type == 1): ?>
                    类型简介
                    <?php elseif($type == 2): ?>
                    风格简介
                    <?php elseif($type == 3): ?>
                    品质简介
                    <?php elseif($type == 4): ?>
                    房屋类型
                    <?php elseif($type == 5): ?>
                    面积区间
                    <?php elseif($type == 6): ?>
                    来源字段
                    <?php elseif($type == 7): ?>
                    创意字段
                    <?php endif; ?>
                </label>
                <?php if($type == 5): ?>
                <div class="layui-input-inline" style="width: 100px;">
                    <input type="text" name="minArea" lay-verify="required" value="<?php echo $typeInfo['type_remarks'][0]; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid">-</div>
                <div class="layui-input-inline" style="width: 100px;">
                    <input type="text" name="maxArea" lay-verify="required" value="<?php echo $typeInfo['type_remarks'][1]; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid">单位：（m²）</div>
                <div class="layui-form-mid layui-word-aux">请填写请填写面积区间（如：80-100 表示面积大于等于80，小于100）</div>
                <?php else: ?>
                <div class="layui-input-block">
                    <textarea lay-verify="required"  placeholder=
                                      <?php if($type == 1): ?>
                    "请输入类型简介"
                    <?php elseif($type == 2): ?>
                    "请输入风格简介"
                    <?php elseif($type == 3): ?>
                    "请输入品质简介"
                    <?php elseif($type == 4): ?>
                    "请输入房屋类型"
                    <?php elseif($type == 6): ?>
                    "请输入来源字段"
                    <?php elseif($type == 7): ?>
                    "请输入创意字段"
                    <?php endif; ?>
                    name="type_remarks" class="layui-textarea"><?php echo $typeInfo['type_remarks']; ?></textarea>
                </div>
                <?php endif; ?>
            </div>
            <div class="layui-form-item" pane>
                <label class="layui-form-label">是否可用</label>
                <div class="layui-input-block">
                    <input type="radio" name="type_isable" value="1" title="是" checked>
                    <input type="radio" name="type_isable" value="2" title="否">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" type="submit">修改</button>
                    <?php if($type == 1): ?>
                    <a class="layui-btn layui-btn-primary" href="<?=url('setinfo/typelist')?>">返回</a>
                    <?php elseif($type == 2): ?>
                    <a class="layui-btn layui-btn-primary" href="<?=url('setinfo/decStyle')?>">返回</a>
                    <?php elseif($type == 3): ?>
                    <a class="layui-btn layui-btn-primary" href="<?=url('setinfo/declevel')?>">返回</a>
                    <?php elseif($type == 4): ?>
                    <a class="layui-btn layui-btn-primary" href="<?=url('setinfo/houseType')?>">返回</a>
                    <?php elseif($type == 5): ?>
                    <a class="layui-btn layui-btn-primary" href="<?=url('setinfo/houseArea')?>">返回</a>
                    <?php elseif($type == 6): ?>
                    <a class="layui-btn layui-btn-primary" href="<?=url('setinfo/from')?>">返回</a>
                    <?php elseif($type == 7): ?>
                    <a class="layui-btn layui-btn-primary" href="<?=url('setinfo/origin')?>">返回</a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    layui.use('form', function(){
        var form = layui.form;
        form.on('radio', function(data){
            console.log(data);
        });
        //监听提交
        form.on('submit(*)', function(data){
            console.log(data)
            return false;
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
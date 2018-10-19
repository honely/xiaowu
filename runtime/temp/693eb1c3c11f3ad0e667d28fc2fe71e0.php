<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"G:\xampp\htdocs\bbb\public/../application/market\view\house\add.html";i:1539235935;s:71:"G:\xampp\htdocs\bbb\public/../application/market\view\common\toper.html";i:1539075681;s:72:"G:\xampp\htdocs\bbb\public/../application/market\view\common\footer.html";i:1539074576;}*/ ?>
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
                                    <input type="text" id="case_title" name="h_name" lay-verify="required|title" placeholder="请输入房源名称" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                            <label class="layui-form-label"><span style="color: red;">*</span>合同编号</label>
                            <div class="layui-input-block">
                                <input type="text" name="h_contract_code" lay-verify="required" placeholder="请输入合同编号" autocomplete="off" class="layui-input">
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
                                <label class="layui-form-label"><span style="color: red;">*</span>小区名称</label>
                                <div class="layui-input-block">
                                    <input type="text" name="h_building" lay-verify="required" placeholder="请输入小区名称" autocomplete="off" class="layui-input">
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
                                <div class="layui-input-block">
                                    <input type="text" name="h_head" lay-verify="required" placeholder="请输入房屋朝向" autocomplete="off" class="layui-input">
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
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span style="color: red;">*</span>地理坐标</label>
                                <div class="layui-input-block">
                                    <input type="text" name="h_location" placeholder="请输入地理坐标" autocomplete="off" class="layui-input">
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
<script id="img_template" type="text/html">
    <div class="upload-img" filename="{{ d.index }}">
        <input type="checkbox" name="" lay-skin="primary">
        <img src="{{  d.result }}" alt="{{ d.name }}" class="layui-upload-img">
    </div>
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
    layui.use(['form', 'jquery'], function(){
        var form = layui.form
            ,$ = layui.jquery;
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
        });
    });
</script>

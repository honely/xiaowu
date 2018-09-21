$(document).ready(function(){
    $(document).ready(function() {
        $(".popup2").click(function(){
            $(".popupHide2").toggle();
        });
    });
    lunboInit();

    //侧边栏按钮
    $("#leftSide .sideBox").hover(function(){
        if($(this).prop("className")=="youhui"){
            $(this).children("img.hides").show();
        }else{
            $(this).children("img.shows").hide();
            $(this).children("div.hides").show();
            $(this).children("div.hides").animate({marginRight:'0'},'0');
        }
    },function(){
        if($(this).prop("className")=="youhui"){
            $(this).children("img.hides").hide();
        }else{
            $(this).children("div.hides").animate({marginRight:'-124px'},0,function(){$(this).hide();
                $(this).next("img.shows").show();});
        }
    });

    //返回顶部
    $("#btn").hide();
    $(function(){
        $(window).scroll(function(){
            if ($(window).scrollTop()>500){
                $("#btn").fadeIn(500);
            }
            else{
                $("#btn").fadeOut(500);
            }
        });
        $("#btn").click(function(){
            $('body,html').animate({scrollTop:0},600);
            return false;
        });

    });

    $("#topNav li").mouseenter(function(){
        {
            $(this).siblings().removeClass("overBtn");
            $(this).addClass("overBtn");
        }
    });

    //导航菜单按钮
    $('.topSider').click(function(){
        $(this).hide();
        $('.topClose').show();
        $('.topSubmenu').show();
    });
    $('.topClose').click(function(){
        $(this).hide();
        $('.topSider').show();
        $('.topSubmenu').hide();
    });
    $("#subMenu a").mouseenter(function(){
        {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
        }
    });


    $(".click,.shows,.tit").click(function(){
        $(".wrap").show();
    });
    $(".close").click(function(){
        $(".wrap").hide();
    });



});

function lunboInit(){
    var yunx;       // 定义动画变量
    var Time = 5000;      // 自动播放间隔时间 毫秒
    var num = 1500;       // 切换图片间隔的时间 毫秒
    var page = 0;         // 定义变量
    var len = $( ".zfb_datu_ul li" ).length;     // 获取图片的数量
    $( ".zfb_datu_ul li" ).css( "opacity", 0 );   // 设置全部的图片透明度为0
    $( ".zfb_datu_ul li:first" ).css( "opacity", 1 ); // 设置默认第一张图片的透明度为1
    function fun(){      // 封装
        $( ".xiaod_div span" ).eq( page ).addClass( "a_active" ).siblings().removeClass( "a_active" );       // 切换小点
        $( ".zfb_datu_ul li" ).eq( page ).animate({ "opacity" : 1 }, num ).siblings().animate( { "opacity" : 0 }, num );     // 切换图片

        $( ".zfb_datu_ul li" ).eq( page ).css({ "z-index" :"400" }, num ).siblings().css( { "z-index" :"300" }, num );
    }
    function run(){         // 封装
        if( !$(".zfb_datu_ul li" ).is( ":animated" )){    // 判断li是否在动画
            if( page == len - 1 ){ // 当图片切换到了最后一张的时候
                page = 0;    // 把page设置成0 又重新开始播放动画
                fun();
            }else{     // 继续执行下一张
                page++;
                fun();
            }
        }
    }
    $(".xiaod_div span").click( function(){  // 点击小点
        if( !$( ".zfb_datu_ul li" ).is( ":animated" ) ){   // 判断li是否在动画
            var index = $( ".xiaod_div span" ).index( this );   // 获取点击小点的位置
            page = index;    // 同步于page
            fun();
        }
    });

    $( ".ownerBanner" ).hover( function(){    // 鼠标放上去图片的时候清除动画
        clearInterval( yunx );
    }, function(){     // 鼠标移开图片的时候又开始执行动画
        yunx = setInterval( run, Time );
    }).trigger( "mouseleave" );
}

function menuBlank(){

}


function saveOwner(basePath){
    var cityId=$("#cityId").val();
    var cityName;
    if(cityId!=''){
        cityName=$("#cityId").find("option:selected").text();
    }
    var districtId=$("#districtId").val();
    var district;
    if(districtId!=''){
        district=$("#districtId").find("option:selected").text();
    }
    var areaId=$("#areaId").val();
    var area;
    if(areaId!=''){
        area=$("#areaId").find("option:selected").text();
    }
    var ownerName=$("#cus_name").val().trim();
    var ownerMobile=$("#cus_mobile").val().trim();
    var roomAddress=$("#room_address").val().trim();
    var memo=$("#memo").val().trim();
    var mobile_reg=/^1\d{10}$/
    if(!cityId){
        alert("请选择城市");
        return;
    }
    if(!ownerName){
        alert("请输入输姓名");
        return;
    }
    if(ownerName.length>12){
        alert("姓名长度大于12");
        return;
    }
    if(/[@\/'\\"`~!#$%&\^*]/.test(ownerName))
    {
        alert('姓名有非法字符');
        return ;
    }
    if(!ownerMobile){
        alert("请输入电话号码");
        return;
    }
    //else{
    //if(!mobile_reg.test(ownerMobile)){
    //	alert("手机号码格式不正确！请重新输入！");
    //	return;
    //}
    //}
    if(isNaN(ownerMobile)){
        alert("电话号码格式不正确！");
        return;
    }
    if(ownerMobile.length>20){
        alert("电话长度大于20");
        return;
    }
    if(!districtId){
        alert("请选择行政区");
        return;
    }
    //if(!areaId){
    //	alert("请选择商圈");
    //	return;
    //}
    if(!roomAddress){
        alert("请输入房源地址");
        return;
    }
    if(roomAddress.length>40){
        alert("房源地址长度大于40");
        return;
    }
    if(memo.length>40){
        alert("备注长度大于40");
        return;
    }
    roomAddress=escapeHtml(roomAddress);
    memo=escapeHtml(memo);
    var url=basePath+"/to/saveOwnerInfo.do";

    $.ajax( {
        type : "post",
        url : url,
        dataType : "text",
        data:{cityId:cityId,cityName:cityName,ownerName:ownerName,ownerMobile:ownerMobile,roomAddress:roomAddress,memo:memo,
            districtId:districtId,district:district,areaId:areaId,area:area},
        success : function(datas) {
            $(".wrap").hide();
            if(datas=='1'){
                alert("您的提交已成功！");
                $("#cus_name").val('');
                $("#cus_mobile").val('');
                $("#room_address").val('');
                var cityid= $("#cityid").val();
                if(cityid==62){
                    cityid=2;
                }
                $("#cityId").val(cityid);
                getDistrict(basePath);
                $("#districtId").val('');
                $("#areaId").val('');
                $("#memo").val('');
            }else{
                alert("提交失败！请稍后重试！");
            }
        }
    });
}

//查询城市下的行政区
function getDistrict(basePath) {
    var htmls = "";
    htmls += "<option value=''>商圈</option>";
    var cityId= "";
    var districtId= "";
    var areaId= "";
    cityId = $("#cityId").val();
    if (cityId == "") {
        $("#areaId").html(htmls);
    }
    districtId = $("#districtId").val();
    if (districtId == "") {
        $("#areaId").html(htmls);
    }
    var _url = basePath + "/to/getDistrict.do";
    $.ajax({
        url: _url,
        type: "post",
        data: {cityId: cityId},
        error: function () {
        },
        success: function (data) {
            var comHtml = "<option value=''>行政区</option>";//行政区
            var list =  data.data;
            if(list.length == 0){
                $("#areaId").html(htmls);
                $("#districtId").html(comHtml);
            }else{
                for (var i = 0; i < list.length; i++) {
                    var id = list[i].prcId;
                    var name = list[i].prcName;
                    comHtml += " <option value=" + id + ">" + name + "</option>";
                    var myselect = document.getElementById("districtId");
                    if (districtId != id) {
                        $("#areaId").html(htmls);
                    }
                }
                $("#districtId").html(comHtml);
            }

        }
    });
}
//查询行政区下的商圈
function getArea(basePath) {
    var htmls = "";
    htmls += "<option value=''>商圈</option>";
    var cityId= "";
    var districtId= "";
    var areaId= "";
    cityId = $("#cityId").val();
    districtId = $("#districtId").val();
    if (cityId == "") {
        $("#areaId").html(htmls);
    }
    if (districtId == "") {
        $("#areaId").html(htmls);
    }
    var _url = basePath + "/to/getArea.do";
    $.ajax({
        url: _url,
        type: "post",
        data: {districtId: districtId},
        error: function () {
        },
        success: function (data) {
            var serHtml = "<option value=''>商圈</option>";//商圈
            var list = data.data;
            for (var i = 0; i < list.length; i++) {
                var id = list[i].ceaId;
                var name = list[i].ceaName;
                serHtml += " <option value=" + id + ">" + name + "</option>";
                var myselect = document.getElementById("districtId");
                if (districtId != id) {
                    $("#areaId").html(htmls);
                }
            }
            $("#areaId").html(serHtml);
        }
    });
}
function escapeHtml (html) {
    return html.replace(/</g, '&lt;').replace(/>/g, '&gt;');
}


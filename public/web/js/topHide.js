$(document).ready(function() {
    $(".popup").click(function(){
        $(".popupHide").toggle();
    });
});
$(document).ready(function() {
    $(".menu").click(function(){
        $(".nav").show();
        $(".menu").hide();
        $(".menuHide").show();
    });
    $(".menuHide").click(function(){
        $(".nav").hide();
        $(".menuHide").hide();
        $(".menu").show();
    });

});
// 底部友情链接 选项卡
$(document).ready(function(){
    var $div_li =$("div.w1170TabMenu ul li");
    $div_li.click(function(){
        $(this).addClass("selected")
            .siblings().removeClass("selected");
        var index =  $div_li.index(this);
        $("div.w1170TabBox > div")
            .eq(index).show()
            .siblings().hide();
    });
});

//#feature
$(document).ready(function(){
    var timerId = null;
    function itemShow(){
        if (timerId) return;
        timerId = setInterval(function(){
            $("#feature li.current a span").animate({top: "-62px" },100);
            $("#feature li.current a p").animate({top: "-62px"},100);
            $("#feature li.current a p").css({backgroundColor: "#21cfbb",color:"#ffffff"});
        }, 100);
    }
    function itemHide(){
        if (!timerId) return;
        $("#feature li.current a span").animate({top: "0px" }, "fast");
        $("#feature li.current a p").animate({top: "0px"}, "fast");
        $("#feature li.current").removeClass("current");
        clearInterval(timerId);
        timerId = null;
    }
    $("#feature li").hover(function(){
        $(this).addClass("current");
        itemShow();
    }, itemHide);
});
$(document).ready(function() {
    $(".more a").mouseenter(function(){
        if($(this).is(":animated"))
        {
            return;
        }
        else{
            $(this).animate({width:"241px",height:"76px",lineHeight:"76px",fontSize:"22px",top:"2px",left:"2px"},100);
            $(this).animate({width:"245px",height:"80px",lineHeight:"80px",fontSize:"24px",top:"0",left:"0"},100);
        }
    });
});
$(document).ready(function(){
    $("#sidebarRig .sidebarBox").hover(function(){
        if($(this).prop("className")=="youhui"){
            $(this).children("img.sideFadeIn").show();
        }else{
            $(this).children("img.sideFadeOut").hide();
            $(this).children("div.sideFadeIn").show();
            $(this).children("div.sideFadeIn").animate({marginRight:'0'},'0');
        }
    },function(){
        if($(this).prop("className")=="youhui"){
            $(this).children("img.sideFadeIn").hide();
        }else{
            $(this).children("div.sideFadeIn").animate({marginRight:'-124px'},0,function(){$(this).hide();
                $(this).next("img.sideFadeOut").show();});
        }
    });
//出现滚动条显示
    $("#sidebarTop").hide();
    $(function(){
        $(window).scroll(function(){
            if ($(window).scrollTop()>500){
                $("#sidebarTop").fadeIn(500);
            }
            else{
                $("#sidebarTop").fadeOut(500);
            }
        });

        $("#sidebarTop").click(function(){
            $('body,html').animate({scrollTop:0},600);
            return false;
        });

    });
});
// 面包屑
$(function(){
    var $anvlfteb=$('#anvlfteb'),
        $topnanv=$('#topnanv'),
        $posbox=$anvlfteb.find('div.posbox'),
        $seledbox=$("#seledbox");
    $posbox.mouseover(function(){
        var i=$(this).index();
        var _oli=$("#topnanv #anvlfteb .posbox");
        var _odiv=$("#topnanv #seledbox .area");
        var _this=$(this);
        var index=_oli.index(_this);
        _odiv.eq(index).addClass("areaCur").siblings().removeClass("areaCur");
        var _othis=_odiv.eq(index);
        if(!_othis.find("a").length){
            _othis.hide();
        }
        $(this).addClass("anvh").siblings().removeClass("anvh");
        var l= $(this).offset().left- $( $(".posbox")[0]).offset().left;
        if($seledbox.is(":hidden")){
            $seledbox.show().css("left",l-1);
        }else{
            $seledbox.stop().animate({left:l-1},200,function(){
                $("#seledbox");
            });
        }
    });
    $topnanv.mouseleave(function(){
        $seledbox.hide();
        $posbox.removeClass("anvh");
    });
});
$(function(){
    var _Bli=$(".lf-area-tit i span");
    _Bli.click(function () {
        var _this=$(this);
        var index=_Bli.index(_this);
        _Bli.removeClass();
        _this.addClass("cur");
    });
});
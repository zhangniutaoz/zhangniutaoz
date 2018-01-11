$(function(){
	$('#pjax-container .msg-nav li').click(function(){
		$(this).addClass('actived').siblings().removeClass('actived');
	})
})
			//==============================footer二维码===========================================
$(function(){
	$('.qrcode-hover-box .layer-box').hover(
		function(){
			$('.layer-box').eq(0).animate({opacity:.9},20);
		},
		function(){
			$('.layer-box').eq(0).animate({opacity:.5},20);
		}
	);
	
	$('.qrcode-hover-box').bind('mouseover',function(){
		$('.download-app-boxs').show();
	}).bind('mouseout',function(){
		$('.download-app-boxs').hide();
	})
	
	
	$('.return-top').hover(
		function(){
			$('.layer-box').eq(1).animate({opacity:.9},20);
		},
		function(){
			$('.layer-box').eq(1).animate({opacity:.5},20);
		}
	);
	
    //回到顶部
    $("#goPageTop").on("click", function() {
      $('body,html').animate({
       scrollTop: 0
      }, 500);
      return false;
     });
     
     
     //图标隐藏-显示
 	$(window).scroll(function() {
	  	/* 判断滚动条 距离页面顶部的距离 100可以自定义*/
		if($(window).scrollTop() > 100) {
	       $(".min").fadeIn(100); /* 这里用.show()也可以 只是效果太丑 */
		} else {
	       $(".min").fadeOut(100);
		}
    })

	//=========================================================================
})
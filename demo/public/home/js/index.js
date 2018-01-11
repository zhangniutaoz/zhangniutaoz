//===============这是上面的导航==============
$(function(){
	var time_=null;
	$('.right .help').hover(function(){
		var index_ = $(this);
		time_ = setTimeout(function(){
			index_.css('background','#EAECEB');
			index_.find('.disp').slideDown(300);
		},300)
	},function(){
		$('.help').css('background',"#f4f4f4");
		$(this).find(".disp").slideUp(300);
		clearTimeout(time_);
	})
	
//==================这是二级导航==================
	var time = null;
	$('.nav-three .center-content .sub-nav-list .contain-third').hover(function(){
		var index = $(this);
		time = setTimeout(function(){
			index.find('.sub-nav-one').css('border-bottom',"2px solid #fff");
			index.find('ul').slideDown(300);
		},300)
	},function(){
		$(this).find('.sub-nav-one').css('border-bottom',"none");
		$(this).find("ul").slideUp(300);
		clearTimeout(time);
	})
})

//============================这是轮播图的js==========================
$(function(){
	var time=null;
	var time1=null;
	var index1=0;
	//鼠标移入每个小图标
	$('.slide ol li').mouseover(function(){
		var _this=$(this);
		//延迟0.3秒后执行
		time=setTimeout(function(){
			//对应的小图表加上selected类的样式，其他的同级元素移除selected样式
			_this.addClass('selected').siblings().removeClass('selected');
			var index=_this.index();
			index1=index;
			//对应的图片淡入，其他同级的图片淡出
			$('.slide ul li').eq(index).fadeIn(500).siblings().fadeOut(600);
		},300)
	}).mouseout(function(){
		//鼠标移出清除延迟定时器
		clearTimeout(time);
	})
	//自动淡出淡入轮播的实现
    function fade(){
    	if(index1 == 3){
        	index1 = 0;
    	}else{
       		index1++;
    	}
    	//对应的小图标加上selected类的样式，其他的同级元素移除selected样式
    	$('.slide ol li').eq(index1).addClass('selected').siblings().removeClass('selected');
		//对应的图片淡入，其他同级的图片淡出
		$('.slide ul li').eq(index1).fadeIn(500).siblings().fadeOut(600);
	}
	//每隔3s切换图片
	time1 = setInterval(fade,3000);

	//左箭头的方法
	function fadeLeft(){
    	if(index1 == 0){
        	index1 = 3;
    	}else{
       		index1--;
    	}
    	$('.slide ol li').eq(index1).addClass('selected').siblings().removeClass('selected');
		$('.slide ul li').eq(index1).fadeIn(500).siblings().fadeOut(600);
	}

    //鼠标移入暂停，鼠标移出继续
    $('.slide').hover(function(){
        clearInterval(time1);
    },function(){
    	time1 = setInterval(fade,3000);
    })

    //点击左箭头的实现
    $('.left').click(function(){
    	fadeLeft();
    })
    //点击右箭头的实现
    $('.right').click(function(){
    	fade();
    })
})



//========================这是优选品牌的滚动轮播====================

$(function(){
	var i=0;
	var timer=null;
	var firstimg=$('.preference-brand .top-one ul li .img').first().clone(); //复制第一张图片
	$('.preference-brand .top-one ul li').append(firstimg).width('300%');
	// 下一个按钮
	$('.preference-brand .top-one .right').click(function(){
		i++;
		if (i==$('.preference-brand .top-one ul li .img').length) {
			i=1; //这里不是i=0
			$('.preference-brand .top-one ul li').css({left:0}); //保证无缝轮播，设置left值
		};
		   
		$('.preference-brand .top-one ul li').stop().animate({left:-i*987},600);
	})
	// 上一个按钮
	$('.preference-brand .top-one .left').click(function(){
		i--;
		if (i==-1) {
			i=$('.preference-brand .top-one ul li .img').length-2;
			$('.preference-brand .top-one ul li').css({left:-($('.preference-brand .top-one ul li .img').length-1)*987});
		};
		   
		$('.preference-brand .top-one ul li').stop().animate({left:-i*987},600);
	})
	//定时器自动播放
 timer=setInterval(function(){
  i++;
  if (i==$('.preference-brand .top-one ul li .img').length) {
  i=1;
  $('.preference-brand .top-one ul li').css({left:0});
  };
  
  $('.preference-brand .top-one ul li').stop().animate({left:-i*987},600);
  
 },3000)
	 //鼠标移入，暂停自动播放，移出，开始自动播放
	$('.preference-brand .top-one').hover(function(){
	  	clearInterval(timer);
	},function(){
	 	timer=setInterval(function(){
		  	i++;
		  	if (i==$('.preference-brand .top-one ul li .img').length) {
		  	i=1;
		  	$('.preference-brand .top-one ul li').css({left:0});
		};
		  
		  	$('.preference-brand .top-one ul li').stop().animate({left:-i*987},600);
		},3000)
	})
})
//=================这是优选品牌BRAND下面轮播的鼠标悬停背景============
$(function(){
	var imgH=$('.preference-brand .top-one ul').height();
	//alert(imgH);
	$('.preference-brand .top-one ul li .img-list .backgor').css({'width':'320px','height':imgH,'position':'absolute','left':'0px','top':'0px'});
	$('.preference-brand .top-one ul li .img-list a').mouseover(function(){
    	$(this).find(".backgor").addClass('backgorund').children().removeClass('backgorund');
    }).mouseout(function(){
    	$('.preference-brand .top-one ul li .img-list .backgor').removeClass('backgorund');
    })
})

//=============这是优选品牌下面广告牌的手动轮播======================

$(function(){
	var index=0;
	$('.preference-brand .bottom .right ul .logo-brand-switch .prev').click(function(){
		if(index==1){
			//alert('aaa');
			//对应的图片淡入，其他同级的图片淡出
			$('.preference-brand .bottom ul .disp').eq(1).fadeIn(500).siblings().fadeOut(600);
		}else{
			//对应的图片淡入，其他同级的图片淡出
			$('.preference-brand .bottom ul .disp').eq(0).fadeIn(500).siblings().fadeOut(600);
			index=0;
		}
		index++;
	})
	$('.preference-brand .bottom .right ul .logo-brand-switch .next').click(function(){
		if(index==0){
			//alert('aaa');
			//对应的图片淡入，其他同级的图片淡出
			$('.preference-brand .bottom ul .disp').eq(1).fadeIn(500).siblings().fadeOut(600);
			//index=0;
		}else{
			//对应的图片淡入，其他同级的图片淡出
			$('.preference-brand .bottom ul .disp').eq(0).fadeIn(500).siblings().fadeOut(600);
			index=1;
		}
		index--;
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
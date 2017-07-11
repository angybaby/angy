$(function(){
	$(".slider li").click(function(){
		var sliderNum=$(this).attr("sliderNum");
		//console.log(sliderNum);
		$(this).addClass("actived").siblings().removeClass("actived");
		$(".banner").fadeOut("500",function(){
			$(this).css({background:"url(./images/banner"+sliderNum+".jpg)"}).fadeIn("500");
		})
	})
})
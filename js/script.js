document.getElementById("menu_type_button").onclick=function(){

	$("#main_image_slide").fadeOut(500);    
	$("#wine_image_slide").fadeIn(500); 	
};

document.getElementById("menu_button").onclick=function(){	 
	$("#wine_image_slide").fadeOut(500); 
	$("#main_image_slide").fadeIn(500);  	
};

function switchDisplay (hash) {
	var newSlide = $("#" + hash + "_image_slide");
	var oldSlide = $(".current_slide");

	oldSlide.fadeOut(500);
	newSlide.fadeIn(500);

	oldSlide.removeClass("current_slide");
	newSlide.addClass("current_slide");
}
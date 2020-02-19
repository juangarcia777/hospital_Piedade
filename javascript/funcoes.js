


$(document).ready(function(){
    
	$("#menu01").mouseenter(function(){
		$(".sub01").stop( true );
        $(".sub01").slideDown('slow');
    });
	
	 $("#menu01").mouseleave(function(){
		$(".sub01").stop( true );
        $(".sub01").slideUp('slow');
    });
	
	
	$("#menu02").mouseenter(function(){
		$(".sub02").stop( true );
        $(".sub02").slideDown('slow');
    });
	
	 $("#menu02").mouseleave(function(){
		$(".sub02").stop( true );
        $(".sub02").slideUp('slow');
    });
	
	
	$("#menu03").mouseenter(function(){
		$(".sub03").stop( true );
        $(".sub03").slideDown('slow');
    });
	
	 $("#menu03").mouseleave(function(){
		$(".sub03").stop( true );
        $(".sub03").slideUp('slow');
    });
	
	
	$("#menu04").mouseenter(function(){
		$(".sub04").stop( true );
        $(".sub04").slideDown('slow');
    });
	
	 $("#menu04").mouseleave(function(){
		$(".sub04").stop( true );
        $(".sub04").slideUp('slow');
    });
	
	
	$("#menu05").mouseenter(function(){
		$(".sub05").stop( true );
        $(".sub05").slideDown('slow');
    });
	
	 $("#menu05").mouseleave(function(){
		$(".sub05").stop( true );
        $(".sub05").slideUp('slow');
    });
	
	
	
	$("#menu99").mouseenter(function(){
		$(".subsub").stop( true );
        $(".subsub").animate({width:'toggle'},500);
    });
	
	 $("#menu99").mouseleave(function(){
		$(".subsub").stop( true );
        $(".subsub").animate({width:'toggle'},500);
    });
	
   
});

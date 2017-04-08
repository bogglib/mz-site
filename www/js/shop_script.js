$(document).ready(function() {
   $("#newsticker").jCarouselLite({
		vertical: true,
		hoverPause: true,
		btnPrev: "#news-prev",
		btnNext: "#news-next",
		visible: 2,
		auto: 3000,
		speed: 500
	});

$("#style-grid").click(function(){
	$("#block-tovar-grid").hide();
	$("#block-tovar-list").show();
	$("#style-grid").attr("src","img/icon-grid-active.png");
	$("#style-list").attr("src","img/icon-list.png");
	$.cookie('select_style','grid');
});


$("#style-list").click(function(){
	$("#block-tovar-list").hide();
	$("#block-tovar-grid").show();
	$("#style-list").attr("src","img/icon-list-active.png");
	$("#style-grid").attr("src","img/icon-grid.png");
	$.cookie('select_style','list');
});


if ($.cookie('select_style') == 'grid' ){
	$("#block-tovar-grid").hide();
	$("#block-tovar-list").show();
	$("#style-grid").attr("src","img/icon-grid-active.png");
	$("#style-list").attr("src","img/icon-list.png");
	}
	else{
		$("#block-tovar-list").hide();
		$("#block-tovar-grid").show();
		$("#style-list").attr("src","img/icon-list-active.png");
		$("#style-grid").attr("src","img/icon-grid.png");
	}
$("#select-sort").click(function(){
	$("#sorting-list").slideToggle(200);
});

$('#block-category > ul > li > a').click(function(){
               	        
            if ($(this).attr('class') != 'active'){
                
			$('#block-category > ul > li > ul').slideUp(400);
            $(this).next().slideToggle(400);
            
                    $('#block-category > ul > li > a').removeClass('active');
					$(this).addClass('active');
                    $.cookie('select_cat', $(this).attr('id'));
                    
				}else
                {
                                   
                    $('#block-category > ul > li > a').removeClass('active');
                    $('#block-category > ul > li > ul').slideUp(400);
                    $.cookie('select_cat', '');   
                }                                  
});
if ($.cookie('select_cat') != '')
{
$('#block-category > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show();
}
});
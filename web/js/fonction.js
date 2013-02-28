			var numarticle=0;
			var id = "#"+numarticle;
			var numarticleMini = 0;
			var numarticleMax = $('.article').length;
			$(id).animate({ opacity: '1' }, 500);

			$("#next_article").click(function() {

				if(numarticle<(numarticleMax-3)){//id 0 + top et foot
                                    	numarticle++;
					var id = "#"+numarticle;
					var idmoins = "#"+(numarticle-1);
                                        $(idmoins).animate({ opacity: '0.05' }, 500,function() {
                                               $(".article").animate({ top: '-=675' }, 500);
                                               $(id).animate({ opacity: '1' }, 500);
                                         });
				}
				
			});

			$("#prev_article").click(function() {

				if(numarticle>numarticleMini){
                                    	numarticle--;
					var id = "#"+numarticle;
					var idmoins = "#"+(numarticle+1);
                                        $(idmoins).animate({ opacity: '0.05' }, 500,function() {
                                              $(".article").animate({ top: '+=675' }, 500);
                                              $(id).animate({ opacity: '1' }, 500);
                                         });
					
				}

			});
                        
$(document).ready(function(){
document.getElementById('sous_menu_2').style.display="none";


$("#ul_menu a").click(function(){
$("#ul_menu ul").css( "margin-left", "292px" );
$("#ul_menu ul ul ").css( "margin-left", "0px" );
$(this).next().slideToggle("slow");
$(this).parent().siblings().find("ul").slideUp();

return false;
});
});

$(document).ready(function () {	
	
	$('.sous_menu li').click(
		function () {
			//show its submenu
			$('ul', this).stop().slideDown(100);

		}, 
		function () {
			//hide its submenu
			$('ul', this).stop().slideUp(100);			
		}
	);
	
});



	$(document).ready( function(){
	    $('#slideshowHolder').jqFancyTransitions({ width: 291, height: 291, effect: 'wave',navigation: true});
	});
        

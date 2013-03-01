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
			$('ul', this).stop().slideDown(100);
		}, 
		function () {
			$('ul', this).stop().slideUp(100);			
		}
	);
	
});



$(document).ready( function(){
         $('#slideshowHolder').jqFancyTransitions({ width: 291, height: 291, effect: 'wave',navigation: true});
});


$("#lang_fr").attr('src', '/Pollina/web/img/fr_true.png');

$("#lang_fr").mouseover(function() {  $(this).attr('src', '/Pollina/web/img/fr_true.png'); });
$("#lang_de").mouseover(function() {  $(this).attr('src', '/Pollina/web/img/de_true.png'); });
$("#lang_en").mouseover(function() {  $(this).attr('src', '/Pollina/web/img/en_true.png'); });


$("#lang_fr").mouseout(function() {   $(this).attr('src', '/Pollina/web/img/fr_false.png'); });
$("#lang_de").mouseout(function() {   $(this).attr('src', '/Pollina/web/img/de_false.png'); });
$("#lang_en").mouseout(function() {   $(this).attr('src', '/Pollina/web/img/en_false.png'); });


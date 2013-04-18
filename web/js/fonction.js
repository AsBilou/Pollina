var numarticle=0;
var id = "#"+numarticle;
var numarticleMini = 0;
var numarticleMax = $('.article').length;
$(id).animate({ opacity: '1' }, 500);
var check;

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

//espace client bouton voir un devis
$("#views_quote").click(function() {
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
//espace client bouton crée un devis
$("#create_quote").click(function() {

        if(numarticle<(numarticleMax-3)){//id 0 + top et foot
                numarticle++;
                var id = "#"+numarticle;
                var idmoins = "#"+(numarticle-2);
                $(idmoins).animate({ opacity: '0.05' }, 500,function() {
                       $(".article").animate({ top: '-=1350' },1000);
                       $(id).animate({ opacity: '1' }, 500);
                 });
        }

});


                        
//slider sidebar
$(document).ready( function(){
    $('#slideshowHolder').jqFancyTransitions({ width: 291, height: 291, effect: 'wave',navigation: true});
});



//affichage logo lang
if(window.location.pathname.match("/fr/")){
    $("#lang_fr").css('background-image', 'url(../img/fr_true.png)');
    $("#lang_fr").css('width', '30px');
    $("#lang_fr").css('height', '30px');
    $("#lang_fr").css('margin-left', '5px');
    $("#lang_fr").css('margin-right', '5px');
    $("#lang_fr").css('margin-top', '4px');
}
else if(window.location.pathname.match("/en/")){
    $("#lang_en").css('background-image', 'url(../img/en_true.png)');
    $("#lang_en").css('width', '30px');
    $("#lang_en").css('height', '30px');
    $("#lang_en").css('margin-left', '5px');
    $("#lang_en").css('margin-right', '5px');
    $("#lang_en").css('margin-top', '4px');
}
else if(window.location.pathname.match("/de/")){
    $("#lang_de").css('background-image', 'url(../img/de_true.png)');
    $("#lang_de").css('width', '30px');
    $("#lang_de").css('height', '30px');
    $("#lang_de").css('margin-left', '5px');
    $("#lang_de").css('margin-right', '5px');
    $("#lang_de").css('margin-top', '4px');
}
else{
    
    $("#lang_fr").css('background-image', 'url(../img/fr_true.png)');
    $("#lang_fr").css('width', '30px');
    $("#lang_fr").css('height', '30px');
    $("#lang_fr").css('margin-left', '5px');
    $("#lang_fr").css('margin-right', '5px');
    $("#lang_fr").css('margin-top', '4px');
}


//menu
$("#menu2").hover(
        function () {
            $("#sousmenuMetier").show();
        },
        function () {
            $("#sousmenuMetier").hide();
        }
);

$("#sousmenuMetier").hover(
        function () {
            $(this).show();
        },
        function () {
            $(this).hide();
        }
);

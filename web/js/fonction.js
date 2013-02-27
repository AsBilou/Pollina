			var numarticle=0;
			var id = "#"+numarticle;
			var numarticleMini = 0;
			var numarticleMax = $('.article').length;
			$(id).animate({ opacity: '1' }, 500);

			$("#suiv").click(function() {

				if(numarticle<numarticleMax){
                                    	numarticle++;
					var id = "#"+numarticle;
					var idmoins = "#"+(numarticle-1);
                                        $(idmoins).animate({ opacity: '0.05' }, 500);
					$(id).animate({ opacity: '1' }, 500);
					$(".article").animate({ top: '-=765' }, 500);
				}
				
			});

			$("#pres").click(function() {

				if(numarticle>numarticleMini){
                                    	numarticle--;
					var id = "#"+numarticle;
					var idmoins = "#"+(numarticle+1);
                                        $(idmoins).animate({ opacity: '0.05' }, 500);
					$(id).animate({ opacity: '1' }, 500);
					$(".article").animate({ top: '+=765' }, 500);
				}

			});

			var numarticle=1;
			var id = "#"+numarticle;
			var numarticleMini = 1;
			var numarticleMax = $('.article').length;
			$(id).animate({ opacity: '1' }, 500);

			$("#suiv").click(function() {

				if(numarticle<numarticleMax){
					$(".article").animate({ top: '-=570' }, 500);

					numarticle++;
					var id = "#"+numarticle;
					var idmoins = "#"+(numarticle-1);
					$(id).animate({ opacity: '1' }, 500);
					$(idmoins).animate({ opacity: '0.5' }, 500);
				}
				
			});

			$("#pres").click(function() {

				if(numarticle>numarticleMini){
					$(".article").animate({ top: '+=570' }, 500);
					numarticle--;
					var id = "#"+numarticle;
					var idmoins = "#"+(numarticle+1);
					$(id).animate({ opacity: '1' }, 500);
					$(idmoins).animate({ opacity: '0.5' }, 500);
				}

			});

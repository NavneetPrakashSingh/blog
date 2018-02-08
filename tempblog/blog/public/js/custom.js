$(document).ready(function(){
	// alert('reached here');
	$(".button-collapse").sideNav();	
	$('.carousel.carousel-slider').carousel({fullWidth: true});
	$('.parallax').parallax();

    
    var stringToAppend="";
    var secondString="";

    $.ajax({
		url:" https://newsapi.org/v1/articles?source=techradar&sortBy=top&apiKey=2091bf4714d3486d9f9ef80346ad60f8",
		type:"GET",
		success:function(data){
			var source = data.source;
			for(var items in data.articles){	
						
				var link =data.articles[items].url;
				var imageUrl =data.articles[items].urlToImage;
				var title=data.articles[items].title;
				var description =data.articles[items].description;
				stringToAppend = stringToAppend+"<div class=\"row custom-margin\"><div class=\"card\"><div class=\"card-image\"><img class=\"custom-image\" src="+imageUrl+"><span class=\"card-title\">"+title+"</span></div><div class=\"card-content\"><p>"+description+"</p></div><div class=\"card-action\"><div>Source : "+source+"</div></div></div></div>";
				secondString = secondString+"<a href=\" "+link+"\"><div class=\"col s4\"><div class=\"card latest-in-tech-card\"><div class=\"card-image\"><img class=\"custom-image\" src="+imageUrl+"><span class=\"card-title\">"+title+"</span></div><div class=\"card-content\"><p>"+description+"</p></div><div class=\"card-action\"><div>Source : "+source+"</div></div></div></div><a>";
			}
			// alert(stringToAppend);
			// $(".your-class").append(stringToAppend);
			// alert(data.articles.author);

			$.ajax({
			url:" https://newsapi.org/v1/articles?source=techcrunch&apiKey=2091bf4714d3486d9f9ef80346ad60f8",
			type:"GET",
			success:function(data){
				var source = data.source;
				for(var items in data.articles){
					var link =data.articles[items].url;
					var imageUrl =data.articles[items].urlToImage;
					var title=data.articles[items].title;
					var description =data.articles[items].description;
					stringToAppend = stringToAppend+"<div class=\"row custom-margin\"><div class=\"card\"><div class=\"card-image\"><img class=\"custom-image\" src="+imageUrl+"><span class=\"card-title\">"+title+"</span></div><div class=\"card-content\"><p>"+description+"</p></div><div class=\"card-action\"><div>Source : "+source+"</div></div></div></div>";
					// secondString = secondString+"<div class=\"col s4\"><div class=\"card\"><div class=\"card-image\"><img class=\"custom-image\" src="+imageUrl+"><span class=\"card-title\">"+title+"</span></div><div class=\"card-content\"><p>"+description+"</p></div><div class=\"card-action\"><div>Source : "+source+"</div></div></div></div>";
				}
				$(".your-class").append(stringToAppend);
				// alert(data.articles.author);
				$('.your-class').slick({
				  slidesToShow: 3,
				  slidesToScroll: 1,
				  autoplay: true,
				  arrows: false,	  
				  autoplaySpeed: 2000,

				   responsive: [
				    {
				      breakpoint: 1024,
				      settings: {
				        slidesToShow: 3,
				        slidesToScroll: 3,
				        infinite: true,
				        dots: true
				      }
				    },
				    {
				      breakpoint: 600,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 2
				      }
				    },
				    {
				      breakpoint: 480,
				      settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1
				      }
				    }
				    // You can unslick at a given breakpoint now by adding:
				    // settings: "unslick"
				    // instead of a settings object
				  ]
				});	

			}
		});

		$(".add-latest-page-data").append(secondString);

		}
	});


	
	$('.load-more-latestInTech').click(function(){
		var newsSources = ['the-verge','the-next-web','the-economist','recode','hacker-news','engadget','ars-technica'];
		var min =0;
		var max=6;
		var index = Math.floor(Math.random() * (max - min + 1)) + min;		
		
		$.ajax({
			url:" https://newsapi.org/v1/articles?source="+newsSources[index]+"&apiKey=2091bf4714d3486d9f9ef80346ad60f8",
			type:"GET",
			success:function(data){
				var ajaxString="";
				var source = data.source;				
				for(var items in data.articles){
					var link =data.articles[items].url;
					var imageUrl =data.articles[items].urlToImage;
					var title=data.articles[items].title;
					var description =data.articles[items].description;
					ajaxString = ajaxString+"<a href=\" "+link+"\"><div class=\"col s4\"><div class=\"card latest-in-tech-card\"><div class=\"card-image\"><img class=\"custom-image\" src="+imageUrl+"><span class=\"card-title\">"+title+"</span></div><div class=\"card-content\"><p>"+description+"</p></div><div class=\"card-action\"><div>Source : "+source+"</div></div></div></div></a>";					
				}
				$(".add-latest-page-data").append(ajaxString);
			}			
		});
		
		
		
	});
});

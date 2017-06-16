// $(".rel-test").text(category + old + df);

$(document).ready(function() {
	if ($(window).width() < 610){
		$(".cycle-slideshow").attr('data-cycle-carousel-visible', 1);
	}
});
var 
id = $("#rel-id").text(),
category = $("#rel-category").text(),
old = $("#rel-old").text(),
df = $("#rel-df").text();

$.ajax({
			url: '/getrelatives/',
			type: 'POST',
			data: {id:id, category:category,old:old, df:df},
			dataType: 'json',
			success: function(data){

			// New Relatives - Carousel
			// console.log(data.length);
			if (data.length == 0){
				// $(".full-rel-wrapp").addClass('hidden');
			} else {
				$(".full-rel-wrapp").removeClass('hidden');
				if (data.length <= 3){
					$(".cycle-slideshow").attr('data-cycle-carousel-visible', data.length);
				}
			}

			for (var key in data) {
				var head = "<div class='myslide'>" + "<a href='/kazan/vacancy/" + data[key].id + "'><img class='item-img' src='/uploads/" + data[key].img + ".jpg'" + " alt=''><div class='dark'></div><div class='relatives-content'>";
				var category = "<div class='relatives-content-tr'><div class='relatives-icon'><i class='fa fa-bars rel-icon-cat'></i></div><span class='relatives-category'>" + data[key].category + "</span></div>";
				var geo = "<div class='relatives-content-tr'><div class='relatives-icon'><i class='fa fa-map-marker rel-icon-geo'></i></div><span class='relatives-geo'>" + data[key].geo + "</span></div>";
				var date = "<div class='relatives-content-tr'><div class='relatives-icon'><i class='fa fa-calendar rel-icon-date'></i></div><span class='relatives-date'>" + data[key].date + "</span></div>";
				var old = "<div class='relatives-content-tr'><div class='relatives-icon'><i class='fa fa-user rel-icon-user'></i></div><span class='relatives-date'>" + data[key].old + "</span></div>";
				var salary = "<div class='relatives-content-tr'><div class='relatives-icon'><i class='fa fa-money rel-icon'></i></div><span class='relatives-date'>" + data[key].salary + "</span></div>";
				var footer = "</div></a></div>";

				var go = head + category + geo + date + old + salary + footer;
				$('.cycle-slideshow').cycle('add', go);
					$('.cycle-slideshow').cycle('reinit');
			}


			}
		});
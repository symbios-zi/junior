// Показать номер
$("#show-num").click(function() {
		var id = $("#vacancy-id").text();
		$.ajax({
			url: '/gettel',
			type: 'POST',
			data: {id:id},
			dataType: 'json',
			success: function(data){
			var phone = "<span>" + data.phone + "</span>";
			var vk = '';
			var name = '';
			if (typeof data.name != 'undefined'){
				name = "<div class='view-modal-name'>" + data.name + "</div>";
			}
			if(typeof data.vk != 'undefined'){
				vk = "<a target='_blank' href='" + data.vk + "'><i class='fa fa-vk'></i> написать</a>";
			}
			$(".view-modal-num").html(name + phone + vk);
			}
		});
	});

// 	$(document).click( function(event){
// 	if( $(event.target).closest(".view-modal-num").length ) 
// 	return;
// 	$(".view-modal-num").slideUp("slow");
// 	event.stopPropagation();
// });
$(document).click( function(event){
	if( $(event.target).closest(".view-modal-num").length ) 
	return;

	// $(".view-modal-num").addClass("fadeInUp");
	$(".view-modal-num").css("display", "none");
	event.stopPropagation();
});

	$('#show-num').click( function() {
		// $(this).siblings(".view-modal-num").slideToggle("slow");
		// $(".view-modal-num").addClass('fadeInDown');
		// $(".view-modal-num").css("display", "block");
		animate($(".view-modal-num"));
		$(".view-modal-num").css("display", "block");

		return false;
	});
// Показать номер - END
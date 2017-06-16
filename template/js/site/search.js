// Zebra Date-Picker - Initialize
$(document).ready(function() {

    $('.add-datepicker-from').Zebra_DatePicker({
    	direction: true,
    	pair: $('.add-datepicker-to')
    });
    $('.add-datepicker-to').Zebra_DatePicker({
    	direction: 1
    });

 });
// Zebra Date-Picker - Initialize - END

// Показать Параметры поиска
$(document).click( function(event){
		if($(event.target).closest(".main-params").length || 
		 $(event.target).closest(".params-menu").length   ||
		 $(event.target).closest(".Zebra_DatePicker").length) 
		return;
		$(".params-menu").addClass('hidden');
		$("#isParams").prop("checked", false)
		event.stopPropagation();
	});

	$("#params").click(function(){
		if ($("#isParams").prop("checked")) {
			$(".params-menu").removeClass("hidden");
			animate($(".params-menu"));
		} else {
			$(".params-menu").addClass("hidden");
		}
	});

	$(".params-close").click(function(){
		$(".params-menu").addClass("hidden");
		$("#isParams").prop("checked", false);
	});

	// -> Параметры Дата - Mobile
		$(function () {
			if ($(".params_dd_m").prop("checked")) {
				$(".params-date_m").prop("disabled", true);
				$(".params-date_m").val('');
			} else {
				$(".params-date_m").prop("disabled", false);
			}
		});

		$(".date_daily").click(function(){
			if ($(".params_dd_m").prop("checked")) {
				$(".params-date_m").prop("disabled", true);
				$(".params-date_m").val('');
			} else {
				$(".params-date_m").prop("disabled", false);
			}
		});
	// -> Параметры Дата - END

	// -> Параметры Дата
		$(function () {
			if ($(".params_dd").prop("checked")) {
				$(".params-date").prop("disabled", true);
				$(".params-date").val('');
			} else {
				$(".params-date").prop("disabled", false);
			}
		});

		$(".date_daily").click(function(){
			if ($(".params_dd").prop("checked")) {
				$(".params-date").prop("disabled", true);
				$(".params-date").val('');
			} else {
				$(".params-date").prop("disabled", false);
			}
		});
	// -> Параметры Дата - END

		// -> Очистить Парматеры
			$(".params-clear").click(function(){
				$(".params-inp").val("");
				$(".params-geo-default").prop("selected", true);
				$(".params-old-default").prop("selected", true);
				$(".params_dd").attr('checked', false);
				$(".params_dd_m").attr('checked', false);
				$(".params-date").prop("disabled", false);
			});
		// -> Очистить Парматеры - END
// Показать Параметры поиска - END

// Инициализация подсказок tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
// Инициализация подсказок tooltip - END
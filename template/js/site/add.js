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

// Добавление вакансии - связь Checkbox и стилей
$(document).ready(function() {
    if ($("#checkbox-daily").prop("checked")) {
			$(".add-date-inp").prop('disabled', true);
			$(".add-date-inp").addClass('unavailable');
			$(".add-date-inp").val('-');
	} else {
			$(".add-date-inp").prop('disabled', false);
			$(".add-date-inp").removeClass('unavailable');
	}
});

	$("#checkbox-daily").click(function(){
		if ($("#checkbox-daily").prop("checked")) {
			$(".add-date-inp").prop('disabled', true);
			$(".add-date-inp").addClass('unavailable');
			$(".add-date-inp").val('-');
	} else {
			$(".add-date-inp").prop('disabled', false);
			$(".add-date-inp").removeClass('unavailable');
			$(".add-date-inp").val('');
	}
});
// Добавление вакансии - связь Checkbox и стилей - END

// Добавление изображения Preview
function readURL(input) {
	if (input.files && input.files[0]) {
		if (!input.files[0].type.match('image.*')){
			$('.added-img-wrap').append('<div class="alert alert-danger">Недопустимый<br> тип файла</div>');
		} else {
			var reader = new FileReader();
			reader.onload = function (e) {
				var element = "<img src='" + e.target.result +"' id='added-img'>";
				$('.added-img-wrap').html(element);
				console.log(e.target.result.size);
			};
				reader.readAsDataURL(input.files[0]);
		}
	}
}
$("#add-img").change(function(){
    readURL(this);
});
// Добавление изображения Preview - END

// MaskedInput - Initialization
$("#phone").mask("+7(999) 999-99-99");
// MaskedInput - Initialization - END

// Показать поле VK_ID
$(document).ready(function(){
		if ($(".add-vk-check").prop("checked")) {
			$(".add-vk-id").removeClass('hidden');
		}
});
	$(".ads-i-vk").click(function(){
		if ($(".add-vk-check").prop("checked")) {
			$(".add-vk-id").addClass('hidden');
			$(".add-vkid").val('');
		} else {
			$(".add-vk-id").removeClass('hidden');
			$(".add-vkid").val('');
		}
	});
// Показать поле VK_ID - END

// Проверка полей перед Добавлением/Редактированием
function isNumeric(n){
	if (!isNaN(parseFloat(n)) && isFinite(n)){
		return true;
	} else return false;
}

$("#add-title").change(function(){
	var size = $(this).val().length;
	if (size < 7 || size > 47){
		$("#add-title-help").css('color','#f74040');
		$(this).addClass('inp-error');
	} else {
		$("#add-title-help").css('color','#111111');
		$(this).removeClass('inp-error');
	}
	$("#add-title-help").text(size + '/47');
});

$(document).ready(function(){

	$(".add-go-button").click(function(e){

		var data = $("#add-form").serialize();
		var errors = [];

		var title = $("#add-title").val();
		var category = $("#add-category").val();
		var salary = $(".add-salary-inp").val();
		var salary_p = $(".add-sp").val();
		var geo = $(".add-geo").val();
		var old = $(".add-old").val();
		var description = $(".add-description").val();
		var date_daily = $("#checkbox-daily");
		var ds = $('.add-ds').val();
		var df = $(".add-df").val();
		var img = $("#added-img").attr('src');
		var vk = $(".add-vk-check").prop('checked');
		var vk_id = $(".add-vkid ").val();
		var whatsapp = $(".add-wa-check").prop('checked');
		var telegram = $(".add-tg-check").prop('checked');
		var tel = $(".add-tel").val();

		if (title.length < 7 || title.length > 47){
			errors.push('Длина названия от 7 до 47 символов!');
			$(".add-name").addClass('inp-error');
		} else {
			$(".add-name").removeClass('inp-error');
		}

		if (category == ''){
			errors.push('Выберите категорию');
			$("#add-category").addClass('inp-error');
		} else {
			$("#add-category").removeClass('inp-error');
		}

		// if (salary.length < 2 || salary.length > 5){
		// 	errors.push('Некорректная зарплата');
		// 	$(".add-salary-inp").addClass('inp-error');
		// } else {
		// 	$(".add-salary-inp").removeClass('inp-error');
		// }

		if (!isNumeric(salary)){
			errors.push('Некорректная зарплата');
			$(".add-salary-inp").addClass('inp-error');
		} else {
			// $(".add-salary-inp").removeClass('inp-error');
				if (salary.length < 2 || salary.length > 5){
					errors.push('Некорректная зарплата');
					$(".add-salary-inp").addClass('inp-error');
				} else {
					$(".add-salary-inp").removeClass('inp-error');
				}
		}

		if (salary_p == ''){
			errors.push('Выберите зарплату в (час, день, неделя, месяц)');
			$(".add-sp").addClass('inp-error');
		} else {
			$(".add-sp").removeClass('inp-error');
		}

		if (geo == ''){
			errors.push('Выберите район');
			$(".add-geo").addClass('inp-error');
		} else {
			$(".add-geo").removeClass('inp-error');
		}

		if (old == ''){
			errors.push('Выберите возраст');
			$(".add-old").addClass('inp-error');
		} else {
			$(".add-old").removeClass('inp-error');
		}

		if (description.length > 1200 ){
			errors.push('Описание - не более 1200 символов!');
			$(".add-description").addClass('inp-error');
		} else {
			$(".add-description").removeClass('inp-error');
		}

		if (date_daily.prop('checked')){
		} else {
			if (ds == ''){
				errors.push('Укажите начальную дату');
				$(".add-ds").addClass('inp-error');
			} else {
				$(".add-ds").removeClass('inp-error');
			}

			if (df == ''){
				errors.push('Укажите конечную дату');
				$(".add-df").addClass('inp-error');
			} else {
				$(".add-df").removeClass('inp-error');
			}
		}

		if (vk && vk_id.length < 10){
			errors.push('Укажите ссылку на профиль Вк');
			$(".add-vkid").addClass('inp-error');
		} else {
			$(".add-vkid").removeClass('inp-error');
		}

		if (tel.length != 17){
			errors.push('Укажите номер телефона!');
			$(".add-tel").addClass('inp-error');
		} else {
			$(".add-tel").removeClass('inp-error');
		}

if (errors.length > 0){
	return false;
}
	});
});
// Проверка полей перед Добавлением/Редактированием - END

// Инициализация подсказок tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
// Инициализация подсказок tooltip - END
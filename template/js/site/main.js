// Инициализация Mobile menu
  if ($( window ).width() < 768){
  	$(".disabled-xs").attr('name', 'lg');
  } else {
  	$(".disabled-lg").attr('name', 'xs');
  }
			$(document).ready(function(){
				// Initialize Slidebars
				var controller = new slidebars();
				controller.init();

				$("#m_menu").click(function(event){
					event.stopPropagation();
					controller.toggle('id-1');
				});
				$("#m_menu_close").click(function(event){
					event.stopPropagation();
					controller.close('id-1');
				});
				$(".m_menu_login").click(function(){
					controller.close('id-1');
					$("#myModal").modal('show');
				});
				$(".m_menu_reg").click(function(){
					controller.close('id-1');
					$("#registerModal").modal('show');
				});
				$("#m_menu_add").click(function(){
					controller.close('id-1');
				});
			});
// Инициализация Mobile menu - END

// Авторизация через Email
$(document).ready(function() {
	$("#login").click(function(){
		$(this).button('loading');
		var login = $("#login-email").val();
		var pass = $("#login-password").val();
		
		$.ajax({
			url: '/login/email',
			type: 'POST',
			data: {login:login, password:pass},
			dataType: 'json',
			success: function(data){
				// alert(data.result);
				// alert("Статус, " + data.result);

				if (data.result == false){
					$("#modal-login-error").text("Неверные данные");
					$("#modal-login-error").removeClass("hidden");
					$("#login-password").val('');
					$("#login").button('reset');
				}
				if (data.result == true){
					// alert("Статус, " + data.result);
					document.location.href = '/cabinet';
					$("#login").button('reset');
				}
			}
		});
	});
});
// Авторизация через Email - END

// Регистрация через email
$(document).ready(function() {
	$("#register").click(function(){
		var name = $("#reg-name").val();
		var email = $("#reg-email").val();
		var password = $("#reg-password").val();
		var emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var errors = [];

		if (name.length < 2){
			errors.push('Имя - не короче 2 символов');
			$("#reg-name").addClass('inp-error');
			$("#reg-name").removeClass('inp-complete');
				$("#modal-reg-error").text('Имя слишком короткие');
				$("#modal-reg-error").removeClass('hidden');
		} else {

				if (name.length > 15){
					errors.push('Имя - не длиннее 15 символов');
					$("#reg-name").addClass('inp-error');
					$("#reg-name").removeClass('inp-complete');
				} else {
					$("#reg-name").removeClass('inp-error');
					$("#reg-name").addClass('inp-complete');
				}
		}

		if (!emailPattern.test(email)){
			errors.push('Email введен некорректно');
			$("#reg-email").addClass('inp-error');
		} else {
			$("#reg-email").removeClass('inp-error');
			$("#reg-email").addClass('inp-complete');
		}

		if (password.length < 5){
			errors.push('Пароль - не короче 5 символов');
			$("#reg-password").addClass('inp-error');
			$("#reg-password").removeClass('inp-complete');
		} else {
			if (password.length > 25){
				errors.push('Пароль - не длиннее 25 символов');
				$("#reg-password").addClass('inp-error');
				$("#reg-password").removeClass('inp-complete');
			}else {
				$("#reg-password").removeClass('inp-error');
			$("#reg-password").addClass('inp-complete');
			}
		}

		if (errors.length > 0){
			$("#modal-reg-error").text(errors[0]);
			$("#modal-reg-error").removeClass('hidden');
		}else {
			$("#modal-reg-error").addClass('hidden');
		}

		if (errors.length == 0){
			$(this).button('loading');
				$.ajax({
					url: '/register',
					type: 'POST',
					dataType: 'json',
					data: {name:name, email:email, password:password},
					success: function(data){
						$('#register').button('reset');
						if (data.result == true){
							// alert("Регистрация прошла успешно! id = " + data.id);
							document.location.href = '/cabinet';
						} 
						if (data.result == false && data.email == true){
							$("#modal-reg-error").text('Email занят');
							$("#modal-reg-error").removeClass('hidden');
							$("#reg-email").removeClass('inp-complete');
							$("#reg-email").addClass('inp-error');
						} else {
							$("#reg-email").removeClass('inp-error');
							$("#reg-email").addClass('inp-complete');
						}
					}
			});
		}

	});
});
// Регистрация через email - END

// Анимация загрузки кнопки авторизоваться через VK
$('#btn-vk-auth').click(function(){
	$(this).button('loading');
});
// Анимация загрузки кнопки авторизоваться через VK - END

// Анимация
function animate(elem){
		var effect = elem.data("effect");
		if(!effect || elem.hasClass(effect)) return false;
		elem.addClass(effect);
		setTimeout( function(){
				elem.removeClass(effect);
		}, 500);
}
// Анимация - END
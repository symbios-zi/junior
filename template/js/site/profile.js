// MaskedInput - Initialization
$("#profile-tel").mask("+7(999) 999-99-99");
// MaskedInput - Initialization - END

$('#profile-save').click(function(){
	var name = $('#profile-name').val();
	var tel = $('#profile-tel').val();
	var email = $('#profile-email').val();
	var vk = $('#profile-vk').val();
	var old_password = $('#profile-old-password').val();
	var new_password = $('#profile-new-password').val();
	var emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var vkPattern = /^https:\/\/vk.com\/([A-Za-z0-9.]{2,30})$/;

	var errors = [];
	var params = {
		'update':'go'
	};
	var ok = '<i class="fa fa-check profile-ok"></i>';
	var error = '<i class="fa fa-times profile-error"></i>';

// if (typeof email != 'undefined'){
// 	if(email.length != 0){
// 		if(!emailPattern.test(email)){
// 			errors.push('email');
// 			$('#profile-email-wrap>i').remove();
// 			$('#profile-email-wrap').append(error);
// 		} else {
// 			$('#profile-email-wrap>i').remove();
// 			$('#profile-email-wrap').append(ok);
// 			params.email = email;
// 		}
// 	} else {
// 		$('#profile-email-wrap>i').remove();
// 	}
// }

if(name.length != 0){
	if(name.length < 3 || name.length > 20){
		errors.push('name');
		$('#profile-name-wrap>i').remove();
		$('#profile-name-wrap').append(error);
	} else {
		$('#profile-name-wrap>i').remove();
		$('#profile-name-wrap').append(ok);
		params.name = name;
	}
} else {
	$('#profile-name-wrap>i').remove();
	$('#profile-name-wrap').append(error);
	errors.push('name');
}

if(tel.length != 0){
	if(tel.length < 17){
		errors.push('tel');
		$('#profile-tel-wrap>i').remove();
		$('#profile-tel-wrap').append(error);
	} else {
		$('#profile-tel-wrap>i').remove();
		$('#profile-tel-wrap').append(ok);
		params.tel = tel;
	}
} else {
	$('#profile-tel-wrap>i').remove();
	params.tel = tel;
}

if(vk.length != 0){
	if(!vkPattern.test(vk)){
		errors.push('vk');
		$('#profile-vk-wrap>i').remove();
		$('#profile-vk-wrap').append(error);
	} else {
		$('#profile-vk-wrap>i').remove();
		$('#profile-vk-wrap').append(ok);
		params.vk = vk;
	}
} else {
	$('#profile-vk-wrap>i').remove();
	params.vk = vk;
}

if((typeof old_password != 'undefined' && typeof new_password != 'undefined') && 
	(old_password.length != 0 || new_password.length != 0)){
	if(old_password.length != 0){
		params.old_password = old_password;
	}
	if(old_password.length < 5 || old_password.length > 30){
				errors.push('old_password');
				$('#profile-oldpass-wrap>i').remove();
				$('#profile-oldpass-wrap').append(error);
			} else {
				$('#profile-oldpass-wrap>i').remove();
				$('#profile-oldpass-wrap').append(ok);
				$('.profile-password-error').text('');
	}
	if(new_password.length < 5 || new_password.length > 30){
		errors.push('new_password');
		$('#profile-newpass-wrap>i').remove();
		$('#profile-newpass-wrap').append(error);
	} else {
		$('#profile-newpass-wrap>i').remove();
		$('#profile-newpass-wrap').append(ok);
			if(typeof params.old_password != 'undefined'){
				params.new_password = new_password;
			}
	}
} else {
	$('#profile-oldpass-wrap>i').remove();
	$('#profile-newpass-wrap>i').remove();
	$('.profile-password-error').text('');
}

// alert(errors.length);
// console.log(params);

	if(errors.length == 0){
		$.ajax({
			url: '/cabinet/profile/update',
			type: 'POST',
			data: params,
			dataType: 'json',
			success: function(data){
				// console.log(data);
				// console.log('Пароль неверный');
				if(data.password == false && old_password.length != 0){
					$('#profile-oldpass-wrap>i').remove();
					$('#profile-oldpass-wrap').append(error);
					$('#profile-newpass-wrap>i').remove();
					$('.profile-password-error').text('Неверный пароль');
					$('#profile-old-password').val('');
					$('#profile-new-password').val('');
				}
				$('#profileUpdated').modal('show');
			}
		});
	}

});
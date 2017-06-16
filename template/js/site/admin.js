// function issetDescription(desc){
// 		if (desc.length > 0){
// 			return "<h5 class='full-advert-dop hidden-xs'>Дполнительно:</h5>
// 							<div class='full-advert-desc'>" + desc + "</div>";
// 		} else {
// 			return '';
// 		}
// 	}

// Инициализация подсказок tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
// Инициализация подсказок tooltip - END

$(".blocked-go").click(function(event){
	event.preventDefault();
	var id = $(this).data('id');
	$('#blocked-link-1').attr('href', '/cabinet/admin/do/blocked/' + id + '/code/1');
	$('#blocked-link-2').attr('href', '/cabinet/admin/do/blocked/' + id + '/code/2');
	$('#blocked-link-3').attr('href', '/cabinet/admin/do/blocked/' + id + '/code/3');
	$('#blocked-link-4').attr('href', '/cabinet/admin/do/blocked/' + id + '/code/4');
	$('#blocked-link-5').attr('href', '/cabinet/admin/do/blocked/' + id + '/code/5');
	$('#blocked-link-5').attr('href', '/cabinet/admin/do/blocked/' + id + '/code/6');
	$("#blockedModal").modal("show");
});

setInterval(function(){
	var type = $(".admin-type").text();
	var count = $(".admin-count-new").text();

	$.ajax({
		url: '/cabinet/admin/ajax',
		type: 'POST',
		data: {type:type, count:count},
		dataType: 'json',
		success: function(data){
			if (data.result != false){
				console.log(data.result);
				$(".counter").text(data.result);
				$(".admin-new-counter").removeClass('hidden');
			} else {
				$(".admin-new-counter").addClass('hidden');
			}
			// data.map(function(vacancy){
				// console.log(vacancy.category);
				// var element = 
				// "<div class='advert-wrap'>
				// 	<div class='row cabinet-advert-wrap'>
				// 		<div class='col-lg-12'>
				// 				<div class='row h-inh flex-parent'>
				// 					<div class='col-lg-3 col-md-3 col-sm-3 hidden-xs'>
				// 						<div class=''>
				// 							<div class='cabinet-vacancy-img text-center'>
				// 								<img src='/dopjob/uploads/" + vacancy.img + ".jpg' alt='photo'>
				// 							</div>
				// 						</div>
				// 					</div>
				// 					<div class='col-lg-9 col-md-9 col-sm-9 col-xs-12 align-self-start margin-off cabinet-vacancy-col'>
				// 						<div class='cabinet-advert-inform-wrap'>
				// 							<h4 class='advert-title'>" + vacancy.title + "</h4>
				// 							<div class='advert-detail-wrap'>
				// 								<div class='advert-detail-1'>
				// 									<div class='advert-detail-tr flex-parent'>
				// 										<div class='advert-icon-category adi'></div>
				// 										<h5>" + vacancy.category + "</h5>
				// 									</div>
				// 									<div class='advert-detail-tr flex-parent'>
				// 										<div class='advert-icon-geo adi'></div>
				// 										<h5>" + vacancy.geo + "р-н.</h5>
				// 									</div>
				// 									<div class='advert-detail-tr flex-parent'>
				// 										<div class='advert-icon-cash adi'></div>
				// 										<h5>" + vacancy.salary + "</h5>
				// 									</div>
				// 								</div>
				// 								<div class='advert-detail-2'>
				// 									<div class='advert-detail-tr flex-parent'>
				// 										<div class='advert-icon-date adi'></div>
				// 										<h5>" + vacancy.date + "</h5>
				// 									</div>
				// 									<div class='advert-detail-tr flex-parent'>
				// 										<div class='advert-icon-old adi'></div>
				// 										<h5>" + vacancy.old + "+</h5>
				// 									</div>
				// 								</div>
				// 							</div>
				// 						</div>
				// 					</div>
				// 				</div>
				// 		</div>
				// </div>";



			// 	<div class="row">
			// 		<div class="col-lg-12">
			// 			' + issetDescription(vacancy.description); + '
			// 		</div>
			// 	</div>

			// 		<div class="row flex-parent">
			// 				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
			// 					<?php if ($vacancy['vk_id'] || $vacancy['whatsapp'] || $vacancy['telegram']): ?>
			// 						<div class="full-advert-contacts flex-parent">
			// 							<span>Контакты</span>
			// 							<?php if ($vacancy['vk_id']): ?><div class="full-advert-icon icon-vk-blue"></div><?php endif; ?>
			// 							<?php if ($vacancy['whatsapp']): ?><div class="full-advert-icon icon-whatsapp-blue"></div><?php endif; ?>
			// 							<?php if ($vacancy['telegram']): ?><div class="full-advert-icon icon-telegram-blue"></div><?php endif; ?>
			// 						</div>
			// 					<?php endif; ?>
			// 				</div>
			// 				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-5">
			// 					<div class="full-advert-show pull-left">
			// 						<div class="advert-tel"><i class="fa fa-phone"></i> <?php echo $vacancy['tel'];?></div>
			// 							<?php if($vacancy['vk_id']):?>
			// 								<div class="advert-tel"><i class="fa fa-vk"></i> <?php echo $vacancy['vk_id'];?></div>
			// 							<?php endif;?>
			// 					</div>
			// 				</div>
			// 		</div>

			// 		<div class="row admin-buttons-w">
			// 			<div class="col-lg-12">
			// 				<div class="col-lg-12">
			// 					<div class="pull-right">
			// 						<?php if($type == "moderation"): ?>
			// 							<a href="/cabinet/admin/do/blocked/<?php echo $vacancy['id'];?>" class="delete-vacancy">
			// 								<div class="cabinet-delete"><i class="fa fa-trash-o"></i>Отклонить</div>
			// 							</a>
			// 							<a href="#">
			// 								<div class="cabinet-edit">Смотреть все</div>
			// 							</a>
			// 							<a href="/cabinet/admin/do/success/<?php echo $vacancy['id'];?>">
			// 								<div class="cabinet-edit cabinet-success">Принять</div>
			// 							</a>
			// 						<?php elseif($type == "active"): ?>
			// 							<a href="/cabinet/admin/do/blocked/<?php echo $vacancy['id'];?>" class="delete-vacancy">
			// 								<div class="cabinet-delete"><i class="fa fa-trash-o"></i>Удалить</div>
			// 							</a>
			// 							<a href="/cabinet/admin/do/success/<?php echo $vacancy['id'];?>">
			// 								<div class="cabinet-edit">Завершить</div>
			// 							</a>
			// 						<?php elseif($type == "blocked"): ?>
			// 							<a href="/cabinet/admin/do/blocked/<?php echo $vacancy['id'];?>" class="delete-vacancy">
			// 								<div class="cabinet-delete"><i class="fa fa-trash-o"></i>Удалить</div>
			// 							</a>
			// 						<?php endif; ?>
			// 					</div>
			// 				</div>
			// 			</div>
			// 		</div>
			// </div>
			// 	";

				// $(".vacancies").append(element);
			// });
		}
	});
}, 5000);
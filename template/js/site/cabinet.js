// Удаление Вакансии
$(".delete-vacancy").click(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		$("#link-delete").attr('href', '/cabinet/delete/' + id);
		$("#deleteModal").modal('show');
});
// Удаление Вакансии - END

// Инициализация подсказок tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
// Инициализация подсказок tooltip - END

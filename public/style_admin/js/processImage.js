$(document).ready(function(){
	$("#btn-submit-add-image").submit(function(e){
		e.preventDefault();
		var form = $(this);
		var actionUrl = form.attr('action');
		var formData = new FormData(this);
		$.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
		$.ajax({
			method: 'POST',
			url: actionUrl,
			data: formData,
			contentType: false,
			processData: false,
			success: function(response){
				$('#page-wrapper').html(response);
				alertify.set('notifier','position', 'bottom-left');
				alertify.success('Đã thêm hình ảnh thành công!!');
			},
			error: function(err){
				$.each(err.responseJSON.errors, function (i, error) {
					var el = $(document).find('[name="'+i+'"]');
					alertify.set('notifier','position', 'bottom-left');
					alertify.error(error[0]);
				});
			}
		})
	});

	$("#btn-submit-edit-image").submit(function(e){
		e.preventDefault();
		var form = $(this);
		var actionUrl = form.attr('action');
		var id = parseInt(form.attr('data-id'));
		var formData = new FormData(this);
		$.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
		$.ajax({
			method: 'POST',
			url: actionUrl+"/"+id,
			data: formData,
			contentType: false,
			processData: false,
			success: function(response){
				$('#page-wrapper').html(response);
				alertify.set('notifier','position', 'bottom-left');
				alertify.success('Cập nhật hình ảnh thành công!!');
			},
			error: function(err){
				$.each(err.responseJSON.errors, function (i, error) {
					var el = $(document).find('[name="'+i+'"]');
					alertify.set('notifier','position', 'bottom-left');
					alertify.error(error[0]);
				});
			}
		})
	});
})
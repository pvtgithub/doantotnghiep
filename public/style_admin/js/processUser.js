$(document).ready(function(){
	$("#btn-submit-add-user").submit(function(e){
		e.preventDefault();
		var form = $(this);
		var actionUrl = form.attr('action');
		$.ajax({
			method: 'POST',
			url: actionUrl,
			data:$("#btn-submit-add-user").serialize(),
			success: function(response){
				$('#page-wrapper').html(response);
				alertify.set('notifier','position', 'bottom-left');
				alertify.success('Đã thêm người dùng thành công!!');
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

	$("#btn-submit-edit-user").submit(function(e){
		console.log("abccccc");
		e.preventDefault();
		var form = $(this);
		var actionUrl = form.attr('action');
		var id = parseInt(form.attr('data-id'));
		$.ajax({
			method: 'POST',
			url: actionUrl+"/"+id,
			data:$("#btn-submit-edit-user").serialize(),
			success: function(response){
				$('#page-wrapper').html(response);
				alertify.set('notifier','position', 'bottom-left');
				alertify.success('Cập nhật người dùng thành công!!');
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
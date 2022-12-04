$(document).ready(function(){
	$("#btn-submit-add-blog").submit(function(e){
		e.preventDefault();
		var form = $(this);
		var actionUrl = form.attr('action');
		var formData = new FormData(this);
		// Display the key/value pairs
		// for(var pair of formData.entries()) {
		// 	console.log(pair[0]+ ', '+ pair[1]);
		// }
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
				alertify.success('Đã thêm bài viết thành công!!');
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

	$("#btn-submit-edit-blog").submit(function(e){
		e.preventDefault();
		var form = $(this);
		var actionUrl = form.attr('action');
		var id = parseInt(form.attr('data-id'));
		var id_img1 = parseInt(form.attr('data-id-image1'));
		var id_img2 = parseInt(form.attr('data-id-image2'));
		var formData = new FormData(this);
		$.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
		$.ajax({
			method: 'POST',
			url: actionUrl+"/"+id+"/"+id_img1+"/"+id_img2,
			data: formData,
			contentType: false,
			processData: false,
			success: function(response){
				$('#page-wrapper').html(response);
				alertify.set('notifier','position', 'bottom-left');
				alertify.success('Cập nhật bài viết thành công!!');
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
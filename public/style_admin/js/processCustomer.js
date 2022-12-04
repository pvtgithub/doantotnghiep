$(document).ready(function(){
	$('#btn-submit-edit-customer').submit(function(e){
		e.preventDefault();
		var form = $(this);
		var actionUrl = form.attr('action');
		var id = form.attr('data-id');
		$.ajax({
			method: 'POST',
			url: actionUrl+"/"+id,
			data:$("#btn-submit-edit-customer").serialize(),
			success: function(response) {
				$('#page-wrapper').html(response);
				alertify.set('notifier','position', 'bottom-left');
				alertify.success('Cập nhật khách hàng thành công!!');
			},
			error: function(err){
				$.each(err.responseJSON.errors, function (i, error) {
					var el = $(document).find('[name="'+i+'"]');
					alertify.set('notifier','position', 'bottom-left');
					alertify.error(error[0]);
				});
			}
		})
	})
})
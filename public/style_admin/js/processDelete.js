$(document).ready(function(){
	$('.callDelete').click(function(e){
		e.preventDefault();
		var ele = $(this);
		var id = ele.attr('data-id');
		var email = ele.attr('data-email');
		var url = ele.attr('data-url');
		console.log("id: "+ id);
		alertify.confirm('Xóa: '+email+'???', function(){
			$.ajax({
				url: url,
				method: 'GET',
				data:{
					id: id
				},
				success: function(response){
					$("#page-wrapper").html(response);
					alertify.success("Bạn đã xóa thành công: "+ email + '!!!');
				},
				error: function(xhr, status, error) {
					if (xhr.status == 500) {
						alertify.error('error: Xung đột khóa ngoại!!!');
					}
				}
			})
		}).autoOk(5);
	})
})
$(document).ready(function(){
	var dataValue = 0;
	var ele = '';
	$(".btn-rating").on("click", function(){
		dataValue = parseInt($(this).attr("data-value"));
	});

	$('#txt-comment').on('keyup',function(e){
		e.preventDefault();
		ele = $(this).val();
	})

	$("#submit-form-cmt-product").submit(function(e) {
		e.preventDefault();
		var form = $(this);
		var id_product = form.attr('data-id');
		var actionUrl = form.attr('action');
		if(dataValue == 0 || ele.length == 0){
			alertify.set('notifier','position', 'bottom-left');
			alertify.error('Nhập đầy đủ nội dung phản hồi và sao đánh giá');
		}else{
			$.ajax({
				method: "GET",
				url: actionUrl,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					content: ele,
					rate: dataValue,
					id_product: id_product
				},
				success: function(data)
				{
					$('#comments').html(data);

					alertify.set('notifier','position', 'bottom-left');
					alertify.success('Bạn đã tải lên 1 bình luận');
				}
			});
		}
	});

	/*comment blog*/
	var eleBlog = '';

	$('#txt-comment-blog').on('keyup',function(e){
		e.preventDefault();
		eleBlog = $(this).val();
		console.log(eleBlog);
	})

	$("#submit-form-cmt-blog").submit(function(e) {
		e.preventDefault();
		var form = $(this);
		var id_blog = form.attr('data-id');
		var actionUrlBlog = form.attr('action');
		$.ajax({
			method: "GET",
			url: actionUrlBlog,
			data: {
				_token: $('meta[name="csrf-token"]').attr('content'),
				content: eleBlog,
				id_blog: id_blog
			},
			success: function(data)
			{
				$('#comments_blog').html(data);
			}
		});
	});
})




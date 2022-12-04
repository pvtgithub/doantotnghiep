function AddCart(id,quantity) {
	$.ajax({
		url:'AddCart/'+id+'/'+quantity,
		type:'GET'
	}).done(function(response) {
		$('#change-item-cart').html(response);
		alertify.set('notifier','position', 'bottom-left');
		alertify.success('Đã thêm sản phẩm vào giỏ hàng!!!');
	});
}

$(document).ready(function(){
	$(".input-qty").change(function(e){
		e.preventDefault();
		var ele = $(this);
		var id = ele.parents("li").attr("data-id");
		var quantity = ele.parents("li").find(".quantity").val();
		$.ajax({
			url: 'UpdateCart',
			method: "PATCH",
			data: {
				_token: $('meta[name="csrf-token"]').attr('content'), 
				id: id,
				quantity: quantity,
			},
			success:function(response){
				$('#change-item-cart').html(response);
				$.ajax({
					url: 'GetCheckout',
					type: 'GET',
					success: function(viewCheckout){
						$('#change-item-checkout').html(viewCheckout);
						alertify.set('notifier','position', 'bottom-left');
						alertify.success('Đã cập nhật số lượng sản phẩm !!!');
					}
				});
				
			},
		});
	});

	$(".remove-from-cart").click(function (e) {
		e.preventDefault();
		var ele = $(this);
		var id = ele.parents('li').attr("data-id");
		alertify.confirm('Xóa sản phẩm khỏi giỏ hàng???', function(){
			$.ajax({
				url: 'RemoveCart',
				method: "DELETE",
				data:{
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id,
				},
				success: function (response){
					$('#change-item-cart').html(response);
					$.ajax({
						url: 'GetCheckout',
						type: 'GET',
						success: function(viewCheckout){
							$('#change-item-checkout').html(viewCheckout);
							alertify.set('notifier','position', 'bottom-left');
							alertify.success('Đã xóa sản phẩm khỏi giỏ hàng!!!');
							var checkQuantity = $("#checkQuantity").text();
							if(checkQuantity == '0 Items'){
								location.reload();
							}
						}
					});
				}
			});
		}).autoOk(5);
	});

	$(".addToFavourite").click(function(e){
		e.preventDefault();
		var ele = $(this);
		var id = ele.attr("data-id");
		//kiểm tra có tồn tại trong danh sách yêu thích không??
			$.ajax({
				url: 'addToFavourite/'+id,
				method: 'GET',
				success: function(data){
					$("#change-item-favourite").html(data);
					alertify.set('notifier','position', 'bottom-left');
					alertify.success('Đã thêm vào danh sách yêu thích!!!');
				},
				error: function() {
					alertify.set('notifier','position', 'bottom-left');
					alertify.error('Sản phẩm đã tồn tại trong danh sách yêu thích!!!');
				}

			})
	});

	$(".remove-from-favourite").click(function(e) {
		e.preventDefault();
		var ele = $(this);
		var id = ele.parents("li").attr("data-id");
		alertify.confirm('Xóa sản phẩm khỏi danh sách yêu thích',function(){
			$.ajax({
				url: 'removeFavourite/'+ id,
				method: 'GET',
				success: function(data) {
					$("#change-item-favourite").html(data);
					alertify.set('notifier','position', 'bottom-left');
					alertify.success('Đã xóa sản phẩm khỏi danh sách yêu thích!!!');
				}	
			});
		});
	});
});
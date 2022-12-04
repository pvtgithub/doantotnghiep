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
})
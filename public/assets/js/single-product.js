$(document).ready(function(){
	$('.qty-change').change(function(e){
		e.preventDefault();
		var ele = $(this);
		console.log($('.qty-change').val());
		if($('.qty-change').val() > 20){
			$('.qty-change').val(20);
		}
		else if($('.qty-change').val() < 1){
			$('.qty-change').val(1);
		}

		var quantity = $('.qty-change').val();
		var totalPrice = quantity * ele.attr('data-id');

		$('#price-total').text(new Intl.NumberFormat().format(totalPrice)+'VNĐ'); 
	})
})
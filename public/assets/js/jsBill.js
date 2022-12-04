function postSearchBill(email) {
	$(document).ready(function(){
		console.log(email);
		$.ajax({
			url:'getSearchBill/'+email,
			method: 'GET',
			success:function(response){
				console.log(response);
				$('#add-item-billDetail').html(response);
				if(response.length > 1000){
					alertify.set('notifier','position', 'bottom-left');
					alertify.success('Mời xem hóa đơn!!!');
				}else{
					alertify.set('notifier','position', 'bottom-left');
					alertify.success('Không tìm thấy hóa đơn !!!');
				}
			}
		});
	});

}

function getSearchBill(email) {
	$(document).ready(function(){
		console.log(email);
		$.ajax({
			url:'getSearchBill/'+email,
			method: 'GET',
			success:function(response){
				console.log(response);
				$('#add-item-billDetail').html(response);
			}
		});
	});

}

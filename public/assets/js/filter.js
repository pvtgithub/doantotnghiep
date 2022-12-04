$(document).ready(function(){
	$("#sort-box").change(function() {
		var value = $(this).val();

		if(value == 0){
			
			$.ajax({
				url: 'filter-price',
				method: 'GET',
				success: function(response){
					$('#add-item-kho').html(response);
				}
			});
		}
		else{
			changeWithSelecte(value);
		}
	});

	function changeWithSelecte(value){
		$.ajax({
			url: 'filter-price/'+value,
			method: 'GET',
			success: function(response){
				$('#add-item-kho').html(response);
			}
		});
	}

	$('#frm-filter input').on('change', function() {
		var getRadioPrice = $('input[name=price_range]:checked', '#frm-filter').val();
		var getRadioCategory = $('input[name=abv]:checked', '#frm-filter').val();

		$.ajax({
			url: 'filter-radio/'+getRadioPrice+'/'+getRadioCategory,
			method: 'GET',
			success: function(response){
				$('#add-item-kho').html(response);
			}
		})
	});

	$("#search-kho").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$(".product-item-box .product-item-sale").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});

	/*hotdeal*/

	$("#sort-box-hot-deal").change(function() {
		var value = $(this).val();

		if(value == 0){
			
			$.ajax({
				url: 'filter-price-hot-deal',
				method: 'GET',
				success: function(response){
					$('#add-item-hot-deal').html(response);
				}
			});
		}
		else{
			changeWithSelected(value);
		}
	});

	function changeWithSelected(value){
		$.ajax({
			url: 'filter-price-hot-deal/'+value,
			method: 'GET',
			success: function(response){
				$('#add-item-hot-deal').html(response);
			}
		});
	}

	$('#frm-filter-hot-deal input').on('change', function() {
		var getRadioPrice = $('input[name=price_range]:checked', '#frm-filter-hot-deal').val();
		var getRadioCategory = $('input[name=abv]:checked', '#frm-filter-hot-deal').val();

		$.ajax({
			url: 'filter-radio-hot-deal/'+getRadioPrice+'/'+getRadioCategory,
			method: 'GET',
			success: function(response){
				$('#add-item-hot-deal').html(response);
			}
		})
	});

	$("#search-hot-deal").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$(".product-item-box .product-item-sale").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});

	/*search*/
	$("#sort-search").change(function() {
		var value = $(this).val();

		if(value == 0){
			
			$.ajax({
				url: 'filter-price-search',
				method: 'GET',
				success: function(response){
					$('#add-item-search').html(response);
				}
			});
		}
		else{
			changeWithSelectedd(value);
		}
	});

	function changeWithSelectedd(value){
		$.ajax({
			url: 'filter-price-search/'+value,
			method: 'GET',
			success: function(response){
				$('#add-item-search').html(response);
			}
		});
	}

	$('#frm-filter-search input').on('change', function() {
		var getRadioPrice = $('input[name=price_range]:checked', '#frm-filter-search').val();
		var getRadioCategory = $('input[name=abv]:checked', '#frm-filter-search').val();

		$.ajax({
			url: 'filter-radio-search/'+getRadioPrice+'/'+getRadioCategory,
			method: 'GET',
			success: function(response){
				$('#add-item-search').html(response);
			}
		})
	});

})
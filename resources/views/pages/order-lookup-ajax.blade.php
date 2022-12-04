<div class="page_orderLookup containerPage">
	<p class="titleForm">Tra cứu đơn hàng </p>
	<div class="wrapBoxInput">
		<p class="desForm">Để tra cứu đơn hàng của bạn, vui lòng nhập số điện thoại đã đặt hàng.</p>
		<input id="input-email-search" type="email" name="email" required class="styleInputText" placeholder="Nhập email cần tra cứu" value="<?php if(Auth::check()) Auth::user()->email ?>">
		
		<button onclick="callFunction()" class="btnSubmitForm">Tìm kiếm</button>
	</div>
</div>
<script type="text/javascript">
	function callFunction() {
		var x = document.getElementById("input-email-search").value;
		postSearchBill(x);
	}
</script>
<script type="text/javascript" src="assets/js/jsBill.js"></script>
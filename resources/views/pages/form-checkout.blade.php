<?php
use App\Models\Customer;

$totalPrice = 0;
$codePromotion = 0;
$shipping_price = 0;
$pricePromotion = 0;
$totalPriceAll = 0;
foreach ((array) session('cart') as $id => $details){
	$totalPrice += $details['promotion_price'] * $details['quantity'];
}
$totalQuantity = count((array) session('cart'));

if (Auth::check()) {
	if(strlen(strstr(Auth::user()->address, "Đà Nẵng")) > 0 || strlen(strstr(Auth::user()->address, "Hà Nội")) > 0 || strlen(strstr(Auth::user()->address, "Hồ Chí Minh")) > 0 || $totalPrice > 5000000){
		$shipping_price = 0;
	}
	else{
		if ($totalPrice > 1000000) {
			$shipping_price = 25000;
		}else{
			$shipping_price = 50000;
		}
	}
	        //lấy giá khuyến mãi
	$customerAgain = Customer::where('email','like','%'.Auth::user()->email.'%')->get();
	if ($totalPrice > 10000000 || count($customerAgain) >= 3) {
		$codePromotion = 9;
	}else{
		if($totalPrice > 5000000 || count($customerAgain) >= 2){
			$codePromotion = 6;
		}
		else{
			if($totalPrice > 3000000 || count($customerAgain) >= 1){
				$codePromotion = 3;
			}
		}
	}
	$pricePromotion = -($totalPrice * $codePromotion / 100);
	$totalPriceAll = $totalPrice + $shipping_price + $pricePromotion;
}

?>
<div class="title-block">
	<h3 class="title">Thông tin đơn hàng</h3>
</div>
<div class="cart-list-box short-type">
	<span id="checkQuantity" class="number">{{$totalQuantity}} Items</span>
	<ul class="cart-list">
		@foreach((array) session('cart') as $id => $item)
		<li class="cart-elem" data-id="{{$id}}">
			<div class="cart-item">
				<div class="product-thumb">
					<a class="prd-thumb" href="#">
						<figure><img src="assets/images/products/{{$item['image']}}" width="113" height="113" alt="shop-cart" ></figure>
					</a>
				</div>
				<div class="info">
					<a href="#" class="pr-name">{{$item['name']}}</a>
					<span class="txt-quantity">Số lượng:</span>
					<input type="number" min="1" class="input-qty quantity" value="{{$item['quantity']}}" disabled>
				</div>
				<div class="price price-contain">
					<ins><span class="price-amount"><span class="currencySymbol"></span>{{number_format($item['promotion_price'])}}VNĐ</span></ins>
					<del><span class="price-amount"><span class="currencySymbol"></span>{{number_format($item['unit_price'])}}</span>VNĐ</del>
				</div>
				<div class="info">
					<a href="javascript:" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="javascript:" class="remove-from-cart"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</div>
			</div>
		</li>
		@endforeach
	</ul>
	<ul class="subtotal">
		<li>
			<div class="subtotal-line">
				<b class="stt-name">Tổng giá</b>
				<span class="stt-price">{{number_format($totalPrice)}}VNĐ</span>
			</div>
		</li>
		<li>
			<div class="subtotal-line">
				<b class="stt-name">Phí vận chuyển</b>
				<span class="stt-price">{{number_format($shipping_price)}}VNĐ</span>
			</div>
		</li>
		<li>
			<div class="subtotal-line">
				<a style="color: red;font-weight: 400;" class="stt-name">Promo/Gift Certificate</a>
				<span class="stt-price">{{number_format($pricePromotion)}}VNĐ</span>
			</div>
		</li>
		<li>
			<div class="subtotal-line">
				<b class="stt-name">Tổng tiền thanh toán:</b>
				<span class="stt-price">{{number_format($totalPriceAll)}}VNĐ</span>
			</div>
		</li>
	</ul>
</div>
<script type="text/javascript" src="assets/js/addcart.js"></script>
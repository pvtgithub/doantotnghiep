@extends('layouts.master')
@section('main-content')
<?php
$totalPrice = 0;
foreach ((array) session('cart') as $id => $details){
    $totalPrice += $details['promotion_price'] * $details['quantity'];
}
$totalQuantity = count((array) session('cart'));

?>
<div class="container">
	<nav class="biolife-nav">
		<ul>
			<li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
			<li class="nav-item"><span class="current-page">ShoppingCart</span></li>
		</ul>
	</nav>
</div>
@if(count($errors) > 0)
	@foreach($errors->all() as $err)
		<script type="text/javascript">
			alertify.set('notifier','position', 'bottom-left');
			alertify.error('{{$err}}');
		</script>
	@endforeach
@endif
@if(session('thongbao'))
<script type="text/javascript">
	alertify.set('notifier','position', 'bottom-left');
	alertify.success('{{session('thongbao')}}');
</script>
@endif
<?php session()->forget('thongbao') ?>
<div class="page-contain checkout">

	<!-- Main content -->
	<div id="main-content" class="main-content">
		<div class="container sm-margin-top-37px">
			<div class="row">

				<!--checkout progress box-->
				<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
					<div class="checkout-progress-wrap">
						<div class="checkout-act active">
							<h3 class="title-box" style="font-weight: 700;">THÔNG TIN ĐẶT HÀNG</h3>
							<div class="box-content">
								<p class="txt-desc">Xác nhận thông tin đặt hàng của bạn để dễ dàng trong việc vận chuyển hơn <i class="fa fa-truck"></i><i class="fa fa-truck"></i><i class="fa fa-truck"></i></p>
								<div class="login-on-checkout">
									<form action="postBill" name="frm-login" method="post">
										{{ csrf_field() }}
										<p class="form-row">
											<label >Email</label>
											<input type="email" name="email"  value="{{Auth::user()->email}}" placeholder="Your email">
										</p>
										<p class="form-row">
											<label >Họ tên</label>
											<input type="text" name="name"  value="{{Auth::user()->name}}" placeholder="Your name">
										</p>
										<p class="form-row">
											<label >Địa chỉ</label>
											<input type="text" name="address"  value="{{Auth::user()->address}}" placeholder="Your address">
										</p>
										<p class="form-row">
											<label >Số điện thoại</label>
											<input type="text" name="phone"  value="{{Auth::user()->phone}}" placeholder="Your phone">
										</p>
										<p class="form-row">
											<label >Tuổi</label>
											<input type="text" name="age"  value="{{Auth::user()->age}}" placeholder="Your age">
										</p>
										<p class="form-row">
											<label>Ghi chú</label>
											<textarea name="note" placeholder="Your note" ></textarea>
										</p>
										<p class="form-row">
											<div class="payment__wrapper">
												<label>Phương thức thanh toán</label>
												<table>
													<tr style="border: 2px solid;">
														<td>
															<div class="radio__wrapper">
																<input type="radio" name="payment" id="cash" value="Tiền mặt (COD)" checked>
																<label for="cash">Tiền mặt (COD)</label>
																<div class="bank__message">
																	<p>CHỈ ÁP DỤNG TIỀN MẶT ĐỐI VỚI NỘI THÀNH TP. ĐÀ NẴNG</p>
																</div>
															</div>
														</td>
													</tr>
													<tr style="border: 2px solid;">
														<td>
															<div class="radio__wrapper">
																<input type="radio" name="payment" id="online" value="Chuyển khoản">
																<label for="online">Chuyển khoản ngân hàng</label>
															</div>
															<div class="bank__message">
																<p>Vì lí do bảo mật cũng như để tiện cho việc kiểm tra đơn hàng, khi quý khách chọn hình thức <b>Chuyển Khoản Ngân Hàng</b>, nhân viên CSKH của WineDN sẽ ngay lập tức liên hệ với quý khách để <b>xác nhận thông tin và cung cấp số tài khoản ngân hàng</b> để quý khách tiến hành thanh toán. Cám ơn sự tin tưởng của quý khách.</p>
															</div>
														</td>	
													</tr>
												</table>
											</div>
										</p>
										<p class="form-row">
											<button type="submit">Xác nhận thông tin đặt hàng</button>
											<button onclick="location.href='/'" type="button" class="btn-cancel">Hủy</button>
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--Order Summary-->
				<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
					<div class="order-summary sm-margin-bottom-80px" id="change-item-checkout">
						<div class="title-block">
							<h3 class="title">Thông tin đơn hàng</h3>
						</div>
						<div class="cart-list-box short-type">
							<span class="number">{{$totalQuantity}} Items</span>
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
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
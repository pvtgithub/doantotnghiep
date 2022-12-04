<?php 
use App\Models\Customer;
use App\Models\Bill;
?>
@foreach($bills as $bill)
<div class="detail__wrapper">
	<div id="bill__screenshoot" class="bill__pages">
		<span class="title"> Chi tiết đơn hàng của bạn</span>
		@if($bill->status == 'Đã hủy đơn')
		<div class="detail__title">
			<span class="title-cancel">Đơn Hàng Đã Bị Hủy</span>
		</div>
		@else
		<ul class="order_status__wrapper">
			<div id="status1" class="order_status">
				<li>Đã đặt hàng</li>
			</div>
			<div id="status2" class="order_status">
				<li>Đã xác nhận</li>
			</div>
			<div id="status3" class="order_status">
				<li>Đang giao hàng</li>
			</div>
			<div id="status4" class="order_status">
				<li>Giao hàng thành công</li>
			</div>
		</ul>
		<script type="text/javascript">
			switch('{{$bill->status}}') {
				case "Đã đặt hàng":
				document.getElementById("status1").classList.add("completed");
				break;
				case "Đã xác nhận":
				document.getElementById("status1").classList.add("completed");
				document.getElementById("status2").classList.add("completed");
				break;
				case "Đang giao hàng":
				document.getElementById("status1").classList.add("completed");
				document.getElementById("status2").classList.add("completed");
				document.getElementById("status3").classList.add("completed");
				break;
				case "Giao hàng thành công":
				document.getElementById("status1").classList.add("completed");
				document.getElementById("status2").classList.add("completed");
				document.getElementById("status3").classList.add("completed");
				document.getElementById("status4").classList.add("completed");
				break;
				default:
				console.log('faillll');
			}
		</script>
		@endif
		<div class="transaction_info__wrapper">
			<div class="receive_info__wrapper">
				<p class="title" style="font-weight: 800">Thông tin người nhận</p>
				<div class="divider"></div>
				<div class="receive_info">
					<p><b>Họ tên: </b>{{$bill->customer->name}}</p>
					<p><b>Email: </b>{{$bill->customer->email}}</p>
					<p><b>Địa chỉ: </b>{{$bill->customer->address}}</p>
					<p><b>Số điện thoại: </b>{{$bill->customer->phone}}</p>
					<p><b>Tuổi: </b>{{$bill->customer->age}}</p>
				</div>
			</div>
			<div class="payment_method__wrapper">
				<p class="title" style="font-weight: 800">Phương thức thanh toán</p>
				<div class="divider"></div>
				<p>{{$bill->payment}}<br>
					@if($bill->payment == "Tiền mặt (COD)")
					<span> CHỈ ÁP DỤNG TIỀN MẶT ĐỐI VỚI NỘI THÀNH TP. Đà Nẵng</span>
					@else
					<span>Vì lí do bảo mật cũng như để tiện cho việc kiểm tra đơn hàng, khi quý khách chọn hình thức <b>Chuyển Khoản Ngân Hàng</b>, nhân viên CSKH của WineDN sẽ ngay lập tức liên hệ với quý khách để <b>xác nhận thông tin và cung cấp số tài khoản ngân hàng</b> để quý khách tiến hành thanh toán. Cám ơn sự tin tưởng của quý khách.</span>
					@endif
				</p>
			</div>
		</div>
		<div class="transaction_items__wrapper">
			<p class="transaction_name">Trạng thái:
				@if($bill->status == "Đã hủy đơn")
				<span style="color: red;">{{$bill->status}}</span>
				@else
				<span style="color: green">{{$bill->status}}</span>
				@endif
			</p>
			<div class="divider"></div>
			<div class="transaction_list">
				@foreach($bill->bill_details as $item)
				<div class="transaction_item">
					<img class=" " src="assets/images/products/{{$item->product->images->first()->image}}" alt="thumbnail">
					<div class="item_info__wrapper">
						<div class="item_info">
							<p class="name">{{$item->product->name}}</p>
							<p class="price">{{number_format($item->product->promotion_price)}}VNĐ</p>
						</div><p class="quantity">X{{$item->quantity}}</p>
					</div>
				</div>
				@endforeach
				<div class="divider"></div>
			</div>
		</div>
		<div class="order_total__wrapper">
			<div>
				<p>Tổng tạm tính:</p><p>{{number_format($bill->totalPriceProduct)}}VNĐ</p>
			</div>
			<div><p>Giảm giá:</p>{{number_format($bill->codePromotion)}}</div>
			<div>
				<p>Phí vận chuyển:</p><p>{{number_format($bill->shippingPrice)}}</p>
			</div>
			<div class="total"><p>Thành tiền:</p><p>{{number_format($bill->totalPrice)}}VNĐ</p></div>
		</div>
	</div>
	<div class="form-row">
		<button type="button" class="btn-cancel btnScreenShoot">Xuất hóa đơn</button>
		<button style="background-color: #b00c45;" onclick="getSearchBill('back')">Back</button>
	</div>
	@if(Auth::check())
		@if($bill->status == 'Đang giao hàng' && $bill->customer->email == Auth::user()->email)
		<div class="form-row">
			<button onclick="completedBill({{$bill->id}})" type="button" class="btn-cancel">Đã nhận được hàng</button>
		</div>
		@endif
	@else
		@if($bill->status == 'Đang giao hàng')
		<div class="form-row">
			<button onclick="completedBill({{$bill->id}})" type="button" class="btn-cancel">Đã nhận được hàng</button>
		</div>
		@endif
	@endif
</div>
<script src="{{URL::asset('style_admin/js/processBill.js')}}"></script>
@endforeach
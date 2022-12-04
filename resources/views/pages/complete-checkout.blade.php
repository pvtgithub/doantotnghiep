@extends('layouts.master')
@section('main-content')
<?php 
	use App\Models\Bill;
	$getBillNew = Bill::orderBy('id','desc')->first();
 ?>
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
<div class="checkout_success__wrapper">
	<img class="" src="/assets/images/ic_checkout_success.png" alt="icon">
	<p class="title_message">Đơn hàng của bạn đã được đặt thành công!</p>
	<p class="message">Chúng tôi sẽ liên hệ giao hàng cho bạn trong thời gian sớm nhất.</p>
	<div class="button__wrapper"><a href="/" class="secondary__button">Về trang chủ</a>
		<a href="detailBill/{{$getBillNew->id}}" class="primary__button">Xem đơn hàng</a>
	</div>
</div>
@endsection
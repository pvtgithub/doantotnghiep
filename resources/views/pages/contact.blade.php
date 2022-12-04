@extends('layouts.master')
@section('main-content')
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
<div class="container">
	<nav class="biolife-nav nav-86px">
		<ul>
			<li class="nav-item"><a href="/" class="permal-link">Home</a></li>
			<li class="nav-item"><span class="current-page">Contact</span></li>
		</ul>
	</nav>
</div>
<div class="page-contain contact-us">

	<!-- Main content -->
	<div id="main-content" class="main-content">
		<div class="wrap-map biolife-wrap-map" id="map-block">
			<iframe
			width="1920"
			height="591"
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.4383857778353!2d108.21277761480748!3d16.042725188897347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c01086f259%3A0x686ca7b78253c789!2zMTQ4IOG7tiBMYW4gTmd1ecOqbiBQaGksIEhvw6AgQ8aw4budbmcgQuG6r2MsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1667056417588!5m2!1svi!2s"
			frameborder="0"
			scrolling="no"
			marginheight="0"
			marginwidth="0">
		</iframe>
	</div>

	<div class="container">

		<div class="row">

			<!--Contact info-->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-info-container sm-margin-top-27px xs-margin-bottom-60px xs-margin-top-60px">
					<h4 class="box-title">Liên hệ với chúng tôi</h4>
					<p class="frst-desc">Thương hiệu WineDN được thành lập vào năm 2022 với mục tiêu đem lại cho người tiêu dùng những dịch vụ và sản phẩm tốt nhất. Winemart chuyên cung cấp các loại rượu vang, rượu mạnh, bia nhập khẩu cùng với các loại thực phẩm cao cấp khác như Chocolate, trà, cà phê, mứt, trái cây sấy khô,… từ các nhãn hiệu cao cấp, thiết kế riêng phục vụ từng đối tượng khách hàng.</p>
					<ul class="addr-info">
						<li>
							<div class="if-item">
								<b class="tie">Addess:</b>
								<p class="dsc">148 Ỷ Lan Nguyên Phi - Hòa Cường Bắc - Hải Châu - Đà Nẵng</p>
							</div>
						</li>
						<li>
							<div class="if-item">
								<b class="tie">Phone:</b>
								<p class="dsc">(+84) 34 8485 360</p>
							</div>
						</li>
						<li>
							<div class="if-item">
								<b class="tie">Email:</b>
								<p class="dsc">ruoudn_43@gmail.com</p>
							</div>
						</li>
						<li>
							<div class="if-item">
								<b class="tie">Store Open:</b>
								<p class="dsc">8am - 08pm, Mon - Sat</p>
							</div>
						</li>
					</ul>
					<div class="biolife-social inline">
						<ul class="socials">
							<li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							<li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
							<li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

			<!--Contact form-->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				@if(Auth::check())
				<div class="contact-form-container sm-margin-top-112px">
					<form action="contact" method="POST" >
						@csrf
						<p class="form-row">
							<input type="text" name="name" value="{{Auth::user()->name}}" placeholder="Your Name" class="txt-input">
						</p>
						<p class="form-row">
							<input type="email" name="email" value="{{Auth::user()->email}}" placeholder="Email Address" class="txt-input">
						</p>
						<p class="form-row">
							<input type="tel" name="phone" value="{{Auth::user()->phone}}" placeholder="Phone Number" class="txt-input">
						</p>
						<p class="form-row">
							<textarea name="mes" id="mes-1" cols="30" rows="9" placeholder="Message"></textarea>
						</p>
						<p class="form-row">
							<button class="btn btn-submit" type="submit">send message</button>
						</p>
					</form>
				</div>
				@else
				<div class="contact-form-container sm-margin-top-112px">
					<form action="contact" method="POST" >
						@csrf
						<p class="form-row">
							<input type="text" name="name" value="" placeholder="Your Name" class="txt-input">
						</p>
						<p class="form-row">
							<input type="email" name="email" value="" placeholder="Email Address" class="txt-input">
						</p>
						<p class="form-row">
							<input type="tel" name="phone" value="" placeholder="Phone Number" class="txt-input">
						</p>
						<p class="form-row">
							<textarea name="mes" id="mes-1" cols="30" rows="9" placeholder="Leave Message"></textarea>
						</p>
						<p class="form-row">
							<button type="submit" class="btn btn-submit" >send message</button>
						</p>
					</form>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
</div>
@endsection
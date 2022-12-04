@extends('layouts.master')
@section('main-content')
<div class="container">
	<nav class="biolife-nav">
		<ul>
			<li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
			<li class="nav-item"><span class="current-page">Authentication</span></li>
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
		alertify.error('{{session('thongbao')}}');
	</script>
@endif
<?php session()->forget('thongbao') ?>

<div class="page-contain login-page">
	<div id="main-content" class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="signin-container">
						<form action="login" name="frm-login" method="post">
							@csrf <!-- {{ csrf_field() }} -->
							<p class="form-row">
								<label for="fid-name">Email Address:<span class="requite">*</span></label>
								<input type="text" id="fid-name" name="email" value="" class="txt-input">
							</p>
							<p class="form-row">
								<label for="fid-pass">Password:<span class="requite">*</span></label>
								<input type="password" id="fid-pass" name="password" value="" class="txt-input">
							</p>
							<p class="form-row wrap-btn">
								<button class="btn btn-submit btn-bold" type="submit">sign in</button>
								<a href="#" class="link-to-help">Forgot your password</a>
							</p>
						</form>
					</div>
				</div>

				<!--Go to Register form-->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="register-in-container">

						<div class="intro">
							<h4 class="box-title">New Customer?</h4>
							<p class="sub-title">Tạo một tài khoản với chúng tôi và bạn sẽ có thể:</p>
							<ul class="lis">
								<li>Kiểm tra nhanh hơn</li>
								<li>Tiết kiệm thời gian và chi phí vận chuyển</li>
								<li>Truy cập lịch sử đặt hàng của bạn</li>
								<li>Theo dõi đơn đặt hàng mới</li>
							</ul>
							<a href="/register" class="btn btn-bold">Tạo tài khoản</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
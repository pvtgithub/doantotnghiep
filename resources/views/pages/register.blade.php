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
<div class="alert alert-danger">
	@foreach($errors->all() as $err)
	{{$err}} <br>
	@endforeach
</div>
@endif
<div class="page-contain login-page">
	<div id="main-content" class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="signin-container">
						<form action="register" name="frm-login" method="post">
							@csrf <!-- {{ csrf_field() }} -->
							<p class="form-row">
								<label for="fid-name">Email Address:<span class="requite">*</span></label>
								<input type="text" id="fid-name" name="email" value="" class="txt-input">
							</p>
							<p class="form-row">
								<label for="fid-name">Họ và tên:<span class="requite">*</span></label>
								<input type="text" id="fid-name" name="name" value="" class="txt-input">
							</p>
							<p class="form-row">
								<label for="fid-name">Địa chỉ:<span class="requite">*</span></label>

								<select class="form-select" id="city" name="city" aria-label=".form-select-sm">
									<option   selected>Chọn tỉnh thành</option>           
								</select>

								<select class="form-select" id="district" name="district" aria-label=".form-select-sm">
									<option  selected>Chọn quận huyện</option>
								</select>

								<select  class="form-select" id="ward" name="ward" aria-label=".form-select-sm">
									<option  selected>Chọn phường xã</option>
								</select>
								<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
								<script type="text/javascript" src="assets/js/getSelect.js"></script>
								<input type="text" id="fid-name" name="addressDetail">
							</p>

							<p class="form-row">
								<label for="fid-name">Số điện thoại:<span class="requite">*</span></label>
								<input type="text" id="fid-name" name="phone" value="" class="txt-input">
							</p>
							<p class="form-row">
								<label for="fid-name">Tuổi:<span class="requite">*</span></label>
								<input type="text" id="fid-name" name="age" value="" class="txt-input">
							</p>
							<p class="form-row">
								<label for="fid-pass">Mật khẩu:<span class="requite">*</span></label>
								<input type="password" id="fid-pass" name="password" value="" class="txt-input">
							</p>
							<p class="form-row">
								<label for="fid-pass">Nhập lại mật khẩu:<span class="requite">*</span></label>
								<input type="password" id="fid-pass" name="passwordAgain" value="" class="txt-input">
							</p>
							<p class="form-row wrap-btn">
								<button class="btn btn-submit btn-bold" type="submit">Đăng ký</button>
								<a href="#" class="link-to-help">Forgot your password?</a>
							</p>
						</form>
					</div>
				</div>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('admin.layouts.master')
@section('css')

<!-- Custom CSS -->
<link href="{{URL::asset('style_admin/css/addStyle.css')}}" rel="stylesheet">
@endsection
@section('main-content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm tài khoản người dùng
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-12" style="padding-bottom:120px">
				@if(count($errors)>0)
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

				<form action="addUser" id="btn-submit-add-user" method="POST">
					@csrf
					<div class="form-group">
						<label>Email*</label>
						<input type="email" class="form-control" name="email" placeholder="Nhập email" required/>
					</div>
					<div class="form-group">
						<label>Tên Khách Hàng*</label>
						<input class="form-control" name="name" placeholder="Nhập tên khách hàng" required />
					</div>
					<div class="form-group">
						<label>Số Điện Thoại*</label>
						<input type="text" class="form-control" name="phone"  placeholder="Nhập số điện thoại" required/>
					</div>
					<div class="form-group">
						<label>Địa Chỉ*</label>
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
						<input class="form-control" type="text" id="fid-name" name="addressDetail" placeholder="Địa chỉ chi tiết">
					</div>
					<div class="form-group">
						<label>Tuổi*</label>
						<input type="text" class="form-control" name="age"  placeholder="Nhập tuổi" required/>
					</div>
					<div class="form-group">
						<label>Mật Khẩu*</label>
						<input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu" required/>
					</div>
					<div class="form-group">
						<label>Nhập lại mật khẩu*</label>
						<input class="form-control" type="password" name="passwordAgain" placeholder="Nhập lại mật khẩu" required/>
					</div>
					<div class="form-group">
						<label>Quyền truy cập*</label>
						<label class="radio-inline">
							<input class="input-radio" name="permission" value="0" checked="" type="radio">User
						</label>
						<label class="radio-inline">
							<input class="input-radio" name="permission" value="1" type="radio">Admin
						</label>
					</div>
					<div class="form-btn">
						<button type="reset" class="btn btn-default">Làm mới</button>
						<button type="submit" name="submit" class="btn btn-default">Thêm</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
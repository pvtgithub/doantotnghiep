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
				<h1 class="page-header">Sửa thông tin khách hàng
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-12" style="padding-bottom:120px">
				<form data-id="{{$customer->id}}" action="postEditCustomer" id="btn-submit-edit-customer" method="POST">
					@csrf
					<div class="form-group">
						<label>Email*</label>
						<input type="email" class="form-control" value="{{$customer->email}}" name="email" placeholder="Nhập email" required/>
					</div>
					<div class="form-group">
						<label>Tên Khách Hàng*</label>
						<input class="form-control" name="name" value="{{$customer->name}}" placeholder="Nhập tên khách hàng" required />
					</div>
					<div class="form-group">
						<label>Số Điện Thoại*</label>
						<input type="text" class="form-control" name="phone" value="{{$customer->phone}}"  placeholder="Nhập số điện thoại" required/>
					</div>
					<div class="form-group">
						<label>Địa Chỉ*</label>
						<select class="form-select" id="city" name="city" aria-label=".form-select-sm">
							<option   selected>{{$address[3]}}</option>           
						</select>
						<select class="form-select" id="district" name="district" aria-label=".form-select-sm">
							<option  selected>{{$address[2]}}</option>
						</select>
						<select  class="form-select" id="ward" name="ward" aria-label=".form-select-sm">
							<option  selected>{{$address[1]}}</option>
						</select>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
						<script type="text/javascript" src="{{URL::asset('assets/js/getSelect.js')}}"></script>
						<input class="form-control" type="text" id="fid-name" name="addressDetail" value="{{$address[0]}}" placeholder="Địa chỉ chi tiết">
					</div>
					<div class="form-group">
						<label>Tuổi*</label>
						<input type="text" class="form-control" name="age" value="{{$customer->age}}"  placeholder="Nhập tuổi" required/>
					</div>
					<div class="form-btn">
						<button onclick="javascript:history.back()" class="btn btn-default">Quay lại</button>
						<button type="submit" name="submit" class="btn btn-default">Xác nhận</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

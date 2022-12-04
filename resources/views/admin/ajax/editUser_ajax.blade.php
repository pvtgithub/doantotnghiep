<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sửa thông tin người dùng
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

				<form data-id="{{$user->id}}" action="postEditUser" id="btn-submit-edit-user" method="POST">
					@csrf
					<div class="form-group">
						<label>Email*</label>
						<input type="email" class="form-control" value="{{$user->email}}" name="email" placeholder="Nhập email" required/>
					</div>
					<div class="form-group">
						<label>Tên Khách Hàng*</label>
						<input class="form-control" name="name" value="{{$user->name}}" placeholder="Nhập tên khách hàng" required />
					</div>
					<div class="form-group">
						<label>Số Điện Thoại*</label>
						<input type="text" class="form-control" name="phone" value="{{$user->phone}}"  placeholder="Nhập số điện thoại" required/>
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
						<input type="text" class="form-control" name="age" value="{{$user->age}}"  placeholder="Nhập tuổi" required/>
					</div>
					<div class="form-group">
						<input type="checkbox" name="changePassword" id="changePassword" style="width: 30px; height: 15px;">
						<label>Đổi mật khẩu</label><br>
					</div>
					<div class="form-group password">
						<label>Nhập mật khẩu*</label>
						<input class="form-control" type="password" name="password"/>
					</div>
					<div class="form-group password">
						<label>Nhập lại mật khẩu*</label>
						<input class="form-control" type="password" name="passwordAgain"/>
					</div>
					<div class="form-group">
						<label>Quyền truy cập*</label>
						@if($user->permission == 0)
						<label class="radio-inline">
							<input class="input-radio" name="permission" value="0" checked="" type="radio">User
						</label>
						<label class="radio-inline">
							<input class="input-radio" name="permission" value="1" type="radio">Admin
						</label>
						@else
						<label class="radio-inline">
							<input class="input-radio" name="permission" value="0" type="radio">User
						</label>
						<label class="radio-inline">
							<input class="input-radio" name="permission" value="1" checked="" type="radio">Admin
						</label>
						@endif
					</div>
					<div class="form-btn">
						<button onclick="javascript:history.back()" class="btn btn-default">Quay lại</button>
						<button type="submit" name="submit" class="btn btn-default">Xác nhận</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<script>
	$(document).ready(function()
	{
		if($("#changePassword").is(":checked")){
			$(".password").show();
		}else
		{
			$(".password").hide();
		}

		$("#changePassword").change(function()
		{
			if($(this).is(":checked"))
			{
				$(".password").show();
			}
			else
			{
				$(".password").hide();
			}
		});
	});
</script>
<script src="{{URL::asset('style_admin/js/processUser.js')}}"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sửa loại rượu</h1>
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12" style="padding-bottom:120px">
			<form data-id="{{$category->id}}" data-id-image="{{$category->images[0]->id}}" action="postEditCategory" method="POST" id="btn-submit-edit-category">
				@csrf
				<div class="form-group">
					<label>Tên Loại Rượu*</label>
					<input class="form-control" name="name" value="{{$category->name}}" placeholder="Nhập tên loại rượu" required />
				</div>
				<div class="form-group">
					<label>Mô tả*</label>
					<textarea name="description" class="form-control" placeholder="Thêm mô tả" required>{{$category->description}}</textarea>
				</div>
				<div class="form-group">
					<label>Tab*</label>
					<input class="form-control" name="tab" value="{{$category->tab}}" placeholder="Tab"/>
				</div>
				<div class="form-group">
					<label>Hình Ảnh</label>
					<input class="form-control" type="file" name="image_file"/>
					@if(isset($error_img))
					<div class="alert alert-danger">{{$error_img}}</div>
					@endif
					<br><img width="200" src="{{URL::asset('assets/images/categories/'.$category->images[0]->image)}}">
				</div>
				<div class="form-btn">
					<button onclick="javascript:history.back()" class="btn btn-default">Quay lại</button>
					<button type="submit" class="btn btn-default">Xác nhận</button>
				</div>
			</form>
		</div>
	</div>
	<!-- /.row -->
</div>
<script src="{{URL::asset('style_admin/js/processCategory.js')}}"></script>	
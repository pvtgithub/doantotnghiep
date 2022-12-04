<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thêm Loại Rượu
			</h1>
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12" style="padding-bottom:120px">
			<form action="{{route('postAddCategory')}}" method="POST" id="btn-submit-add-category" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Tên Loại Rượu*</label>
					<input class="form-control" id="name_category" name="name" placeholder="Nhập tên loại rượu" required />
				</div>
				<div class="form-group">
					<label>Mô tả*</label>
					<textarea name="description" id="description_category" class="form-control" placeholder="Thêm mô tả" required></textarea>
				</div>
				<div class="form-group">
					<label>Tab*</label>
					<input class="form-control" name="tab" placeholder="Tab"/>
				</div>
				<div class="form-group">
					<label>Hình Ảnh</label>
					<input class="form-control" type="file" id="file1" name="image_file"/>
					@if(isset($error_img))
					<div class="alert alert-danger">{{$error_img}}</div>
					@endif
				</div>
				<div class="form-btn">
					<button type="reset" class="btn btn-default">Làm mới</button>
					<button type="submit" class="btn btn-default">Thêm</button>
				</div>
			</form>
		</div>
	</div>
	<!-- /.row -->
</div>
<script src="{{URL::asset('style_admin/js/processCategory.js')}}"></script>
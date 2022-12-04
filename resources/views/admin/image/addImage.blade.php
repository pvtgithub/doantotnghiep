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
				<h1 class="page-header">Thêm Hình Ảnh
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-12" style="padding-bottom:120px">
				<form action="{{route('postAddImage')}}" method="POST" id="btn-submit-add-image" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Chọn loại hình ảnh*</label>
						<select class="form-select" id="mySelectBox" name="id_categoryImage" aria-label=".form-select-sm">
							<option>Hình ảnh cho loại rượu</option>
							<option>Hình ảnh cho sản phẩm rượu</option>
							<option>Hình ảnh cho bài viết</option>
						</select>
					</div>
					<div class="form-group" id="category" style="display: none;">
						<label>Chọn loại rượu*</label>
						<select class="form-select"  name="id_category" aria-label=".form-select-sm">
							@foreach($categories as $row)
							<option>{{$row->id."-".$row->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group" id="product" style="display: none;">
						<label>Chọn rượu*</label>
						<select class="form-select" name="id_product" aria-label=".form-select-sm">
							@foreach($products as $row)
							<option>{{$row->id."-".$row->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group" id="blog" style="display: none;">
						<label>Chọn bài viết*</label>
						<select class="form-select" name="id_blog" aria-label=".form-select-sm">
							@foreach($blogs as $row)
							<option>{{$row->id."-".$row->title}}</option>
							@endforeach
						</select>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#category').css("display","block");

							$('#mySelectBox').on('change',function(e){
								e.preventDefault();
								if($('#mySelectBox').prop('selectedIndex') == 0){
									$('#category').css("display","block");
									$('#product').css("display","none");
									$('#blog').css("display","none");
								}
								if($('#mySelectBox').prop('selectedIndex') == 1){
									$('#category').css("display","none");
									$('#product').css("display","block");
									$('#blog').css("display","none");
								}
								if($('#mySelectBox').prop('selectedIndex') == 2){
									$('#category').css("display","none");
									$('#product').css("display","none");
									$('#blog').css("display","block");
								}
							})
						});
					</script>
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
	<!-- /.container-fluid -->
</div>
@endsection
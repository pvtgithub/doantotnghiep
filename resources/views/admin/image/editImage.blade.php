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
				<h1 class="page-header">Sửa Hình Ảnh
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-12" style="padding-bottom:120px">
				<form action="postEditImage" data-id="{{$image->id}}" method="POST" id="btn-submit-edit-image" enctype="multipart/form-data">
					@csrf
					@if(isset($image->id_category))
					<div class="form-group" id="category">
						<label>Chọn loại rượu*</label>
						<select class="form-select"  name="id_category" aria-label=".form-select-sm">
							<option>{{$image->id_category."-".$image->category->name}}</option>
							@foreach($categories as $row)
							<option>{{$row->id."-".$row->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Hình Ảnh</label>
						<input class="form-control" type="file" id="file1" name="image_file"/>
						<br><img src="{{URL::asset('assets/images/categories/'.$image->image)}}" width="200">
					</div>
					@endif
					@if(isset($image->id_product))
					<div class="form-group" id="product">
						<label>Chọn rượu*</label>
						<select class="form-select" name="id_product" aria-label=".form-select-sm">
							<option>{{$image->id_product."-".$image->product->name}}</option>
							@foreach($products as $row)
							<option>{{$row->id."-".$row->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Hình Ảnh</label>
						<input class="form-control" type="file" id="file1" name="image_file"/>
						<br><img src="{{URL::asset('assets/images/products/'.$image->image)}}" width="200">
					</div>
					@endif
					@if(isset($image->id_news))
					<div class="form-group" id="blog">
						<label>Chọn bài viết*</label>
						<select class="form-select" name="id_blog" aria-label=".form-select-sm">
							<option>{{$image->id_news."-".$image->news->title}}</option>
							@foreach($blogs as $row)
							<option>{{$row->id."-".$row->title}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Hình Ảnh</label>
						<input class="form-control" type="file" id="file1" name="image_file"/>
						<br><img src="{{URL::asset('assets/images/blogpost/'.$image->image)}}" width="200">
					</div>
					@endif
					<div class="form-btn">
						<button type="reset" class="btn btn-default">Làm mới</button>
						<button type="submit" class="btn btn-default">Cập nhật</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
@endsection
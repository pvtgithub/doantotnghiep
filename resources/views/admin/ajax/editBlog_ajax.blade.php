<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sửa bài viết
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
			<form action="postEditBlog" data-id="{{$blog->id}}" data-id-image1="{{$blog->images[0]->id}}" data-id-image2="{{$blog->images[1]->id}}" method="POST" id="btn-submit-edit-blog" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Chọn loại bài viết*</label>
					<select class="form-select" id="category_news" name="category_news" aria-label=".form-select-sm">
						<option checked>{{$blog->category_news}}</option>
						<option>Tin tức</option>
						<option>Khuyến mãi</option>
					</select>
				</div>
				<div class="form-group">
					<label>Tiêu đề*</label>
					<input class="form-control" name="title" placeholder="Nhập tên bài viết" value="{{$blog->title}}" required />
				</div>
				<div class="form-group">
					<label>Mô tả*</label>
					<textarea name="description" class="form-control" placeholder="Thêm mô tả" required>{{$blog->description}}</textarea>
				</div>
				<div class="form-group">
					<label>Nội dung 1*</label>
					<textarea class="form-control" placeholder="Thêm nội dung 1" name="content1" required>{{$blog->content1}}</textarea>
				</div>
				<div class="form-group">
					<label>Hình Ảnh 1*</label>
					<input class="form-control" type="file" id="file1" name="image_file1"/>
					@if(count($blog->images) > 0)
					<br><img width="200" src="{{URL::asset('assets/images/blogpost/'.$blog->images[0]->image)}}">
					@endif
				</div>
				<div class="form-group">
					<label>Nội dung 2*</label>
					<textarea class="form-control" placeholder="Thêm nội dung 2" name="content2" required>{{$blog->content2}}</textarea>
				</div>
				<div class="form-group">
					<label>Hình Ảnh 2*</label>
					<input class="form-control" type="file" id="file1" name="image_file2"/>
					@if(count($blog->images) > 1)
					<br><img width="200" src="{{URL::asset('assets/images/blogpost/'.$blog->images[1]->image)}}">
					@endif
				</div>
				<div class="form-group">
					<label>Nội dung 3*</label>
					<textarea class="form-control" placeholder="Thêm nội dung 3" name="content3" required>{{$blog->content3}}</textarea>
				</div>
				<div class="form-btn">
					<button type="reset" class="btn btn-default">Làm mới</button>
					<button type="submit" class="btn btn-default">Cập nhật</button>
				</div>
			</form>
		</div>
	</div>
	<!-- /.row -->
</div>
<script type="text/javascript" src="{{URL::asset('style_admin/js/processBlog.js')}}"></script>
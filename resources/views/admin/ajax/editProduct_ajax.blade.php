<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sửa thông tin rượu
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
			<form data-id="{{$product->id}}" data-id-image="{{$product->images[0]->id}}" action="postEditProduct" method="POST" id="btn-submit-edit-product" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Chọn loại rượu*</label>
					<select class="form-select" id="category" name="id_category" aria-label=".form-select-sm">
						<option selected>{{$product->category->id."-".$product->category->name}}</option>
						@foreach($categories as $row)
						<option>{{$row->id."-".$row->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Tên Rượu*</label>
					<input class="form-control" name="name" placeholder="Nhập tên rượu" value="{{$product->name}}" required />
				</div>
				<div class="form-group">
					<label>Mô tả*</label>
					<textarea name="description" class="form-control" placeholder="Thêm mô tả" required>{{$product->description}}</textarea>
				</div>
				<div class="form-group">
					<label>Nội dung*</label>
					<textarea class="form-control" name="content" placeholder="Thêm nội dung">{{$product->content}}</textarea>
				</div>
				<div class="form-group">
					<label>Giá gốc*</label>
					<input class="form-control" name="unit_price" placeholder="Giá gốc" value="{{$product->unit_price}}"/>
				</div>
				<div class="form-group">
					<label>Giá khuyến mãi*</label>
					<input class="form-control" name="promotion_price" placeholder="Giá khuyến mãi" value="{{$product->promotion_price}}"/>
				</div>
				<div class="form-group form-checkbox-product">
					<label>Main-slide*</label>
					<input type="checkbox" name="main_slide" class="checkbox__class"/>
				</div>
				<div class="form-group form-checkbox-product" >
					<label>Banner*</label>
					<input type="checkbox" name="banner" class="checkbox__class" /> 
				</div>
				<div class="form-group form-checkbox-product" >
					<label>Deal*</label>
					<input type="checkbox" name="deal" class="checkbox__class" />
				</div>
				<div class="form-group form-checkbox-product" >
					<label>Sale*</label>
					<input type="checkbox" name="sale" class="checkbox__class" />
				</div>
				<script type="text/javascript">
					$(document).ready(function()
					{
						$(".checkbox__class").on('change',function(e) {
							e.preventDefault();
							var ele = $(this);
							if(ele.is(":checked")){
								ele.val(1);
							}else{
								ele.val(0);
							}
							console.log(ele.val());
						});

						if ({!! json_encode($product->main_slide) !!} == 1) {
							$('input[name="main_slide"]').prop('checked', true);
						}
						if ({!! json_encode($product->banner) !!} == 1) {
							$('input[name="banner"]').prop('checked', true);
						}
						if ({!! json_encode($product->deal) !!} == 1) {
							$('input[name="deal"]').prop('checked', true);
						}
						if ({!! json_encode($product->sale) !!} == 1) {
							$('input[name="sale"]').prop('checked', true);
						}

						if($('input[name="main_slide"]').is(":checked")){
							$('input[name="main_slide"]').val(1);
						}
						if($('input[name="banner"]').is(":checked")){
							$('input[name="banner"]').val(1);
						}
						if($('input[name="deal"]').is(":checked")){
							$('input[name="deal"]').val(1);
						}
						if($('input[name="sale"]').is(":checked")){
							$('input[name="sale"]').val(1);
						}
						console.log($('input[name="main_slide"]').val());
					});
				</script>
				<div class="form-group">
					<label>Rate*</label>
					<input class="form-control" name="rate" placeholder="Đánh giá" value="{{$product->rate}}"/>
				</div>
				<div class="form-group">
					<label>Số lượng*</label>
					<input class="form-control" name="quantity" placeholder="Số lượng" value="{{$product->quantity}}"/>
				</div>
				<div class="form-group">
					<label>Hình Ảnh</label>
					<input class="form-control" type="file" id="file1" name="image_file"/>
					<br><img width="200" src="{{URL::asset('assets/images/products/'.$product->images[0]->image)}}">
				</div>
				<div class="form-btn">
					<button type="reset" class="btn btn-default">Làm mới</button>
					<button type="submit" class="btn btn-default">Xác nhận</button>
				</div>
			</form>
		</div>
	</div>
	<!-- /.row -->
</div>
<script src="{{URL::asset('style_admin/js/processProduct.js')}}"></script>
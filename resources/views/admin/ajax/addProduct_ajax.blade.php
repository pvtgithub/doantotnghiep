<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thêm Rượu
			</h1>
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12" style="padding-bottom:120px">
			<form action="postAddProduct" method="POST" id="btn-submit-add-product" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Chọn loại rượu*</label>
					<select class="form-select" id="category" name="id_category" aria-label=".form-select-sm">
						@foreach($categories as $row)
						<option>{{$row->id."-".$row->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Tên Rượu*</label>
					<input class="form-control" name="name" placeholder="Nhập tên rượu" required />
				</div>
				<div class="form-group">
					<label>Mô tả*</label>
					<textarea name="description" class="form-control" placeholder="Thêm mô tả" required></textarea>
				</div>
				<div class="form-group">
					<label>Nội dung*</label>
					<input class="form-control" name="content" placeholder="Thêm nội dung"/>
				</div>
				<div class="form-group">
					<label>Giá gốc*</label>
					<input class="form-control" name="unit_price" placeholder="Giá gốc"/>
				</div>
				<div class="form-group">
					<label>Giá khuyến mãi*</label>
					<input class="form-control" name="promotion_price" placeholder="Giá khuyến mãi"/>
				</div>
				<div class="form-group form-checkbox-product">
					<label>Main-slide*</label>
					<input type="checkbox" name="main_silde" value="0" class="checkbox__class">
				</div>
				<div class="form-group form-checkbox-product" >
					<label>Banner*</label>
					<input type="checkbox" name="banner" value="0" class="checkbox__class"/>
				</div>
				<div class="form-group form-checkbox-product" >
					<label>Deal*</label>
					<input type="checkbox" name="deal" value="0" class="checkbox__class"/>
				</div>
				<div class="form-group form-checkbox-product" >
					<label>Sale*</label>
					<input type="checkbox" name="sale" value="0" class="checkbox__class" />
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
						})
					});
				</script>
				<div class="form-group">
					<label>Rate*</label>
					<input class="form-control" name="rate" placeholder="Đánh giá" />
				</div>
				<div class="form-group">
					<label>Số lượng*</label>
					<input class="form-control" name="quantity" placeholder="Số lượng" />
				</div>
				<div class="form-group">
					<label>Hình Ảnh</label>
					<input class="form-control" type="file" id="file1" name="image_file"/>
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
<script src="{{URL::asset('style_admin/js/processProduct.js')}}"></script>
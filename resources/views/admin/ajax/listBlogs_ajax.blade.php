<div class="container-fluid"	>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" style="color: #6C7293;">Danh Sách
				<small>Bài Viết</small>
			</h1>
		</div>
		@if(session('thongbao'))
		<div class="alert alert-success">
			{{session('thongbao')}}
		</div>
		@endif
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr align="center">
					<th>ID</th>
					<th>Tiêu đề</th>
					<th>Mô tả</th>
					<th>Thể loại</th>
					<th>Nội dung 1</th>
					<th>Nội dung 2</th>
					<th>Nội dung 3</th>
					<th>Ngày đăng bài</th>
					<th>Delete</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				@foreach($blogs as $row)
				<tr class="odd gradeX" align="center">
					<td>{{$row->id}}</td>
					<td>{{$row->title}}</td>
					<td>{{$row->description}}</td>
					<td>{{$row->category_news}}</td>
					<td>{{$row->content1}}</td>
					<td>{{$row->content2}}</td>
					<td>{{$row->content3}}</td>
					<td>{{$row->datepost}}</td>
					<td class="center" ><i class="fa fa-trash fa-fw"></i><a data-url="deleteBlog" data-id="{{$row->id}}" data-email="{{$row->title}}" class="callDelete" href="javascript:">Delete</a></td>
					<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="getEditBlog/{{$row->id}}">Edit</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.row -->
</div>
<script src="{{URL::asset('style_admin/js/processDelete.js')}}"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#dataTables-example').DataTable();
	} );
</script>

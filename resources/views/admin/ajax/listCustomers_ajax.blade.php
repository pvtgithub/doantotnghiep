<div class="container-fluid"	>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" style="color: #6C7293;">Danh Sách
				<small>Khách Hàng</small>
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
					<th>Tên</th>
					<th>Email</th>
					<th>Số Điện Thoại</th>
					<th>Địa Chỉ</th>
					<th>Tuổi</th>
					<th>Delete</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				@foreach($customers as $row)
				<tr class="odd gradeX" align="center">
					<td>{{$row->id}}</td>
					<td>{{$row->name}}</td>
					<td>{{$row->email}}</td>
					<td>{{$row->phone}}</td>
					<td>{{$row->address}}</td>
					<td>{{$row->age}}</td>
					<td class="center" ><i class="fa fa-trash fa-fw"></i><a data-url="deleteCustomer" data-id="{{$row->id}}" data-email="{{$row->email}}" class="callDelete" href="javascript:">Delete</a></td>
					<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="getEditCustomer/{{$row->id}}">Edit</a></td>
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

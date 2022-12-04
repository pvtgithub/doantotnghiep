<div id="page-wrapper">
	<div class="container-fluid"	>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color: #6C7293;">Danh Sách
					<small>Hóa Đơn</small>
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
						<th>Tên Khách Hàng</th>
						<th>Ngày Oder</th>
						<th>Phương Thức Thanh Toán</th>
						<th>Tổng Tiền</th>
						<th>Trạng Thái</th>
						<th>Delete</th>
						<th>Chi Tiết</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bills as $row)
					<tr class="odd gradeX" align="center">
						<td>{{$row->id}}</td>
						<td>{{$row->customer->name}}</td>
						<td>{{$row->date_oder}}</td>
						<td>{{$row->payment}}</td>
						<td>{{$row->totalPrice}}</td>
						<td>{{$row->status}}</td>
						<td class="center"><i class="fa fa-trash fa-fw"></i><a data-id="{{$row->id}}" class="btnDeleteBill">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="bill_detail/{{$row->id}}">Chi Tiết</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="{{URL::asset('style_admin/js/processBill.js')}}"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#dataTables-example').DataTable();
	} );
</script>

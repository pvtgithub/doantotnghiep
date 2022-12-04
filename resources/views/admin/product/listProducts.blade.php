@extends('admin.layouts.master')

@section('main-content')
@section('css')

<!-- Custom CSS -->
<link href="{{URL::asset('admin_asset/dist/css/sb-admin-2.css')}}" rel="stylesheet">
@endsection
<div id="page-wrapper">
	<div class="container-fluid"	>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color: #6C7293;">Danh Sách
					<small>Rượu</small>
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
						<th>Loại Rượu</th>
						<th>Mô Tả</th>
						<th>Nội Dung</th>
						<th>Giá Gốc</th>
						<th>Giá Khuyến Mãi</th>
						<th>Số lượng</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $row)
					<tr class="odd gradeX" align="center">
						<td>{{$row->id}}</td>
						<td>{{$row->name}}</td>
						<td>{{$row->category->name}}</td>
						<td>{{$row->description}}</td>
						<td>{{$row->content}}</td>
						<td>{{number_format($row->unit_price)}}</td>
						<td>{{number_format($row->promotion_price)}}</td>
						<td>{{$row->quantity}}</td>
						<td class="center" ><i class="fa fa-trash fa-fw"></i><a data-url="deleteProduct" data-id="{{$row->id}}" data-email="{{$row->name}}" class="callDelete" href="javascript:">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="getEditProduct/{{$row->id}}">Edit</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
@endsection
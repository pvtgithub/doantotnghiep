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
					<small>Tài Khoản</small>
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
					@foreach($users as $row)
					<tr class="odd gradeX" align="center">
						<td>{{$row->id}}</td>
						<td>{{$row->name}}</td>
						<td>{{$row->email}}</td>
						<td>{{$row->phone}}</td>
						<td>{{$row->address}}</td>
						<td>{{$row->age}}</td>
						<td class="center" ><i class="fa fa-trash fa-fw"></i><a data-url="deleteUser" data-id="{{$row->id}}" data-email="{{$row->email}}" class="callDelete" href="javascript:">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="getEditUser/{{$row->id}}">Edit</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
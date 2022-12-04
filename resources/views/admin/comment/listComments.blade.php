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
					<small>Bình Luận</small>
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
						<th>Nội dung bình luận</th>
						<th>Khách hàng bình luận</th>
						<th>Sao đánh giá</th>
						<th>Bài viết</th>
						<th>Sản Phẩm</th>
						<th>Thời gian bình luận</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($comments as $row)
					@if(isset($row->id_news))
					<tr class="odd gradeX" align="center">
						<td>{{$row->id}}</td>
						<td>{{$row->content}}</td>
						<td>{{$row->user->name}}</td>
						<td></td>
						<td>{{$row->blog->title}}</td>
						<td></td>
						<td>{{$row->time_comment}}</td>
						<td class="center" ><i class="fa fa-trash fa-fw"></i><a data-url="deleteComment" data-id="{{$row->id}}" data-email="bình luận của {{$row->user->name}}" class="callDelete" href="javascript:">Delete</a></td>
					</tr>
					@elseif(isset($row->id_product))
					<tr class="odd gradeX" align="center">
						<td>{{$row->id}}</td>
						<td>{{$row->content}}</td>
						<td>{{$row->user->name}}</td>
						<td>{{$row->rate}}</td>
						<td></td>
						<td>{{$row->product->name}}</td>
						<td>{{$row->time_comment}}</td>
						<td class="center" ><i class="fa fa-trash fa-fw"></i><a data-url="deleteComment" data-id="{{$row->id}}" data-email="bình luận của {{$row->user->name}}" class="callDelete" href="javascript:">Delete</a></td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.row -->
	</div>
</div>
@endsection
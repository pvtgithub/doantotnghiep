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
					<small>Hình Ảnh</small>
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
						<th>Rượu</th>
						<th>Loại Rượu</th>
						<th>Bài viết</th>
						<th>Hình ảnh</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					@foreach($images as $row)
					@if(isset($row->id_product))
					<tr class="odd gradeX" align="center">
						<td>{{$row->id}}</td>
						<td>{{$row->product->name}}</td>
						<td></td>
						<td></td>
						<td><img width="90" src="{{URL::asset('assets/images/products/'.$row->image)}}"></td>
						<script type="text/javascript">
							
						</script>
						<td class="center" ><i class="fa fa-trash fa-fw"></i><a data-url="deleteImage" data-id="{{$row->id}}" data-email="{{$row->product->name}}" class="callDelete" href="javascript:">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="getEditImage/{{$row->id}}">Edit</a></td>
					</tr>
					@elseif(isset($row->id_category))
					<tr class="odd gradeX" align="center">
						<td>{{$row->id}}</td>
						<td></td>
						<td>{{$row->category->name}}</td>
						<td></td>
						<td><img width="200px" src="{{URL::asset('assets/images/categories/'.$row->image)}}"></td>
						<script type="text/javascript">
							
						</script>
						<td class="center" ><i class="fa fa-trash fa-fw"></i><a data-url="deleteImage" data-id="{{$row->id}}" data-email="{{$row->category->name}}" class="callDelete" href="javascript:">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="getEditImage/{{$row->id}}">Edit</a></td>
					</tr>
					@elseif(isset($row->id_news))
					<tr class="odd gradeX" align="center">
						<td>{{$row->id}}</td>
						<td></td>
						<td></td>
						<td>{{$row->news->title}}</td>
						<td><img width="90" src="{{URL::asset('assets/images/blogpost/'.$row->image)}}"></td>
						<script type="text/javascript">
							
						</script>
						<td class="center" ><i class="fa fa-trash fa-fw"></i><a data-url="deleteImage" data-id="{{$row->id}}" data-email="{{$row->news->name}}" class="callDelete" href="javascript:">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="getEditImage/{{$row->id}}">Edit</a></td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
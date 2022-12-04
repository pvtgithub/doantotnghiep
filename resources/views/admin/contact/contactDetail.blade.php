@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{URL::asset('style_admin/css/processBill.css')}}">
@endsection
@section('main-content')
<div id="page-wrapper">
	<div class="container" style="height: 700px; padding-top: 50px;">
		<div class="detail__wrapper">
			<span class="title" style="font-weight: 500; font-size: 24px">{{$contact->name}} đã gửi cho bạn 1 tin nhắn</span>
			<div class="transaction_info__wrapper">
				<div class="receive_info__wrapper">
					<p class="title" style="font-weight: 800">Thông tin người gủi</p>
					<div class="divider"></div>
					<div class="receive_info">
						<p><b>Họ tên: </b>{{$contact->name}}</p>
						<p><b>Email: </b>{{$contact->email}}</p>
						<p><b>Số điện thoại: </b>{{$contact->phone}}</p>
						<p><b>Thời gian gửi: </b>{{$contact->time_contact}}</p>
					</div>
				</div>
				<div class="payment_method__wrapper">
					<p class="title" style="font-weight: 800">Nội dung tin nhắn</p>
					<div class="divider"></div>
					<p>
						{{$contact->content}}
					</p>
				</div>
			</div>
			<div class="form-row">
				<a href="deleteContactInDetail/{{$contact->id}}" onclick="return confirm('Xóa tin nhắn???')"><button style="background-color: #b00c45;" type="button" class="btn-cancel">Xóa tin nhắn</button></a>
			</div>
		</div>
	</div>
</div>
@endsection
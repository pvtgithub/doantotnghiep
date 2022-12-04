@extends('admin.layouts.master')
@section('main-content')
<?php 
$hcm = 0;
$hn = 0;
$dn = 0;
$khac = 0;

foreach ($users as $user) {
	if(strlen(strstr($user->address, "Hồ Chí Minh")) > 0){
		$hcm++;
	}else if(strlen(strstr($user->address, "Hà Nội")) > 0){
		$hn++;
	}else if(strlen(strstr($user->address, "Đà Nẵng")) > 0){
		$dn++;
	}else{
		$khac++;
	}
} 
?>
<script type="text/javascript">
	var userHCM = {!! json_encode($hcm) !!};
	var userHN = {!! json_encode($hn) !!};
	var userDN = {!! json_encode($dn) !!};
	var userOther = {!! json_encode($khac) !!};
	var quantityProductCategory = {!! json_encode($quantityProductCategory) !!}
	var quantityProductedCategory = {!! json_encode($quantityProductedCategory) !!}
</script>
<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-6 col-xl-3">
			<div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
				<i class="fa fa-chart-line fa-3x text-primary"></i>
				<div class="ms-3">
					<p class="mb-2">Doanh Thu</p>
					<h6 class="mb-0">{{number_format($turnover)}}VNĐ</h6>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3">
			<div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
				<i class="fa fa-chart-bar fa-3x text-primary"></i>
				<div class="ms-3">
					<p class="mb-2">Số Lượng Sản Phẩm</p>
					<h6 class="mb-0">{{$quantityProducts}} sản phẩm</h6>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3">
			<div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
				<i class="fa fa-chart-area fa-3x text-primary"></i>
				<div class="ms-3">
					<p class="mb-2">Số Lượng Hóa Đơn</p>
					<h6 class="mb-0">{{$quantityBills}} hóa đơn</h6>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3">
			<div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
				<i class="fa fa-chart-pie fa-3x text-primary"></i>	
				<div class="ms-3">
					<p class="mb-2">Số Lượng Khách Hàng</p>
					<h6 class="mb-0">{{$quantityCustomers}} khách hàng</h6>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Sale & Revenue End -->


<!-- Sales Chart Start -->
<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-6">
			<div class="bg-secondary text-center rounded p-4">
				<div class="d-flex align-items-center justify-content-between mb-4">
					<h6 class="mb-0">Phân bổ khách hàng ở các thành phố</h6>
					<a href="users">Show All</a>
				</div>
				<canvas id="pie-chart"></canvas>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6">
			<div class="bg-secondary text-center rounded p-4">
				<div class="d-flex align-items-center justify-content-between mb-4">
					<h6 class="mb-0">Sản phẩm đã bán và tồn kho</h6>
					<a href="products">Show All</a>
				</div>
				<canvas id="salse-revenue"></canvas>
			</div>
		</div>
	</div>
</div>
<!-- Sales Chart End -->


<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-secondary text-center rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h6 class="mb-0">Hóa đơn gần đây</h6>
			<a href="bills">Show All</a>
		</div>
		<div class="table-responsive">
			<table class="table text-start align-middle table-bordered table-hover mb-0">
				<thead>
					<tr class="text-white">
						<th scope="col">Tên khách hàng</th>
						<th scope="col">Thời gian oder</th>
						<th scope="col">Tổng thanh toán</th>
						<th scope="col">Phương thức thanh toán</th>
						<th scope="col">Trạng thái</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($billsSecond as $bill)
					<tr>
						<td>{{$bill->customer->name}}</td>
						<td>{{$bill->date_oder}}</td>
						<td>{{number_format($bill->totalPrice)}}VNĐ</td>
						<td>{{$bill->payment}}</td>
						<td>{{$bill->status}}</td>
						<td><a class="btn btn-sm btn-primary" href="bill_detail/{{$bill->id}}">Chi tiết</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Recent Sales End -->
<script src="{{URL::asset('style_admin/js/dashboard.js')}}"></script>
@endsection
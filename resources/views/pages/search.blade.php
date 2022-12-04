@extends('layouts.master')
@section('main-content')
<div class="container">
	<div class="row">
		<section id="left-sidebar" class="col-md-3 col-sm-4">
			<span class="filter"><i class="fa fa-filter" aria-hidden="true"></i> Tìm kiếm</span>
			<aside id="filter-bar">
				<h1>Bộ tìm kiếm</h1>
				<h2><a href="kho-thanh-ly">Tìm Kiếm</a></h2>
				<hr>
				<form id="frm-filter-search" action="https://www.sieuthiruoungoai.com/product/filter" method="post">
					<input type="hidden" name="categories" value="23">
					<h2>Giá</h2>
					<ul>
						<li><input type="radio" name="price_range" value="1,500000" id="price_range1"><label for="price_range1">0 - 500.000đ</label></li>
						<li><input type="radio" name="price_range" value="500000,1000000" id="price_range2"><label for="price_range2">500,000đ - 1.000.000đ</label></li>
						<li><input type="radio" name="price_range" value="1000000,3000000" id="price_range3"><label for="price_range3">1.000.000đ - 3.000.000đ</label></li>
						<li><input type="radio" name="price_range" value="3000000" id="price_range4"><label for="price_range4">Trên 3.000.000đ</label></li>
					</ul>
					<hr>
					<h2>Loại rượu</h2>
					<ul>
						<li><input type="radio" name="abv" value="Vang" id="abv1"><label for="abv1">Rượu Vang</label></li>
						<li><input type="radio" name="abv" value="Whisky" id="abv2"><label for="abv2">Rượu Whiskey - Whisky</label></li>
						<li><input type="radio" name="abv" value="Vodka" id="abv3"><label for="abv3">Rượu Vodka</label></li>
						<li><input type="radio" name="abv" value="Cognac" id="abv4"><label for="abv4">Rượu Brandy - Cognac</label></li>
						<li><input type="radio" name="abv" value="Gin" id="abv5"><label for="abv5">Rượu Gin</label></li>
						<li><input type="radio" name="abv" value="Tequila" id="abv6"><label for="abv6">Rượu Tequila</label></li>
						<li><input type="radio" name="abv" value="Liqueur" id="abv7"><label for="abv7">Rượu Liqueur</label></li>
					</ul>
					<hr>
				</form>
			</aside>
		</section>
		<main id="product-list" class="col-xs-12 col-md-9 col-sm-8">
			<div class="block-title">&nbsp;
				<h1>Tìm Kiếm</h1>
				<div>
					<input id="search-kho" type="text" name="search-kho" placeholder="Tìm kiếm...">
					<select id="sort-search">
						<option value="0">Mặc định</option>
						<option value="asc">Giá từ thấp đến cao</option>
						<option value="desc">Giá từ cao đến thấp</option>
					</select>
				</div>
			</div>
			<span>Tìm thấy {{count($products)}} sản phẩm cho từ khóa {{$s}}</span>
			<div id="add-item-search">
				@foreach($products as $product)
				<div class="product-item-box col-lg-4 col-xs-6">
					<div class="product-item-sale">
						<a title="Johnnie Walker Blue label 1 lit (Thanh lý)" href="getProduct/{{$product->id}}"><img alt="Johnnie Walker Blue label 1 lit (Thanh lý)" class="img-responsive" src="assets/images/products/{{$product->images->first()->image}}">
							<strong>{{$product->name}}</strong>
							<ul>
								<li>{{number_format($product->promotion_price)}}</li>
								<li>{{number_format($product->unit_price)}}</li> 	
							</ul>
						</a>
						<div class="view-now">
							<a href="getProduct/{{$product->id}}">Chi tiết</a>
							<a onclick="AddCart({{$product->id}},1)" href="javascript:">Thêm vào giỏ hàng</a>
						</div>
						<div class="out-of-stock">
							-{{number_format(100-($product->promotion_price/$product->unit_price*100))}}%
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</main>
	</div>
</div>
@endsection
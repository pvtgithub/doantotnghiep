@foreach($products as $product)
<div class="product-item-box col-lg-4 col-xs-6">
	<div class="product-item-sale">
		<a title="Johnnie Walker Blue label 1 lit (Thanh lý)" href="getProduct/{{$product->id}}"><img alt="Johnnie Walker Blue label 1 lit (Thanh lý)" class="img-responsive" src="assets/images/products/{{$product->images->first()->image}}">
			<strong>{{$product->name}} (Thanh lý)</strong>
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
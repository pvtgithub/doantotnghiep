<div>
    <span>Tìm thấy {{count($products)}} sản phẩm trùng khớp</span>
</div>
@foreach($products as $product)
<div class="autocomplete-suggestion" data-index="0">
    <a href="getProduct/{{$product->id}}"><img class="search-image" src="assets/images/products/{{$product->images->first()->image}}"></a>
    <div class="search-name">
        <a href="getProduct/{{$product->id}}"><strong>{{$product->name}}</strong></a>
        
    </div>
    <span class="search-price">
        <span class="amount">{{number_format($product->promotion_price)}}VNĐ</span>
        <span></span>
    </span>
</div>
@endforeach
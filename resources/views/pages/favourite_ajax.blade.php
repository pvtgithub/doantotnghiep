<a href="javascript:void(0)" class="link-to">
    <span class="icon-qty-combine">
        <i class="icon-heart-bold biolife-icon"></i>
        <span class="qty">{{$quantityFavourite}}</span>
    </span>
    <span class="title">Yêu thích</span>
</a>
<div class="cart-content">
    @if($quantityFavourite > 0)
    <div class="cart-inner">
        <div style="margin-right: 30px; height: 40px">
            <span style="color: #b00c45; font-size: 20px; margin-top: 10;"><b>Các sản phẩm mà bạn đã yêu thích</b></span>
        </div>
        <ul class="products">
            @foreach($allFavorite as $favourite)
            <li data-id="{{$favourite->id}}">
                <div class="minicart-item">
                    <div class="thumb">
                        <a href="getProduct/{{$favourite->id_product}}"><img src="assets/images/products/{{$favourite->product->images[0]->image}}" width="90" height="90"></a>
                    </div>
                    <div class="left-info">
                        <div class="product-title"><a href="#" class="product-name">{{$favourite->product->name}}</a></div>
                        <div class="price">
                            <ins><span class="price-amount">{{number_format($favourite->product->promotion_price)}} <span class="currencySymbol">VNĐ</span></span></ins>
                            <del><span class="price-amount">{{number_format($favourite->product->unit_price)}} <span class="currencySymbol">VNĐ</span></span></del>
                        </div>
                        <a onclick="AddCart({{$favourite->id_product}},1)" href="javascript:" class="btn btn-bold">Thêm vào giỏ hàng</a>
                    </div>
                    <div class="action">
                        <a href="javascript:" class="remove-from-favourite"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <div class="cart-inner">
        <h4>Không có sản phẩm yêu thích nào</h4>
    </div>
    @endif
</div>
<script type="text/javascript" src="assets/js/favourite.js"></script>
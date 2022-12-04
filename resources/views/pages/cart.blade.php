<?php
$totalPrice = 0;
foreach ((array) session('cart') as $id => $details){
    $totalPrice += $details['promotion_price'] * $details['quantity'];
}
$totalQuantity = count((array) session('cart'));
?>
<a href="javascript:void(0)" class="link-to">
    <span class="icon-qty-combine">
        <i class="icon-cart-mini biolife-icon"></i>
        <span class="qty">{{$totalQuantity}}</span>
    </span>
    <span class="title">My Cart -</span>
    <span class="sub-total">{{number_format($totalPrice)}}VNĐ</span>
</a>
<div class="cart-content">
    @if(session('cart'))
    <div class="cart-inner">
        <ul class="products">
            @foreach((array) session('cart') as $id => $details)
            <li data-id="{{$id}}">
                <div class="minicart-item">
                    <div class="thumb">
                        <a href="#"><img src="assets/images/products/{{$details['image']}}" width="90" height="90" alt="National Fresh"></a>
                    </div>
                    <div class="left-info">
                        <div class="product-title"><a href="#" class="product-name">{{$details['name']}}</a></div>
                        <div class="price">
                            <ins><span class="price-amount">{{number_format($details['promotion_price'])}} <span class="currencySymbol">VNĐ</span></span></ins>
                            <del><span class="price-amount">{{number_format($details['unit_price'])}} <span class="currencySymbol">VNĐ</span></span></del>
                        </div>
                        <div class="qty">
                            <label for="cart[id123][qty]">Số lượng:</label>
                            <input type="number" min="1" class="input-qty quantity" value="{{$details['quantity']}}" disabled>
                        </div>
                    </div>
                    <div class="action">
                        <a href="javascript:" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="javascript:" class="remove-from-cart"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <p class="btn-control">
            <a href="Checkout" class="btn view-cart">checkout</a>
        </p>
    </div>
    @else
    <div class="cart-inner">
        <h4>Không có sản phẩm nào trong giỏ hàng</h4>
    </div>
    @endif
</div>
<script type="text/javascript" src="assets/js/addcart.js"></script>
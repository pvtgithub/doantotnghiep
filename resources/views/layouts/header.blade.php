<?php
use App\Models\Category;
use App\Models\Favourite;
$totalPrice = 0;
foreach ((array) session('cart') as $id => $details){
    $totalPrice += $details['promotion_price'] * $details['quantity'];
}
$totalQuantity = count((array) session('cart'));
$categories = Category::orderBy('id')->take(7)->get();

if (Auth::check()) {
    $id_user = Auth::user()->id;
    $allFavorite = Favourite::where('id_user',$id_user)->get();
    $quantityFavourite = count($allFavorite);
}
?>
<!-- Preloader -->
<div id="biof-loading">
    <div class="biof-loading-center">
        <div class="biof-loading-center-absolute">
            <div class="dot dot-one"></div>
            <div class="dot dot-two"></div>
            <div class="dot dot-three"></div>
        </div>
    </div>
</div>

<!-- HEADER -->
<header id="header" class="header-area style-01 layout-03">
    <div class="header-top bg-main hidden-xs">
        <div class="container">
            <div class="top-bar left">
                <ul class="horizontal-menu">
                    <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJZZQwMwTfXnTxrwDRxNfpdHpfXvRVRxffJMJBfJdzJdmTDhzZJBlXbfGCzTPFRpbpCKDJV"><i class="fa fa-envelope" aria-hidden="true"></i>ruoudn_43@gmail.com</a></li>
                    <li><a href="#">Chào mừng quí khách đã ghé thăm website của chúng tôi !</a></li>
                </ul>
            </div>
            <div class="top-bar right">
                <ul class="social-list">
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul>
                <ul class="horizontal-menu">
                    @if(Auth::check())
                    <li>
                        <div class="dropdown">
                            <a class="dropbtn" href="admin"><i class="biolife-icon icon-login"></i>Xin chào {{Auth::user()->name}}</a>
                            <div class="dropdown-content">
                                @if(Auth::user()->permission)
                                <a href="admin">Administrator</a>
                                @endif
                                <a href="logout">Đăng xuất</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="orderLookup">Tra cứu đơn hàng</a>
                    </li>
                    @else
                    <li><a href="login" class="login-link"><i class="biolife-icon icon-login"></i>Đăng nhập/Đăng ký</a></li>
                    <li>
                        <a href="orderLookup">Tra cứu đơn hàng</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle biolife-sticky-object ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                    <a href="home" class="biolife-logo"><img src="assets/images/logo.png" alt="biolife logo" width="100" height="10"></a>
                </div>
                <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                    <div class="primary-menu">
                        <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                            <li class="menu-item"><a href="/" style="font-weight: 700;">HOME</a></li>
                            <li class="menu-item"><a href="kho-thanh-ly" style="font-weight: 700;">KHO THANH LÝ</a></li>
                            <li class="menu-item"><a href="hot-deal" style="font-weight: 700;">HOT DEAL</a></li>
                            <li class="menu-item"><a href="getAllBlogs" style="font-weight: 700;">BLOGS</a></li>
                            <li class="menu-item"><a href="contact" style="font-weight: 700;">CONTACT</a></li>
                        </ul>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">

                    <div class="biolife-cart-info">
                        @if(Auth::check())
                        <div class="minicart-block">
                            <div id="change-item-favourite" class="minicart-contain">
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
                            </div>
                        </div>
                        @endif
                        <div class="minicart-block">
                            <div id="change-item-cart" class="minicart-contain">
                                <a href="javascript:void(0)" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="icon-cart-mini biolife-icon"></i>
                                        <span class="qty">{{$totalQuantity}}</span>
                                    </span>
                                    <span class="title">Giỏ hàng -</span>
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
                            </div>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="vertical-menu vertical-category-block">
                        <div class="block-title">
                            <span class="menu-icon">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                            <span class="menu-title">Danh mục</span>
                            <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                        </div>
                        <div class="wrap-menu">
                            @foreach($categories as $category)
                            <ul class="menu clone-main-menu">
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="#" class="menu-name"><img width="50" height="50" src="assets/images/categories/{{$category->images->first()->image}}">{{$category->name}}</a>
                                    <div class="wrap-megamenu lg-width-700 md-width-640">
                                        <div class="mega-content">
                                            <div class="row">
                                                <div class="col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                    <div class="wrap-custom-menu vertical-menu">
                                                        <ul class="menu">                                                                   
                                                            @foreach($category->products as $product)
                                                            <li><a href="getProduct/{{$product->id}}"><img width="30" height="30" src="assets/images/products/{{$product->images->first()->image}}">{{$product->name}}&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <ins><span class="price-amount-ctg">{{number_format($product->promotion_price)}} <span class="currencySymbol">VNĐ</span></span></ins>
                                                                <del><span class="price-amount-ctg">{{number_format($product->unit_price)}} <span class="currencySymbol">VNĐ</span></span></del>
                                                            </a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 padding-top-2px">
                    <div  class="header-search-bar layout-01">
                        <form action="search" class="form-search" name="desktop-seacrh" method="post">
                            @csrf
                            <input type="text" name="s" id="live-search-input" class="input-text" value="" placeholder="Search here...">
                            <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            <div class="live-search-results text-left z-top">
                                <div id="add-item-liveSearch" class="autocomplete-suggestions">

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="live-info">
                        <p class="telephone"><a style="color: black;" href="tel:0348485360"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+84) 34 8485 360</b></a></p>
                        <p class="working-time">Mon-Fri: 8:30am-7:30pm; Sat-Sun: 9:30am-4:30pm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@extends('layouts.master')
@section('main-content')
<?php 
use App\Models\Comment;
?>
<!-- Page Contain -->
<div class="page-contain">

	@if(session('thongbao'))
	<script type="text/javascript">
		alertify.set('notifier','position', 'bottom-left');
		alertify.success('{{session('thongbao')}}');
	</script>
	@endif
	<?php session()->forget('thongbao') ?>
	<!-- Main content -->
	<div id="main-content" class="main-content">

		<!--Block 01: Main slide-->
		<div class="main-slide block-slider">
			<ul class="biolife-carousel nav-none-on-mobile" data-slick='{"autoplay":true,"autoplaySpeed":2000,"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}' >
				@foreach($product_main_slide as $product)
				<li>
					<div class="slide-contain slider-opt03__layout01">
						<div class="media">
							<div class="child-elememt"><a href="#" class="link-to"><img src="assets/images/products/{{$product->images[0]->image}}" width="604" height="580" alt=""></a></div>
						</div>
						<div class="text-content">
							<i class="first-line">{{$product->category->name}}</i>
							<h3 class="second-line">{{$product->name}}</h3>
							<p class="third-line"></p>
							<p class="buttons">
								@if(Auth::check())
								<a href="javascript:" data-id="{{$product->id}}" class="btn wishlist-btn addToFavourite"><i class="fa fa-heart" aria-hidden="true"></i></a>
								@endif
								<a onclick="AddCart({{$product->id}},1)" href="javascript:" class="btn btn-bold">Thêm vào giỏ hàng</a>
								<a href="getProduct/{{$product->id}}" class="btn btn-thin">Xem chi tiết</a>
							</p>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>

		<!--Block 02: Banner-->
		<div class="special-slide">
			<div class="container">
				<ul class="biolife-carousel dots_ring_style" data-slick='{"arrows": false,"autoplay":true,"autoplaySpeed": 2000, "dots": true, "slidesMargin": 30, "slidesToShow": 1, "infinite": true, "speed": 800, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 1}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":20, "dots": false}},{"breakpoint":480, "settings":{ "slidesToShow": 1}}]}' >
					@foreach($product_banner as $product)
					
					<li>
						<div class="slide-contain biolife-banner__special">
							<div class="banner-contain">
								<div class="media">
									<a href="getProduct/{{$product->id}}" class="bn-link">
										<figure><img src="assets/images/products/{{$product->images->first()->image}}" width="616" height="483" alt=""></figure>
									</a>
								</div>
								<div class="text-content">
									<b class="first-line">{{$product->category->name}}</b>
									<span class="second-line">{{$product->name}}</span>
									<span class="third-line">{{$product->description}}</span>
									<div class="product-detail">
										<h4 class="product-name">{{$product->name}}</h4>
										<div class="price price-contain">
											<ins><span class="price-amount">{{number_format($product->promotion_price)}}<span class="currencySymbol">VNĐ</span></span></ins>
											<del><span class="price-amount">{{number_format($product->unit_price)}}<span class="currencySymbol">VNĐ</span></span></del>
										</div>
										<div class="buttons">
											@if(Auth::check())
											<a href="javascript:" data-id="{{$product->id}}" class="btn wishlist-btn addToFavourite"><i class="fa fa-heart" aria-hidden="true"></i></a>
											@endif
											<a onclick="AddCart({{$product->id}},1)" href="javascript:" class="btn add-to-cart-btn">Thêm vào giỏ hàng</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
				<div class="biolife-service type01 biolife-service__type01 sm-margin-top-0 xs-margin-top-45px">
					<b class="txt-show-01">Đà Nẵng</b>
					<i class="txt-show-02">SIÊU THỊ RƯỢU NGOẠI</i>
					<ul class="services-list">
						<li>
							<div class="service-inner">
								<span class="number">1</span>
								<span class="biolife-icon icon-beer"></span>
								<a class="srv-name" href="#">SẢN PHẨM CÓ TEM ĐẦY ĐỦ</a>
							</div>
						</li>
						<li>
							<div class="service-inner">
								<span class="number">2</span>
								<span class="biolife-icon icon-schedule"></span>
								<a class="srv-name" href="#">ĐẶT VÀ GIAO HÀNG ĐÚNG HẸN</a>
							</div>
						</li>
						<li>
							<div class="service-inner">
								<span class="number">3</span>
								<span class="biolife-icon icon-car"></span>
								<a class="srv-name" href="#">MIỄN PHÍ VẬN CHUYỂN NỘI THÀNH</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!--Block 03: Product Tab-->
		<div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
			<div class="container">
				<div class="biolife-title-box">
					<span class="subtitle">Tất cả các mặt hàng tốt nhất cho bạn</span>
					<h3 class="main-title">Sản phẩm liên quan</h3>
				</div>
				<div class="biolife-tab biolife-tab-contain sm-margin-top-34px">
					<div class="tab-head tab-head__icon-top-layout icon-top-layout">
						<ul class="tabs md-margin-bottom-35-im xs-margin-bottom-40-im">
							<li class="tab-element active">
								<a href="#tab01_1st" class="tab-link"><img height="35" width="35" src="assets/images/categories/categoryHennessy.png">Rượu Vang</a>
							</li>
							<li class="tab-element" >
								<a href="#tab01_2nd" class="tab-link"><img height="35" width="35" src="assets/images/categories/categoryCamus.png">Rượu Whiskey - Whisky</a>
							</li>
							<li class="tab-element" >
								<a href="#tab01_3rd" class="tab-link"><img height="35" width="35" src="assets/images/categories/categoryREMYMARTIN.png">Rượu Vodka</a>
							</li>
							<li class="tab-element" >
								<a href="#tab01_4th" class="tab-link"><img height="35" width="35" src="assets/images/categories/categoryCHABOTARMAGNAC.png">Rượu Brandy - Cognac</a>
							</li>
							<li class="tab-element" >
								<a href="#tab01_5th" class="tab-link"><img height="35" width="35" src="assets/images/categories/categoryMARTELL.png">Rượu Gin</a>
							</li>
							<li class="tab-element" >
								<a href="#tab01_6th" class="tab-link"><img height="35" width="35" src="assets/images/categories/categoryBISQUIT.png">Rượu Tequila</a>
							</li>
							<li class="tab-element" >
								<a href="#tab01_7th" class="tab-link"><img height="35" width="35" src="assets/images/categories/categoryCOURVOISIER.png">Rượu Liqueur</a>
							</li>
						</ul>
					</div>
					<div class="tab-content">
						@foreach($categories as $category)
						<div id="{{$category->tab}}" class="tab-contain">
							<ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
								@foreach($category->products as $product)
								<li class="product-item">
									<div class="contain-product layout-default">
										<div class="product-thumb">
											<a href="getProduct/{{$product->id}}" class="link-to-product">
												<img src="assets/images/products/{{$product->images[0]->image}}" alt="Vegetables" width="270" height="270" class="product-thumnail">
											</a>
											<a class="lookup btn_call_quickview" href="getProduct/{{$product->id}}"><i class="biolife-icon icon-search"></i></a>
										</div>
										<div class="info">
											<b class="categories">{{$product->category->name}}</b>
											<h4 class="product-title"><a href="getProduct/{{$product->id}}" class="pr-name">{{$product->name}}</a></h4>
											<div class="price ">
												<ins><span class="price-amount">{{number_format($product->promotion_price)}}<span class="currencySymbol">VNĐ</span></span></ins>
												<del><span class="price-amount">{{number_format($product->unit_price)}}<span class="currencySymbol">VNĐ</span></span></del>
											</div>
											<div class="slide-down-box">
												<p class="message">{{$product->description}}</p>
												<div class="buttons">
													@if(Auth::check())
													<a href="javascript:" data-id="{{$product->id}}" class="btn wishlist-btn addToFavourite"><i class="fa fa-heart" aria-hidden="true"></i></a>
													@endif
													<a onclick="AddCart({{$product->id}},1)" href="javascript:" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Thêm vào giỏ hàng</a>
													<a href="getProduct/{{$product->id}}" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<!--Block 06: Products-->
		<div class="Product-box sm-margin-top-96px xs-margin-top-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-5 col-sm-6">
						<div class="advance-product-box">
							<div class="biolife-title-box bold-style biolife-title-box__bold-style">
								<h3 class="title">HOT DEAL</h3>
							</div>
							<ul class="products biolife-carousel nav-top-right nav-none-on-mobile" data-slick='{"arrows":true,"autoplay":true,"autoplaySpeed":2000, "dots":false, "infinite":false, "speed":400, "slidesMargin":30, "slidesToShow":1}'>
								
								@if($product_deal != null)
								@foreach($product_deal as $product)
								<li class="product-item">
									<div class="contain-product deal-layout contain-product__deal-layout">
										<div class="product-thumb">
											<a href="getProduct/{{$product->id}}" class="link-to-product">
												<img src="assets/images/products/{{$product->images->first()->image}}" alt="dd" width="330" height="330" class="product-thumnail">
											</a>
											<div class="labels">
												<?php $percent = (int) (100-(($product->promotion_price/$product->unit_price)*100)) //tính %?>
												<span class="sale-label">-{{$percent}}%</span>
											</div>
										</div>
										<div class="info">
											<b class="categories">{{$product->category->name}}</b>
											<h4 class="product-title"><a href="getProduct/{{$product->id}}" class="pr-name">{{$product->name}}</a></h4>
											<div class="price ">
												<ins><span class="price-amount">{{number_format($product->promotion_price)}}<span class="currencySymbol">VNĐ</span></span></ins>
												<del><span class="price-amount">{{number_format($product->unit_price)}}<span class="currencySymbol">VNĐ</span></span></del>
											</div>
											<div class="slide-down-box">
												<p class="message">{{$product->description}}</p>
												<div class="buttons">
													@if(Auth::check())
													<a href="javascript:" data-id="{{$product->id}}" class="btn wishlist-btn addToFavourite"><i class="fa fa-heart" aria-hidden="true"></i></a>
													@endif
													<a onclick="AddCart({{$product->id}},1)" href="javascript:" class="btn add-to-cart-btn">Thêm vào giỏ hàng</a>
													<a href="getProduct/{{$product->id}}" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</div>
								</li>
								@endforeach
								@endif
							</ul>
						</div>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-6">
						<div class="advance-product-box">
							<div class="biolife-title-box bold-style biolife-title-box__bold-style">
								<h3 class="title">Top sản phẩm được đánh giá cao</h3>
							</div>
							<ul class="products biolife-carousel eq-height-contain nav-center-03 nav-none-on-mobile row-space-29px" data-slick='{"rows":3,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":2,"responsive":[{"breakpoint":1200,"settings":{ "rows":3, "slidesToShow": 2}},{"breakpoint":992, "settings":{ "rows":3, "slidesToShow": 1}},{"breakpoint":768, "settings":{ "rows":3, "slidesToShow": 2}},{"breakpoint":500, "settings":{ "rows":3, "slidesToShow": 1}}]}'>
								@foreach($product_rate as $product)
								<?php $comments = Comment::where('id_product',$product->id)->get();
								$rv = count($comments);  
								?>
								<li class="product-item">
									<div class="contain-product right-info-layout contain-product__right-info-layout">
										<div class="product-thumb">
											<a href="getProduct/{{$product->id}}" class="link-to-product">
												<img src="assets/images/products/{{$product->images->first()->image}}" alt="dd" width="270" height="270" class="product-thumnail">
											</a>
										</div>
										<div class="info">
											<b class="categories">{{$product->category->name}}</b>
											<h4 class="product-title"><a href="getProduct/{{$product->id}}" class="pr-name">{{$product->name}}</a></h4>
											<div class="price ">
												<ins><span class="price-amount">{{number_format($product->promotion_price)}}<span class="currencySymbol">VNĐ</span></span></ins>
												<del><span class="price-amount">{{number_format($product->unit_price)}}<span class="currencySymbol">VNĐ</span></span></del>
											</div>
											<div class="rating">
												<p class="star-rating"><span class="width-{{round($product->rate * 20,-1)}}percent"></span></p>
												<span class="review-count">{{$rv}} Review</span>
											</div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<!--Block 08: Blog Posts-->
		<div class="blog-posts sm-margin-top-93px sm-padding-top-72px xs-padding-bottom-50px">
			<div class="container">
				<div class="biolife-title-box">
					<span class="subtitle">Tin tức mới nhất và thú vị nhất</span>
					<h3 class="main-title">Blogs News</h3>
				</div>
				<ul class="biolife-carousel nav-center nav-none-on-mobile xs-margin-top-36px" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":600, "settings":{ "slidesToShow": 1}}]}'>
					@if(isset($blogs))
					@foreach($blogs as $blog)
					<li>
						<div class="post-item effect-01 style-bottom-info layout-02" >
							<div class="thumbnail">
								<a href="getBlog/{{$blog->id}}" class="link-to-post"><img src="assets/images/blogpost/{{$blog->images->first()->image}}" width="370" height="270" alt=""></a>
								<div class="post-date">
									<span class="date">{{$blog->datepost}}</span>
								</div>
							</div>
							<div class="post-content">
								<h4 class="post-name"><a href="getBlog/{{$blog->id}}" class="linktopost">{{$blog->title}}</a></h4>
								<div class="post-meta">
									<a href="#" class="post-meta__item author"><i class="fa fa-user"></i><span>Admin</span></a>
									<a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
									<a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
									<div class="post-meta__item post-meta__item-social-box">
										<span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
										<div class="inner-content">
											<ul class="socials">
												<li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
												<li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
												<li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
								<p class="excerpt">{{$blog->description}}</p>
								<div class="group-buttons">
									<a href="getBlog/{{$blog->id}}" class="btn readmore">Đọc tiếp...</a>
								</div>
							</div>
						</div>
					</li>
					@endforeach
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
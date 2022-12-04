@extends('layouts.master')
@section('main-content')

<div class="container">
	<nav class="biolife-nav">
		<ul>
			<li class="nav-item"><a href="/" class="permal-link">Home</a></li>
			<li class="nav-item"><a href="#" class="permal-link">{{$product->category->name}}</a></li>
			<li class="nav-item"><span class="current-page">{{$product->name}}</span></li>
		</ul>
	</nav>
</div>

<div class="page-contain single-product">
	<div class="container">

		<!-- Main content -->
		<div id="main-content" class="main-content">

			<!-- summary info -->
			<div class="sumary-product single-layout">
				<div class="media">
					<ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
						@foreach($images as $image)
						<li><img src="assets/images/products/{{$image->image}}" alt="" width="500" height="500"></li>
						@endforeach
					</ul>
					<ul class="biolife-carousel slider-nav" data-slick='{"arrows":false,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":4,"slidesToScroll":1,"asNavFor":".slider-for"}'>
						@foreach($images as $image)
						<li><img src="assets/images/products/{{$image->image}}" alt="" width="88" height="88"></li>
						@endforeach
					</ul>
				</div>
				<div class="product-attribute">
					<h3 class="title">{{$product->name}}</h3>
					<div class="rating">
						@if(count($comments)!=0)
						<p class="star-rating"><span class="width-{{$percent_star}}percent"></span></p>
						<span class="review-count">({{count($comments)}} Reviews)</span>
						@else
						<span class="review-count">(0 Reviews)</span>
						@endif
						<b class="category">Loại rượu: {{$product->category->name}}</b>
					</div>
					<p class="excerpt">{{$product->description}}</p>
					<div class="price">
						<ins><span class="price-amount">{{number_format($product->promotion_price)}}</span><span class="currencySymbol">VNĐ</span></ins>
						<del><span class="price-amount">{{number_format($product->unit_price)}}<span class="currencySymbol">VNĐ</span></span></del>
					</div>
					<div class="shipping-info">
						<p class="shipping-day">3-Day Shipping</p>
						<p class="for-today">Pree Pickup Today</p>
					</div>
				</div>
				<div class="action-form">
					<div class="quantity-box">
						<span class="title">Quantity:</span>
						<div class="qty-input">
							<input data-id="{{$product->promotion_price}}" type="number" id="qty-change" class="qty-change" value="1" min="1" max="20">
						</div>
					</div>
					<div class="total-price-contain">
						<span class="title">Total Price:</span>
						<p id="price-total" class="price">{{number_format($product->promotion_price)}}VNĐ</p>
					</div>
					<div class="buttons">
						<a onclick="AddCart({{$product->id}},parseInt(document.getElementById('qty-change').value))" href="javascript:" class="btn add-to-cart-btn">Thêm vào giỏ hàng</a>
						<p class="pull-row">
							<a href="#" class="btn wishlist-btn">wishlist</a>
							<a href="#" class="btn compare-btn">compare</a>
						</p>
					</div>
					<div class="location-shipping-to">
						<span class="title">Ship to:</span>
						<select name="shipping_to" class="country">
							<option value="-1">Select Country</option>
							<option value="america">America</option>
							<option value="france">France</option>
							<option value="germany">Germany</option>
							<option value="japan">Japan</option>
						</select>
					</div>
					<div class="social-media">
						<ul class="social-list">
							<li><a href="#" class="social-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" class="social-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" class="social-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							<li><a href="#" class="social-link"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
							<li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="acepted-payment-methods">
						<ul class="payment-methods">
							<li><img src="assets/images/card1.jpg" alt="" width="51" height="36"></li>
							<li><img src="assets/images/card2.jpg" alt="" width="51" height="36"></li>
							<li><img src="assets/images/card3.jpg" alt="" width="51" height="36"></li>
							<li><img src="assets/images/card4.jpg" alt="" width="51" height="36"></li>
						</ul>
					</div>
				</div>
			</div>

			<!-- Tab info -->
			<div class="product-tabs single-layout biolife-tab-contain">
				<div class="tab-head">
					<ul class="tabs">
						<li class="tab-element active"><a href="#tab_1st" class="tab-link">MÔ TẢ SẢN PHẨM</a></li>
						<li class="tab-element" ><a href="#tab_2rd" class="tab-link"> VẬN CHUYỂN & GIAO HÀNG</a></li>
						<li class="tab-element" ><a href="#tab_3th" class="tab-link">NHẬN XÉT CỦA KHÁCH HÀNG<sup>{{count($comments)}}</sup></a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div id="tab_1st" class="tab-contain desc-tab active">
						<p>{{$product->content}}</p>
					</div>
					<div id="tab_2rd" class="tab-contain shipping-delivery-tab">
						<div class="accodition-tab biolife-accodition">
							<ul class="tabs">
								<li class="tab-item">
									<span class="title btn-expand">Mất bao lâu để nhận được đơn đặt hàng của tôi?</span>
									<div class="content">
										<p>Giao hàng toàn quốc. Miễn phí vận chuyển nội thành TP.HCM, Hà Nội, Đà Nẵng đơn hàng từ 1 triệu.</p>
										<div class="desc-expand">
											<span class="title">Chế độ vận chuyển</span>
											<ul class="list">
												<li>Tiêu chuẩn (vận chuyển 3-5 ngày làm việc)</li>
												<li>Ưu tiên (vận chuyển 2-3 ngày làm việc)</li>
												<li>Chuyển phát nhanh (vận chuyển 1-2 ngày làm việc)</li>
												<li>Đơn đặt hàng Thẻ quà tặng được gửi qua USPS First Class Mail. Thư Hạng Nhất sẽ được gửi trong vòng 8 ngày làm việc</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="tab-item">
									<span class="title btn-expand">Chi phí vận chuyển được tính như thế nào?</span>
									<div class="content">
										<p>Bạn sẽ trả phí vận chuyển dựa trên trọng lượng và kích thước của đơn hàng. Các mặt hàng lớn hoặc nặng có thể bao gồm phí xử lý quá khổ. Tổng phí vận chuyển được hiển thị trong giỏ hàng của bạn. Vui lòng tham khảo bảng vận chuyển sau:</p>
										<p>Lưu ý: Trọng lượng vận chuyển được tính trong giỏ hàng có thể khác với trọng lượng được liệt kê trên các trang sản phẩm do kích thước và trọng lượng thực tế của mặt hàng.</p>
									</div>
								</li>
								<li class="tab-item">
									<span class="title btn-expand">Tại sao đơn hàng của tôi không đủ điều kiện để được giao hàng MIỄN PHÍ?</span>
									<div class="content">
										<p>Chúng tôi không giao hàng đến hộp PO hoặc hộp quân sự (APO, FPO, PSC). Chúng tôi giao hàng đến tất cả 50 tiểu bang cộng với Puerto Rico. Một số mặt hàng có thể bị loại trừ để giao đến Puerto Rico. Điều này sẽ được chỉ ra trên trang sản phẩm.</p>
									</div>
								</li>
								<li class="tab-item">
									<span class="title btn-expand">Hạn chế vận chuyển?</span>
									<div class="content">
										<p>Chúng tôi không giao hàng đến hộp PO hoặc hộp quân sự (APO, FPO, PSC). Chúng tôi giao hàng đến tất cả 50 tiểu bang cộng với Puerto Rico. Một số mặt hàng có thể bị loại trừ để giao đến Puerto Rico. Điều này sẽ được chỉ ra trên trang sản phẩm.</p>
									</div>
								</li>
								<li class="tab-item">
									<span class="title btn-expand">Các gói không gửi được?</span>
									<div class="content">
										<p>Đôi khi, các gói hàng được trả lại cho chúng tôi dưới dạng nhà cung cấp dịch vụ không thể gửi được. Khi người vận chuyển trả lại một gói hàng không gửi được cho chúng tôi, chúng tôi sẽ hủy đơn hàng và hoàn lại giá mua trừ đi phí vận chuyển. Dưới đây là một số lý do khiến các gói hàng có thể được trả lại cho chúng tôi dưới dạng không thể gửi được:</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div id="tab_3th" class="tab-contain review-tab">
						<div class="container">
							<div class="row">
								<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
									@if(count($comments) != 0)

									<div class="rating-info">
										<p class="index"><strong class="rating">{{round($rate_product,2)}}</strong></p>
										<div class="rating"><p class="star-rating"><span class="width-{{$percent_star}}percent"></span></p></div>
										<p class="see-all">See all {{count($comments)}} reviews</p>
										<ul class="options">
											<li>
												<div class="detail-for">
													<span class="option-name">5stars</span>
													<span class="progres">
														<span class="line-100percent"><span class="percent width-{{round(count($cm5stars)/count($comments)*100,-1)}}percent"></span></span>
													</span>
													<span class="number">{{count($cm5stars)}}</span>
												</div>
											</li>
											<li>
												<div class="detail-for">
													<span class="option-name">4stars</span>
													<span class="progres">
														<span class="line-100percent"><span class="percent width-{{round(count($cm4stars)/count($comments)*100,-1)}}percent"></span></span>
													</span>
													<span class="number">{{count($cm4stars)}}</span>
												</div>
											</li>
											<li>
												<div class="detail-for">
													<span class="option-name">3stars</span>
													<span class="progres">
														<span class="line-100percent"><span class="percent width-{{round(count($cm3stars)/count($comments)*100,-1)}}percent"></span></span>
													</span>
													<span class="number">{{count($cm3stars)}}</span>
												</div>
											</li>
											<li>
												<div class="detail-for">
													<span class="option-name">2stars</span>
													<span class="progres">
														<span class="line-100percent"><span class="percent width-{{round(count($cm2stars)/count($comments)*100,-1)}}percent"></span></span>
													</span>
													<span class="number">{{count($cm2stars)}}</span>
												</div>
											</li>
											<li>
												<div class="detail-for">
													<span class="option-name">1star</span>
													<span class="progres">
														<span class="line-100percent"><span class="percent width-{{round(count($cm1stars)/count($comments)*100,-1)}}percent"></span></span>
													</span>
													<span class="number">{{count($cm1stars)}}</span>
												</div>
											</li>
										</ul>
									</div>
									@endif

								</div>
								<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
									@if(Auth::check())
									<div class="review-form-wrapper">
										<span class="title">Submit your review</span>
										<form data-id="{{$product->id}}" id="submit-form-cmt-product" action="postCommentProduct" name="frm-review" method="post">
											@csrf
											<div class="comment-form-rating">
												<label>1. Đánh giá của bạn về sản phẩm này:</label>
												<p class="stars">
													<span>
														<a class="btn-rating" data-value="1" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
														<a class="btn-rating" data-value="2" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
														<a class="btn-rating" data-value="3" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
														<a class="btn-rating" data-value="4" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
														<a class="btn-rating" data-value="5" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
													</span>
												</p>
											</div>
											<p class="form-row wide-half">
												<input type="text" name="name" value="{{Auth::user()->name}}" placeholder="Your name">
											</p>
											<p class="form-row wide-half">
												<input type="email" name="email" value="{{Auth::user()->email}}" placeholder="Email address">
											</p>
											<p class="form-row">
												<textarea name="comment" id="txt-comment" cols="30" rows="10" placeholder="Write your review here..."></textarea>
											</p>
											<p class="form-row">
												<button type="submit" name="submit">Phản hồi</button>
											</p>
										</form>
									</div>
									@endif
								</div>
							</div>
							<div id="comments">
								@if(count($comments) != 0)
								<ol class="commentlist">
									@foreach($comments as $comment)
									<li class="review">
										<div class="comment-container">
											<div class="row">
												<div class="comment-content col-lg-8 col-md-8 col-sm-8 col-xs-12">
													<p class="comment-in"><span class="post-name">{{$comment->user->name}}</span><span class="post-date">{{$comment->time_comment}}</span></p>
													<div class="rating"><p class="star-rating"><span class="width-{{$comment->rate*20}}percent"></span></p></div>
													<p class="comment-text">{{$comment->content}}</p>
												</div>
											</div>
										</div>
									</li>
									@endforeach
								</ol>
								<div class="biolife-panigations-block version-2">
									<ul class="panigation-contain">
										<li><span class="current-page">1</span></li>
										<li><a href="#" class="link-page">2</a></li>
										<li><a href="#" class="link-page">3</a></li>
										<li><span class="sep">....</span></li>
										<li><a href="#" class="link-page">20</a></li>
										<li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
									</ul>
									<div class="result-count">
										<p class="txt-count"><b>1-5</b> of <b>126</b> reviews</p>
										<a href="#" class="link-to">See all<i class="fa fa-caret-right" aria-hidden="true"></i></a>
									</div>
								</div>
								@else
								<div>
									<span>Không có nhận xét nào</span>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- related products -->
			<div class="product-related-box single-layout">
				<div class="biolife-title-box lg-margin-bottom-26px-im">
					<span class="biolife-icon icon-organic"></span>
					<span class="subtitle">All the best item for You</span>
					<h3 class="main-title">Sản Phẩm Liên Quan</h3>
				</div>
				<ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>

					@foreach($products_related as $product)
					<li class="product-item">
						<div class="contain-product layout-default">
							<div class="product-thumb">
								<a href="getProduct/{{$product->id}}" class="link-to-product">
									<img src="assets/images/products/{{$product->images->first()->image}}" alt="dd" width="270" height="270" class="product-thumnail">
								</a>
							</div>
							<div class="info">
								<b class="categories">{{$product->category->name}}</b>
								<h4 class="product-title"><a href="getProduct/{{$product->id}}" class="pr-name">{{$product->name}}</a></h4>
								<div class="price">
									<ins><span class="price-amount">{{number_format($product->promotion_price)}}</span><span class="currencySymbol">VNĐ</span></ins>
									<del><span class="price-amount">{{number_format($product->unit_price)}}<span class="currencySymbol">VNĐ</span></span></del>
								</div>
								<div class="slide-down-box">
									<p class="message">SẢN PHẨM CÓ TEM ĐẦY ĐỦ</p>
									<div class="buttons">
										<a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
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
		</div>
	</div>
</div>
@endsection
@extends('layouts.master')
@section('main-content')
<div class="page-contain blog-page">
	<div class="container">
		<!-- Main content -->
		<div id="main-content" class="main-content">
			<div class="row">
				<aside id="sidebar" class="sidebar blog-sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">

					<div class="biolife-mobile-panels">
						<span class="biolife-current-panel-title">Sidebar</span>
						<a class="biolife-close-btn" href="#" data-object="open-mobile-filter">&times;</a>
					</div>

					<div class="sidebar-contain">

						<!--Search Widget-->
						<div class="widget search-widget">
							<div class="wgt-content">
								<form action="#" name="frm-search" method="get" class="frm-search">
									<input type="text" name="s" value="" placeholder="SEACH..." class="input-text">
									<button type="submit" name="ok"><i class="biolife-icon icon-search"></i></button>
								</form>
							</div>
						</div>

						<!--Categories Widget-->
						<div class="widget biolife-filter">
							<h4 class="wgt-title">Thể Loại</h4>
							<div class="wgt-content">
								<ul class="cat-list">
									<li class="cat-list-item"><a href="#" class="cat-link">Khuyến mãi</a></li>
									<li class="cat-list-item"><a href="#" class="cat-link">Tin tức</a></li>
									<li class="cat-list-item"><a href="#" class="cat-link">Food</a></li>
									<li class="cat-list-item"><a href="#" class="cat-link">Life Style</a></li>
									<li class="cat-list-item"><a href="#" class="cat-link">Travel</a></li>
								</ul>
							</div>
						</div>

						<!--Posts Widget-->
						<div class="widget posts-widget">
							<h4 class="wgt-title">Bài Viết Liên Quan</h4>
							<div class="wgt-content">
								<ul class="posts">
									@foreach($new_blogs as $blog)
									<li>
										<div class="wgt-post-item">
											<div class="thumb">
												@if(count($blog->images) != 0)
												<a href="getBlog/{{$blog->id}}"><img src="assets/images/blogpost/{{$blog->images->first()->image}}" width="80" height="58" alt=""></a>
												@endif
											</div>
											<div class="detail">
												<h4 class="post-name"><a href="getBlog/{{$blog->id}}">{{$blog->title}}</a></h4>
												<p class="post-archive">{{$blog->datepost}}<span class="comment">15 Comments</span></p>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>

						<!--Comments Widget-->
						<div class="widget comment-widget">
							<h4 class="wgt-title">Recent Comments</h4>
							<div class="wgt-content">
								<ul class="comment-list">
									<li>
										<p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Healthy Organics</a></p>
									</li>
									<li>
										<p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Best Organics</a></p>
									</li>
									<li>
										<p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Healthy Organics</a></p>
									</li>
									<li>
										<p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Healthy Organics</a></p>
									</li>
								</ul>
							</div>
						</div>

					</div>
				</aside>
				<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
					<!--articles block-->
					<ul class="posts-list main-post-list">
						@foreach($blogs as $blog)
						<li class="post-elem col-lg-4 col-md-4 col-sm-6 col-xs-12" style="max-height: 500px; overflow: auto;">
							<div class="post-item effect-04 style-bottom-info">
								<div class="thumbnail">
									@if(count($blog->images) != 0)
									<a href="getBlog/{{$blog->id}}" class="link-to-post"><img src="assets/images/blogpost/{{$blog->images->first()->image}}" width="370" height="270" alt=""></a>
									@endif
								</div>
								<div class="post-content">
									<h4 class="post-name"><a href="getBlog/{{$blog->id}}" class="linktopost">{{$blog->title}}</a></h4>
									<p class="post-archive"><b class="post-cat">{{$blog->category_news}} </b><span class="post-date">{{$blog->datepost}}</span><span class="author">Admin</span></p>
									<p class="excerpt">{{$blog->description}}</p>
									<div class="group-buttons">
										<a href="#" class="btn readmore">read more</a>
										<a href="#" class="btn count-number commented"><i class="biolife-icon icon-conversation"></i><span class="number">06</span></a>
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
					<!--Panigation Block-->
					<div class="biolife-panigations-block ">
						<ul class="panigation-contain">
							<li><span class="current-page">1</span></li>
							<li><a href="#" class="link-page">2</a></li>
							<li><a href="#" class="link-page">3</a></li>
							<li><span class="sep">....</span></li>
							<li><a href="#" class="link-page">20</a></li>
							<li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
						</ul>
					</div>

				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection
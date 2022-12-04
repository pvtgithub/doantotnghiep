@extends('layouts.master')
@section('main-content')
<div class="page-contain blog-page left-sidebar">
	<div class="container">
		<div class="row">

			<!-- Main content -->
			<div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">

				<!--Single Post Contain-->
				<div class="single-post-contain">

					<div class="post-head">
						<div class="thumbnail">
							@if(count($blog->images) != 0)
							<figure><img src="assets/images/blogpost/{{$blog->images[0]->image}}" width="870" height="635" alt=""></figure>
							@endif
						</div>
						<h2 class="post-name">{{$blog->title}}</h2>
						<p class="post-archive"><b class="post-cat">{{$blog->category_news}} </b><span class="post-date">Ngày đăng: {{$blog->datepost}}</span><span class="author">Posted By: Admin</span></p>
					</div>

					<div class="post-content">
						@if(count($blog->images) > 2)
						<p>{{$blog->content1}}</p>
						<img src="assets/images/blogpost/{{$blog->images[1]->image}}" width="750" height="500" alt="">
						<p>{{$blog->content2}}}</p>
						<img src="assets/images/blogpost/{{$blog->images[2]->image}}" width="750" height="500" alt="">
						<p>{{$blog->content3}}</p>
						@elseif(count($blog->images) > 1)
						<p>{{$blog->content1}}</p>
						<img src="assets/images/blogpost/{{$blog->images[1]->image}}" width="750" height="500" alt="">
						<p>{{$blog->content2}}</p>
						<p>{{$blog->content3}}</p>
						@else
						<p>{{$blog->content1}}</p>
						<p>{{$blog->content2}}</p>
						<p>{{$blog->content3}}</p>
						@endif

					</div>

					<div class="post-foot">

						<div class="post-tags">
							<span class="tag-title">Tags:</span>
							<ul class="tags">
								<li><a href="#" class="tag-link">Juice Drink</a></li>
								<li><a href="#" class="tag-link">Fast Food</a></li>
								<li><a href="#" class="tag-link">Fresh Food</a></li>
								<li><a href="#" class="tag-link">Hot</a></li>
								<li><a href="#" class="tag-link">Backpack</a></li>
								<li><a href="#" class="tag-link">Grooming</a></li>
							</ul>
						</div>

						<div class="auth-info">
							@if(Auth::check())
							<div class="ath">
								<a href="#" class="avata"><img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" width="29" height="28" alt="Christian Doe">{{Auth::user()->name}}</a>
							</div>
							@endif
							<div class="socials-connection">
								<span class="title">Share:</span>
								<ul class="social-list">
									<li><a href="#" class="socail-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#" class="socail-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#" class="socail-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#" class="socail-link"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
									<li><a href="#" class="socail-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>

					</div>

				</div>

				<!--Comment Block-->
				<div class="post-comments">
					<h3 class="cmt-title">Comments @if(count($comments) != 0) <sup>{{count($comments)}}</sup> @else <sup>(0)</sup> @endif</h3>

					@if(Auth::check())
					<div class="comment-form">
						<form data-id="{{$blog->id}}" id="submit-form-cmt-blog" action="postCommentBlog" method="post" name="frm-post-comment">
							<p class="form-row">
								<textarea name="txt-comment" id="txt-comment-blog" cols="30" rows="10" placeholder="Write your comment"></textarea>
								<a href="#" class="current-author"><img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" width="41" height="41" alt=""></a>
							</p>
							<p class="form-row last-btns">
								<button type="submit" class="btn btn-sumit">post a comment</button>
								<a href="#" class="btn btn-fn-1"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
								<a href="#" class="btn btn-fn-1"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
								<a href="#" class="btn btn-fn-1"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
							</p>
						</form>
					</div>
					@endif

					<div id="comments_blog" class="comment-list">
						@if(count($comments) != 0)
						<ol class="post-comments lever-0">
							@foreach($comments as $comment)
							<li class="comment-elem">
								<div class="wrap-post-comment">
									<div class="cmt-inner">
										<div class="auth-info">
											<a href="#" class="author-contact"><img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="" width="29" height="28">{{$comment->user->name}}</a>
											<span class="cmt-time">{{$comment->time_comment}}</span>
										</div>
										<div class="cmt-content">
											<p>{{$comment->content}}</p>
										</div>
									</div>
								</div>
							</li>
							@endforeach
						</ol>

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
						@else
						<div>
							<span>Không có nhận xét nào</span>
						</div>
						@endif
					</div>

				</div>

			</div>

			<!-- Sidebar -->
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
								@foreach($resent_blogs as $rs_blog)
								<li>
									<div class="wgt-post-item">
										<div class="thumb">
											<a href="getBlog/{{$rs_blog->id}}"><img src="assets/images/blogpost/{{$rs_blog->images->first()->image}}" width="80" height="58" alt=""></a>
										</div>
										<div class="detail">
											<h4 class="post-name"><a href="getBlog/{{$rs_blog->id}}">{{$rs_blog->title}}</a></h4>
											<p class="post-archive">{{$rs_blog->datepost}}<span class="comment">15 Comments</span></p>
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
		</div>
	</div>
</div>
@endsection
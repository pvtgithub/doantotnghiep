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
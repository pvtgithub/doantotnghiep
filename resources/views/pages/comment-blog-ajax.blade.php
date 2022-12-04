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
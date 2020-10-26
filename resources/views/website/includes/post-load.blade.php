@foreach($posts as $key => $post)
	<article class="entry">

		<div class="entry-img">
			@if(!empty($post->image))
				<img src="{{ asset('storage/'.$post->image) }}" alt="Image" class="img-fluid">
			@endif
		</div>

		<h2 class="entry-title">
			<a href="{{ url('blog/post/'.$post->slug) }}">{{ str_replace('-',' ',$post->title) }}</a>
		</h2>

		<div class="entry-meta">
			<ul>
				<li class="d-flex align-items-center"><i class="icofont-user"></i> <a>{{ $post->user->name }}</a></li>
				<li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a><time>{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</time></a></li>
			</ul>
		</div>

		<div class="entry-content">

			@if(strpos($post->description,'<pre>') >= 120)
				{!! str_limit($post->description, 130, '...') !!}
				<div class="read-more">
					<a href="{{ url('blog/post/'.$post->slug) }}">Read More</a>
				</div>
			@elseif(strlen(strpos($post->description,'<pre>')) == 0)

				@if(strlen($post->description) < 100)
					{!! str_limit($post->description) !!}
				@else
					{!! str_limit($post->description) !!}
					<div class="read-more">
						<a href="{{ url('blog/post/'.$post->slug) }}">Read More</a>
					</div>
				@endif
			@else
				{!! str_limit($post->description, strpos($post->description,'<pre>'), '<span style="display:inline-block;">&#x2800;...</span>') !!}
				<div class="read-more">
					<a href="{{ url('blog/post/'.$post->slug) }}">Read More</a>
				</div>
			@endif

		</div>

	</article><!-- End blog entry -->
@endforeach

{{ $posts->links() }}
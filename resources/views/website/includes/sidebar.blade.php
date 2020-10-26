<div class="sidebar">

    <h3 class="sidebar-title">Search</h3>
    <div class="sidebar-item search-form">
        <form action="{{ url('/blog/search') }}" method="GET" role="search">
            @csrf
            <input type="text" class="form-control" placeholder="Search for..." name="query">
            <button type="submit"><i class="icofont-search"></i></button>
        </form>
    </div>

    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-item categories">
        <ul>
            @foreach($categories as $key => $category)
                <li><a href="{{ url('blog/category/'.str_slug($category->slug)) }}">{{ $category->name }} <span>({{ count($category->posts) }})</span></a></li>
            @endforeach
        </ul>

    </div><!-- End sidebar categories-->

    <h3 class="sidebar-title">Recent Posts</h3>
    <div class="sidebar-item recent-posts">

        @foreach($recentPosts as $key => $post)
            <div class="post-item clearfix">
                @if(!empty($post->image))
                    <img src="{{ asset('storage/'.$post->image) }}" alt="Image" class="img-fluid">
                @endif
                <h4><a href="{{ url('blog/post/'.$post->slug) }}">{{ str_replace('-',' ',$post->title) }}</a></h4>
                <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</time>
            </div>
        @endforeach
    </div><!-- End sidebar recent posts-->

</div><!-- End sidebar -->

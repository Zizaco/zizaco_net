@section ('content')
    <h1>Blog</h1>

    @foreach ($posts as $post)
        <a href='{{{ URL::action('PostsController@show', ['slug'=>$post->slug] ) }}}'>
            <div class='post'>
                <span class='date'>{{{ $post->postedAt() }}}</span>
                <h2>{{{ $post->title }}}</h2>
                <p>
                    @if ($post->lean_content)
                        {{{ $post->lean_content }}}
                    @else
                        {{{ substr($post->content,0,350) }}}...
                    @endif
                </p>
            </div>
        </a>
    @endforeach
@stop

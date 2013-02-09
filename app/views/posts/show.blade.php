@section ('content')
    <h1>{{{ $post->title }}}</h1>

    <span class='date'>Postado em {{{ $post->postedAt() }}}</span>

    <div class='page_content'>
        {{{ Markdown::parse($post->content) }}}
    </div>

    @include( 'posts._comments' )

    {{{ HTML::action( 'PostsController@index', 'Voltar' ) }}}
@stop

@section ('aditional_js')
    {{{ Basset::show('js_syntaxh.js') }}}
@stop

@section ('content')
    <h1>{{ $page->title }}</h1>

    <div class='page_content'>
        {{ Markdown::parse($page->content) }}
    </div>

    {{ HTML::action( 'PostsController@index', 'Voltar' ) }}
@stop

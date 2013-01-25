@section ('content')
    <h1>{{ $page->title }}</h1>

    <p>{{ $page->content }}</p>

    {{ HTML::action( 'PostsController@index', 'Voltar' ) }}
@stop

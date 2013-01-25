@section ('content')
    <h1>{{ $post->title }}</h1>

    <span class='date'>Postado em {{ $post->postedAt() }}</span>

    <p>{{ $post->content }}</p>

    {{ HTML::action( 'PostsController@index', 'Voltar' ) }}
@stop

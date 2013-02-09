@section ('content')
    <p>
        <a href='{{{ URL::action( 'Admin\PagesController@create' ) }}}' class='btn btn-primary'>
            Nova Pagina
        </a>
    </p>

    <table class='table'>
        <thead>
            <tr>
                <th>Pagina</th>
                <th>Autor</th>
                <th>Criada em</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $pages as $page )
                <tr>
                    <td>
                        {{{ HTML::action( 'Admin\PagesController@edit', $page->title, ['id'=>$page->id] ) }}}
                    </td>
                    <td>{{{ $page->author->username }}}</td>
                    <td>{{{ $page->created_at }}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{{ $pages->links() }}}
@stop

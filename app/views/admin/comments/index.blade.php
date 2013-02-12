@section ('content')
    <table class='table'>
        <thead>
            <tr>
                <th>Comment</th>
                <th>Autor</th>
                <th>Email</th>
                <th>Criada em</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $comments as $comment )
                <tr>
                    <td>{{{ 
                        HTML::action(
                            'Admin\CommentsController@edit',
                            'In '.$comment->post->title,
                            ['id'=>$comment->id]
                        ) 
                    }}}</td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{{ $comment->created_at }}}</td>
                </tr>
                <tr>
                    <td colspan=4 class='comment_peek'>
                        <p>{{ Str::limit($comment->content, 110) }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{{ $comments->links() }}}
@stop

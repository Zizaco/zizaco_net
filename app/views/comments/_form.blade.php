<?php
    if(isset($comment))
        $f = array_merge( $comment->toArray(), Input::old() );
    else
        $f = array_merge( Input::old() );
?>

{{{
    Form::open(
        Request::url().'#comment',
        isset( $method ) ? $method : 'GET',
        [
            'data-real-action'=>
            URL::action(
                isset( $action ) ? $action : 'CommentsController@store',
                isset( $comment ) ? ['id'=>$comment->id] : ['slug'=>$post->slug]
            ),
        ]
    )
}}}
    <fieldset>
        {{{ Form::hidden('post_id', $post->id ) }}}
        {{{ Form::hidden('csrf_token', Session::getToken()) }}}
        
        <span class='field'>
            {{{ Form::label('name', 'Nome') }}}
            {{{ Form::text('name', array_get( $f,'name') ) }}}
        </span>

        <span class='field'>
            {{{ Form::label('email', 'Email') }}}
            {{{ Form::text('email', array_get( $f,'email') ) }}}
        </span>

        <span class='field'>
            {{{ Form::label('website', 'Website') }}}
            {{{ Form::text('website', array_get( $f,'website') ) }}}
        </span>

        <span class='field fullw'>
            {{{ Form::label('content', 'Comentário') }}} <br>
            {{{ Form::textarea('content', array_get( $f,'content') ) }}}
        </span>

        @if ( Session::get('error') )
            <div class="alert alert-error">
                @if ( is_array(Session::get('error')) )
                    {{{ Session::get('error')[0] }}}
                @else
                    {{{ Session::get('error') }}}
                @endif
            </div>
        @endif

        <div class='form-actions'>

            {{{ Form::button('Enviar comentário', ['type'=>'submit', 'class'=>'btn btn-primary'] ) }}}

            @if ( isset($comment) )
                {{{ HTML::action( 'Admin\CommentsController@destroy', 'Excluir', ['id'=>$comment->id], ['data-method'=>'delete', 'class'=>'btn btn-danger'] ) }}}

                {{{ HTML::action( 'Admin\CommentsController@index', 'Cancelar', [], ['class'=>'btn'] ) }}}
            @endif

        </div>
    </fieldset>
{{{ Form::close() }}}

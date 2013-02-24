<?php
    if(isset($comment))
        $f = array_merge( $comment->toArray(), Input::old() );
    else
        $f = array_merge( Input::old() );
?>

{{{
    Form::open(
        URL::action(
            isset( $action ) ? $action : 'CommentsController@update',
            isset( $comment ) ? ['id'=>$comment->id] : []
        ),
        isset( $method ) ? $method : 'POST' 
    )
}}}
    <fieldset>
        
        {{{ Form::label('name', 'Nome') }}}
        {{{ Form::text('name', array_get( $f,'name') ) }}}

        {{{ Form::hidden('post_id', array_get( $f,'post_id') ) }}}

        {{{ Form::label('email', 'Email') }}}
        {{{ Form::text('email', array_get( $f,'email') ) }}}
        
        {{{ Form::label('website', 'Website') }}}
        {{{ Form::text('website', array_get( $f,'website') ) }}}

        {{{ Form::label('content', 'Comentário') }}} <br>
        {{{ Form::textarea('content', array_get( $f,'content') ) }}}

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

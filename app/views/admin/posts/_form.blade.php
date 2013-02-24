<?php
    if(isset($post))
        $f = array_merge( $post->toArray(), Input::old() );
    else
        $f = array_merge( Input::old() );
?>

{{{
    Form::open(
        URL::action(
            isset( $action ) ? $action : 'Admin\PostsController@store',
            isset( $post ) ? ['id'=>$post->id] : []
        ),
        isset( $method ) ? $method : 'POST' 
    )
}}}
    <fieldset>
        {{{ Form::label('title', 'Título') }}}
        {{{ Form::text('title', array_get( $f,'title') ) }}}

        <label class="checkbox">
            {{{ Form::checkbox('display', 1, array_get( $f,'display') ) }}}
            Mostrar
        </label>

        {{{ Form::label('slug', 'Slug (URL)') }}}
        {{{ Form::text('slug', array_get( $f,'slug') ) }}}

        {{{ Form::label('content', 'Conteudo (Markdown)') }}}
        {{{ Form::textarea('content', array_get( $f,'content'), ['data-editor'] ) }}}

        {{{ Form::label('lean_content', 'Conteudo resumido') }}}
        {{{ Form::textarea('lean_content', array_get( $f,'lean_content') ) }}}

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

            {{{ Form::button('Salvar post', ['type'=>'submit', 'class'=>'btn btn-primary'] ) }}}

            @if ( isset($post) )
                {{{ HTML::action( 'Admin\PostsController@destroy', 'Excluir', ['id'=>$post->id], ['data-method'=>'delete', 'class'=>'btn btn-danger'] ) }}}
            @endif

            {{{ HTML::action( 'Admin\PostsController@index', 'Cancelar', [], ['class'=>'btn'] ) }}}

        </div>
    </fieldset>
{{{ Form::close() }}}

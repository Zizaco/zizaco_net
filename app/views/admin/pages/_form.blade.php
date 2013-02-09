<?php
    if(isset($page))
        $f = array_merge( $page->toArray(), Input::old() );
    else
        $f = array_merge( Input::old() );
?>

<?=
    Form::open(
        URL::action(
            isset( $action ) ? $action : 'Admin\PagesController@store',
            isset( $page ) ? ['id'=>$page->id] : []
        ),
        isset( $method ) ? $method : 'POST' 
    )
?>
    <fieldset>
        {{{ Form::label('title', 'Título') }}}
        {{{ Form::text('title', array_get( $f,'title') ) }}}

        <label class="checkbox">
            {{{ Form::checkbox('display', 1, array_get( $f,'display') ) }}}
            Mostrar no menu
        </label>

        {{{ Form::label('slug', 'Slug (URL)') }}}
        {{{ Form::text('slug', array_get( $f,'slug') ) }}}

        {{{ Form::label('content', 'Conteudo (Markdown)') }}}
        {{{ Form::textarea('content', array_get( $f,'content'), ['data-editor'] ) }}}

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

            {{{ Form::button('Salvar página', ['type'=>'submit', 'class'=>'btn btn-primary'] ) }}}

            @if ( isset($page) )
                {{{ HTML::action( 'Admin\PagesController@destroy', 'Excluir', ['id'=>$page->id], ['data-method'=>'delete', 'class'=>'btn btn-danger'] ) }}}
            @endif

            {{{ HTML::action( 'Admin\PagesController@index', 'Cancelar', [], ['class'=>'btn'] ) }}}

        </div>
    </fieldset>
{{{ Form::close() }}}

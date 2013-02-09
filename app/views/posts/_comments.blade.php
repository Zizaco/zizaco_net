<div class='comments'>
    @if( count($post->comments) > 0 )
        
        <h2>Comentários</h2>
        @foreach ( $post->comments as $c )
            <div class="comment">
                {{{ HTML::image( $c->authorGravatar() ) }}}

                <span class='date'>
                    {{{ $c->postedAt() }}}
                </span>

                <span class='name'>
                    @if ( $c->website )
                        {{{ HTML::to( $c->website, $c->name ) }}}
                    @else
                        {{{ $c->name }}}
                    @endif
                </span>

                <p>
                    {{{ str_replace("\n", '<br>', $c->content) }}}
                </p>
            </div>
        @endforeach

    @endif

    <h2 id='comment'>Comentar</h2>

    @include ('comments._form')

</div>

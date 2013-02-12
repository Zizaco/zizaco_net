<a class="brand" href="/">Zizaco.net</a>

@if (! Auth::guest() )
    <ul class="nav">

        <li {{{ (Request::is('admin/post*')) ? 'class="active"' : '' }}}>
            {{{ HTML::action( 'Admin\PostsController@index', 'Posts' ) }}}
        </li>
        
        <li {{{ (Request::is('admin/page*')) ? 'class="active"' : '' }}}>
            {{{ HTML::action( 'Admin\PagesController@index', 'Paginas' ) }}}
        </li>

        <li {{{ (Request::is('admin/comment*')) ? 'class="active"' : '' }}}>
            {{{ HTML::action( 'Admin\CommentsController@index', 'Comentários' ) }}}
        </li>

        <li>
            {{{ HTML::action( 'UserController@logout', 'Logout' ) }}}
        </li>

    </ul>
@endif

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Zizaco.net</title>
            {{{ Basset::show('admin.css') }}}
    </head>
    <body>

        <div class="navbar navbar-static-top">
            <div class="navbar-inner">
                @include('layouts._adminbar')
            </div>
        </div>

        @if (Session::get('flash'))
            <div class='alert alert-info flash'>
                {{{ Session::get('flash') }}}
            </div>
        @endif

        <div class='maincontent'>
            @yield('content')
        </div>
        
        {{{ Basset::show('js_admin.js') }}}
        @yield('aditional_js')
    </body>
</html>

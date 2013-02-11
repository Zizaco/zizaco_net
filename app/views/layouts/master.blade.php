<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Zizaco.net</title>
        {{{ Basset::show('website.css') }}}
        <script src="http://use.edgefonts.net/pt-sans-caption.js"></script>
        <script src="http://use.edgefonts.net/pt-sans-narrow.js"></script>
    </head>
    <body>
        <div class='maincontent'>
            @include('layouts._menubar')
            <span class='title'>ZIZACO<small>.net</small></span>

            @yield('content')
        </div>

        <div class='footer'>
            <div class='content'>
                By Zizaco - 
                Powered by {{{ HTML::to('http://laravel.com', 'Laravel 4') }}}
                {{{ HTML::to(
                    'https://github.com/Zizaco/zizaco_net',
                    'Fork me at Github',['class'=>'forkme']
                ) }}}
            </div>
        </div>
        
        {{{ Basset::show('js_website.js') }}}
        @yield('aditional_js')
    </body>
</html>

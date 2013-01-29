<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Zizaco.net</title>
        {{ Basset::show('website.css') }}
        <script src="http://use.edgefonts.net/pt-sans-caption.js"></script>
        <script src="http://use.edgefonts.net/pt-sans-narrow.js"></script>
    </head>
    <body>
        <div class='maincontent'>
            @include('layouts._menubar')
            <span class='title'>ZIZACO<small>.net</small></span>

            @yield('content')
        </div>
        
        {{ Basset::show('js_website.js') }}
        @yield('aditional_js')
    </body>
</html>

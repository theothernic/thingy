<!DOCTYPE html>


    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8" />
            <meta name="x-ua-compatible" charset="IE=Edge,chrome=1" />
            <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />

            <title>the feed. @yield('title')</title>
            @include('feed::links')

            <link rel="stylesheet" type="text/css" href="{{ @mix('css/app.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ @mix('css/styles.css') }}" />
        </head>

        <body>

            <div class="page container">
                <header class="masthead">
                    <h1 class="brand"><a href="/"><span class="thin">the</span><span class="thick">feed</span></a></h1>
                </header>

                <main>
                    @yield('content')
                </main>

            </div>

        </body>

    </html>

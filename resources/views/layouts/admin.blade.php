<!DOCTYPE html>


<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="x-ua-compatible" charset="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <title>Admin</title>

    <link rel="stylesheet" type="text/css" href="{{ @mix('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ @mix('css/admin.css') }}" />
</head>

<body>

<div class="page container">

    <div class="stage">
        <header>
            <h1 class="brand">
                <span class="thin">feed</span>bag.
            </h1>
        </header>

        <main>
            @yield('content')
        </main>
    </div>

</div>

</body>

</html>

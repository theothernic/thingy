<!DOCTYPE html>


<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="x-ua-compatible" charset="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="{{ @mix('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ @mix('css/login.css') }}" />
</head>

<body>

    <div class="page container">

        <div class="stage">
            <h1 class="brand">
                {{ env('APP_NAME') }}
            </h1>
            @yield('content')
        </div>

    </div>

</body>

</html>

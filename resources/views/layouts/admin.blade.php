<!DOCTYPE html>


<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="x-ua-compatible" charset="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <title>Admin</title>

    @yield('scripts')

    <link rel="stylesheet" type="text/css" href="{{ @mix('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ @mix('css/utils.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ @mix('css/admin.css') }}" />
    @yield('css')
</head>

<body>

<div class="page container">

    <div class="stage">
        <header>
            <h1 class="brand">
                {{ env('APP_NAME') }}
            </h1>
        </header>

        <nav>
            <ul>
                <li><a class="button" href={{ route('home') }}><span class="fa fa-home"></span></a></li>
                <li><a class="button" href={{ route('admin.posts.index') }}>Posts</a></li>
                <li><a class="button" href={{ route('admin.users.index') }}>Users</a></li>
                <li><a class="button" href={{ route('admin.accounts.index') }}>Accounts</a></li>
                <li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button>Log Out</button>
                    </form>
                </li>
            </ul>



        </nav>

        <main>
            @yield('content')
        </main>
    </div>

</div>

</body>

</html>

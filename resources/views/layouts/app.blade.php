<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite(['resources/sass/app.scss'])

</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
{{--                    <a href="{{route('home')}}" class="nav-link menu-link {{activeMainLink()}}">Главная страница</a>--}}
                    <a href="{{route('home')}}" class="nav-link menu-link {{$mainLink}}">Главная страница</a>
                </li>
                <li class="nav-item">
{{--                    <a href="{{route('article.index')}}" class="nav-link menu-link {{activeArticleLink()}}">Каталог статей</a>--}}
                    <a href="{{route('article.index')}}" class="nav-link menu-link {{$articleLink}}">Каталог статей</a>
                </li>
            </ul>
            <a href="#">
                <i class="bi bi-github"></i>
            </a>
        </div>
    </nav>
    @yield('hero')
    @yield('content')
    @yield('view')
</div>

</body>
</html>

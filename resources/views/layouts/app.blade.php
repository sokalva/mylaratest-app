<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
<div class="container">

    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Главная страница</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Каталог статей</a>
                </li>
            </ul>
            <a class="d-flex justify-content-end" href="https://github.com/sokalva">github</a>
        </div>

    </nav>

</div>

</body>
</html>

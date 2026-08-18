<!doctype html>
<html lang="id" data-birthday="{{ config('birthday.birthday') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Birthday surprise for you">
    <title>{{ config('birthday.name') }} — Happy Birthday</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @yield('content')
</body>
</html>

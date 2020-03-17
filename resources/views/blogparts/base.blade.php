<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? config('ouranos.sitename',config('app.name','Ouranos')) }}</title>
    <link rel="stylesheet" href="{{ asset('css/blogparts/base.css') }}">
    <base target="_blank">
    @yield('head')
</head>
<body>
<header>
    <h1>
        <a href="{{ url('/') }}">{{ config('ouranos.sitename',config('app.name','Ouranos')) }}</a>
        {{ !empty($title) ? ' - '.$title : '' }}
    </h1>
</header>
<main>
    @yield('content')
</main>
</body>
</html>

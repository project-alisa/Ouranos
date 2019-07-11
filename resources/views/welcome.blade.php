<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ouranos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background: #544e3e;
            position: relative;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        #systemname{
            position: absolute;
            font-size: 60px;
            color: #afa690;
            z-index: 0;
            top: 45vh;
            width: 100vw;
            text-align: center;
        }
        #systemname > p{
            margin: 13px;
            font-size: 16px;
        }

        main{
            position: absolute;
            z-index: 2;
            bottom: 0;
            width: 100vw;
            padding: 20px 0;
            background: linear-gradient(rgba(0,0,0,0),rgba(0,0,0,0.7));
            text-align: center;
            animation: fadein 4.5s ease-in-out;
        }
        h1{
            margin: 10px;
        }

        #admin{
            position: absolute;
            bottom: 10px;
            right: 20px;
        }
        #admin > a{
            color: white;
            text-decoration: none;
            font-size: 16px;
            margin: 0 5px;
        }

        #links > a{
            color: white;
            text-shadow: 0 0 4px black;
            text-decoration: none;
            font-size: 20px;
            margin: 0 10px;
        }

        #background{
            position: fixed;
            overflow: hidden;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            object-position: top center;
            z-index: 1;
            animation: fadein 4s ease-in-out;
        }

        @keyframes fadein {
            0%   { opacity: 0; }
            40%  { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>
<img src="{{ asset('image/card/'.config('ouranos.cardname').'.jpg') }}" alt="Background" id="background">
<div id="systemname">
    {{ config('app.name') }}
    <p>
        Ver {{ config('ouranos.version') }}<br>
        {{ config('ouranos.phrase') }}
    </p>
</div>

<main>
    <h1><img src="{{ asset('image/mlp_ouranos.png') }}" alt="mlp">
    </h1>
    <div id="links">
        <a href="javascript:void(0)">Idol</a>
        <a href="javascript:void(0)">List</a>
        <a href="javascript:void(0)">Unit</a>
        <a href="javascript:void(0)">Search</a>
    </div>

    @if (Route::has('login'))
        <div id="admin">
            <a href="https://github.com/project-alisa/Ouranos" target="_blank">GitHub</a>
            @auth
                <a href="{{ url('/home') }}">Office</a>
            @else
                <a href="{{ route('login') }}">Admin</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</main>


</body>
</html>

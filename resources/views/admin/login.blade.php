<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('admin.title')}} | {{ trans('admin.login') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @if(!is_null($favicon = Admin::favicon()))
        <link rel="shortcut icon" href="{{$favicon}}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/admin-login.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/AdminLTE/plugins/iCheck/square/blue.css") }}">

</head>
<body>
<div id="illustration" @if(config('admin.login_background_image'))style="background: url({{asset('image/card/'.config('admin.login_background_image').'.jpg')}}) no-repeat top center;background-size: cover;"@endif></div>
<div id="login_form">
    <img src="{{ asset('image/mlp_ouranos.png') }}" alt="{{ config('app.name') }}" id="logo">
    <h1 class="login-box-msg">Authentication</h1>

    <form action="{{ admin_url('auth/login') }}" method="post">
        <div class="form-group has-feedback {!! !$errors->has('username') ?: 'has-error' !!}">

            @if($errors->has('username'))
                @foreach($errors->get('username') as $message)
                    <p class="error">{{$message}}</p>
                @endforeach
            @endif

                <label>
                    <input type="text" class="form-control" placeholder="User name" name="username" value="{{ old('username') }}" required>
                </label>
        </div>
        <div class="form-group has-feedback {!! !$errors->has('password') ?: 'has-error' !!}">

            @if($errors->has('password'))
                @foreach($errors->get('password') as $message)
                    <p class="error">{{$message}}</p>
                @endforeach
            @endif

                <label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </label>
        </div>
        <div class="row">
            @if(config('admin.auth.remember'))
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" value="1" {{ (!old('username') || old('remember')) ? 'checked' : '' }}>
                        Keep me logged in
                    </label>
                </div>
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="buttons">
                <a href="{{ url('/') }}" class="button cancel" id="cancel">Cancel</a>
                <button type="submit" class="primary">Login</button>
            </div>
        </div>
        <hr>
        <p title="{{ config('ouranos.phrase') }}">
            {{ config('app.name').' Version'.config('ouranos.version') }}
        </p>
    </form>
</div>
</body>
</html>

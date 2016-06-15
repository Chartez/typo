@extends('master')

@section('content')

<div class="col-md-4 col-md-offset-4 log-in">
    <form method="POST" action="/auth/login" class="form-signin">
        {!! csrf_field() !!}
        {{ Html::image('img/logo.png', 'logo', array('class' => 'logo-big img-responsive')) }}
        <h3 class="form-signin-heading">Sign In</h3>
        <div class="field">
            <label for="inputEmail">E-Mail Address</label>
            <input type="email" name="email" value="{{ old('email') }}" id="inputEmail" class="form-control" placeholder=""  autofocus>
        </div>

        <div class="field">
            <label for="inputPassword"">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="">
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-default btn-block">Login</button>
        </div>
        <a href="#">Forgot your password?</a>
        <hr>
        <div>
            <p>Not a member yet? <a href="/auth/register">Register</a></p>
        </div>

    </form>

    @if (count($errors) > 0)
        <div class="alert alert-danger animated flipInX">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

@endsection
@extends('master')

@section('content')

    <div class="col-md-4 col-md-offset-4 register">
    <form method="POST" action="/auth/register" class="form-signin">
    {!! csrf_field() !!}
        {{ Html::image('img/logo.png', 'logo', array('class' => 'logo-big img-responsive')) }}
    <h3 class="form-signin-heading">Register</h3>
    <div class="field">
        <label for="inputName">Username</label>
        <input type="text" name="name" value="{{ old('name') }}" id="inputName" class="form-control" placeholder="" autofocus>
    </div>

    <div class="field">
        <label for="inputEmail">E-Mail Address</label>
        <input type="email" name="email" value="{{ old('email') }}" id="inputEmail" class="form-control" placeholder="">
    </div>

    <div class="field">
        <label>Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Min 6 characters">
    </div>

    <div class="field">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Repeat the password">
    </div>

    <div>
        <button type="submit" class="btn btn-lg btn-default btn-block">Register</button>
    </div>
        <hr>
        <div>
            <p>Already a member? <a href="/auth/login">Sign in</a></p>
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
@extends('layouts.Frontend')
@section('content')
<div class="full-container-login">
    <div class="container">
    <div class="row login-row" style="background-color: #f5f5f5;">
      <div class="col-sm-5" style="margin: 0 auto;float: none;">
        <div class="login-box-v">
           <h3>Administrator Login</h3>
            @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <form class="lofin-form" method="POST" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Login') }}">
            @csrf
            <div class="form-group">
              <label>{{ __('E-Mail Address') }}:</label>
              <div class="login-icon">
                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
              </div>
              @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
              <label>Password:</label>
              <div class="login-icon">
                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                <input class="form-control" type="password" name="password" placeholder="password">
              </div>
              @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
              <button class="login-submit" type="Submit">Submit</button>
            </div>
          </form>
          <div class="required-field-login">
              <div class="col-sm-6">
                <span>Keep me logged in</span>
              </div>
              <div class="col-sm-6 text-right">
                <span><a href="#">Lost your password?</a></span>
              </div>
            </div>
        </div>
        <div class="dnt-account">
          <p>Don't have an account?</p>
          <a href="#">Sign Up!</a>
        </div>
      </div>
    </div>
    </div>
</div>
@endsection

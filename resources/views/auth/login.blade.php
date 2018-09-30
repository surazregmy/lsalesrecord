@extends('layouts.logintemplate')
{{-- @extends('layouts.app') --}}

@section('content')
<div class="container">
        <div class="container-login100" style="background-image: url('images/bg-02.jpg');">
            <div class="wrap-login100">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <span class="login100-form-title p-b-34 p-t-27">
                                ईश्वर प्लम्बिङ सेवा 
                        </span>
                        <span class="login100-form-logo">
                                <i class="zmdi zmdi-landscape"></i>
                        </span>
                    </br>
                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <div class="col-md-6">
                                <input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Enter username">

                            <div class="col-md-6">
                                <input id="password" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <span class="focus-input100" data-placeholder="&#xf191;"></span>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary login100-form-btn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

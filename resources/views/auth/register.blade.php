@extends('layouts.app')
@section('content')
<section class="login_part padding_top">
    @include('layouts.alerts')

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>New to our Shop?</h2>
                        <p>There are advances being made in science and technology
                            everyday, and a good example of this is the</p>
                        <a href="{{route("log")}}" class="btn_3">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Welcome ! <br>
                            Please Sign up now</h3>
                            <form class="row contact_form" method="POST" action="{{ route('register') }}">
                                @csrf
                            <div class="col-md-12 form-group p_star">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="numberphone" type="text" class="form-control"  name="numberphone"  required autocomplete="numberphone" autofocus placeholder="number">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="address" type="text" class="form-control"  name="address"  required autocomplete="address" autofocus placeholder="address">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="password confirmation">
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

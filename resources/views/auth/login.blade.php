@extends('layouts.app')
@section('content')
    <div class="container login" style="height: 630px;">
        <div class="row justify-content-center ">
            <div class="col-md-8 shadow" style="  margin-top: 120px;max-width: 600px;height: 360px;border: 1px solid #9C9C9C;">

                <div class="card-header " style="text-align: center;color: #3f9ae5;"><h3>{{ __('message.Login') }}</h3></div>

                <div class="card-body" style=" background-color: #EAEAEA;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <input id="userid" type="text" placeholder="{{ __('message.user Id') }}"
                                       class="form-control @error('userid') is-invalid @enderror" name="userid"
                                       value="{{ old('userid') }}" required autofocus>

                                @error('userid')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="{{ __('message.Password') }}"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        <spane>{{ __('message.Remember Me') }}</spane>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <button style="height: 40px;width:260px;" type="submit" class="btn btn-primary">
                                    {{ __('message.Login') }}
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

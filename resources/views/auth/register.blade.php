@extends('layouts.app')

@section('content')
<div class="container register " style="height: 630px;">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow" style="  margin-top: 120px;max-width: 600px;height: 360px;border: 1px solid #9C9C9C; overflow:hidden">
            <div class="card" >
                <div class="card-header" style="text-align: center;color: #3f9ae5;background-color: #EAEAEA;"><h3>{{ __('message.Register') }}</h3></div>

                <div class="card-body" style=" background-color: #EAEAEA;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row row justify-content-center">


                            <div class="col-md-6">
                                <input id="userid" type="text" placeholder="{{ __('message.user Id') }}" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{ old('userid') }}" required >

                                @error('userid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row row justify-content-center">

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="{{ __('message.Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row row justify-content-center">

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="{{ __('message.Confirm Password') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6 ">
                                <button style="height: 40px;width:260px;" type="submit" class="btn btn-primary">
                                    {{ __('message.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @if(Session::has('valid'))
                    <div class="alert alert-danger text-md-right text-sm-center" role="alert">
                        {{Session::get('valid') }}
                    </div>
                @endif
            </div>
        </div>

    </div>


</div>
@endsection

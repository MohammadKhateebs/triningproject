
@extends('layouts.app')

@section('content')


    <div class="content body-style">
    <div  class="container">
        @if(Session::has('success'))
            <div class="alert alert-success " role="alert">
                {{Session::get('success') }}
            </div>
            <br>
        @endif
        <form method="post" action="{{ route('volunteerRequest.store') }}">
        @csrf
        <!-- <input name="_token" value="{{csrf_token()}}}"> -->
            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label  for="firstName">{{__('message.First Name')}}</label>
                    <input type="text"  id="firstName" placeholder="{{__('message.First Name')}}" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}"   autofocus required>
                    @error('firstName')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6 ">
                    <label for="secondName">{{__('message.Second Name')}}</label>
                    <input type="text"  id="secondName" placeholder="{{__('message.Second Name')}}" class="form-control @error('secondName') is-invalid @enderror" name="secondName" value="{{ old('secondName') }}"  autofocus >
                    @error('secondName')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6 ">
                    <label for="thirdName">{{__('message.Third Name')}}</label>
                    <input type="text"  id="thirdName" placeholder="{{__('message.Third Name')}}" class="form-control @error('thirdName') is-invalid @enderror" name="thirdName" value="{{ old('thirdName') }}"  autofocus >
                    @error('thirdName')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6 ">
                    <label for="lastName">{{__('message.Last Name')}}</label>
                    <input type="text"  id="lastName" placeholder="{{__('message.Last Name')}}" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}"  autofocus >
                    @error('lastName')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group ">
                <label for="gender">{{__('message.Gender')}}</label>
                <div class="form-group col-md-6">
                    <input type="radio" id="gender" name="gender" value="{{__('message.Female')}}" checked/>{{__('message.Female')}}
                    <input type="radio" id="gender" name="gender" value="{{__('message.Male')}}" />{{__('message.Male')}}
                </div>

            </div>
            <div class="form-group ">
                <div class="form-group col-md-6">
                    <label for="identification">{{__('message.Identification')}}</label>
                    <input type="text"  id="identification" placeholder="{{__('message.Identification')}}" class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ old('identification') }}"   autofocus >
                    @error('identification')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group ">
                <div class="form-group col-md-6">
                    <label for="phone">{{__('message.Phone')}}</label>
                    <input type="text"  id="phone" placeholder="{{__('message.Phone')}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autofocus >
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="address">{{__('message.address')}}</label>
                <select id="address"  class="form-control @error('address') is-invalid @enderror"  name="address" value="{{ old('address') }}">
                    <option selected ></option>
                    <option name="address">{{__('message.Nablus')}}</option>
                    <option name="address">{{__('message.Ramallah')}}</option>
                    <option name="address">{{__('message.Hebron')}}</option>
                    <option name="address">{{__('message.Tulkarm')}}</option>
                    <option name="address">{{__('message.Qalqilya')}}</option>
                    <option name="address">{{__('message.Tubas')}}</option>
                    <option name="address">{{__('message.Jericho')}}</option>
                    <option name="address">{{__('message.Nablus')}}</option>
                    <option name="address">{{__('message.Bethlehem')}}</option>
                    <option name="address">{{__('message.Suburbs of Jerusalem')}}</option>

                </select>
                @error('address')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="university">{{__('message.University or college')}}</label>
                <select  name="university"  class="form-control">
                    <option selected></option>
                    <option >{{__('message.An-Najah National University')}}</option>
                    <option >{{__('message.Birzeit University')}} </option>
                    <option >{{__('message.Al-Quds Abu Dis University')}}</option>
                    <option >{{__('message.American Arab University')}}</option>
                    <option >{{__('message.Al-Khadouri University')}}</option>
                    <option >{{__('message.Al-Quds Open University')}}</option>
                    <option >{{__('message.Hisham Hijjawi College')}}</option>
                    <option >{{__('message.Al-Rawda College')}}</option>
                    <option >{{__('message.Other')}}</option>


                </select>
                @error('university')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group ">
                <div class="form-group col-md-6">
                    <label for="universityId">{{__('message.universityId')}}</label>
                    <input type="text" class="form-control"  name="universityId" placeholder="{{__('message.universityId')}}">
                    @error('universityId')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

            </div>
            <div class="form-group col-md-4">
                <label for="specialization">{{__('message.specialization')}}</label>
                <select  name="specialization" class="form-control">
                    <option selected></option>
                    <option >{{__('message.English')}}</option>
                    <option >{{__('message.Arabic')}}</option>
                    <option >{{__('message.Science')}}</option>
                    <option >{{__('message.Psychology')}}</option>
                    <option >{{__('message.Sports')}}</option>
                    <option >{{__('message.Primary Education')}}</option>
                    <option >{{__('message.Other')}}</option>

                </select>
                @error('specialization')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary">{{__('message.Send the request')}}</button>
            </div>
        </form>
    </div>
    </div>
@endsection

@extends('admin')

@section('teachers')
    <div class="container">
        <h1 class="bg-success text-white text-md-center">بستان</h1>
        @foreach ($section as $sect)
            @if($sect->classroom=='kg1')
                <a href="{{route('section',$sect->id)}}"  style="font-size: 24px; width:100px; height: 100px; "
                   class="btn bg-success sect justify-content-center">
                    <i class="fa fa-users  text-white" style="width: 20px;height: 20px;">
                    </i>
                    <hr>
                   {{$sect->name}}</a>
            @endif
        @endforeach
    </div>
@stop

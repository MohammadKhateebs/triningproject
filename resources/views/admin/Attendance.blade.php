@extends('admin')
<style>
    button i{
        display: block;
    }
    .nav-link{
        display:block;
        padding:30px;
        height: 100px;
    }
    .nav-link:hover{
        color: #1d68a7;
    }
    .container{
        display: block;
        height: 100%; /* will cover the 100% of viewport */

    }
    .d-flex{
        height: 100%;
    }
    div h3{
        text-align: center;
        background-color:black;
        color: white;
        height : 40px;
    }
</style>
@section('Attendance')


    <div>
        <h3 class="bg-success">{{__('message.Attendance and Absence')}}</h3>
    </div>


    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link" id="first-tab" data-bs-toggle="pill" data-bs-target="#first" type="button" role="tab" aria-controls="first" aria-selected="false">{{__('message.First')}}</button>
            <button class="nav-link" id="second-tab" data-bs-toggle="pill" data-bs-target="#second" type="button" role="tab" aria-controls="second" aria-selected="false">{{__('message.Second')}}</button>
        </div>



        <div class="container shadow">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="first" role="tabpanel" aria-labelledby="first-tab">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation" >
                            @foreach ($section as $sect)
                                @if($sect->classroom=='kg1')
                                    <a href="{{route('Atte',$sect->id)}}"  style="font-size: 24px; width:100px; height: 100px; "
                                       class="btn bg-success sect justify-content-center">
                                        <i class="fa fa-users  text-white" style="width: 20px;height: 20px;">
                                        </i>
                                        <hr>
                                        {{$sect->name}}</a>
                                @endif
                            @endforeach

                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="seconde-tab">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation" >
                            @foreach ($section as $sect)
                                @if($sect->classroom=='kg2')
                                    <a href="{{route('Atte',$sect->id)}}"  style="font-size: 24px; width:100px; height: 100px; "
                                       class="btn bg-success sect justify-content-center">
                                        <i class="fa fa-users  text-white" style="width: 20px;height: 20px;">
                                        </i>
                                        <hr>
                                        {{$sect->name}}</a>
                                @endif
                            @endforeach

                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    </div>

@stop







@extends('admin')
<style>
    button i {
        display: block;
    }

    .nav-link {
        display: block;
        padding: 30px;
        height: 100px;
    }

    .nav-link:hover {
        color: #1d68a7;
    }

    .container {
        display: block;
        height: 100%; /* will cover the 100% of viewport */

    }

    .d-flex {
        height: 100%;
    }

    div h3 {
        text-align: center;
        background-color: black;
        color: white;
        height: 40px;
    }
</style>
@section('Attendance')


    <div>
        <h3 class="bg-success">{{__('message.evaluation')}}</h3>
        <div class="float-lg-right back">
            <a  type="button"  type="button" class="btn btn-outline-success " style="margin: 10px;" href={{url("admin")}}><i class="fa fa-arrow-left"></i>
                {{ __('message.back') }}</a>
        </div>
    </div>

    <div class="d-flex align-items-start">


        <div class="container shadow">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach($bra as $branch)
                    <li class="nav-item">
                        <a class="btn  btn-outline-success" id="pills-home-tab{{$branch->id}}" data-toggle="pill" href="#pills-home{{$branch->id}}" role="tab" aria-controls="pills-home{{$branch->id}}" aria-selected="false" >
                            @if($branch->classroom=='kg1') بستان@else تمهيدي@endif: {{$branch->name}}</a>
                    </li>
                @endforeach

            </ul>
            <div class="tab-content" id="pills-tabContent">
                @foreach($bra as $branch)
                    <div class="tab-pane fade " id="pills-home{{$branch->id}}" role="tabpanel" aria-labelledby="pills-home-tab{{$branch->id}}">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach($students as $student)
                                @if($student->branch_id==$branch->id)
                                    <a class="btn btn-outline-success"   href="{{url('evalStudent/'.$student->identification.'/'.$cr)}}">
                                        <i style="padding: 10px;"class="fa fa-user"></i><br>
                                        {{$student->identification}} : {{$student->firstName}} {{$student->lastName}}</a>
                                @endif
                            @endforeach

                        </div>



                    </div>
                @endforeach

            </div>
        </div>
    </div>

@stop









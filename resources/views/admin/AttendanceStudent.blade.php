@extends('layouts.app')
<style>

    .main {

        height: 100%; /* will cover the 100% of viewport */

        display: block;
        position: relative;
        padding-bottom: 100px;
        overflow: auto;
        margin-top: 40px;
        background-color: #f1f1f1;
    }
</style>
@section('content')
    <div class="container main">
        <div class="d-flex align-items-start">
            <div class="back">
                <a type="button" style="font-size: 24px; width:100px; height: 100px;" type="button"
                   class="btn btn-outline-success " href="{{url('admin')}}"><i
                        class="fa fa-arrow-left"></i>
                    {{ __('message.back') }}</a>
            </div>
        </div>
        {{--show student--}}
        <div class="hed align-items-lg-center">
            @foreach ($section as $sect)
                @if($id==$sect->id)
                    <h1 class=" text-md-center bg-success text-white">{{$sect->classroom}} : {{$sect->name}}</h1>
                @endif
            @endforeach
            <hr>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

            @foreach ($students  as $student)
                @if($student->branch_id==$id  )
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab{{$student->identification}}"
                                data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->identification}}"
                                type="button" role="tab" aria-controls="pills-contact{{$student->identification}}"
                                aria-selected="false">
                            <i class="fa fa-user"></i><br>{{$student->firstName}} {{$student->secondName}} {{$student->lastName}}
                        </button>
                    </li>
                @else

                @endif

            @endforeach
        </ul>

        <div class="" id="">
            @foreach($students as $student)
                @if( $id == $student->branch_id)
                    <div class="modal fade" id="exampleModal{{$student->identification}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-sm-center">
                                    <h6 class="text-white"> {{$student->firstName}} {{$student->secondName}} {{$student->lastName}}
                                    </h6>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <table class="table  table-striped table-hover"
                                           style="box-shadow: 5px 10px #888888;">
                                        <thead class="bg-dark text-white">
                                        <tr>

                                            <th scope="col"></th>
                                            <th scope="col">{{__('message.date')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <p style="display: none">{{$i=1}}</p>
                                        @foreach($absence as $a)
                                            @if($student->identification==$a->identification)
                                                <tr>
                                                    <th scope="col">{{$i}}</th>
                                                    <p style="display: none">{{$i+=1}}</p>
                                                    <td>
                                                        <li>{{$a->date}}</li>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>





                @endif
            @endforeach
        </div>

    </div>

@stop




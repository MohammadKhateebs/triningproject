@extends('layouts.app')
<style>

    .main{

        height: 100%; /* will cover the 100% of viewport */

        display: block;
        position: relative;
        padding-bottom: 100px;
        overflow: auto;
        background-color: #f1f1f1;
    }
    td ,th,tr{
        text-align: center;
    }

</style>
@section('adminNav')

    <li>
        <div class="float-md-right ">
            <a type="button" class="btn btn-outline-light" href="/admin">
                <i class="fa fa-fw fa-home"></i>{{__('message.Admin Page')}}
            </a>
        </div>
    </li>

@stop
@section('content')

    <div class="container  justify-content-center shadow">
        <div class="main">

            <h1 class="text-md-center  btn-outline-danger"><i style="size: 50px"  class=" fa fa-trash-o"></i>{{__('message.recycle bin')}} </h1>
            @if(Session::has('successd'))
                <div class="alert alert-success text-md-right" role="alert">
                    {{Session::get('successd') }}
                </div>

            @endif

                <div class="back">
                    @if($classroom=='kg1')
                    <a  type="button"  type="button" class="btn btn-outline-success "  href="{{url('section/'.$id)}}" ><i class="fa fa-arrow-left"></i>
                        {{ __('message.back') }}</a>
                    @else
                        <a  type="button"  type="button" class="btn btn-outline-success " href="{{url('section2/'.$id)}}"><i class="fa fa-arrow-left"></i>
                            {{ __('message.back') }}</a>
                    @endif
                </div>
                @if(count($students)==0)
                    <span class="text-danger error-text id_err">
                    لا يوجد محذوفات بعد
                </span>
                @else
                    <table class="table  table-striped table-hover " style="box-shadow: 5px 10px #888888;" >
                        <thead class="bg-dark text-white ">
                        <tr>

                            <th scope="col">الاسم</th>
                            <th scope="col">رقم الهوية</th>
                            <th scope="col">الجنس</th>
                            <th scope="col">رقم الهاتف</th>
                            <th scope="col">العنوان</th>
                            <th scope="col">الصف</th>
                            <th scope="col">الشعبة</th>
                            <th scope="col">نشط</th>
                            <th scope="col"></th>



                        </tr>

                        </thead>
                        <tbody>
                        <tr>
                            @foreach ($students  as $student)
                                <td >{{$student->firstName}} {{$student->secondName}} {{$student->thirdName}} {{$student->lastName}}</td>
                                <td >{{$student->identification}}</td>
                                <td >{{$student->gender}}</td>
                                <td >{{$student->phone}}</td>
                                <td>{{$student->address}}</td>
                                <td>{{$classroom}}</td>
                                <td>{{$nameBranch}}</td>
                                    @if($student->active=='active')
                                        <td> <i style="color: #2fa360" class="fa fa-circle"></i>{{__('message.active')}}</td>
                                    @else
                                        <td> <i style="color: red" class="fa fa-circle"></i>{{__('message.inactive')}}</td>
                                    @endif
                                <td><a class="btn btn-outline-info " href="{{url('/recovery/4/'.$student->identification)}}">{{__('message.Recovery')}}</a></td>

                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                @endif




        </div>
    </div>

@stop

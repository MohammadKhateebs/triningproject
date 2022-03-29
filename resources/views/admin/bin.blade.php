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
       @if($role==2)
                <div class="back">
                    <a  type="button"  type="button" class="btn btn-outline-success " href="/Teachers"><i class="fa fa-arrow-left"></i>
                        {{ __('message.back') }}</a>
                </div>
                @if(count($teachers)==0)
                    <span class="text-danger error-text id_err">
                    لا يوجد محذوفات بعد
                </span>
                @else
                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;" >
                        <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">{{__('message.name')}}</th>
                            <th scope="col">{{__('message.Identification')}}</th>
                            <th scope="col">{{__('message.educationLevel')}}</th>
                            <th scope="col">{{__('message.salary')}}</th>
                            <th scope="col">{{__('message.Phone')}}</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($teachers   as $teachers)
                            <tr>
                                <td >{{$teachers->name}} </td>
                                <td >{{$teachers->identification}}</td>
                                <td >{{$teachers->educationLevel}}</td>
                                <td >{{$teachers->salary}}</td>
                                <td >{{$teachers->phone}}</td>
                                <td><a class="btn btn-outline-info " href="{{url('/recovery/2/'.$teachers->identification)}}">{{__('message.Recovery')}}</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            @elseif($role==1)
                <div class="back">
                    <a  type="button"  type="button" class="btn btn-outline-success " href="/Classrooms"><i class="fa fa-arrow-left"></i>
                        {{ __('message.back') }}</a>
                </div>
                @if(count($classroom)==0)
                    <span class="text-danger error-text id_err">
                    لا يوجد محذوفات بعد
                </span>
                @else
                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;" >
                        <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">المرحلة الدراسية</th>
                            <th scope="col">اسم الشعبة</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($classroom   as $class)
                            <tr>
                                <td> @if($class->classroom=='kg1')
                                        بستان
                                    @else تمهيدي
                                    @endif</td>
                                <td >{{$class->name}} </td>
                                <td><a class="btn btn-outline-info " href="{{url('/recovery/1/'.$class->id)}}">استعادة</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            @endif
        </div>
    </div>

@stop

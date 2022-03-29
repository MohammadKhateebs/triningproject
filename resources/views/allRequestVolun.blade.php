
@extends('admin')
<style>
    .main{
        height: 100%; /* will cover the 100% of viewport */
        display: block;
        position: relative;
        padding-bottom: 100px;
        overflow: auto;
        margin-left:250px;
        background-color: #f1f1f1;


    }
</style>
@section('volunteer')


    <div>
        <a href="Bin/3/0"  class="btn btn-outline-danger  float-lg-right"><i style="size: 50px"  class="fa fa-trash-o"></i></a>
    </div>
    <div class="container main shadow">
        @if(Session::has('successd'))
            <div class="alert alert-success text-md-right" role="alert">
                {{Session::get('successd') }}
            </div>
            <br>


        @elseif(Session::has('valid'))
            <div class="alert alert-danger text-md-right" role="alert">
                {{Session::get('valid') }}
            </div>
            <br>
        @endif

            <div class="float-lg-left">
                {{__('message.number of requests')}} : {{count($Volunteers)}}
            </div>

            <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;" >
            <thead class="bg-dark text-white">
            <tr>
                <th scope="col">{{__('message.First Name')}}</th>
                <th scope="col">{{__('message.Second Name')}}</th>
                <th scope="col">{{__('message.Third Name')}}</th>
                <th scope="col">{{__('message.Last Name')}}</th>
                <th scope="col">{{__('message.Identification')}}</th>
                <th scope="col">{{__('message.Gender')}}</th>
                <th scope="col">{{__('message.Phone')}}</th>
                <th scope="col">{{__('message.university')}}</th>
                <th scope="col">{{__('message.academicYear')}}</th>
                <th scope="col">{{__('message.universityId')}}</th>
                <th scope="col">{{__('message.specialization')}}</th>
                <th scope="col">{{__('message.address')}}</th>

                <th scope="col">{{__('message.Accept')}}</th>
                <th scope="col">{{__('message.deny')}}</th>




            </tr>
            </thead>
            <tbody>

            @foreach ($Volunteers   as $volunteer)
                @if($volunteer->confirmed==NULL)
                    <tr>
                        <td >{{$volunteer->firstName}}</td>
                        <td >{{$volunteer->secondName}}</td>
                        <td >{{$volunteer->thirdName}}</td>
                        <td >{{$volunteer->lastName}}</td>
                        <td >{{$volunteer->identification}}</td>
                        <td >{{$volunteer->gender}}</td>
                        <td >{{$volunteer->phone}}</td>
                        <td>{{$volunteer->university}}</td>
                        <td>{{$volunteer->academicYear}}</td>
                        <td>{{$volunteer->universityId}}</td>
                        <td>{{$volunteer->specialization}}</td>
                        <td>{{$volunteer->address}}</td>
                        <td><a href="{{url('confirmVolunteer/'.$volunteer->identification)}}" class="btn-outline-success" type="button"><i class="fa fa-user-plus"></i> {{__('message.Accept')}}</a></td>
                        <td><a href="{{url('denyVolunteer/'.$volunteer->identification)}}" type="button" class="btn-outline-danger"><i class="fa fa-user-times"></i>{{__('message.deny')}}</a></td>

                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>

    </div>

@stop

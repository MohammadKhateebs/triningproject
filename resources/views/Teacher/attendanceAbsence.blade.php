@extends('layouts.app')
<style>
    .container {
        height: 100%; /* will cover the 100% of viewport */
        display: block;
        position: relative;


    }

    .sidenav2 {
        height: 100%;
        width: 250px;
        position: absolute;
        z-index: 1;
        top: 100px;
        left: 0;
        background-color: #001f3f;
        overflow-x: hidden;
        transition: 0.5s;

    }

    .sidenav2 a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #f1f1f1;
        display: block;
        transition: 0.3s;
    }

    .sidenav2 a:hover {
        color: #818181;
    }

    .sidenav2 .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav2 {
            padding-top: 15px;
        }

        .sidenav2 a {
            font-size: 18px;
        }
    }

    ul {
        list-style-type: none;
        margin: 18px;
        padding: 0;

    }

    li a {
        display: block;
    }

    .tab-content {
        overflow: auto;
    }
</style>
@section('content')
    <div class="container shadow  overflow-auto " style="display: block;">
        <div class="float-lg-right back " style="margin:10px;">
            <a  type="button"  type="button" class="btn btn-outline-success " href={{url("techar/".$idt)}}><i class="fa fa-arrow-left"></i>
                {{ __('message.back') }}</a>
        </div>
        <div class="tab " style="display: block;">
            <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;width: 100%; ">
                <thead class="bg-dark text-white">
                <tr>

                    <th scope="col"></th>
                    <th scope="col">{{__('message.date')}}</th>
                    <th scope="col">{{__('message.delete')}}</th>
                </tr>
                </thead>
                <tbody>
                <p style="display: none">{{$i=1}}</p>
                @foreach($absen as $a)
                    <tr>
                        <th scope="col">{{$i}}</th>
                        <p style="display: none">{{$i+=1}}</p>
                        <td>{{$a->date}}</td>
                        <td>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#Modal2{{$a->date}}"><i
                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>
                        </td>

                    </tr>
                    {{--model Delete--}}
                    <div class="modal fade" id="Modal2{{$a->date}}"
                         tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header text-center bg-danger">
                                    <h2 class="modal-title text-white w-100 font-weight-bold py-2">{{__('message.delete')}}
                                        !</h2>

                                </div>
                                <div class="modal-body ">
                                    <div class="md-form mb-5 text-center">
                                        <h3 class="modal-title text-break w-100 font-weight-bold py-2">{{__('message.Do you want to delete absence?')}}</h3>
                                        <br>
                                        <h5>  {{$a->date}}  </h5>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn  btn-outline-danger waves-effect"
                                            data-bs-dismiss="modal"><i class="fa fa-remove"></i></button>
                                    <a class="btn  btn-outline-success waves-effect"
                                       href="{{url('deleteAttendance'.$a->id)}}"><i
                                            class="fa fa-check"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>


                @endforeach
                </tbody>
            </table>
        </div>
        </div>


    </div>
@endsection

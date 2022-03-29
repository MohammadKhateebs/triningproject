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



    <div class="d-flex align-items-start">
        <div class="back">
            <a  type="button"  type="button" class="btn btn-outline-success " href="Teachers"><i class="fa fa-arrow-left"></i>
                {{ __('message.back') }}</a>
        </div>

        <div class="container shadow">
            <h3 class="bg-success text-white text-md-center">{{__('message.Attendance and Absence')}}</h3>


            <ul class="nav nav-pills mb-3" >
                @foreach($teacher as $t)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab{{$t->identification}}"data-bs-toggle="modal" data-bs-target="#exampleModal{{$t->identification}}" type="button" role="tab" aria-controls="pills-contact{{$t->identification}}" aria-selected="false">
                            <i class="fa fa-user"></i><br>{{$t->name}}</button>
                    </li>
                @endforeach
            </ul>

            <div >

                @foreach($teacher as $t)
                    <div class="modal fade" id="exampleModal{{$t->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-sm-center">
                                    <h6  class="text-white"> {{$t->name}}
                                    </h6>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                        <thead class="bg-dark text-white">
                                        <tr>

                                            <th scope="col"></th>
                                            <th scope="col">{{__('message.date')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <p style="display: none">{{$i=1}}</p>
                                        @foreach($absence as $a)
                                            @if($t->identification==$a->identification)
                                                <tr>
                                                    <th scope="col">{{$i}}</th>
                                                    <p style="display: none">{{$i+=1}}</p>
                                                    <td>  <li>{{$a->date}}</li></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

@stop




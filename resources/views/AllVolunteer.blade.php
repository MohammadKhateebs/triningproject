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
        <a href="Bin/3/1"  class="btn btn-outline-danger float-md-right"><i style="size: 50px"  class="fa fa-trash-o"></i></a>
    </div>
    <div class="container text-md-right main shadow">



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
                <th scope="col">{{__('message.Transportation cost')}}</th>
                <th scope="col">{{__('message.Study Level')}}</th>
                <th scope="col">{{__('message.active')}}</th>
                <th scope="col">{{__('message.delete')}}</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($Volunteers   as $volunteer)
                @if($volunteer->confirmed==1)
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
                        @if($volunteer->transportation==0)
                            <td>
                                <a style="width:120px " id="transport{{$volunteer->identification}}" class="btn btn-outline-warning text-break" data-bs-toggle="modal"
                                   href="#myModaltransport{{$volunteer->identification}}">
                                    <i class="fa fa-edit"></i>{{__( 'message.determine')}}</a></td>
                            </td>

                        @else
                            <td>{{$volunteer->transportation}}</td>
                        @endif
                        @if($volunteer->studyLevel=='undefined')
                            <td>
                                <a style="width:120px " id="undefinedSL{{$volunteer->identification}}" class="btn btn-outline-success text-break" data-bs-toggle="modal"
                                   href="#myModalundefinedSL{{$volunteer->identification}}">
                                    <i class="fa fa-edit"></i>{{__( 'message.determine')}}</a></td>
                            </td>

                        @else
                            <td>{{$volunteer->studyLevel}}</td>
                        @endif

                        @if($volunteer->active=='active')
                            <td><i style="color: #2fa360" class="fa fa-circle"></i>{{__('message.active')}}</td>
                        @else
                            <td> <i style="color: red" class="fa fa-circle"></i>{{__('message.inactive')}}</td>
                        @endif
                        <td>
                            <button style="width:120px " type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#Modal2{{$volunteer->identification}}"><i class="fa fa-trash-o"></i>{{__('message.delete')}}</button> </td>

                    </tr>
                    <!-- Modal Delete -->
                    <div class="modal fade" id="Modal2{{$volunteer->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header text-center bg-danger">
                                    <h2 class="modal-title text-white w-100 font-weight-bold py-2">{{__('message.delete')}}!</h2>

                                </div>
                                <div class="modal-body ">
                                    <div class="md-form mb-5 text-center">
                                        <h3 class="modal-title text-break w-100 font-weight-bold py-2">هل تريد حذف هذا المتطوع؟</h3>
                                        <br>
                                        <h5> {{ $volunteer->identification }}:{{$volunteer->firstName}}  {{$volunteer->secondName}} {{$volunteer->thirdName}}
                                            {{$volunteer->lastName}}</h5>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn  btn-outline-danger waves-effect" data-bs-dismiss="modal"><i class="fa fa-remove"></i></button>
                                    <a class="btn  btn-outline-danger waves-effect" href="{{url('delete/'.$volunteer->identification)}}"><i class="fa fa-check"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>

                @endif


            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    @foreach ($Volunteers   as $volunteer)
        @if($volunteer->confirmed==1&&$volunteer->transportation==0)
            <div id="myModaltransport{{$volunteer->identification}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="myFormTran{{$volunteer->identification}}">
                            <div class="modal-header text-center bg-warning">
                                <h3 class="modal-title text-white w-100 font-weight-bold py-2">{{__('message.determine')}} {{__('message.Transportation cost')}}</h3>

                            </div>
                            <div class="modal-body ">
                                <div class="md-form mb-5 text-center">

                                    @csrf

                                    <input type="text" style="display: none;" name="idv" value="{{$volunteer->identification}}">
                                    <input type="text" name="transportation" >
                                    <small style="width: 100%;display: block;"
                                           class="text-danger bg-danger text-white text-sm-center text-white transportation_err"></small>



                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{url('viewVolunteer')}}" type="button" class="btn  btn-outline-danger waves-effect" ><i class="fa fa-remove"></i></a>
                                <a  id="saveTransport{{$volunteer->identification}}" href="{{url('viewVolunteer')}}" type="submit"  class="btn btn-outline-warning waves-effect"><i class="fa fa-edit"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                $(document).on('click','#saveTransport{{$volunteer->identification}}',function (e){
                    e.preventDefault();
                    $.ajax({
                        type:'post',
                        url:"{{route('updateTransportation')}}",

                        data:{
                            '_token': $("input[name='_token']").val(),
                            'idv': $("input[name='idv']").val(),
                            'transportation':$("input[name='transportation']").val(),

                        },
                        success: function(data) {
                            if($.isEmptyObject(data.error)){

                                $( document ).ajaxSuccess(function( event, request, settings ) {
                                    location.reload();
                                });


                            }else{
                                $.each( data.error, function( key, value ) {
                                    console.log(key);
                                    $('.'+key+'_err').text(value);
                                });
                            }
                        }

                    });


                });
            </script>

        @endif
        @if($volunteer->studyLevel=='undefined'&&$volunteer->confirmed==1)
            <div id="myModalundefinedSL{{$volunteer->identification}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="myFormTran{{$volunteer->identification}}">
                            <div class="modal-header text-center bg-success">
                                <h3 class="modal-title text-white w-100 font-weight-bold py-2">{{__('message.determine')}} {{__('message.Study Level')}}</h3>

                            </div>
                            <div class="modal-body ">
                                <div class="md-form mb-5 text-center">

                                    @csrf
                                    <span class="text-danger error-text error_err"></span>
                                    <input type="text" style="display: none;" name="id" value="{{$volunteer->identification}}">

                                    <select id="studyLevel" class="form-control"
                                            name="studyLevel" value="{{ old('studyLevel') }}">
                                        <option value="" disabled selected>المرحلة الدراسيه</option>
                                        <option value="الاول">الاول</option>
                                        <option value="الثاني">الثاني</option>
                                        <option value="الثالث">الثالث</option>
                                        <option value="الرابع">الرابع</option>
                                        <option value="الخامس">الخامس</option>
                                        <option value="السادس">السادس</option>

                                    </select>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{url('viewVolunteer')}}" type="button" class="btn  btn-outline-danger waves-effect" ><i class="fa fa-remove"></i></a>
                                <a  id="saveSl{{$volunteer->identification}}" href="{{url('viewVolunteer')}}" type="submit"  class="btn btn-outline-success waves-effect"><i class="fa fa-edit"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                $(document).on('click','#saveSl{{$volunteer->identification}}',function (e){
                    e.preventDefault();
                    var optionSelected2 = $('#studyLevel').find("option:selected");
                    var studyLevel = optionSelected2.val();
                    $.ajax({
                        type:'post',
                        url:"{{route('updateajax')}}",

                        data:{
                            '_token': $("input[name='_token']").val(),
                            'id': $("input[name='id']").val(),
                            'studyLevel':studyLevel,

                        },
                        success: function(data) {
                            if(!$.isEmptyObject(data.error))
                                $('.error_err').text(data.error)
                            else
                            if($.isEmptyObject(data.status)){

                                $( document ).ajaxSuccess(function( event, request, settings ) {
                                    location.reload();
                                });

                                /*
                                                               }else{
                                                                   $.each( data.error, function( key, value ) {
                                                                       console.log(key);
                                                                       $('.'+key+'_err').text(value);
                                                                   });*/
                            }
                        }

                    });


                });
            </script>
        @endif
    @endforeach




@stop


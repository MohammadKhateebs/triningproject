@extends('layouts.app')
<style>


    .container {
        height: 100%; /* will cover the 100% of viewport */
        display: block;
        position: relative;


    }

    i {
        display: block;
    }

    li a:hover {
        color: #b9b9b9;
    }

    .nav {
        margin-top: 25px;


    }

    li {
        padding: 10px;
        display: inline;
    }

    #navbut {
        text-decoration: none;

        color: white;
    }


    .time-right {
        float: right;
        color: #aaa;
    }

    /* Style time text */
    .time-left {
        float: right;
        color: #999;
    }

    .lift {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
        word-wrap: break-word;
        margin-left: 200px;

    }

    .lift::after {
        content: "";
        clear: both;
        display: table;


    }

    .right::after {
        content: "";
        clear: both;
        display: table;

    }

    .right {
        border-color: #ccc;

        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
        word-wrap: break-word;
        margin-right: 200px;


    }
    #tech{
        overflow: auto;
    }

</style>

@section('content')
    <div class="container shadow" id="tech">
        <div class="nav  bg-dark ">
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">

                    <a id="navbut" class="nav-link  text-white bg-dark" id="pills-home-tab" data-bs-toggle="pill"
                       data-bs-target="#pills-home" href="#pills-home" type="button">
                        <i class="fa fa-file-text-o"></i> {{__('message.Absence')}} {{__('message.for students')}}</a>


                </li>


                <li class="nav-item" role="presentation">
                    <a class="nav-link  text-white bg-dark " id="pills-stu1-tab" data-bs-toggle="pill"
                       data-bs-target="#evstu" href="#evstu" type="button" aria-controls="evstu"
                       aria-selected="false"> <i
                            class="fa fa-file-text-o"></i> {{__('message.evaluation')}} {{__('message.for students')}}
                    </a>

                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link  text-white bg-dark " id="pills-eval-tab" data-bs-toggle="pill"
                       data-bs-target="#evalstu" href="#evalstu" type="button" aria-controls="evalstu"
                       aria-selected="false"> <i
                            class="fa fa-file-text-o"></i> {{__('message.view evaluation')}}
                    </a>


                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link  text-white bg-dark " id="pills-abs-tab" data-bs-toggle="pill"
                       data-bs-target="#absstu" href="#absstu" type="button" aria-controls="absstu"
                       aria-selected="false"> <i
                            class="fa fa-file-text-o"></i>    {{__('message.show')}} {{__('message.Absence')}}
                    </a>






                </li>
                @if($notiSt==1)
                    <li role="presentation" style="padding-top: 0;">
                        <a class="nav-link  text-white " id="pills-messagesS-tab" data-bs-toggle="pill"
                           data-bs-target="#pills-messagesS" href="#pills-messagesS" type="button"
                           aria-controls="pills-messagesS"
                        >{{__('message.student messages')}}<span style="color: red;display: inline;  font-size: 25px; padding-top: 0;" >*</span></a>
                    </li>
                @elseif($notiSt==0)
                    <li role="presentation" >
                        <a class="nav-link  text-white " id="pills-messagesS-tab" data-bs-toggle="pill"
                           data-bs-target="#pills-messagesS" href="#pills-messagesS" type="button"
                           aria-controls="pills-messagesS"
                        >{{__('message.student messages')}}</a>
                    </li>
                @endif



            </ul>
        </div>


        <div class="tab-content " id="pills-tabContent">
            <div style="padding-top: 20px;" class="tab-pane fade " id="pills-messagesS" role="tabpanel"
                 aria-labelledby="pills-messagesS-tab">
                <ul class="list-group list-group-flush list-group-horizontal">
                    @foreach($Students as $student)
                        <p style="display: none">{{$notis=0}}</p>
                        @foreach($messages as $message)
                            @if($message->fromId==$student->identification&&$message->seen==0)
                                <p style="display: none">{{$notis=1}}</p>
                                @break
                            @endif
                        @endforeach
                        @if($notis==0)
                            <li class="list-group-item" style="width: 100px;height: 100px; float: left;
                        list-style: none;
                        margin-right: 8px;
                        border: 2px solid;
                        padding: 4px; text-align: center;" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModalf{{$student->identification}}"><i style="padding: 10px;"
                                                                                               class="fa fa-user"></i><br>

                                {{$student->firstName}} {{$student->scondName}} {{$student->lastName}}

                            </li>
                        @elseif($notis==1)
                            <form id="editForm{{$student->identification}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="fromId" value="{{$student->identification}}">
                                <li class="list-group-item"  style="width: 100px;height: 100px; float: left;
                        list-style: none;
                        margin-right: 8px;
                        border: 2px solid red;
                        padding: 4px; text-align: center;" type="button" id="notification{{$student->identification}}">
                                    <i style="padding: 10px;color: red;"
                                       class="fa fa-user"></i><br>
                                    {{$student->firstName}} {{$student->scondName}} {{$student->lastName}}

                                </li>
                            </form>
                        @endif
                        <div>
                            <form id="messagesS{{$student->identification}}">
                            @csrf
                            <!-- Modal: modalPoll -->

                                <div class="modal fade" id="exampleModalf{{$student->identification}}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true" data-backdrop="false">
                                    <div class="modal-dialog" role="document">

                                        <div class="modal-content ">
                                            <!--Header-->

                                            <div class="bg-dark" style="text-align:center;">
                                                <button style="color: white ;padding: 20px; " type="button"
                                                        class="close "
                                                        onclick="location.reload()" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>

                                                </button>
                                                <h4 style="color:white;">{{$student->firstName}} {{$student->scondName}} {{$student->lastName}}</h4>

                                            </div>

                                            <!--Body-->
                                            <div class="modal-body" id="scr{{$student->identification}}"
                                                 style="overflow: auto; height: 400px; ">
                                                <div class="nowa{{$student->identification}}" id="bm">

                                                    @foreach($messages as $message)
                                                        @if($message->fromId==$id||$message->toId==$id)
                                                            @if($message->fromRole==2&&$message->fromId==$id&&$message->toId==$student->identification)

                                                                <div class="lift">
                                                                    {{$message->text}}

                                                                    <span class="time-left ">
                                                       {{$message->created_at->toDateString()}}
                                                    </span>
                                                                </div>

                                                            @elseif($message->fromRole==4&&$message->fromId==$student->identification)

                                                                <div class="right" style="background-color: #ddd;">
                                                                    {{$message->text}}
                                                                    <span class="time-right">
                                                       {{$message->created_at->toDateString()}}
                                                    </span>
                                                                </div>


                                                            @endif
                                                        @endif
                                                    @endforeach


                                                </div>


                                            </div>
                                            <hr>
                                            <div class="md-form">
                                                <input type="hidden" name="fromId" value="{{$id}}">
                                                <input type="hidden" name="toId" value="{{$student->identification}}">
                                                <input type="hidden" name="toRole" value="4">
                                                <textarea type="textMess" id="textMess{{$student->identification}}"
                                                          name="text" class="md-textarea form-control"
                                                          rows="3"></textarea>
                                                <small style="width: 100%;display: block;"
                                                       class="text-danger error-text textErr{{$student->identification}} bg-danger text-white text-sm-center"></small>

                                            </div>
                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">
                                                <a type="button" id="sendMessageS{{$student->identification}}"
                                                   class="btn btn-dark waves-effect waves-light">Send
                                                    <i class="fa fa-paper-plane ml-1"></i>
                                                </a>
                                                <a type="button" onclick="location.reload()"
                                                   class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal: modalPoll -->


                            </form>
                        </div>
                        <script>
                            $(document).on('click', '#sendMessageS{{$student->identification}}', function (e) {


                                $('.textEtt').text(" ");
                                $('.textErr').text(' ');
                                $count = 0;
                                e.preventDefault();
                                $.ajax({
                                    type: 'post',
                                    url: "{{route('sendMessageT')}}",
                                    dataType: "json",
                                    data: $('#messagesS{{$student->identification}}').serialize(),
                                    success: function (data) {

                                        if (!($.isEmptyObject(data.error))) {
                                            $.each(data.error, function (key, value) {
                                                console.log(key);
                                                $('.textErr{{$student->identification}}').text(data.error);
                                            });
                                        }
                                        if (!($.isEmptyObject(data.done))) {
                                            /*
                                                                                        var elem = document.getElementById('scr{{$student->identification}}');
                                            elem.scrollTop = elem.scrollHeight;*/
                                            //  document.getElementById('scr{{$student->identification}}').lastChild.scrollIntoView(false);
                                            var lastScrollTop = 0;
                                            var elem = document.getElementById('scr{{$student->identification}}');

                                            var timer = window.setInterval(function () {
                                                elem.scrollTop = elem.scrollHeight;
                                                lastScrollTop = elem.scrollTop
                                            }, 1000);

                                            elem.addEventListener("scroll", function () {
                                                if (lastScrollTop < elem.scrollTop) {
                                                    window.clearInterval(timer);
                                                }
                                            }, false);

                                            console.log(data.done);

                                            $('#messageNow{{$student->identification}}').append(data.done + "</br>");
                                            $('#textMess{{$student->identification}}').val(' ');


                                            setTimeout(function () {// wait for 5 secs(2)
                                                $(".nowa{{$student->identification}}").load(location.href + " .nowa{{$student->identification}}>*", ""); // then reload the page.(3)
                                            })


                                        }

                                    }


                                });

                            });
                            $(document).on('click', '#notification{{$student->identification}}', function (e) {
                                e.preventDefault();
                                $.ajax({
                                    type: 'post',
                                    url: "{{route('updateSeenMessageTeacherS')}}",
                                    dataType: "json",
                                    data: $('#editForm{{$student->identification}}').serialize(),
                                    success: function (data) {

                                        if (!($.isEmptyObject(data.done))) {
                                            $('#exampleModalf{{$student->identification}}').modal('show');
                                        }


                                    }


                                });
                            });


                        </script>
                        <script src="https://code.jquery.com/jquery-3.6.0.js"
                                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                                crossorigin="anonymous"></script>
                    @endforeach

                </ul>

            </div>

            <div style="padding-top: 20px;" class="tab-pane fade " id="pills-home" role="tabpanel"
                 aria-labelledby="pills-home-tab">
                <div class="alert-success"></div>

                <form id="myFormStudent">
                    @csrf
                    <h1 class="text-md-center text-light bg-dark"><i
                            class="fa fa-file-text-o"></i> {{__('message.absence')}} {{__('message.for students')}}
                    </h1>
                    <small style="width: 100%;display: block;"
                           class="text-danger nunValue bg-danger text-white text-sm-center text-white"></small>
                    <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">{{__('message.Identification')}}</th>
                            <th scope="col">{{__('message.name')}}</th>
                            <th scope="col">{{__('message.absence')}}</th>
                        </tr>
                        </thead>


                        <input  type="hidden" name="branch_id" value="{{$BID}}">
                        <input style="width: 100%;display: block;" type="date" name="date">
                        <small style="width: 100%;display: block;"
                               class="text-danger error-text date_err bg-danger text-white text-sm-center"></small>

                        <tbody>
                        @foreach($Students as $student)
                            <tr>
                                <td> {{$student->identification}} </td>
                                <td> {{$student->firstName}} {{$student->lastName}}</td>
                                <td>

                                    <input class="form-check-input" type="checkbox" id="absence" name="absence[]"
                                           value="{{$student->identification}}">

                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <button style="width: 100%;display: block;" type="submit" id="saveStudent"
                            class="btn btn-outline-success justify-content-center">{{__('message.save')}}</button>

                </form>

            </div>
            <div style="padding-top: 20px;" class="tab-pane fade " id="evstu" role="tabpanel"
                 aria-labelledby="pills-stu1-tab">
                <div class="alert-success"></div>

                <h1 class="text-md-center text-light bg-dark"><i
                        class="fa fa-file-text-o"></i> {{__('message.evaluation')}} {{__('message.for students')}}
                </h1>
                <small style="width: 100%;display: block;"
                       class="text-danger nunValue bg-danger text-white text-sm-center text-white"></small>

                <ul class="nav nav-pills " id="pills-tab">
                @foreach($Students as $student)
                    <!-- Button trigger modal -->
                        <li class="list-group-item" style="width: 100px;height: 100px; float: left;
                        list-style: none;
                        margin-right: 8px;
                        border: 2px solid;
                        padding: 4px; text-align: center;" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{$student->identification}}"><i style="padding: 10px;"
                                                                                          class="fa fa-user"></i><br>

                            {{$student->firstName}} {{$student->scondName}} {{$student->lastName}}

                        </li>


                        <!-- Modal -->

                        <div class="modal  " id="exampleModal{{$student->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content swiper-scrollbar-lock">

                                    <div class="modal-header text-center ">
                                        <h2 class="modal-title text-white w-100 font-weight-bold py-2"> {{__('message.add')}} {{__('message.evaluation')}}</h2>
                                    </div>
                                    <div class="card-body">
                                        <form id="myFormEvalStudent{{$student->identification}}">
                                            @csrf
                                            <input type="hidden" name="Bid" value="{{$student->branch_id}}">
                                            <input type="hidden" name="student_id" value="{{$student->identification}}">

                                            <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                                                <thead class="bg-dark text-white">
                                                <tr>

                                                    <th scope="col">{{__('message.name')}} {{__('message.course')}}</th>
                                                    <th scope="col">{{__('message.evaluation')}}</th>

                                                </tr>
                                                </thead>
                                                <div class="form-group row  justify-content-center">
                                                    <div class="col-md-6">
                                                        <select id="term" class="form-control" name="term" value="{{ old('term') }}">
                                                            <option disabled selected>{{__('message.term')}}</option>
                                                            <option value="1">الاول</option>
                                                            <option value="2">الثاني</option>
                                                        </select>
                                                        <span class="text-danger error-text term_err"></span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select id="month" class="form-control" name="month" value="{{ old('month') }}">
                                                            <option disabled selected>{{__('message.month')}}</option>
                                                            <option value='1'>الشهر الاول</option>
                                                            <option value='2'>الشهر الثاني</option>
                                                            <option value='3'>الشهر الثالث</option>
                                                            <option value='4'>الشهر الرابع</option>
                                                        </select>
                                                        <span class="text-danger error-text month_err"></span>
                                                    </div>
                                                </div>

                                                <small style="width: 100%;display: block;"
                                                       class="text-danger error-text errorEval bg-danger text-white text-sm-center"></small>
                                                <tbody>
                                                <tr>
                                                    <td>لغه عربية</td>
                                                    <td>
                                                        <div>
                                                            <select id="eval_ar" name="eval_ar" class="form-control">
                                                                <option value="">اختر</option>
                                                                @foreach($eval_text as $et)
                                                                    @if($et->role==4)
                                                                        <option value="{{$et->evaluation}}">{{$et->evaluation}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger error-text eval_ar_err"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>لغةانجليزية</td>
                                                    <td>
                                                        <div><select id="eval_en" name="eval_en" class="form-control">
                                                                <option value="">اختر</option>
                                                                @foreach($eval_text as $et)
                                                                    @if($et->role==4)
                                                                        <option value="{{$et->evaluation}}">{{$et->evaluation}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger error-text eval_en_err"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>رياضيات</td>
                                                    <td>
                                                        <div><select id="eval_math" name="eval_math" class="form-control">
                                                                <option value="">اختر</option>
                                                                @foreach($eval_text as $et)
                                                                    @if($et->role==4)
                                                                        <option value="{{$et->evaluation}}">{{$et->evaluation}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger error-text eval_math_err"></span>
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td>تربية اسلاميه</td>
                                                    <td><div>
                                                            <select id="eval_deen" name="eval_deen" class="form-control">
                                                                <option value="">اختر</option>
                                                                @foreach($eval_text as $et)
                                                                    @if($et->role==4)
                                                                        <option value="{{$et->evaluation}}">{{$et->evaluation}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger error-text eval_deen_err"></span>
                                                        </div></td>
                                                </tr>

                                                </tbody>

                                            </table>

                                            <div>
                                                <label>الملاحظات</label>
                                                <textarea  class="" type="text" id="note" name="note"></textarea>
                                                <span class="text-danger error-text note_err"></span>
                                            </div>
                                            <button style="width: 100%;display: block;" type="submit" id="saveEvalStudent{{$student->identification}}"
                                                    class="btn btn-outline-success justify-content-center">{{__('message.save')}}</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach
                        </li>
                </ul>

            </div>
            <div style="padding-top: 20px;" class="tab-pane fade " id="evalstu" role="tabpanel"
                 aria-labelledby="pills-eval-tab">
                <div class="alert-success"></div>

                <h1 class="text-md-center text-light bg-dark"><i
                        class="fa fa-file-text-o"></i>{{__('message.show')}} {{__('message.evaluation')}}
                </h1>
                <small style="width: 100%;display: block;"
                       class="text-danger nunValue bg-danger text-white text-sm-center text-white"></small>

                <ul class="nav nav-pills " id="pills-tab">
                @foreach($Students as $student)

                        <a class="list-group-item" style="width: 100px;height: 100px; float: left;
                        list-style: none;
                        margin-right: 8px;
                        border: 2px solid;
                        padding: 4px; text-align: center;" href={{url('evaluation/'.$student->identification.'/'.$id)}}><i style="padding: 10px;"
                                                                                          class="fa fa-user"></i><br>



                            {{$student->firstName}} {{$student->scondName}} {{$student->lastName}}

                        </a>

                    <!-- Button trigger modal -->

                        @endforeach

                </ul>

            </div>
            <div style="padding-top: 20px;" class="tab-pane fade " id="absstu" role="tabpanel"
                 aria-labelledby="pills-abs-tab">
                <div class="alert-success"></div>

                <h1 class="text-md-center text-light bg-dark"><i
                        class="fa fa-file-text-o"></i>{{__('message.show')}} {{__('message.absence')}}
                </h1>

                <ul class="nav nav-pills " id="pills-tab">
                @foreach($Students as $student)
                    <!-- Button trigger modal -->
                        <a class="list-group-item btn btn-outline-success" style="width: 100px;height: 100px; float: left;
                        list-style: none;
                        margin-right: 8px;
                        border: 2px solid;
                        padding: 4px; text-align: center;" href={{url('attendanceAbsence/'.$student->identification.'/'.$id)}}><i style="padding: 10px;"
                                                                                                                           class="fa fa-user"></i><br>



                            {{$student->firstName}} {{$student->scondName}} {{$student->lastName}}

                        </a>

                        @endforeach
                        </li>
                </ul>

            </div>




        </div>


        <div>
            @yield('Attendance')
            @yield('Evaluation')

        </div>
    </div>


@stop


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@foreach($Students as $student)
    <script>
        $(document).on('click', '#saveEvalStudent{{$student->identification}}', function (e) {
            $('.month_err').text(" ");
            $('.term_err').text(" ");
            $('.errorEval').text(" ");
            $('.eval_ar_err').text(" ");
            $('.eval_en_err').text(" ");
            $('.eval_math_err').text(" ");
            $('.eval_deen_err').text(" ");
            $('.note_err').text(" ");
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "{{route('evaluation')}}",
                dataType: "json",
                data: $('#myFormEvalStudent{{$student->identification}}').serialize(),
                success: function (data) {

                    if (!($.isEmptyObject(data.error))) {
                        printErrorMsg(data.error);
                    }

                    if (!($.isEmptyObject(data.errorEval))) {

                        $('.errorEval').text(data.errorEval);

                    }

                    if (!($.isEmptyObject(data.done))) {
                        $(".alert-success").append("<li style='list-style-type: none;' class='alert alert-success'>{{__('message.The evaluation was successful')}}</li>");
                        setInterval(function() {
                            location.reload();
                        }, 3000)
                    }
                }
            });
            function printErrorMsg(msg) {

                $.each(msg, function (key, value) {
                    console.log(key);
                    $('.' + key + '_err').text(value);
                });
            }
        });
    </script>
@endforeach
<script>
    //Attendance And Absence Student
    $(document).on('click', '#saveStudent', function (e) {
        e.preventDefault();
        var idss = $('#absence').val();
        $('.nunValue').text(" ");
        $('.data_err').text(" ");


        $.ajax({
            type: 'post',
            url: "{{route('attendance')}}",
            dataType: "json",
            data: $('#myFormStudent').serialize(),

            success: function (data) {

                if ($.isEmptyObject(data.error) && $.isEmptyObject(data.errorNunValue)) {
                    // location.reload();

                } else {
                    if (!($.isEmptyObject(data.error))) {
                        printErrorMsg(data.error);
                    }

                    if (!($.isEmptyObject(data.errorNunValue))) {
                        printnunvalue(data.errorNunValue);
                    }
                }

                if (!($.isEmptyObject(data.successes))) {
                    $(".alert-success").append("<li style='list-style-type: none;' class='alert alert-success'>{{__('message.Attendance and absence were successfully taken')}}</li>");
                    setInterval(function() {
                        location.reload();
                    }, 3000)


                }
            }
        });

        function printErrorMsg(msg) {

            $.each(msg, function (key, value) {
                console.log(key);
                $('.' + key + '_err').text(value);
            });
        }

        function printnunvalue(msg) {
            $('.nunValue').text(msg);
        }

    });

    //Attendance And Absence Volunteer

    $(document).on('click', '#saveVolunteer', function (e) {
        e.preventDefault();
        var idss = $('#absence').val();
        $('.nunValuev').text(" ");
        $('.data_errv').text(" ");


        $.ajax({
            type: 'post',
            url: "{{route('attendance')}}",
            dataType: "json",
            data: $('#myFormVolunteer').serialize(),

            success: function (data) {
                if ($.isEmptyObject(data.error) && $.isEmptyObject(data.errorNunValue)) {
                    $(".alert-success").append("<li style='list-style-type: none;' class='alert alert-success'>{{__('message.Attendance and absence were successfully taken')}}</li>");
                    setInterval(function() {
                        location.reload();
                    }, 3000)
                    //    location.reload();

                } else {
                    if (!($.isEmptyObject(data.error))) {
                        printErrorMsg(data.error);
                    }

                    if (!($.isEmptyObject(data.errorNunValue))) {
                        printnunvalue(data.errorNunValue);
                    }
                }

                if (!($.isEmptyObject(data.successes))) {
                    $(".alert-success").append("<li style='list-style-type: none;' class='alert alert-success'>{{__('message.Attendance and absence were successfully taken')}}</li>");
                    setInterval(function() {
                        location.reload();
                    }, 3000)
                }
            }
        });

        function printErrorMsg(msg) {

            $.each(msg, function (key, value) {
                console.log(key);
                $('.' + key + '_errv').text(value);
            });
        }

        function printnunvalue(msg) {
            $('.nunValuev').text(msg);
        }

    });

    //evaluation Volunteer
    $(document).on('click', '#saveEvalVolunteer', function (e) {
        $('.errorEx').text(" ");
        $('.errorEval').text(" ");
        $('.date_errv').text(" ");
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "{{route('evaluation')}}",
            dataType: "json",
            data: $('#myFormEvalVolunteer').serialize(),

            success: function (data) {

                if (!($.isEmptyObject(data.error))) {
                    $.each(data.error, function (key, value) {
                        console.log(key);
                        $('.date_errv').text(value);
                    });
                }
                if (!($.isEmptyObject(data.errorEx))) {

                    $('.errorEx').text(data.errorEx);

                }
                if (!($.isEmptyObject(data.errorEval))) {

                    $('.errorEval').text(data.errorEval);

                }
                if (!($.isEmptyObject(data.done))) {
                    $(".alert-success").append("<li style='list-style-type: none;' class='alert alert-success'>{{__('message.The evaluation was successful')}}</li>");
                    setInterval(function() {
                        location.reload();
                    }, 3000)
                }
            }
        });

    });


    //permission
    $(document).on('click', '#savePermission', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "{{route('permissionEvaluation')}}",
            dataType: "json",
            data: $('#permissionV').serialize(),

            success: function (data) {
                if (!($.isEmptyObject(data.errorAudit))) {
                    $('.errorAudit').text(data.errorAudit);
                }
                if (!($.isEmptyObject(data.done))) {
                    //relod
                    location.reload();
                }


            }
        });
    });

    //saveEvalAaudit
    $(document).on('click', '#saveEvalAudit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "{{route('updateEvaluationAudit')}}",
            dataType: "json",
            data: $('#myFormEvalAudit').serialize(),

            success: function (data) {
                if (!($.isEmptyObject(data.nunValue))) {
                    $('.nunValue').text(data.nunValue);
                }
                if (!($.isEmptyObject(data.done))) {
                    //relod
                    location.reload();
                }


            }
        });
    });

</script>

















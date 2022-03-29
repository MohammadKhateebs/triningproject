@extends('layouts.app')
<style>
    .container {
        height: 100%; /* will cover the 100% of viewport */
        display: block;
        position: relative;


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
    #asew{
        overflow: auto;
    }
</style>
@section('content')
    <div class="container shadow " id="asew">
        <div class="nav justify-content-center bg-dark ">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-white" id="pills-home-tab" data-bs-toggle="pill"
                       data-bs-target="#pills-home"
                       type="button" role="tab" aria-controls="pills-home"
                       aria-selected="true">{{__('message.Attendance and Absence')}}</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-white" type="button" href="{{url("evlauationforstudent/".$id)}}"
                       aria-selected="false">{{__('message.show')}} {{__('message.evaluation')}}</a>
                </li>

                @if($noti==1)
                    <li class="nav-item "  style="padding-top: 0;" role="presentation">
                    <form id="editForm">
                        @csrf

                        <input type="hidden" name="id" value="{{$id}}">

                            <a class="nav-link text-white  notification"  type="button">
                               {{__('message.Messages')}} <span style="color: red;display: inline;  font-size: 25px; padding-top: 0;" >*</span></a>

                    </form>
                    </li>
                @elseif($noti==0)
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-white" id="pills-messages-tab" data-toggle="modal"
                       data-target="#modalPoll-1" type="button">
                        {{__('message.Messages')}}</a>
                </li>
                @endif

            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent"
             style="padding-top: 20px;padding-left: 100px;padding-right: 100px;">
            <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888; width: 90% ;">
                    <thead class="bg-dark text-white text-sm-center">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">{{__('message.date')}}</th>
                        <th scope="col">name</th>
                    </tr>
                    </thead>
                    <tbody class="text-sm-center">
                    <p style="display: none">{{$i=1}}</p>
                    @foreach($absence as $a)

                        <tr>
                            <th scope="col">{{$i}}</th>
                            <p style="display: none">{{$i+=1}}</p>
                            <td> {{$a->date}}</td>
                            <td>{{$a->name}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888; width: 90% ;">
                    <thead class="bg-dark text-white text-sm-center">
                    <tr>

                        <th scope="col">{{__('message.date')}}</th>

                        <th scope="col">{{__('message.evaluation')}}</th>
                    </tr>
                    </thead>
                    <tbody class="text-sm-center">

                    @foreach($evaluation as $eval)

                        <tr>


                            <td> {{$eval->date}}</td>
                            <td>{{$eval->evaluation}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>


                <form id="messages">

                @csrf
                <!-- Modal: modalPoll -->

                    <div class="modal fade" id="modalPoll-1" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog" role="document">

                            <div class="modal-content ">
                                <!--Header-->

                                <div  class="bg-dark" style="text-align:center;">
                                    <button style="color: white ;padding: 20px; " type="button" class="close "
                                            onclick="location.reload()" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>

                                    </button>
                                    <h4 style="color:white;">{{$teacher}}</h4>

                                </div>

                                <!--Body-->
                                <div class="modal-body" id="scr" style="overflow: auto; height: 400px; ">
                                    <div class="nowa" id="bm">

                                        @foreach($messages as $message)
                                            @if($message->fromId==$id||$message->toId==$id)
                                                @if($message->fromRole==4)

                                                    <div class="lift">
                                                        {{$message->text}}

                                                        <span class="time-left ">
                                                       {{$message->created_at->toDateString()}}
                                                    </span>
                                                    </div>

                                                @elseif($message->fromRole==2)

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
                                    <input type="hidden" name="toId" value="{{$teacherID}}">
                                    <textarea type="textMess" id="text" name="text" class="md-textarea form-control"
                                              rows="3"></textarea>
                                    <small style="width: 100%;display: block;"
                                           class="text-danger error-text textErr bg-danger text-white text-sm-center"></small>

                                </div>
                                <!--Footer-->
                                <div class="modal-footer justify-content-center">
                                    <a type="button" id="sendMessage" class="btn btn-dark waves-effect waves-light">Send
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

        </div>

    </div>








@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

    //evaluation Student
    $(document).on('click', '#sendMessage', function (e) {
        $('.textEtt').text(" ");
        $('.textErr').text(' ');
        $count = 0;
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "{{route('sendMessageS')}}",
            dataType: "json",
            data: $('#messages').serialize(),
            success: function (data) {

                if (!($.isEmptyObject(data.error))) {
                    $.each(data.error, function (key, value) {
                        console.log(key);
                        $('.textErr').text(value);
                    });
                }
                if (!($.isEmptyObject(data.done))) {

                    console.log(data.done);


                    $('.nowa').append(`<div  class="lift" id="messageNow">
                                                <span class=" time-right">Now

                                                </span>
                                            </div>`);
                    $('#messageNow').append(data.done + "</br>");
                    $('#text').val('');


                    setTimeout(function () {// wait for 5 secs(2)
                        $(".nowa").load(location.href + " .nowa>*", ""); // then reload the page.(3)
                    }, 1000)

                    window.setInterval(function () {
                        var elem = document.getElementById('scr');
                        elem.scrollTop = elem.scrollHeight;
                    });


                }

            }


        });

    });

    window.setInterval(function () {
        var elem = document.getElementById('scr');
        elem.scrollTop = elem.scrollHeight;
    });
    var doSth = function () {

        var $md = $("#scr");
        // Do something here
    };
    setInterval(doSth, 5000);

    $(document).on('click','.notification',function (e){
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "{{route('updateSeenMessageStudent')}}",
            dataType: "json",
            data:$('#editForm').serialize(),
            success: function(data) {

                if (!($.isEmptyObject(data.done))) {
                    $('#modalPoll-1').modal('show');
                }


            }


        });
    });

    $(document).on("keypress", function(e){
        if(e.which == 13) {
            $('.textEtt').text(" ");
            $('.textErr').text(' ');
            $count = 0;
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "{{route('sendMessageS')}}",
                dataType: "json",
                data: $('#messages').serialize(),
                success: function (data) {

                    if (!($.isEmptyObject(data.error))) {
                        $.each(data.error, function (key, value) {
                            console.log(key);
                            $('.textErr').text(value);
                        });
                    }
                    if (!($.isEmptyObject(data.done))) {

                        console.log(data.done);


                        $('.nowa').append(`<div  class="lift" id="messageNow">
                                                <span class=" time-right">Now

                                                </span>
                                            </div>`);
                        $('#messageNow').append(data.done + "</br>");
                        $('#text').val('');


                        setTimeout(function () {// wait for 5 secs(2)
                            $(".nowa").load(location.href + " .nowa>*", ""); // then reload the page.(3)
                        }, 1000)

                        window.setInterval(function () {
                            var elem = document.getElementById('scr');
                            elem.scrollTop = elem.scrollHeight;
                        });


                    }

                }


            });
        }
    });

    window.setInterval(function () {
        var elem = document.getElementById('scr');
        elem.scrollTop = elem.scrollHeight;
    });
    var doSth = function () {

        var $md = $("#scr");
        // Do something here
    };
</script>

@extends('layouts.app')
<title>{{__('message.kidsAcademy')}} |{{__('message.Admin')}} </title>
<style>
    .main {
        height: 100%; /* will cover the 100% of viewport */

        display: block;
        position: relative;
        padding-bottom: 100px;
        overflow: auto;
        margin-left: 250px;
        background-color: #f1f1f1;

    }

    .btn {
        cursor: pointer;
        border: 1px solid #eee;
        background-color: #8BC34A;
        padding: 13px 15px;
        color: #fff;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    .affix {
        top: 0;
        width: 100%;
        z-index: 9999 !important;
    }

    .sidenav {
        margin-top: 120px;
    }
</style>
@section('adminNav')



    <div class="modal  " id="reqStudent" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content swiper-scrollbar-lock">

                <div class="modal-header text-center ">
                    <h2 class="modal-title text-white w-100 font-weight-bold py-2"> {{__('message.add Student')}}</h2>
                </div>
                <div class="card-body">
                    <div class="alert-success"></div>
                    <form id="stureq">
                    {{ csrf_field() }}

                    <!--first name -->
                        <div class="form-group row justify-content-center ">
                            <div class="col-md-6">
                                <input onchange="CheckArabicOnly(this);"
                                       onkeypress="CheckArabicOnly(this);"
                                       onkeyup="CheckArabicOnly(this);"
                                       onpaste="CheckArabicOnly(this);" id="firstNames"
                                       type="text" class="form-control"
                                       placeholder="الاسم الاول" name="firstName"
                                       value="{{ old('firstName') }}">
                                <small class="text-danger error-text firstName_err"></small>
                            </div>
                        </div>
                        <!--Second name-->
                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <input onchange="CheckArabicOnly(this);"
                                       onkeypress="CheckArabicOnly(this);"
                                       onkeyup="CheckArabicOnly(this);"
                                       onpaste="CheckArabicOnly(this);" id="secondNames"
                                       type="text" class="form-control"
                                       placeholder="الاسم الثاني" name="secondName">
                                <small class="text-danger error-text secondName_err"></small>
                            </div>
                        </div>
                        <!--third  name-->
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input onchange="CheckArabicOnly(this);"
                                       onkeypress="CheckArabicOnly(this);"
                                       onkeyup="CheckArabicOnly(this);"
                                       onpaste="CheckArabicOnly(this);" id="thirdNames"
                                       type="text" class="form-control "
                                       placeholder="الاسم الثالث" name="thirdName">
                                <smal class="text-danger error-text thirdName_err"></smal>
                            </div>
                        </div>

                        <!--Last name-->
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input onchange="CheckArabicOnly(this);"
                                       onkeypress="CheckArabicOnly(this);"
                                       onkeyup="CheckArabicOnly(this);"
                                       onpaste="CheckArabicOnly(this);" id="lastNames"
                                       type="text" class="form-control"
                                       placeholder="الاسم الرابع" name="lastName" required>
                                <small class="text-danger error-text lastName_err"></small>
                            </div>
                        </div>
                        <!--Gnder name-->
                        <div class="form-group row justify-content-center">

                            <div class="col-md-6">
                                <div>
                                    <input type="radio" id="gender" name="gender"
                                           value="أنثى"/>أنثى
                                    <input type="radio" id="gender" name="gender"
                                           value="ذكر"/>ذكر
                                </div>
                                <small class="text-danger error-text gender_err"></small>
                            </div>
                        </div>
                        <!--identification-->
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="identifications" type="text" class="form-control"
                                       placeholder="رقم الهويه" name="identification">
                                <smal class="text-danger error-text identification_err"></smal>
                            </div>
                        </div>
                        <!--Birth date-->
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control"
                                       placeholder="تاريخ الميلاد" name="birthday">
                                <smal class="text-danger error-text birthday_err"></smal>
                                <small class="text-danger error-text errorDate"></small>
                            </div>
                        </div>

                        <!--phone-->
                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <input id="phones" type="text" class="form-control"
                                       placeholder="رقم الهاتف" name="phone">
                                <small class="text-danger error-text phone_err"></small>
                            </div>
                        </div>
                        <!--phone-->
                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <input id="installments" type="text" class="form-control"
                                       placeholder="الاقــــســـاط" name="installments">
                                <small class="text-danger error-text installments_err"></small>
                                <small class="text-danger error-text errorinstallments"></small>

                            </div>
                        </div>
                        <!--address-->
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control"
                                       placeholder="العنوان" name="address">
                                <small class="text-danger error-text address_err"></small>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">

                            <div class="col-md-6">
                                <select id="branch_id" class="form-control" name="branch_id"
                                        value="{{ old('branch_id') }}">
                                    <option disabled selected>{{__('message.branch')}}</option>
                                    @foreach($bra as $branch)
                                        <option value={{$branch->id}}>
                                            @if($branch->classroom=='kg1')
                                                بستان
                                            @else تمهيدي
                                            @endif
                                            : {{$branch->name}}</option>
                                    @endforeach

                                </select>
                                <small class="text-danger error-text branch_id_err"></small>
                            </div>


                        </div>


                        <div class="modal-footer justify-content-center">
                            <button onClick="document.location.reload(true)" type="button"
                                    class="btn  btn-outline-dark waves-effect"
                                    data-bs-dismiss="modal">{{ __('message.close') }}</button>
                            <button id="addStudent" type="submit"
                                    class="btn  btn-outline-dark waves-effect"> {{__('message.add')}}</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@stop

<div id="mySidenav" class="sidenav  ">

    <a href="adminpage"><i class="fa fa-fw fa-home"></i>{{__('message.Admin Page')}}</a>
    <a href="/Classrooms"><i class='fa fa-fw fa-add'></i>{{__('message.classrooms')}}</a>

<!--  <a href="#clients"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{__('message.Students')}}</a> -->
    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark "> <i
            class="fa fa-fw fa-user"></i> {{__('message.Students')}}</a>

    <ul class="collapse list-unstyled " id="pageSubmenu">
        <li>
            <button class="btn btn-outline-success"
                    data-bs-toggle="modal" data-bs-target="#reqStudent">
                <i class='fa fa-fw fa-user-plus'></i>
                {{__('message.add Student')}}
            </button>


        </li>
        <li>
            <a href="firstS">{{__('message.First')}}</a>
        </li>
        <li>
            <a href="secondS">{{__('message.Second')}}</a>
        </li>

    </ul>

    <a href="Teachers"><i class="fa fa-fw fa-user"></i> {{__('message.teachers')}}</a>

    <a href="attendanceStudent"><i class="fa fa-file-text-o"></i> {{__('message.Absence')}}</a>

    <a href="#pageSubmenueval" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark ">
        <i class="fa fa-file-text-o"></i>{{__('message.evaluation')}}</a>

    <ul class="collapse list-unstyled " id="pageSubmenueval">
        <li>
            <a href="{{route('evaluationStudent','kg1')}}">{{__('message.First')}}</a>
        </li>
        <li>
            <a href="{{route('evaluationStudent','kg2')}}">{{__('message.Second')}}</a>
        </li>

    </ul>

    <a href="#pagereport" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark ">
        <i class="fa fa-file-text-o"></i>{{__('message.Report')}}</a>

    <ul class="collapse list-unstyled " id="pagereport">
        <li>
            <a href="{{route('report','1')}}">{{__('message.teachers')}}</a>
        </li>
        <li>
            <a href="{{route('report','2')}}">{{__('message.all students')}}</a>
        </li>

    </ul>


</div>




@section('content')

    <div id="main" class="main border">

        <!--Reset Password Modal-->
        <div class="modal  " id="resetPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content swiper-scrollbar-lock">

                    <div class="modal-header text-center bg-dark">
                        <h2 class="modal-title text-dark w-100 font-weight-bold py-2"> {{__('message.reset password')}}
                            !</h2>

                    </div>
                    <div class="card-body  ">

                        <form id="resetForm">
                            {{ csrf_field() }}
                            <span style="width: 100%;display: block;"
                                  class="text-white bg-success text-center done"></span>
                            <br>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" name="userid" id="userid" placeholder="{{__('message.user Id')}}"
                                           class="form-control ">
                                    <span class="text-danger error-text userid_err"></span>
                                    <span class="text-danger error-text errorID_err"></span>


                                </div>
                            </div>

                            <div class="form-group row  justify-content-center">
                                <div class="col-md-6">
                                    <input type="password" name="password" id="password"
                                           placeholder="{{__('message.Password')}}" class="form-control ">
                                    <span class="text-danger error-text password_err"></span>
                                    <span class="text-danger error-text  passErr_err"></span>

                                </div>
                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                           class="form-control password_confirmation" name="password_confirmation"
                                           placeholder="{{ __('message.Confirm Password') }}"
                                           required autocomplete="new-password">
                                    <small class="text-danger error-text password_confirmation_err"></small>
                                </div>


                            </div>


                            <div class="modal-footer justify-content-center">
                                <button type="button"
                                        class="btn  btn-outline-dark waves-effect"
                                        data-bs-dismiss="modal">{{ __('message.close') }}</button>
                                <button type="submit" id="reset"
                                        class="btn  btn-outline-dark waves-effect"> {{ __('message.reset') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @yield('student')
        @yield('first')
        @yield('second')
        @yield('salary')
        @yield('section')
        @yield('teachers')
        @yield('Attendance')
        @yield('adminpage')
        @yield('att')


    </div>




@stop


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script>
    $(document).on('click', '#addStudent', function (e) {
        e.preventDefault();

        var optionSelected2 = $('#studyLevel').find("option:selected");
        var optionSelected3 = $('#branch_id').find("option:selected");
        var branch_id=optionSelected3.val();
        var studyLevel = optionSelected2.val();
        $('.firstName_err').text(" ");
        $('.secondName_err').text(" ");
        $('.thirdName_err').text(" ");
        $('.lastName_err').text(" ");
        $('.identification_err').text(" ");
        $('.gender_err').text(" ");
        $('.address_err').text(" ");
        $('.installments_err').text(" ");
        $('.branch_id_err').text(" ");
        $('.uniqueSL').text(" ");
        $('.phone_err').text(" ");
        $('.errorDate').text(" ")


        $.ajax({
            type: 'post',
            url: "{{route('storeAjax')}}",
            data: {
                '_token': $("input[name='_token']").val(),
                'firstName': $("input[name='firstName']").val(),
                'secondName': $("input[name='secondName']").val(),
                'thirdName': $("input[name='thirdName']").val(),
                'lastName': $("input[name='lastName']").val(),
                'identification': $("input[name='identification']").val(),
                'gender': $("input[name='gender']:checked").val(),
                'birthday': $("input[name='birthday']").val(),
                'address': $("input[name='address']").val(),
                'phone': $("input[name='phone']").val(),
                'installments': $("input[name='installments']").val(),
                'branch_id':branch_id,
            },
            success: function (data) {
                if(!$.isEmptyObject(data.errorinstallments)){
                    $('.errorinstallments').text(data.errorinstallments);
                }else
                if(!$.isEmptyObject(data.errorDate)){
                    $('.errorDate').text(data.errorDate);
                }else{if (!$.isEmptyObject(data.errid)) {
                    $('.identification_err').text(data.errid);
                } else if (!$.isEmptyObject(data.status)) {
                    $(document).ajaxSuccess(function (event, request, settings) {

                     //   $(".alert-success").append("<li style='list-style-type: none;' class='alert alert-success'>{{__('message.Successful Request')}}</li>");
                        //  setInterval(function () {
                        //      location.reload();
                        //   }, 3000)

                    });
                    $("input[name='firstName']").val(" ");
                    $("input[name='secondName']").val(" ");
                    $("input[name='thirdName']").val(" ");
                    $("input[name='lastName']").val(" ");
                    $("input[name='identification']").val(" ");
                    $("input[name='phone']").val(" ");
                    $("input[name='installments]").val(" ");


                } else {
                    printErrorMsg(data.error);
                }}


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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script>
    $(document).on('click', '#reset', function (e) {
        e.preventDefault();


        $('.userid_err').text(" ");

        $('.password_err').text(" ");

        $('.passErr_err').text(" ");
        $('.errorID_err').text(" ");
        $('.done').text(" ");


        $.ajax({
            type: 'post',
            url: "{{route('resetPassword')}}",
            dataType: "json",
            data: $('#resetForm').serialize(),
            success: function (data) {
                if (!$.isEmptyObject(data.error)) {
                    printErrorMsg(data.error);
                }
                if (!$.isEmptyObject(data.errorID)) {
                    $('.errorID_err').text(data.errorID);
                }
                if (!$.isEmptyObject(data.passErr)) {
                    $('.passErr_err').text(data.passErr);
                }
                if (!$.isEmptyObject(data.done)) {
                    $('#userid').val("");

                    $('#password').val("");

                    $('.password_confirmation').val("");

                    $('.done').text(data.done);

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

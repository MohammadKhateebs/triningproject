@extends('admin')
<style>

    .main {

        height: 100%; /* will cover the 100% of viewport */

        display: block;
        position: relative;
        padding-bottom: 100px;
        overflow: auto;
        background-color: #f1f1f1;
    }
</style>
@section('teachers')

    <div class="container  main shadow">
        <a href="Bin/2" class="btn btn-outline-danger py-5 ">
            <i style="size: 50px"class="fa fa-trash-o"></i>{{ __('message.recycle') }}
        </a>

        <div class="float-md-right py-2">
            <button type="button" type="button" class="btn btn-outline-success py-5" data-bs-toggle="modal"
                    data-bs-target="#addTeacher"><i class="fa fa-fw fa-user-plus"></i> {{ __('message.add teacher') }}
            </button>
            <a type="button" type="button" class="btn btn-outline-success py-5"
               href="absenceTeacher"> {{ __('message.enter') }} {{ __('message.absence') }}</a>
            <a type="button" type="button" class="btn btn-outline-success py-5"
               href="/ShowAbsenceTeacher"> {{ __('message.show') }} {{ __('message.absence') }}</a>
            <a type="button" type="button" class="btn btn-outline-success py-5"
               href="/salariesTeacher"> {{ __('message.salaries') }} </a>


        </div>


        <div class="modal  " id="addTeacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content swiper-scrollbar-lock">

                    <div class="modal-header text-center bg-dark">
                        <h2 class="modal-title text-white w-100 font-weight-bold py-2"> {{__('message.add teacher')}}
                            !</h2>

                    </div>


                    <div class="card-body  ">

                        <form id="createTeacher">
                            {{ csrf_field() }}

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" placeholder="{{__('message.name')}}"
                                           class="form-control ">
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                            </div>

                            <div class="form-group row  justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" name="identification" id="identification"
                                           placeholder="{{__('message.Identification')}}" class="form-control ">
                                    <span class="text-danger error-text identification_err"></span>
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" name="phone" id="phone" placeholder="{{__('message.Phone')}}"
                                           class="form-control ">
                                    <span class="text-danger error-text phone_err"></span>
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <div class="col-md-6">
                                    <select id="educationLevel" class="form-control" name="educationLevel"
                                            value="{{ old('educationLevel') }}">
                                        <option disabled selected>{{__('message.educationLevel')}}</option>
                                        <option value="ثانويه عامه">ثانويه عامه</option>
                                        <option value="دبلوم">دبلوم</option>
                                        <option value="بكالوريوس">بكالوريوس</option>
                                        <option value="دبلوم عالي">دبلوم عالي</option>
                                        <option value="ماجستير">ماجستير</option>
                                        <option value="غيرذلك">غيرذلك</option>
                                    </select>
                                    <span class="text-danger error-text educationLevel_err"></span>
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" name="salary" id="salary"
                                           placeholder="{{__('message.salary')}}" class="form-control ">
                                    <span class="text-danger error-text salary_err"></span>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">

                                <div class="col-md-6">
                                    <select id="branch_id" class="form-control" name="branch_id"
                                            value="{{ old('branch_id') }}">
                                        <option disabled selected>{{__('message.branch')}}</option>
                                        @foreach($bra as $branch)
                                            <option value={{$branch->id}}>@if($branch->classroom=='kg1')بستان @elseتمهيدي @endif
                                                : {{$branch->name}}</option>
                                        @endforeach

                                    </select>
                                    <span  class="text-danger error-text uniqueSL"></span>
                                    <span  class="text-danger error-text branch_id_err"></span>
                                </div>

                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col-md-6">
                                    <input type="password" class="form-control"
                                           placeholder="{{ __('message.Password') }}" name="password">

                                    <small class="text-danger error-text password_err"> </small>
                                </div>

                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col-md-6">
                                    <input type="password" name="password_confirm" class="form-control"
                                           placeholder="{{ __('message.Confirm Password') }}">
                                </div>
                            </div>

                            <div class="modal-footer justify-content-center">
                                <button id="saveadd" class="btn btn-primary">{{__('message.add')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
            <thead class="bg-success text-white">
            <tr>

                <th scope="col">{{__('message.name')}}</th>
                <th scope="col">{{__('message.Identification')}}</th>
                <th scope="col">{{__('message.educationLevel')}}</th>
                <th scope="col">{{__('message.salary')}}</th>
                <th scope="col">{{__( 'message.branch')}}</th>
                <th scope="col">{{__('message.Phone')}}</th>
                <th scope="col">{{__('message.active')}}</th>
                <th scope="col">{{__('message.delete')}}</th>


            </tr>
            </thead>
            <tbody>

            @foreach ($Teachers   as $teacher)

                <tr>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->identification}}</td>
                    <td>{{$teacher->educationLevel}}</td>
                    <td>{{$teacher->salary}}</td>
                    <td>
                        @if($teacher->branch_id==Null&&$teacher->delete==0)
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#edit{{$teacher->identification}}"> <i class="fa fa-edit"></i> {{__('message.edit')}}</button>
                            <div class="modal  " id="edit{{$teacher->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content swiper-scrollbar-lock">

                                        <div class="modal-header text-center ">
                                            <h2 class="modal-title text-white w-100 font-weight-bold py-2">تحديد شعبة للاشراف عليها</h2>

                                        </div>
                                            <div class="card-body   ">
                                                <div class="alert-success"></div>
                                                <form id="updatebranch">
                                                    {{ csrf_field() }}
                                                    <div class="form-group row justify-content-center">
                                                        <div class="col-md-6" id="otherAddressS" >
                                                            <input type="hidden" name="id" value="{{$teacher->identification}}">
                                                            <select id="branch_id" class="form-control" name="branch_id"
                                                                    value="{{ old('branch_id') }}">
                                                                <option disabled selected>{{__('message.branch')}}</option>
                                                                @foreach($bra as $branch)
                                                                    <option value={{$branch->id}}>@if($branch->classroom=='kg1')بستان @elseتمهيدي @endif
                                                                        : {{$branch->name}}</option>

                                                                @endforeach

                                                            </select>
                                                            <div>
                                                                <small class="text-danger error-text receipt_err"></small>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <small class="text-danger error-text error_receipt"></small>



                                                    <div class="modal-footer justify-content-center">
                                                        <button onClick="document.location.reload(true)" type="button"
                                                                class="btn  btn-outline-dark waves-effect"
                                                                data-bs-dismiss="modal">{{ __('message.close') }}</button>
                                                        <button id="update" type="submit"
                                                                class="btn  btn-outline-dark waves-effect"> {{__('message.update')}}</button>

                                                    </div>

                                                </form>
                                            </div>
                                    </div>

                                </div>
                            </div>


                        @else
                    @foreach($bra as $branch)
                        @if($branch->id==$teacher->branch_id)
                            @if($branch->classroom=='kg1')بستان @elseتمهيدي @endif , {{$branch->name}}
                            @endif
                    @endforeach
                        @endif
                        </td>
                    <td>{{$teacher->phone}}</td>

                    @if($teacher->delete==0)
                        <td><i style="color: #2fa360" class="fa fa-circle"></i>{{__('message.active')}}</td>
                    @else
                        <td><i style="color: red" class="fa fa-circle"></i>{{__('message.inactive')}}</td>

                        @endif



                    <td>
                        @if($teacher->delete==0)
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#Modal2{{$teacher->identification}}"><i
                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>
                            @endif
                    </td>

                </tr>
                <!-- Modal2 -->
                <div class="modal fade" id="Modal2{{$teacher->identification}}" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header text-center bg-danger">
                                <h2 class="modal-title text-white w-100 font-weight-bold py-2">{{__('message.delete')}}
                                    !</h2>

                            </div>
                            <div class="modal-body ">
                                <div class="md-form mb-5 text-center">
                                    <h3 class="modal-title text-break w-100 font-weight-bold py-2">هل تريد حذف هذا
                                        المدرس؟</h3>
                                    <br>
                                    <h5> {{ $teacher->identification }}:{{$teacher->name}}  </h5>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-outline-danger waves-effect"
                                        data-bs-dismiss="modal"><i class="fa fa-remove"></i></button>
                                <a class="btn  btn-outline-success waves-effect"
                                   href="{{url('deleteTeacher/'.$teacher->identification)}}"><i class="fa fa-check"></i></a>
                            </div>

                        </div>
                    </div>
                </div>



            @endforeach
            </tbody>
        </table>
    </div>
@stop




<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

@foreach ($Teachers   as $teacher)
    @if($teacher->branch_id==Null)
<script>

    $(document).on('click', '#update', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "{{route('updateBranch')}}",
            dataType: "json",
            data: $('#updatebranch').serialize(),

            success: function (data) {
                if (!$.isEmptyObject(data.error)) {
                    printErrorMsg(data.error);
                } if(!$.isEmptyObject(data.error_receipt)){
                    $('.error_receipt').text(data.error_receipt);
                }


                if (!($.isEmptyObject(data.successes))) {

                    location.reload();



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
</script>
    @endif @endforeach
<script>
    $(document).on('click', '#saveadd', function (e) {
        e.preventDefault();
        $('.name_err').text(" ");
        $('.identification_err').text(" ");
        $('.phone_err').text(" ");
        $('.educationLevel_err').text(" ")
        $('.branch_id_err').text(" ");
        $('.password_err').text(" ");
        $('.salary_err').text(" ");
        $('.uniqueSL').text(" ");
        $.ajax({
            type: 'post',
            url: "{{route('addteacher')}}",
            dataType: "json",
            data: $('#createTeacher').serialize(),
            success: function (data) {
                if (!$.isEmptyObject(data.errconfirm)) {
                    $('.password_err').text(data.errconfirm);
                } else if (!$.isEmptyObject(data.errid))
                    $('.identification_err').text(data.errid)
                else {
                    if ($.isEmptyObject(data.error) && $.isEmptyObject(data.uniqueSL)) {
                        location.reload();

                    } else if (!$.isEmptyObject(data.error)) {
                        printErrorMsg(data.error);
                    }
                    if (!$.isEmptyObject(data.uniqueSL)) {
                        $('.uniqueSL').text(data.uniqueSL);
                    }
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


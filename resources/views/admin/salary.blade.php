@extends('layouts.app')
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
@section('content')

    <div class="d-flex align-items-start" style="margin: 30px;">
        <div class="back">
            <a type="button" type="button" class="btn btn-outline-success " href="/Teachers"><i
                        class="fa fa-arrow-left"></i>
                {{ __('message.back') }}</a>
        </div>
    </div>
    <div class="container shadow main overflow-auto">
        <div class="text-md-center">
            <h3 class="text-white bg-success ">{{__('message.salary')}}</h3>
        </div>

        <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
            <thead class="bg-dark text-white">
            <tr>

                <th scope="col">{{__('message.term')}}</th>
                <th scope="col">{{__('message.month')}}</th>
                <th scope="col">{{__('message.salary')}}</th>

            </tr>
            </thead>

            <tbody>
            <tr>
                    @foreach($salaries as $s)
                        @if($s->teacher_id==$id)
                            <td>
                                {{$s->term}}
                            </td>
                            <td>
                                {{$s->month}}
                            </td>
                            <td>
                                {{$s->salary}}
                            </td>
            </tr>

            </tbody>
            @endif
            @endforeach
        </table>

        <button class="nav-link" id="add{{$id}}" data-bs-toggle="modal"
                data-bs-target="#addSalary{{$id}}" type="button" role="tab"
                aria-controls="pills-contact{{$id}}" aria-selected="false">
            {{__('message.add')}} {{__('message.salary')}}</button>
    </div>
    <div class="modal fade" id="addSalary{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addSalaryTeacher">
                    <div class="modal-header text-sm-center">
                        <h6 class="text-white"> اضافه راتب ل
                        </h6>
                        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}
                        <input type="hidden" name="teacher_id" value="{{$id}}">

                        <div class="form-group row  justify-content-center">
                            <div class="col-md-6">
                                <select id="term" class="form-control" name="term" value="{{ old('term') }}">
                                    <option disabled selected>{{__('message.term')}}</option>
                                    <option value="1">الاول</option>
                                    <option value="2">الثاني</option>
                                </select>
                                <span class="text-danger error-text term_err"></span>
                            </div>
                        </div>
                        <div class="form-group row  justify-content-center">
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
                        <div class="form-group row  justify-content-center">
                            <div class="col-md-6">
                                <input type="text" name="salary" id="salary" placeholder="{{__('message.salary')}}"
                                       class="form-control ">
                                <span class="text-danger error-text salary_err"></span>
                            </div>

                        </div>
                        <span class="text-danger error-text error_sal_err"></span>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        <button id="saveSalary" class="btn btn-success">{{__('message.add')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
@stop

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script>
    $(document).on('click', '#saveSalary', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "{{route('addSalaryTeacher')}}",
            dataType: "json",
            data: $('#addSalaryTeacher').serialize(),

            success: function (data) {

                if (!($.isEmptyObject(data.error))) {
                    printErrorMsg(data.error);
                }

                if (!($.isEmptyObject(data.error_sal))) {
                    printnunvalue(data.error_sal);
                }


                if (!($.isEmptyObject(data.successes))) {
                    $(".alert-success").append("<li style='list-style-type: none;' class='alert alert-success'>{{__('message.Attendance and absence were successfully taken')}}</li>");
                    setInterval(function () {
                        location.reload();
                    }, 1000)


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
            $('.error_sal_err').text(msg);
        }

    });
</script>


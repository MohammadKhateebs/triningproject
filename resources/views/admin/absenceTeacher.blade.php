@extends('admin')
<style>

    .main{

        height: 100%; /* will cover the 100% of viewport */

        display: block;
        position: relative;
        padding-bottom: 100px;
        overflow: auto;
        background-color: #f1f1f1;
    }
</style>
@section('teachers')
    <div class="d-flex align-items-start">
        <div class="back">
            <a  type="button"  type="button" class="btn btn-outline-success " href="Teachers"><i class="fa fa-arrow-left"></i>
                {{ __('message.back') }}</a>
        </div>
        <div class="container  main shadow">

            <form id="myFormTeacher">
                @csrf
                <h1 class="text-md-center text-light bg-success"><i
                        class="fa fa-file-text-o"></i> {{__('message.absence')}} {{__('message.for Teacher')}}
                </h1>
                <small style="width: 100%;display: block;"
                       class="text-danger nunValue bg-danger text-white text-sm-center text-white"></small>
                <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                    <thead class="bg-success text-white">
                    <tr>
                        <th scope="col">{{__('message.Identification')}}</th>
                        <th scope="col">{{__('message.name')}}</th>
                        <th scope="col">{{__('message.branch')}}</th>
                        <th scope="col">{{__('message.Absence')}}</th>
                    </tr>
                    </thead>




                    <input style="width: 100%;display: block;" type="date" name="date">
                    <small style="width: 100%;display: block;"
                           class="text-danger error-text date_err bg-danger text-white text-sm-center"></small>

                    <tbody>
                    @foreach($teacher as $t)
                        <tr>

                            <td> {{$t->identification}} </td>
                            <td> {{$t->name}}</td>
                            @foreach($bra as $branch)
                                @if($branch->id==$t->branch_id)
                                    <td>{{$branch->classroom}} , {{$branch->name}}</td>
                                @endif
                            @endforeach
                            <td>

                                <input class="form-check-input" type="checkbox" id="absence" name="absence[]"
                                       value="{{$t->identification}}">

                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <button style="width: 100%;display: block;" type="submit" id="saveAbsTeacher"
                        class="btn btn-outline-success justify-content-center">{{__('message.save')}}</button>

            </form>


        </div>
    </div>

@stop




<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script>
    $(document).on('click', '#saveAbsTeacher', function (e) {
        e.preventDefault();
        var idss = $('#absence').val();
        $('.nunValue').text(" ");
        $('.data_err').text(" ");


        $.ajax({
            type: 'post',
            url: "{{route('absenceTeacher')}}",
            dataType: "json",
            data: $('#myFormTeacher').serialize(),

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
</script>


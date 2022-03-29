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
        @if(Session::has('fail'))
            <div class="alert alert-danger text-md-right" role="alert">
                {{Session::get('fail') }}
            </div>

        @endif
        <div class="float-md-right py-2">
            <button type="button" type="button" class="btn btn-outline-success py-3" data-bs-toggle="modal"
                    data-bs-target="#addBranch">
                <i class="fa fa-fw fa-user-plus "></i> اضافة شعبة </button>
            <a href="Bin/1" class="btn btn-outline-danger py-3 float-lg-left">
                <i style="size: 50px" class="fa fa-trash-o"></i>سلة المحذوفات</a>
        </div>
        <div class="modal  " id="addBranch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content swiper-scrollbar-lock">

                    <div class="modal-header text-center bg-dark">
                        <h2 class="modal-title text-white w-100 font-weight-bold py-2">  !اضافة شعبة
                            </h2>

                    </div>
                    <div class="card-body  ">
                        <form id="createTeacher">
                            {{ csrf_field() }}
                            <span class="text-danger error-text error_err"></span>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" placeholder="الاسم"
                                           class="form-control ">
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                            </div>

                            <div class="form-group row  justify-content-center">
                                <div class="col-md-6">
                                    <select id="classroom" class="form-control" name="classroom">
                                        <option disabled selected>الصف</option>
                                        <option value="kg1">بستان</option>
                                        <option value="kg2">تمهيدي</option>
                                    </select>
                                    <span class="text-danger error-text classroom_err"></span>
                                </div>
                            </div>

                            <div class="modal-footer justify-content-center">
                                <button id="addNewBranch" class="btn btn-primary">اضافه</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table  table-striped table-hover" id="tblData" border='1' cellpadding='1'
               style="box-shadow: 5px 10px #888888;">
            <thead class="bg-success text-white">
            <tr>

                <th></th>
                <th></th>
                <th class="bg-success text-white justify-content-center">
                    <h1> بستان</h1>
                </th>

                <th></th>
            </tr>
            <tr>
                <th scope="col">اسم الشعبة</th>
                <th scope="col">عدد الطلاب</th>
                <th scope="col">مشرف الشعبة</th>
                <th scope="col"> حذف</th>
            </tr>
            </thead>
            <tbody>


                @foreach ($classrooms as $class)<tr>
                    @if($class->classroom=='kg1')

                        <td>{{$class->name}}</td>
                        <p style="visibility: hidden">{{$n=0}}</p>
                        @foreach($student as $s)
                            @if($s->branch_id==$class->id)
                                <p style="visibility: hidden">{{$n+=1}}</p>
                            @endif
                        @endforeach
                        <td>{{$n}}</td>
                        <td> @foreach($teachers as $t)
                                @if($t->branch_id==$class->id)
                                    {{$t->name}}
                                @endif
                            @endforeach</td>
                        <td>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#Modal2{{$class->id}}"><i
                                    class="fa fa-user-times"></i> حذف</button>
                        </td>

                        <!-- Modal2 -->
                        <div class="modal fade" id="Modal2{{$class->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header text-center bg-danger">
                                        <h2 class="modal-title text-white w-100 font-weight-bold py-2">!حذف</h2>

                                    </div>
                                    <div class="modal-body ">
                                        <div class="md-form mb-5 text-center">
                                            <h3 class="modal-title text-break w-100 font-weight-bold py-2">هل تريد حذف هذه الشعبه؟</h3>
                                            <br>
                                            <h5> {{$class->id}}: {{$class->name}}  </h5>


                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn  btn-outline-danger waves-effect"
                                                data-bs-dismiss="modal"><i class="fa fa-remove"></i></button>
                                        <a class="btn  btn-outline-success waves-effect"
                                           href="{{url('deleteClassroom/'.$class->id)}}"><i class="fa fa-check"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endif
                </tr>  @endforeach

            </tbody>
        </table>

        <table class="table  table-striped table-hover" id="tblData" border='1' cellpadding='1'
               style="box-shadow: 5px 10px #888888;">
            <thead class="bg-success text-white">
            <tr>

                <th></th>
                <th></th>
                <th class="bg-success text-white justify-content-center">
                    <h1> تمهيدي</h1>
                </th>
                <th></th>


            </tr>
            <tr>
                <th scope="col">اسم الشعبة</th>
                <th scope="col">عدد الطلاب</th>
                <th scope="col">مشرف الشعبة</th>
                <th scope="col"> حذف</th>


            </tr>

            </thead>
            <tbody>


                @foreach ($classrooms as $class) <tr>
                    @if($class->classroom=='kg2')

                        <td>{{$class->name}}</td>
                        <p style="visibility: hidden">{{$n=0}}</p>
                        @foreach($student as $s)
                            @if($s->branch_id==$class->id)
                                <p style="visibility: hidden">{{$n+=1}}</p>
                            @endif
                        @endforeach
                        <td>{{$n}}</td>
                        <td> @foreach($teachers as $t)
                                @if($t->branch_id==$class->id)
                                    {{$t->name}}
                                @endif
                            @endforeach</td>

                        <td>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#Modal2{{$class->id}}"><i
                                    class="fa fa-user-times"></i>حذف</button>
                        </td>
                        <!-- Modal2 -->
                        <div class="modal fade" id="Modal2{{$class->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header text-center bg-danger">
                                        <h2 class="modal-title text-white w-100 font-weight-bold py-2">!حذف</h2>

                                    </div>
                                    <div class="modal-body ">
                                        <div class="md-form mb-5 text-center">
                                            <h3 class="modal-title text-break w-100 font-weight-bold py-2">هل تريد حذف هذه الشعبه؟</h3>
                                            <br>
                                            <h5> {{$class->id}}: {{$class->name}}  </h5>


                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn  btn-outline-danger waves-effect"
                                                data-bs-dismiss="modal"><i class="fa fa-remove"></i></button>
                                        <a class="btn  btn-outline-success waves-effect"
                                           href="{{url('deleteClassroom/'.$class->id)}}"><i class="fa fa-check"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                </tr> @endforeach

            </tbody>
        </table>

    </div>
@stop




<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script>
    $(document).on('click', '#addNewBranch', function (e) {
        e.preventDefault();
        $('.name_err').text(" ");
        $('.classroom_err').text(" ");
        $.ajax({
            type: 'post',
            url: "{{route('addNewBranch')}}",
            dataType: "json",
            data: $('#createTeacher').serialize(),
            success: function (data) {
                if (!$.isEmptyObject(data.errorClassRoom)) {
                    $('.error_err').text(data.errorClassRoom);
                }
                else {
                    if ($.isEmptyObject(data.error) && $.isEmptyObject(data.errorClassRoom)) {
                        location.reload();

                    } else if (!$.isEmptyObject(data.error)) {
                        printErrorMsg(data.error);
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


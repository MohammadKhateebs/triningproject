@extends('admin')

@section('teachers')
    <div class="container main shadow">
        <div class="shadow">
            <div>
        <h1 class="bg-success text-white text-md-center">تمهيدي
        </h1></div>
        @foreach ($section as $sect)
            @if($sect->classroom=='kg2')
                <div class="float-lg-right">
                <a href="{{route('section2',$sect->id)}}"  style="font-size: 24px; width:100px; height: 100px; "
                   class="btn bg-success sect justify-content-center">
                    <i class="fa fa-users  text-white" style="width: 20px;height: 20px;">
                    </i>
                    <hr>
                    {{$sect->name}}</a>
                </div>
            @endif
        @endforeach
    </div>
        <br>
        <div>
        @if(count($Students)>0)
                <table class="table  table-striped table-hover" id="tblData" border='1' cellpadding='1'
                       style="box-shadow: 5px 10px #888888;">
                    <thead class="bg-success text-white">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h3>
                                الطلاب من السنة السابقة
                            </h3></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>


                    </tr>
                    <tr>
                        <th scope="col">{{__('message.First Name')}}</th>
                        <th scope="col">{{__('message.Second Name')}}</th>
                        <th scope="col">{{__('message.Third Name')}}</th>
                        <th scope="col">{{__('message.Last Name')}}</th>
                        <th scope="col">{{__('message.Identification')}}</th>
                        <th scope="col">{{__('message.Gender')}}</th>
                        <th scope="col">{{__('message.Birthday')}}</th>
                        <th scope="col">{{__('message.Phone')}}</th>
                        <th scope="col">{{__('message.address')}}</th>
                        <th scope="col">{{__('message.JoinDate')}}</th>
                        <th scope="col">{{__('message.active')}}</th>
                        <th scope="col">{{__('message.delete')}}</th>
                        <th scope="col">{{__('message.editeforrecovery')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($Students  as $student)
                            <td>{{$student->firstName}}</td>
                            <td>{{$student->secondName}}</td>
                            <td>{{$student->thirdName}}</td>
                            <td>{{$student->lastName}}</td>
                            <td>{{$student->identification}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->birthday}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->address}}</td>
                            <td>{{ $student->created_at->format('Y-m-d') }}</td>
                            <td><i style="color: red" class="fa fa-circle"></i>{{__('message.inactive')}}</td>
                            <td> <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                         data-bs-target="#Modal2{{$student->identification}}"><i
                                        class="fa fa-user-times"></i>حذف</button>
                            </td>
                            <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#edit{{$student->identification}}">
                                    <i class="fa fa-edit"></i> تعديل</button></td>

                    </tr>
                    <!-- Modal2 -->
                    <div class="modal fade" id="Modal2{{$student->identification}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header text-center bg-danger">
                                    <h2 class="modal-title text-white w-100 font-weight-bold py-2">!حذف</h2>

                                </div>
                                <div class="modal-body ">
                                    <div class="md-form mb-5 text-center">
                                        <h3 class="modal-title text-break w-100 font-weight-bold py-2">هل تريد حذف هذا الطالب؟</h3>
                                        <br>
                                        <h5> {{$student->identification}}: {{$student->firstName}} {{$student->lasttName}} </h5>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn  btn-outline-danger waves-effect"
                                            data-bs-dismiss="modal"><i class="fa fa-remove"></i></button>
                                    <a class="btn  btn-outline-success waves-effect"
                                       href="{{url('ArchiveStudent/'.$student->identification)}}"><i class="fa fa-check"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    </tbody>
                </table>




        @endif

        </div>
    </div>
@stop
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

@foreach ($Students  as $student)
    <div class="modal  " id="edit{{$student->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content swiper-scrollbar-lock">

                <div class="modal-header text-center ">
                    <h2 class="modal-title text-white w-100 font-weight-bold py-2">هل تريد الاحتفاظ ببيانات هذا الطالب؟</h2>

                </div>
                <div class="card-body   ">
                    <div class="alert-success"></div>
                    <form id="updatestudentb">
                        {{ csrf_field() }}
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6" id="otherAddressS" >
                                <input type="hidden" name="id" value="{{$student->identification}}">
                                <div class="form-group row justify-content-center"> <select id="branch_id" class="form-control" name="branch_id"
                                                                                            value="{{ old('branch_id') }}">
                                        <option disabled selected>{{__('message.branch')}}</option>
                                        @foreach($bra as $branch)
                                            @if($branch->classroom=='kg2')
                                                <option value={{$branch->id}}>@if($branch->classroom=='kg1')بستان @elseتمهيدي @endif
                                                    : {{$branch->name}}</option>
                                            @endif
                                        @endforeach

                                    </select>

                                    <small class="text-danger error-text branch_id_err"></small>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <input type="text" name="installments" class="form-control" placeholder="القسط الشهري" >
                                    <small class="text-danger error-text installments_err"></small>
                                </div>



                                <div class="modal-footer justify-content-center">
                                    <button onClick="document.location.reload(true)" type="button"
                                            class="btn  btn-outline-dark waves-effect"
                                            data-bs-dismiss="modal">{{ __('message.close') }}</button>
                                    <button id="update" type="submit"
                                            class="btn  btn-outline-dark waves-effect"> {{__('message.update')}}</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

    $(document).on('click', '#update', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "{{route('updatestudentb')}}",
            dataType: "json",
            data: $('#updatestudentb').serialize(),

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
@endforeach

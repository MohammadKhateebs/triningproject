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

    <div class="container shadow main">
        <div class="d-flex align-items-start">
            <div class="back">
                <a type="button" type="button" class="btn btn-outline-success " href="{{route('section',$ids)}}"><i
                            class="fa fa-arrow-left"></i>
                    {{ __('message.back') }}</a>
            </div>
        </div>
        <div class="text-md-center">
            <h3 class="text-white bg-success ">كشف حساب</h3>
        </div>
        <div class="container shadow">
            <div class="accordion" id="accordionPanelsStayOpenExample">

                @foreach($students as $t)
                    <div class="accordion-item">

                        <div class="accordion-body">
                            <button  class="btn-outline-success" onclick="exportTableToExcel('tblData', 'kids')"><i class="fa fa-file-excel-o" style="font-size:20px"></i></button>

                            <div class="text-md-center ">
                                <h3> {{$t->identification}} : {{$t->firstName}} {{$t->lastName}}</h3>
                            </div>
                            <table class="table  table-striped table-hover " id="tblData" style="box-shadow: 5px 10px #888888;">
                                <thead class="bg-dark text-white ">
                                <tr>

                                    <th scope="col">{{__('message.term')}}</th>
                                    <th scope="col">{{__('message.month')}}</th>
                                    <th scope="col">{{__('message.installments')}}</th>
                                    <th scope="col">{{__('message.Amount paid')}}</th>
                                    <th scope="col">{{__('message.The remaining')}}</th>
                                    <th scope="col">{{__('تاريخ اخر دفعه')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($installments as $s)

                                        <tr>
                                            <td>
                                                @if($s->term==1)الفصل الاول
                                                @elseif($s->term==2) الفصل الثاني
                                                @endif

                                            </td>
                                            <td>
                                                @if($s->month==1)الشهر الاول
                                                @elseif($s->month==2) الشهر الثاني
                                                @elseif($s->month==3)الشهر الثالث
                                                @elseif($s->month==4) الشهر الرابع
                                                @endif
                                            </td>
                                            <td>
                                                {{$t->installments}}
                                            </td>
                                            <td>
                                                @if ($t->installments - $s->receipt==0)
                                                    {{$s->receipt}}
                                                @else
                                                    {{$s->receipt}}
                                                    <button type="button" type="button" class="btn btn-outline-success "
                                                            class="btn btn-outline-success"
                                                            data-bs-toggle="modal" data-bs-target="#updateReceipt{{$s->id}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <div class="modal  " id="updateReceipt{{$s->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog ">
                                                            <div class="modal-content swiper-scrollbar-lock">

                                                                <div class="modal-header text-center ">
                                                                    <h2 class="modal-title text-white w-100 font-weight-bold py-2"> {{__('message.update Receipt')}}</h2>

                                                                </div>

                                                                @if ($t->installments - $s->receipt!=0)

                                                                <div class="card-body   ">
                                                                    <div class="alert-success"></div>
                                                                    <form id="updateReceipt">
                                                                    {{ csrf_field() }}


                                                                        <div class="form-group row justify-content-center">
                                                                            <div class="col-md-6" id="otherAddressS" >
                                                                                <input type="hidden" name="id" value="{{$s->id}}">
                                                                                <input type="hidden" name="installments" value="{{$t->installments}}">
                                                                                <input type="text" class="form-control "
                                                                                       placeholder="الدفعه الجديده" name="receipt" >
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
                                                            @endif
                                                        </div>
                                                    </div>

                                                    {{--
                                                        <a type="button" type="button" class="btn btn-outline-success " href="{{url('updateReceipt')}}"><i class="fa fa-edit"></i></a>
                                                        --}} @endif

                                            </td>
                                            <td>
                                                {{$t->installments - $s->receipt}}
                                            </td>
                                            <td>
                                                {{$s->updated_at->format('Y-m-d')}}
                                            </td>
                                        </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        @if(count($installments)<1)

                            <button class="nav-link" id="add{{$t->identification}}" data-bs-toggle="modal"
                                    data-bs-target="#addreceipt{{$t->identification}}" type="button" role="tab"
                                    aria-controls="pills-contact{{$t->identification}}" aria-selected="false">
                                {{__('message.add receipt')}}</button>

                    @elseif( ($t->installments - $s->receipt )== 0)
                            <button class="nav-link" id="add{{$t->identification}}" data-bs-toggle="modal"
                                    data-bs-target="#addreceipt{{$t->identification}}" type="button" role="tab"
                                    aria-controls="pills-contact{{$t->identification}}" aria-selected="false">
                                {{__('message.add receipt')}}</button>
                        @endif
                    </div>
                    <div class="modal fade" id="addreceipt{{$t->identification}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="addinstallment">
                                <div class="modal-header text-sm-center">
                                    <h6 class="text-white"> اضافه دفعة ل{{$t->firstName}}
                                    </h6>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                        {{ csrf_field() }}
                                        <input type="hidden" name="student_id" id="student_id" value="{{$t->identification}}">
                                        <input type="hidden" name="installments" value="{{$t->installments}}">
                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <select id="term" class="form-control" name="term"
                                                        value="{{ old('term') }}">
                                                    <option disabled selected>{{__('message.term')}}</option>
                                                    <option value="1">الاول</option>
                                                    <option value="2">الثاني</option>
                                                </select>
                                                <span class="text-danger error-text term_err"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <select id="month" class="form-control" name="month"
                                                        value="{{ old('month') }}">
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
                                                <input type="text" name="receipt" id="receipt"
                                                       placeholder="{{__('message.receipt')}}" class="form-control ">
                                                <span class="text-danger error-text receipt_err"></span>
                                            </div>

                                        </div>
                                    <span class="text-danger error-text nunValue"></span>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close
                                    </button>
                                    <button id="savereceipt"
                                            class="btn btn-outline-success">{{__('message.add')}}</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

    </div>

@stop
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
             integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
             crossorigin="anonymous"></script>
@foreach($students as $t)
@foreach($installments as $s)
    @if ($t->installments - $s->receipt!=0)
    <script>

        $(document).on('click', '#update', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "{{route('updateReceipt')}}",
                dataType: "json",
                data: $('#updateReceipt').serialize(),

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
    @endif
@endforeach
@endforeach
<script>

    $(document).on('click', '#savereceipt', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "{{route('addinstallment')}}",
            dataType: "json",
            data: $('#addinstallment').serialize(),

            success: function (data) {

                if ($.isEmptyObject(data.error) && $.isEmptyObject(data.errorNunValue)) {
                    // location.reload();

                } else {
                    if (!($.isEmptyObject(data.error))) {
                        printErrorMsg(data.error);
                    }

                    if (!($.isEmptyObject(data.errorNunValue))) {
                        $('.nunValue').text(data.errorNunValue);
                    }
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



    });
</script>

<script>

    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>

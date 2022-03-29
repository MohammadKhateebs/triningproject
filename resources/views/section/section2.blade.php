@extends('layouts.app')
<style>

    .main {

        height: 100%; /* will cover the 100% of viewport */

        display: block;
        position: relative;
        padding-bottom: 100px;
        overflow: auto;
        margin-top: 40px;
        background-color: #f1f1f1;
    }
</style>
@section('content')
    <div class="container-fluid  shadow" style="margin-top:50px; ">

        <div style="float: left;width: 10%">
            <h4>كل الصفوف:</h4>
            <hr>
            @foreach ($section as $sect)
                @if($sect->classroom=='kg2')
                    <a href="{{route('section2',$sect->id)}}"
                       style="font-size: 20px; width:90px; height: 90px;  display: block;margin: 5px;"
                       class="btn bg-success sect justify-content-center">
                        <i class="fa fa-users  text-white" style="width: 20px;height: 20px;">
                        </i>
                        <hr>
                        {{$sect->name}}</a>
                @endif
            @endforeach
        </div>
    </div>

    <div class="container main shadow">
        <div class="modal fade" id="report" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header text-center bg-danger">
                        <h2 class="modal-title text-white w-100 font-weight-bold py-2">!تقرير مالي</h2>

                    </div>
                    <div class="modal-body ">
                        <label style="visibility: hidden">
                            {{$sum=0}}
                            {{$sumin=0}}
                            @foreach($Students as $s)
                                {{$sum+=$s->installments}}
                                @foreach($installments as $i)
                                    @if($i->student_id==$s->identification)
                                        {{$sumin+=$i->receipt}}
                                    @endif
                                @endforeach
                            @endforeach
                        </label>
                        <table class="table  table-striped table-hover " id="tblData" style="box-shadow: 5px 10px #888888;">
                            <thead class="bg-dark text-white ">
                            <tr>

                                <th scope="col">مجموع اقساط الطلاب</th>
                                <th scope="col">مجموع ما تم دفعه</th>
                                <th scope="col">مجموع الديون</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$sum}}</td>
                                <td>{{$sumin}}</td>
                                <td>{{$sum-$sumin}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-outline-danger waves-effect"
                            data-bs-dismiss="modal"><i class="fa fa-remove"></i></button>
                    <a class="btn  btn-outline-success waves-effect"
                       href="{{url('/')}}"><i class="fa fa-check"></i></a>
                </div>

            </div>
        </div>
        <div class="d-flex align-items-start">
            <div class="back">

                <a class="btn btn-outline-success  py-3" href="{{url('admin')}}"><i
                        class="fa fa-arrow-left"></i>
                    {{ __('message.back') }}</a>
                <a href="{{url('binStudent/'.$id)}}" class="btn btn-outline-danger py-3">
                    <i style="size: 50px" class="fa fa-trash-o"></i>سلة المحذوفات</a>
                <button type="button" class="btn btn-outline-success py-3" data-bs-toggle="modal"
                                                                                             data-bs-target="#report">
                    <i class="fa fa-file-text-o"></i>التقرير</button>
            </div>
        </div>
        <table class="table  table-striped table-hover justify-content-center" id="tblData" border='1' cellpadding='1'
               style="box-shadow: 5px 10px #888888;">
            <thead class="bg-success text-white">
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><h1>{{$name}}
                    </h1></th>
                <th class="bg-success text-white justify-content-center">
                    <h1> تمهيدي
                    </h1>
                </th>
                <th>

                </th>
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
                <th scope="col">{{__('message.installments')}}</th>
                <th scope="col">{{__('message.JoinDate')}}</th>
                <th scope="col">{{__('message.active')}}</th>
                <th scope="col">{{__('message.delete')}}</th>


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
                        <td><a class="btn btn-outline-success" id="{{$student->identification}}"
                               href="{{url('viewin/'.$student->identification.'/'.$id)}}">{{$student->installments}} </a></td>



                        <td>
                            {{ $student->created_at->format('Y-m-d') }}</td>

                        @if($student->active=='active')
                            <td><i style="color: #2fa360" class="fa fa-circle"></i>{{__('message.active')}}</td>
                        @else
                            <td><i style="color: red" class="fa fa-circle"></i>{{__('message.inactive')}}</td>

                        @endif
                        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#Modal2{{$student->identification}}"><i
                                    class="fa fa-user-times"></i>حذف</button></td>


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
                               href="{{url('deleteStudent/'.$student->identification)}}"><i class="fa fa-check"></i></a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
            </tbody>
        </table>

    </div>
@stop
<script>

    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>



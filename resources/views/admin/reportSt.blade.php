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
                <a type="button" type="button" style="margin: 20px;" class="btn btn-outline-success py-3" href="/report/2"><i
                            class="fa fa-arrow-left"></i>
                    {{ __('message.back') }}</a>
            </div>
        </div>
        <label style="visibility: hidden " >
            {{$sum=0}} {{$sumin=0}}
            @foreach($students as $s)
                @if($s->confirmed==1)
                {{$sum+=$s->installments*8}}
                @foreach($installments as $i)
                        @if($i->student_id==$s->identification)
                    {{$sumin+=$i->receipt}}
                        @endif
                @endforeach
                @else
                    @foreach($installments as $i)
                        @if($i->student_id==$s->identification)
                            {{$sumin+=$i->receipt}}
                            {{$sum+=$i->installments}}
                        @endif
                    @endforeach
                @endif
            @endforeach</label>
        <div class="container shadow">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <div class="accordion-body">
                            <button  class="btn-outline-success float-lg-right" onclick="exportTableToExcel('tblData', 'kids')"><i class="fa fa-file-excel-o" ></i></button>

                            <table class="table  table-striped table-hover" id="tblData" style="box-shadow: 5px 10px #888888;">
                                <thead class="bg-dark text-white ">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h2> ?????????????? ???????????? ???????????? ???????????? ???? ???? : @if($branch[0]->classroom=='kg1')??????????@else???????????? @endif, {{$branch[0]->name}}</h2></th>
                                    <th></th>
                                </tr></thead>
                                <thead class="bg-dark text-white ">
                                <tr>

                                    <th scope="col">?????? ???????????? ??????????</th>
                                    <th scope="col">?????????? ?????????? ????????????</th>
                                    <th scope="col">?????????? ???? ???? ????????</th>
                                    <th scope="col">?????????? ????????????</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <label style="visibility: hidden">
                                        {{$sumb=0}}{{$sumins=0}}
                                        @foreach($students as $s)
                                            @if($s->confirmed==1)
                                                {{$sumb+=$s->installments*8}}
                                                @foreach($installments as $in)
                                                    @if($in->student_id==$s->identification)
                                                        {{$sumins+=$in->receipt}}
                                                    @endif
                                                @endforeach
                                            @elseif($s->confirmed==2)
                                                @foreach($installments as $in)
                                                    @if($in->student_id==$s->identification)
                                                        {{$sumins+=$in->receipt}}
                                                        {{$sumb+=$in->installments}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </label>
                                        <tr>
                                            <td>{{count($students)}}</td>
                                            <td>{{$sumb}}
                                            </td>
                                            <td>{{$sumins}}
                                            </td>
                                            <td>{{$sumb-$sumins}}
                                            </td>
                                            <td>@if($sumb-$sumins!=0)
                                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                            data-bs-target="#show"> <i class="fa fa-show"></i> ???????????? ????????????</button>

                                                @endif
                                            </td>

                                        </tr>
                                </tbody>

                            </table>
                            @if($sumb-$sumins!=0)
                            <div class="modal  " id="show" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content swiper-scrollbar-lock">

                                        <div class="modal-header text-center ">
                                            <h2 class="modal-title text-white w-100 font-weight-bold py-2">???????????? ???????? ????????????</h2>

                                        </div>
                                        <div class="card-body   ">
                                            <div class="alert-success"></div>
                                            <div class="modal-body">


                                                <table class="table  table-striped table-hover"
                                                       style="box-shadow: 5px 10px #888888;">
                                                    <thead class="bg-dark text-white">
                                                    <tr>
                                                        <th scope="col">?????? ????????????</th>
                                                        <th scope="col">?????????? ???????? ?????? ????????</th>
                                                        <th scope="col">???????????? ??????????????</th>
                                                        <th scope="col">??????????</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($students as $s)
                                                        <p style="display: none">{{$sum=0}}</p>
                                                        @if($s->confirmed==1)
                                                            @foreach($installments as $i)
                                                                @if($i->student_id==$s->identification)
                                                                    <p style="display: none">  {{$sum+=$i->receipt}}</p>
                                                                @endif
                                                            @endforeach
                                                            @if($sum<$s->installments*8)
                                                                <tr>
                                                                    <th scope="col">{{$s->firstName}} {{$s->lastName}}</th>
                                                                    <td>{{$s->installments*8}}</td>
                                                                    <td>{{$sum}}</td>
                                                                    <td>{{$s->installments*8-$sum}}</td>
                                                                </tr>
                                                            @endif
                                                        @elseif($s->confirmed==2)
                                                            <p style="display: none">{{$sumd=0}}</p>
                                                            @foreach($installments as $i)
                                                                @if($i->student_id==$s->identification)
                                                                    <p style="display: none">{{$sumd+=$i->installments}}  {{$sum+=$i->receipt}}</p>
                                                                @endif
                                                            @endforeach
                                                            @if($sum<$sumd)
                                                                <tr>
                                                                    <th scope="col">{{$s->firstName}} {{$s->lastName}}</th>
                                                                    <td>{{$sumd}}</td>
                                                                    <td>{{$sum}}</td>
                                                                    <td>{{$sumd-$sum}}</td>
                                                                </tr>
                                                            @endif

                                                        @endif
                                                    @endforeach



                                                    </tbody>
                                                </table>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endif


                        </div>

            </div>
        </div>

    </div>
    </div>

@stop


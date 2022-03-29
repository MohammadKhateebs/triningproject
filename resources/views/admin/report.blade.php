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
                <a type="button" type="button" style="margin: 20px;" class="btn btn-outline-success py-3" href="{{route('admin')}}"><i
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
                            @if($role==2)
                                <div class="row">
                                    <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link btn btn-outline-success py-1" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">بستان</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link btn btn-outline-success" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">تمهيدي</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div  class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="nav flex-column nav-pills" >
                                            @foreach($branch as $b)
                                                @if($b->classroom=='kg1')

                                                    <a class=" btn btn-outline-dark" href="{{route('reportSt',$b->id)}}" >{{$b->name}}</a>

                                                @endif
                                            @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <div class="nav flex-column nav-pills" >
                                                @foreach($branch as $b)
                                                    @if($b->classroom=='kg2')

                                                        <a class=" btn btn-outline-dark" href="{{route('reportSt',$b->id)}}" >{{$b->name}}</a>

                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            @elseif($role==1)
                            <label style="visibility: hidden " >
                                {{$sumt=0}} {{$sumint=0}}
                                @foreach($teacher as $t)
                                    @if($t->delete==0)
                                    {{$sumt+=$t->salary*8}}
                                    @foreach($salary as $s )
                                        {{$sumint+=$s->salary}}
                                    @endforeach
                                    @endif

                                @endforeach</label>
                            <table class="table  table-striped table-hover " id="tblData" style="box-shadow: 5px 10px #888888;">
                                <thead class="bg-dark text-white ">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h2>التقرير المالي السنوي للمدرسين</h2></th>
                                    <th></th>
                                </tr></thead>
                                <thead class="bg-dark text-white ">
                                <tr>
                                    <th scope="col">رقم الهوية</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">مجموع ما يجب دفعه</th>
                                    <th scope="col">مجموع الرواتب المدفوعة</th>
                                    <th scope="col">الدين</th>
                                </tr>
                                </thead>
                                <tbody><label style="visibility: hidden">{{$allsalry=0}}{{$alls=0}}</label>
                                @foreach($teacher as $t)
                                    <label style="visibility: hidden">
                                        {{$sumsalteacher=0}}
                                                @foreach($salary as $sal)
                                                    @if($sal->teacher_id==$t->identification)
                                                        {{$sumsalteacher+=$sal->salary}}
                                                    @endif
                                                @endforeach
                                        {{$allsalry+=$sumsalteacher}}
                                    </label>
                                    <tr>
                                        <td>{{$t->identification}}</td>
                                        <td>{{$t->name}}</td>
                                        <td>  @if($t->delete==0) {{$t->salary*8}} <label class="invisible">
                                                {{$alls+=$t->salary*8}}
                                            </label>
                                            @else{{$sumsalteacher}}    <label class="invisible">
                                                    {{$alls+=$sumsalteacher}}
                                                </label>
                                            @endif
                                        </td>
                                        <td>{{$sumsalteacher}}
                                        </td>
                                        <td>@if($t->delete==0){{$t->salary*8-$sumsalteacher}}@else 0 @endif
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                                <thead class="bg-dark text-white ">
                                <tr>
                                    <th scope="col">المجموع</th>
                                    <th scope="col">:</th>
                                    <th scope="col">{{$alls}}</th>
                                    <th scope="col">{{$allsalry}}</th>
                                    <th scope="col">{{$alls-$allsalry}}</th>
                                </tr>
                                </thead>
                            </table>
                            @endif
                        </div>

            </div>
        </div>

    </div>
    </div>

@stop


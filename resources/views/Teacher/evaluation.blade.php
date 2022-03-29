@extends('layouts.app')
<style>
    .container{
        height: 100%; /* will cover the 100% of viewport */
        display: block;
        position: relative;
    }
    .sidenav2 {
        height: 100%;
        width: 250px;
        position: absolute;
        z-index: 1;
        top: 100px;
        left: 0;
        background-color:#001f3f;
        overflow-x: hidden;
        transition: 0.5s;
    }
    .sidenav2 a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #f1f1f1;
        display: block;
        transition: 0.3s;
    }

    .sidenav2 a:hover {
        color: #818181;
    }

    .sidenav2 .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav2 {padding-top: 15px;}
        .sidenav2 a {font-size: 18px;}
    }
    ul {
        list-style-type: none;
        margin: 18px;
        padding: 0;

    }

    li a {
        display: block;
    }
    .tab-content{
        overflow: auto;

    }
</style>

@section('content')

    <div  class="container shadow " >

        <div class="float-lg-right back">
            <a  type="button"  type="button" class="btn btn-outline-success " style="margin: 10px;" href={{url("techar/".$idt)}}><i class="fa fa-arrow-left"></i>
                {{ __('message.back') }}</a>
        </div>
        <div class="container " style="overflow: auto;">
            <div class="row">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-success "  style="color: #1b1e21;" id="pills-term1-tab" data-bs-toggle="pill" data-bs-target="#pills-term1" type="button" role="tab" aria-controls="pills-term1" aria-selected="false">الفصل الاول</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-success" id="pills-term2-tab" data-bs-toggle="pill" data-bs-target="#pills-term2" type="button" role="tab" aria-controls="pills-term2" aria-selected="false">الفصل الثاني</button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade " id="pills-term1" role="tabpanel" aria-labelledby="pills-term1-tab">
                        <div class="row gy-5">
                            <div class="col-6">
                                <div class="p-3 border bg-light">الشهر الاول</div>
                                @foreach($evaluations as $eval)
                                    @if($eval->term==1&&$eval->month==1)
                                        <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                                            <thead class="bg-dark text-white">
                                            <tr>

                                                <th scope="col">{{__('message.name')}} {{__('message.course')}}</th>
                                                <th scope="col">{{__('message.evaluation')}}</th>

                                            </tr>
                                            </thead>
                                            <div class="form-group row  justify-content-center">
                                                <div class="col-md-6">
                                                    {{$Student[0]->firstName}}  {{$Student[0]->lastName}}
                                                </div>

                                            </div>

                                            <tbody>
                                            <tr>
                                                <td>لغه عربية</td>
                                                <td>

                                                    {{$eval->eval_ar}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>لغةانجليزية</td>
                                                <td>

                                                    {{$eval->eval_en}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>رياضيات</td>
                                                <td>
                                                    {{$eval->eval_math}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تربية اسلاميه</td>
                                                <td>
                                                    {{$eval->eval_deen}}
                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>
                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <label> الملاحظات :
                                                    {{$eval->note}} </label>
                                            </div><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                          data-bs-target="#Modal2{{$eval->id}}"><i
                                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>
                                        </div>

                                    @endif
                                @endforeach

                            </div>
                            <div class="col-6">
                                <div class="p-3 border bg-light">الشهر الثاني</div>
                                @foreach($evaluations as $eval)
                                    @if($eval->term==1&&$eval->month==2)
                                        <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                                            <thead class="bg-dark text-white">
                                            <tr>

                                                <th scope="col">{{__('message.name')}} {{__('message.course')}}</th>
                                                <th scope="col">{{__('message.evaluation')}}</th>

                                            </tr>
                                            </thead>
                                            <div class="form-group row  justify-content-center">
                                                <div class="col-md-6">
                                                    {{$Student[0]->firstName}}  {{$Student[0]->lastName}}
                                                </div>

                                            </div>

                                            <tbody>
                                            <tr>
                                                <td>لغه عربية</td>
                                                <td>

                                                    {{$eval->eval_ar}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>لغةانجليزية</td>
                                                <td>

                                                    {{$eval->eval_en}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>رياضيات</td>
                                                <td>
                                                    {{$eval->eval_math}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تربية اسلاميه</td>
                                                <td>
                                                    {{$eval->eval_deen}}
                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>
                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <label> الملاحظات :
                                                    {{$eval->note}} </label>
                                            </div><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                          data-bs-target="#Modal2{{$eval->id}}"><i
                                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>
                                        </div>

                                    @endif
                                @endforeach
                            </div>


                            <div class="col-6">
                                <div class="p-3 border bg-light">الشهر الثالث</div>
                                @foreach($evaluations as $eval)
                                    @if($eval->term==1&&$eval->month==3)
                                        <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                                            <thead class="bg-dark text-white">
                                            <tr>

                                                <th scope="col">{{__('message.name')}} {{__('message.course')}}</th>
                                                <th scope="col">{{__('message.evaluation')}}</th>

                                            </tr>
                                            </thead>
                                            <div class="form-group row  justify-content-center">
                                                <div class="col-md-6">
                                                    {{$Student[0]->firstName}}  {{$Student[0]->lastName}}
                                                </div>

                                            </div>

                                            <tbody>
                                            <tr>
                                                <td>لغه عربية</td>
                                                <td>
                                                    {{$eval->eval_ar}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>لغةانجليزية</td>
                                                <td>
                                                    {{$eval->eval_en}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>رياضيات</td>
                                                <td>
                                                    {{$eval->eval_math}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تربية اسلاميه</td>
                                                <td>
                                                    {{$eval->eval_deen}}
                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>
                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <label> الملاحظات :
                                                    {{$eval->note}} </label>
                                            </div><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                          data-bs-target="#Modal2{{$eval->id}}"><i
                                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>
                                        </div>

                                    @endif
                                @endforeach
                            </div>
                            <div class="col-6">
                                <div class="p-3 border bg-light">الشهر الرابع</div>
                                @foreach($evaluations as $eval)
                                    @if($eval->term==1&&$eval->month==4)
                                        <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                                            <thead class="bg-dark text-white">
                                            <tr>

                                                <th scope="col">{{__('message.name')}} {{__('message.course')}}</th>
                                                <th scope="col">{{__('message.evaluation')}}</th>

                                            </tr>
                                            </thead>
                                            <div class="form-group row  justify-content-center">
                                                <div class="col-md-6">
                                                    {{$Student[0]->firstName}}  {{$Student[0]->lastName}}
                                                </div>

                                            </div>

                                            <tbody>
                                            <tr>
                                                <td>لغه عربية</td>
                                                <td>

                                                    {{$eval->eval_ar}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>لغةانجليزية</td>
                                                <td>
                                                    {{$eval->eval_en}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>رياضيات</td>
                                                <td>
                                                    {{$eval->eval_math}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تربية اسلاميه</td>
                                                <td>
                                                    {{$eval->eval_deen}}
                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>

                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <label> الملاحظات :
                                                    {{$eval->note}} </label>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#Modal2{{$eval->id}}"><i
                                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>
                                        </div>

                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-term2" role="tabpanel" aria-labelledby="pills-term2-tab">
                        <div class="row gy-5">
                            <div class="col-6">
                                <div class="p-3 border bg-light">الشهر الاول</div>
                                @foreach($evaluations as $eval)
                                    @if($eval->term==2&&$eval->month==1)
                                        <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                                            <thead class="bg-dark text-white">
                                            <tr>

                                                <th scope="col">{{__('message.name')}} {{__('message.course')}}</th>
                                                <th scope="col">{{__('message.evaluation')}}</th>

                                            </tr>
                                            </thead>
                                            <div class="form-group row  justify-content-center">
                                                <div class="col-md-6">
                                                    {{$Student[0]->firstName}}  {{$Student[0]->lastName}}
                                                </div>

                                            </div>

                                            <tbody>
                                            <tr>
                                                <td>لغه عربية</td>
                                                <td>

                                                    {{$eval->eval_ar}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>لغةانجليزية</td>
                                                <td>
                                                    {{$eval->eval_en}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>رياضيات</td>
                                                <td>
                                                    {{$eval->eval_math}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تربية اسلاميه</td>
                                                <td>
                                                    {{$eval->eval_deen}}
                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>
                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <label> الملاحظات :

                                                    {{$eval->note}}

                                                </label>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#Modal2{{$eval->id}}"><i
                                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>


                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-6">
                                <div class="p-3 border bg-light">الشهر الثاني</div>
                                @foreach($evaluations as $eval)
                                    @if($eval->term==2&&$eval->month==2)
                                        <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                                            <thead class="bg-dark text-white">
                                            <tr>

                                                <th scope="col">{{__('message.name')}} {{__('message.course')}}</th>
                                                <th scope="col">{{__('message.evaluation')}}</th>

                                            </tr>
                                            </thead>
                                            <div class="form-group row  justify-content-center">
                                                <div class="col-md-6">
                                                    {{$Student[0]->firstName}}  {{$Student[0]->lastName}}
                                                </div>

                                            </div>

                                            <tbody>
                                            <tr>
                                                <td>لغه عربية</td>
                                                <td>

                                                    {{$eval->eval_ar}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>لغةانجليزية</td>
                                                <td>

                                                    {{$eval->eval_en}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>رياضيات</td>
                                                <td>
                                                    {{$eval->eval_math}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تربية اسلاميه</td>
                                                <td>
                                                    {{$eval->eval_deen}}
                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>
                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <label> الملاحظات :

                                                    {{$eval->note}}

                                                </label>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#Modal2{{$eval->id}}"><i
                                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-6">
                                <div class="p-3 border bg-light">الشهر الثالث</div>
                                @foreach($evaluations as $eval)
                                    @if($eval->term==2&&$eval->month==3)
                                        <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                                            <thead class="bg-dark text-white">
                                            <tr>

                                                <th scope="col">{{__('message.name')}} {{__('message.course')}}</th>
                                                <th scope="col">{{__('message.evaluation')}}</th>

                                            </tr>
                                            </thead>
                                            <div class="form-group row  justify-content-center">
                                                <div class="col-md-6">
                                                    {{$Student[0]->firstName}}  {{$Student[0]->lastName}}
                                                </div>

                                            </div>

                                            <tbody>
                                            <tr>
                                                <td>لغه عربية</td>
                                                <td>

                                                    {{$eval->eval_ar}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>لغةانجليزية</td>
                                                <td>

                                                    {{$eval->eval_en}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>رياضيات</td>
                                                <td>
                                                    {{$eval->eval_math}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تربية اسلاميه</td>
                                                <td>
                                                    {{$eval->eval_deen}}
                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>
                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <label> الملاحظات :

                                                    {{$eval->note}}

                                                </label>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#Modal2{{$eval->id}}"><i
                                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>


                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-6">
                                <div class="p-3 border bg-light">الشهر الرابع</div>
                                @foreach($evaluations as $eval)
                                    @if($eval->term==2&&$eval->month==4)
                                        <table class="table table-hover text-sm-center " style="box-shadow: 5px 10px #888888;">
                                            <thead class="bg-dark text-white">
                                            <tr>

                                                <th scope="col">{{__('message.name')}} {{__('message.course')}}</th>
                                                <th scope="col">{{__('message.evaluation')}}</th>

                                            </tr>
                                            </thead>
                                            <div class="form-group row  justify-content-center">
                                                <div class="col-md-6">
                                                    {{$Student[0]->firstName}}  {{$Student[0]->lastName}}
                                                </div>

                                            </div>

                                            <tbody>
                                            <tr>
                                                <td>لغه عربية</td>
                                                <td>

                                                    {{$eval->eval_ar}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>لغةانجليزية</td>
                                                <td>

                                                    {{$eval->eval_en}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>رياضيات</td>
                                                <td>
                                                    {{$eval->eval_math}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تربية اسلاميه</td>
                                                <td>
                                                    {{$eval->eval_deen}}
                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>
                                        <div class="form-group row  justify-content-center">
                                            <div class="col-md-6">
                                                <label> الملاحظات :

                                                    {{$eval->note}}

                                                </label>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#Modal2{{$eval->id}}"><i
                                                    class="fa fa-user-times"></i> {{__('message.delete')}}</button>


                                        </div>

                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @foreach($evaluations as $val)
            <div class="modal fade" id="Modal2{{$val->id}}"
                 tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header text-center bg-danger">
                            <h2 class="modal-title text-white w-100 font-weight-bold py-2">{{__('message.delete')}}
                                !</h2>

                        </div>
                        <div class="modal-body ">
                            <div class="md-form mb-5 text-center">
                                <h3 class="modal-title text-break w-100 font-weight-bold py-2">{{__('message.Do you want to delete evaluation?')}}</h3>
                                <br>
                                <h5>  الفصل:{{$val->term}}   الشهر:{{$val->month}}</h5>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn  btn-outline-danger waves-effect"
                                    data-bs-dismiss="modal"><i class="fa fa-remove"></i></button>
                            <a class="btn  btn-outline-success waves-effect"
                               href="{{url('deleteEval/'.$val->id)}}"><i
                                    class="fa fa-check"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    //saveEditEvalSt


</script>



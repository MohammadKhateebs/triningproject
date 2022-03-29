


@extends('layouts.app')
<style>
    button i {
        display: block;
    }

    .nav-link {
        display: block;
        padding: 30px;
        height: 100px;
    }

    .nav-link:hover {
        color: #1d68a7;
    }

    .container {
        display: block;
        height: 100%; /* will cover the 100% of viewport */

    }

    .d-flex {
        height: 100%;
    }

    div h3 {
        text-align: center;
        background-color: black;
        color: white;
        height: 40px;
    }
</style>
@section('content')


    <div>
        <h3 class="bg-success">{{__('message.evaluation')}}</h3>
    </div>

    <div class="d-flex align-items-start">


        <div class="container shadow">
            <div class="float-lg-right back">
                <a  type="button"  type="button" class="btn btn-outline-success " style="margin: 10px;" href={{url("admin")}}><i class="fa fa-arrow-left"></i>
                    {{ __('message.back') }}</a>
            </div>
            <div class="form-group row  justify-content-center ">

                <h3 class="bg-success">{{$Student[0]->identification}} : {{$Student[0]->firstName}}  {{$Student[0]->lastName}}
                </h3>

            </div>
            <div class="container " style="overflow: auto;">
                <div class="row">
                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn btn-outline-success" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">الفصل الاول</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn btn-outline-success" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">الفصل الثاني</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div  class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
                                                </div>
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
                                                </div>
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

                                            </div>

                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
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



                                            </div>

                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop









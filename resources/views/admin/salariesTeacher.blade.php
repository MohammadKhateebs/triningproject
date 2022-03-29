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

    <div class="d-flex align-items-start" style="margin: 30px;">
        <div class="back">
            <a type="button" type="button" class="btn btn-outline-success " href="Teachers"><i
                        class="fa fa-arrow-left"></i>
                {{ __('message.back') }}</a>
        </div>
    </div>
    <div class="container shadow main">
        <div class="text-md-center">
            <h3 class="text-white bg-success ">{{__('message.teachers')}}</h3>
        </div>
        @foreach($teachers as $t)
            <a href="{{route('addsalary',$t->identification)}}" class="btn btn-outline-success" ><i class="fa fa-user "></i><hr>{{$t->name}}</a>
        @endforeach
    </div>

@stop
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
@section('student')

    <div class="float-md-right py-2" style="margin: 25px;">
        <button type="button" type="button" class="btn btn-outline-success py-5"

                data-bs-toggle="modal" data-bs-target="#reqStudent">
            {{__('message.add Student')}}
        </button>

    </div>



    </div>

@stop

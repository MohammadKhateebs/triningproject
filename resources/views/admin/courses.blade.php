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
@section('courses')
    <div class="container   main shadow">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th scope="col">{{__('message.name')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $cours)
               <td class="coursess text-center ">
                    {{$cours->name}}

                </td>
            </tr>
            @endforeach

            </tbody>
        </table>


    </div>
    @stop

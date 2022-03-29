@extends('admin')
<style>
    .container {
        height: 100%; /* will cover the 100% of viewport */
        display: block;
        position: relative;


    }

    li a:hover {
        color: #b9b9b9;
    }

    .nav {
        margin-top: 25px;

    }

    li {
        padding: 10px;
        display: inline;

    }

</style>
@section('adminpage')





    <div class="container shadow " id="asew">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark  justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="btn  nav-link text-dark" data-bs-toggle="modal" data-bs-target="#deleteData">{{ __('message.Start a new program') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn nav-link text-dark" class="text-white" data-bs-toggle="modal" data-bs-target="#resetPassword"><i class="fa fa-fw fa-edit"></i> {{ __('message.reset password') }}</a>

                    </li>

                </ul>

        </nav>


    <div>
        <!--New program -->
        <div class="modal  " id="deleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content swiper-scrollbar-lock">

                    <div class="modal-header text-center bg-dark">
                        <h2 class="modal-title text-dark w-100 font-weight-bold py-2 "> {{__('message.Start a new program')}}
                            !</h2>

                    </div>
                    <div class="card-body  ">
                        <h3 class="modal-title text-break w-100 font-weight-bold py-2 text-center">
                            هل انت متأكد من بدء سنه جديدة؟

                        </h3>
                        <br>
                        <h4 class="text-danger font-weight-bold text-right">** تنويه</h4>
                        <h5 class="text-danger text-right">
                            هذه الخطوة تؤدي الى ترحيل كل البيانات الخاصه بالبرنامج الحالي الى الارشيف
                            <br>
                            لن يمكنك العمل بالبيانات الحالية بعد التأكيد!

                        </h5>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn  btn-outline-danger waves-effect" data-bs-dismiss="modal"><i
                                class="fa fa-remove"></i></button>
                        <a class="btn  btn-outline-success waves-effect" href="/archivesData"><i
                                class="fa fa-check"></i></a>
                    </div>
                </div>
            </div>
        </div>


@stop

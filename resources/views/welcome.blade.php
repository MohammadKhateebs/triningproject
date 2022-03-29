@extends('layouts.app')
<style>

    .modal-header {
        background-color: #282D3C;
    }

    .d-block {
        height: 90%;
        width: 100%;
    }


    .floating {
        position: fixed;
        left: 0;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 45px;
        z-index: 50;
    }

    .floating .fa-facebook {
        display: block;
        background-color: #597acb;
        color: #fff;
        width: 45px;
        height: 45px;
        padding: 14px;
        float: left;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    .floating .fa-facebook:hover {
        background-color: #395eb8;
        padding-left: 81px;
    }

    .floating .fa-twitter {
        display: block;
        background-color: #1DA1F2;
        color: #fff;
        width: 45px;
        height: 45px;
        padding: 14px;
        float: left;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    .floating .fa-twitter:hover {
        background-color: #1DA1F2;
        padding-left: 81px;
    }

    .floating .fa-instagram {
        display: block;
        background-color: #C13584;
        color: #fff;
        width: 45px;
        height: 45px;
        padding: 14px;
        float: left;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    .floating .fa-instagram:hover {
        background-color: #C13584;
        padding-left: 81px;
    }

    .floating .fa-chrome {
        display: block;
        background-color: #3f9ae5;
        color: yellow;
        width: 45px;
        height: 45px;
        padding: 14px;
        float: left;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    .floating .fa-chrome:hover {
        background-color: #3f9ae5;
        padding-left: 81px;
    }

    li {

        list-style-type: none;

    }

    .new {
        background-color: #78a3eb;
        background-image: radial-gradient(circle, #78a3eb, #fbc2eb);

    }

    /* Bottom right text
    .bottom-right {
        position: absolute;
        bottom: 8px;
        right: 16px;
    }*/
    .bottom-right {
        position: absolute;
        top: 80%;
        left: 65%;
        transform: translate(-50%, -50%);
    }
</style>
@section('RequestStudentAndVolunteer')
    @guest

    @endguest


@endsection
@section('content')
    <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="floating">
            <ul>
                <li><a class="fa fa-facebook" href="/"></a>
                </li>
                <li><a class="fa fa-twitter"
                       href="/"></a>
                </li>
                <li><a class="fa fa-chrome" href="/" target="_blank"></a>
                </li>
                <li><a class="fa fa-instagram"
                       href="/"></a>
                </li>
            </ul>
        </div>
    </div>
    <div>
        <img src="img/home.jpg" alt="Paris" style="width:100%;height:1000px;">


    </div>




@endsection

@section('script')



@stop
<script>


    function CheckArabicOnly(field) {
        var sNewVal = "";
        var sFieldVal = field.value;

        for (var i = 0; i < sFieldVal.length; i++) {
            var ch = sFieldVal.charAt(i),
                c = ch.charCodeAt(0);

            if (field.keyCode = '38') {
            } else if (field.keyCode = '40') {
                // down arrow
            } else if (field.keyCode = '37') {
            } else if (field.keyCode = '39') {
                // right arrow
            }

            if (c < 1536 || c > 1791) {
                // Discard
            } else {
                sNewVal += ch;
            }
        }

        field.value = sNewVal;
    }

    function yesnoCheck(that) {
        if (that.value == "") {
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    } //otherSpecialization
    function otherSpecialization(that) {
        if (that.value == "") {
            document.getElementById("otherSpec").style.display = "block";
        } else {
            document.getElementById("otherSpec").style.display = "none";
        }

    }

    //otherAddress
    function otherAddress(that) {
        if (that.value == "") {
            document.getElementById("otherAddressS").style.display = "block";
        } else {
            document.getElementById("otherAddressS").style.display = "none";
        }

    }
</script>

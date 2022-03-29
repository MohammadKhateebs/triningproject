<style>

    .footer{
        text-align: center;
        background-color:  hsl(120,100%,75%);
        background-image: radial-gradient(circle, hsl(120,100%,75%) , #ccffcc);
        padding: 20px;
        height: 100px;
        bottom: 0;

    }

    #footer {
        bottom: 0;
        width: 100%;
        text-align: center;



    }


</style>

<footer id="footer" class="footer page-footer " style="font-size: 20px;">
    {{__('message.kidsAcademy')}}
    <div class="footer-copyright text-center text-dark py-3">© 2021 Copyright:
        <a style="color:gray;display:inline;  text-decoration: none;" href="/"> {{__('message.kidsAcademy')}}</a>
    </div>
</footer>
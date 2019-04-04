<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<ul id="dropdownD1" class="dropdown-content">
    <li><a href="{{url('login')}}">Login</a></li>
    <li><a href="{{url('register')}}">Register</a></li>
    <li class="divider"></li>
    <li><a href="#!">FAQ/Help</a></li>
</ul>

<ul id="dropdownD2" class="dropdown-content">
    <li><a href="#!">Dog Walker</a></li>
    <li><a href="#!">Shopping</a></li>
    <li><a href="#!">Hair Dressing</a></li>
    <li><a href="#!">Maid</a></li>
    <li class="divider"></li>
</ul>

<ul id="dropdown1" class="dropdown-content">
    <li><a href="{{url('login')}}">Login</a></li>
    <li><a href="{{url('register')}}">Register</a></li>
    <li class="divider"></li>
    <li><a href="#!">FAQ/Help</a></li>
</ul>

<ul id="dropdown2" class="dropdown-content">
    <li><a href="#!">Dog Walker</a></li>
    <li><a href="#!">Shopping</a></li>
    <li><a href="#!">Hair Dressing</a></li>
    <li><a href="#!">Maid</a></li>
    <li class="divider"></li>

</ul>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo"><img src="{{url('img/web_logo.jpg')}}"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="/"><i class="material-icons left">home</i>Home</a></li>
                <li><a class="modal-trigger" href="#modal2"><i class="material-icons left">card_membership</i>Service
                        Hire</a></li>

                <li><a class="modal-trigger" href="#modal3"><i class="material-icons left">devices_other</i>About Us</a>
                </li>
                <li><a class="modal-trigger" href="#modal1"><i class="material-icons left">info_outline</i>Terms &
                        Conditions</a></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"> <i class="material-icons left">account_box</i>Account<i
                                class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
</div>
<ul class="sidenav" id="mobile-demo">
    <li><a href="/"><i class="material-icons left">home</i>Home</a></li>
    <li><a class="modal-trigger" href="#modal2"><i class="material-icons left">card_membership</i>Service Hire</a></li>
    <li><a class="modal-trigger" href="#modal3"><i class="material-icons left">devices_other</i>About Us</a></li>

    <li><a class="modal-trigger" href="#modal1"><i class="material-icons left">info_outline</i>Terms & Conditions</a>
    </li>
    <!-- Dropdown Trigger -->
    <li><a class="dropdown-trigger" href="#!" data-target="dropdownD1"> <i class="material-icons left">account_box</i>Account<i
                    class="material-icons right">arrow_drop_down</i></a></li>

</ul>

<body>

<div class="container-fluid">

    <h3 style="text-align: center;margin-top:1em!important;font-weight: bold;">Welcome to Errands Around</h3>

    @foreach($services_array as $row_list)
        <div class="row">
            @foreach($row_list as $service)

                <div class="col s12 m4">
                    <div class="card blue-grey darken-1 hoverable">
                        <div class="card-image" style="width: 100%;height: 220px;">
                            <img src="{{'/storage/'.$service['service_image_url']}}" style="max-width: 100%;height: 100%">
                            <span class="card-title"
                                  style="color: #AB1A53!important;font-weight: bold!important;text-transform: uppercase;">{{$service['service_name']}}</span>
                            {{--<span>{{'Fees start from R'.$service['price']}}</span>--}}
                        </div>
                        <div class="card-content white-text">

                            <p>{{$service['service_description']}}</p>
                        </div>
                        <div class="card-action" style="text-align: center">
                            <a href="#modal2" class="btn modal-trigger btn"><i class="material-icons">card_membership</i> Hire Now</a>
                            {{--<a href="#modal3" class="btn" style="margin-left: 2em;"><i class="material-icons">assignment</i>More</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
<div class="parallax-container valign-wrapper" style="margin-top:2.5em!important;">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                {{--<h5 class="header col s12 light">Let us do your errands. We jump, Tell Us How High</h5>--}}
            </div>
        </div>
    </div>
    <div class="parallax"><img src="/img/our_services.jpg"></div>
</div>
</div>
{{--<div class="col s12 m6">--}}
{{--<div class="card blue-grey darken-1 hoverable">--}}
{{--<div class="card-content white-text">--}}
{{--<span class="card-title">Our Services</span>--}}
{{--<table>--}}
{{--<thead>--}}
{{--<th></th>--}}
{{--<th></th>--}}
{{--</thead>--}}
{{--<tbody>--}}
{{--<tr><td>Senior Services</td>--}}
{{--<td>Events Coordinators</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td>Barber at your doorway</td>--}}
{{--<td>Shopping list Handling</td>--}}

{{--</tr>--}}
{{--<tr>--}}
{{--<td>Hair Braiding</td>--}}
{{--<td>Domestic Services</td>--}}

{{--</tr>--}}
{{--<tr>--}}
{{--<td>Painters</td>--}}
{{--<td>Gardening/ Grass Cutters</td>--}}
{{--</tr>--}}
{{--<tr><td>Deliveries/ Pick-ups</td>--}}
{{--<td>Packers</td>--}}
{{--</tr>--}}
{{--</tbody>--}}
{{--</table>--}}
{{--</div>--}}
{{--<div class="card-action">--}}
{{--<a href="#modal2" class="btn modal-trigger btn"><i class="material-icons">card_membership</i> Hire Now</a>--}}
{{--<a href="#modal3" class="btn"><i class="material-icons">assignment</i>More</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<div id="modal3" class="modal">
    <div class="modal-content"><strong>
            <h5 style="text-transform: uppercase;font-weight: bolder;">About Us - Errands Around</h5></strong>
        <p>

            <strong>ERRANDS AROUND (PTY) LTD</strong> is an online based enterprise that aims to assist the government
            in it's economic aim to eradicate unemployment in the Nelson Mandela Bay Municipality by giving people an
            opportunity
            to run errands for people that aren't able to run errands for themselves. The enterprise therefore, thought
            it was an
            ideological affinity to create a smart modern day technology platform to run errands at your finger tips.
        </p>
        <p>
            <strong> The ERRANDS AROUND Application</strong> was created to be an online community network that provides
            a
            platform which connects city dwellers who have errands that need to be run with our enthusiastic team that
            is willing to
            do the job for a fee, efficiently. With us, very long to do lists are a thing of the past.
        </p>
        <p>
            The application provides a platform to get things done on daily basis. We serve busy people in located in
            the Nelson Mandela
            Bay community. We offer professional and personal services like the house chores you abhor to picking up
            your child from school
            and many more other services. We run your errands so you don’t have to worry. We help ease the daily errands
            of busy people
            in the busy Nelson Mandela Bay Municipality.
        </p>
        <p>
            <strong> The Jumpers</strong><br/>

            This is our enthusiastic, experienced and friendly team that perform errands in different categories.The
            people who
            are dedicated to getting things done. This team is dedicated to fulfilling needs for someone else. Their
            mission is to rest
            assured knowing that people's lives are organized.
        </p>
        <p>
            <strong>E-rounders</strong><br/>

            These are our valued clients. Someone who needs help in getting something done and cannot do it on their
            own, perhaps
            they are extremely busy or they just seek for a professional hand. We have a range of services we offer and
            they are just
            a click of a button away.
        </p>
        <p>
            At ERRANDS AROUND we ensure any efficiencies are undertaken as part of a well planned approach based on an
            understanding of
            the needs of the community.

        </p>
    </div>
    <div class="center" style="margin-bottom: 3em;">
        <a href="#!" class="modal-close waves-effect waves-light btn"><i class="material-icons right">contact_mail</i>Email</a>
        <a href="#!" class="modal-close waves-effect waves-light btn" style="margin-left: 1em;"><i
                    class="material-icons right">cloud</i>Online Booking</a>
        <a href="#!" class="modal-close waves-effect waves-light btn" style="margin-left: 1em;">Follow Us <i
                    class="fab fa-facebook-f"></i></a>

    </div>
</div>
<div id="modal1" class="modal">
    <div class="modal-content"><strong>
            <h5 style="text-transform: uppercase;font-weight: bolder;">Terms and Conditions - Errands Around</h5>
        </strong>
        <p>By downloading or using the app, these terms will automatically apply to you – you should make sure therefore
            that you read them carefully before using the app. You’re not allowed to copy, or modify the app, any part
            of the app, or our trademarks in any way. You’re not allowed to attempt to extract the source code of the
            app, and you also shouldn’t try to translate the app into other languages, or make derivative versions. The
            app itself, and all the trade marks, copyright, database rights and other intellectual property rights
            related to it, still belong to ERRANDS AROUND.
        </p>
        <p>
            <strong>ERRANDS AROUND PTY LTD</strong> is committed to ensuring that the app is as useful and efficient as
            possible. For that reason, we reserve the right to make changes to the app or to charge for its services, at
            any time and for any reason. We will never charge you for the app or its services without making it very
            clear to you exactly what you’re paying for.

            Disputes arising from from consumer rights, legal obligation or from law regarding the services will be
            resolved between the E-rounders and the Jumper.
        </p>
        <p>
            <strong>ERRANDS AROUND PTY LTD</strong></strong> will not be responsible for any damages to property between
            E-rounders and the Jumper.


            The Errands Around app stores and processes personal data that you have provided it, in order to provide our
            Service.
            It’s your responsibility to keep your phone and access to the app secure. We therefore recommend that you do
            not jailbreak
            or root your phone, which is the process of removing software restrictions and limitations imposed by the
            official operating
            system of your device. It could make your phone vulnerable to malware/viruses/malicious programs, compromise
            your phone’s security
            features and it could mean that the Errands Around app won’t work properly or at all.

            You should be aware that there are certain things that <strong>ERRANDS AROUND PTY LTD</strong> will not take
            responsibility for.</p>
        <p>Certain functions of the app will require the app to have an active internet connection. The connection can
            be Wi-Fi, or provided
            by your mobile network provider, but <strong>ERRANDS AROUND PTY LTD</strong> cannot take responsibility for
            the app not working at
            full functionality if you don’t have access to Wi-Fi, and you don’t have any of your data allowance left.
        </p>
        <p>
            If you’re using the app outside of an area with Wi-Fi, you should remember that your terms of the agreement
            with your mobile
            network provider will still apply. As a result, you may be charged by your mobile provider for the cost of
            data for the duration
            of the connection while accessing the app, or other third party charges. In using the app, you’re accepting
            responsibility
            for any such charges, including roaming data charges if you use the app outside of your home territory (i.e.
            region or country)
            without turning off data roaming. If you are not the bill payer for the device on which you’re using the
            app, please be aware
            that we assume that you have received permission from the bill payer for using the app.

        </p>
        <p>
            Along the same lines, ERRANDS AROUND (PTY) LTD cannot always take responsibility for the way you use the app
            i.e. You need to make sure that your device stays charged – if it runs out of battery and you can’t turn it
            on to avail the Service, ERRANDS AROUND (PTY) LTD cannot accept responsibility

            With respect to <strong>ERRANDS AROUND PTY LTD</strong>’s responsibility for your use of the app, when
            you’re using the app, it’s important to bear in mind that although we endeavour to ensure that it is updated
            and correct at all times, we do rely on third parties to provide information to us so that we can make it
            available to you.
        <p><strong>ERRANDS AROUND PTY LTD</strong> accepts no liability for any loss, direct or indirect, you experience
            as a result
            of relying wholly on this functionality of the app.

            At some point, we may wish to update the app. The app is currently available on – the requirements for
            system(and for any additional systems we decide to extend the availability of the app to) may change, and
            you’ll need to
            download the updates if you want to keep using the app. </p>
        <p><strong>ERRANDS AROUND PTY LTD</strong> does not promise that it will always update the app so that it is
            relevant to you
            and/or works with the version that you have installed on your device. However, you promise to always accept
            updates to the
            application when offered to you, We may also wish to stop providing the app, and may terminate use of it at
            any time without
            giving notice of termination to you. Unless we tell you otherwise, upon any termination, (a) the rights and
            licenses granted
            to you in these terms will end; (b) you must stop using the app, and (if needed) delete it from your device.
        </p>
        <p>
            <strong><h5 style="text-transform: uppercase">Changes to This Terms and Conditions.</h5></strong>

            We may update our Terms and Conditions from time to time. Thus, you are advised to review this page
            periodically for any changes. us will notify you of any changes by posting the new Terms and Conditions on
            this page. These changes are effective immediately after they are posted on this page.

            Contact Us

            If you have any questions or suggestions about our Terms and Conditions, do not hesitate to contact us .
        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-light btn">Agree</a>
    </div>
</div>
<div id="modal2" class="modal bottom-sheet">
    <div class="modal-content">
        <h6 style="text-align: center;">Select Service Hire Option</h6>
    </div>
    <div class="center" style="margin-bottom: 3em;">
        <a href="#!" class="modal-close waves-effect waves-light btn"><i class="material-icons right">contact_mail</i>Email</a>
        <a href="#!" class="modal-close waves-effect waves-light btn" style="margin-left: 1em;"><i
                    class="material-icons right">cloud</i>Online Booking</a>
    </div>
</div>
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">About Us</h5>
                <p class="grey-text text-lighten-4">

                    ERRANDS AROUND (PTY) LTD is an online based enterprise that aims to assist the government in it's
                    economic aim to eradicate unemployment in the Nelson Mandela Bay Municipality by giving people an
                    opportunity to run errands for people that aren't able to run errands for themselves.
                    The enterprise therefore, thought it was an ideological affinity to create a smart modern day
                    technology platform to
                    run errands at your finger tips.

                    The ERRANDS AROUND was created to be an online community network that provides a platform
                    which connects city dwellers who have errands that need to be run with our enthusiastic team that is
                    willing to
                    do the job for a fee, efficiently. With us, very long to do lists are a thing of the past.

                    {{--The application provides a platform to get things done on daily basis.--}}
                    {{--We serve busy people in located in the Nelson Mandela Bay community. We offer professional and personal services--}}
                    {{--like the house chores you abhor to picking up your child from school and many more other services.--}}
                    {{--We run your errands so you don’t have to worry. We help ease the daily errands of busy people in the busy Nelson Mandela Bay Municipality.--}}
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Social Media</h5>
                <div><a class="grey-text text-lighten-3 btn" href="https://www.facebook.com/errandsaround/"><i class="fab fa-facebook-f"></i> </a>
                    <a class="grey-text text-lighten-3 btn" href="https://twitter.com/AroundErrands"><i class="fab fa-twitter-square"></i></a>
                    <a class="grey-text text-lighten-3 btn" href="https://www.instagram.com/errandsaround/"><i class="fab fa-instagram"></i></a></div>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2019 Copyright <strong>ERRANDS AROUND PTY LTD</strong>
            {{--<a class="grey-text text-lighten-4 right" href="#!">More Links</a>--}}
        </div>
    </div>
</footer>
<style>
    .blue-grey.darken-1 {
        background-color: #206169 !important;
    }

    p {
        text-align: justify;
    }

    .btn, .btn-large, .btn-small {
        background-color: #F07A2C !important;
    }

    .slider .slides li .caption {
        background-color: #9A1E50 !important;
        width: 400px !important;
        opacity: 0.6 !important;
        color: #fff !important;
        text-shadow: 5px 3px 1px #000000;
        font-weight: bolder;
    }

    .page-footer {
        background-color: #206169 !important;

    }

    nav {
        background-color: #206169 !important;
        /*color:white!important;*/
    }

    nav ul a {
        /*color:white!important;*/
        font-weight: bolder;
    }

    nav, nav .nav-wrapper i, nav a.sidenav-trigger, nav a.sidenav-trigger i {
        height: 100px !important;
        line-height: 100px !important;
    }

    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main {
        flex: 1 0 auto;
    }

</style>

<script>
    $(document).ready(function () {
        $(".dropdown-trigger").dropdown();
        $('.sidenav').sidenav();
        $('.slider').slider();
        $('.modal').modal();
        $('.parallax').parallax();
    });
</script>
</body>
</html>
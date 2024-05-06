<!doctype html>
<html lang="en" dir="{{App::currentLocale() =='ar' ? 'rtl' : 'ltr'}}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title',config('app.name'))</title>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Place the first <script> tag in your HTML's <head> -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    @if(App::isLocale('ar'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @endif


    @stack('styles')


    <style>
        .Btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 30px;
            height: 30px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: rgb(5, 65, 65);
        }

        /* plus sign */
        .sign {
            width: 100%;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sign svg {
            width: 17px;
        }

        .sign svg path {
            fill: white;
        }

        /* text */
        .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 0.8em;
            font-weight: 600;
            transition-duration: .3s;
        }

        /* hover effect on button width */
        .Btn:hover {
            width: 125px;
            border-radius: 40px;
            transition-duration: .3s;
        }

        .Btn:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
        }

        /* hover effect button's text */
        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
        }

        /* button click effect*/
        .Btn:active {
            transform: translate(2px, 2px);
        }

        .main-bg-color {
            background-color: rgb(218, 193, 177);
        }

        .main-color {
            color: rgb(182, 160, 146);
        }

        .main-border-color {
            border-color: rgb(182, 160, 146);
        }

        .main-shadow {
            text-shadow: 2px 2px rgb(182, 160, 146, 30%);
        }

        .secondary-color {

            color: rgb(5, 65, 65);
        }

        .secondary-shadow {
            text-shadow: 2px 2px rgb(209, 231, 221, 40%);

        }
        .secondary-bg-shadow {
            box-shadow: 2px 2px #47b2e4;


        }

    </style>

</head>
<body class="d-flex flex-column  min-vh-100">


<header class="mb-5">
    <nav class="navbar navbar-expand-lg main-bg-color">

        <div class="container ">
            <a class="navbar-brand" href="{{route('home')}}">{{config('app.name','Classroom')}}</a>
            <button class="navbar-toggler text-primary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



        </div>
    </nav>
</header>


<main class="container min-vh-120 col-md-11">
    {{$slot}}

</main>


<footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top mt-4 ">
    <span class="mb-3 mb-md-0 text-body-secondary text-center">© 2024 {{ config('app.name') }} | Developed by Saleh Zetawi</span>

    {{--    <div class="col-md-12 d-flex align-items-center ">--}}
    {{--    </div>--}}

    {{--    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">--}}
    {{--        <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>--}}
    {{--        <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>--}}
    {{--        <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>--}}
    {{--    </ul>--}}
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dropdown').change(function () {
            $('#localeForm').submit();
        });
    });
</script>


@stack('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="module">

    // Import the functions you need from the SDKs you need
    import {initializeApp} from "https://www.gstatic.com/firebasejs/10.8.1/firebase-app.js";
    import {getAnalytics} from "https://www.gstatic.com/firebasejs/10.8.1/firebase-analytics.js";
    import {getMessaging, getToken, onMessage} from "https://www.gstatic.com/firebasejs/10.8.1/firebase-messaging.js";

    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyBIGBr6TN6IDCYUrmiQNiI19uIFpiLbxaE",
        authDomain: "classroom-1dbcc.firebaseapp.com",
        projectId: "classroom-1dbcc",
        storageBucket: "classroom-1dbcc.appspot.com",
        messagingSenderId: "768181467336",
        appId: "1:768181467336:web:ba73e0707fff80cdc20dfd",
        measurementId: "G-4PYCJJ8F6S"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    const messaging = getMessaging(app);
    console.log('permission' + Notification.permission); // always denied
    console.log('ggg')
    Notification.requestPermission(function (permission) {
        console.log(permission); // always denied

        if (permission === "granted") {
            // never hits this block
        }
    });
    getToken(messaging, {
            vapidKey: "BNJFks7ZRcPItpYDiy7c80dN2pGxsVf3ceiVsuTgTm4Gl_PoWblEDqVi7zJ4fS7BbCSQBTwknqXrypl7xjz1owQ"
        }
    ).then((currentToken) => {
        if (currentToken) {
            console.log(currentToken)
            $.ajax({
                method: 'post',
                url: '/api/v1/devices',
                headers: {
                    'x-api-key': 'base64:9Vc1bTsIjCszuRxH324Xlo/RXABWJL/uRRZ1gPFfYLg=',
                },
                data: {
                    token: currentToken,
                    _token: "{{csrf_token()}}"
                },
                success: () => {
                },
                error: (xhr, status, error) => {
                    console.error("AJAX request failed:", status, error);
                }
            });
        } else {
            // Show permission request UI
            console.log('No registration token available. Request permission to generate one.');
            // ...
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        // ...
    });
    onMessage(messaging, (payload) => {
        console.log('Message received. ', payload);
        // ...
    });

</script>

<script>
    const userId = "{{\Illuminate\Support\Facades\Auth::id()}}";
    /*    const store_fcmDevice_url="{{route('devices.store')}}";
    const csrf_token="{{csrf_token()}}";
    console.log(userId)*/
</script>

@vite(['resources/js/app.js'])
@stack('scripts')

</body>
</html>

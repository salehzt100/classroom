<!doctype html>
<html lang="en" dir="{{App::currentLocale() =='ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place the first <script> tag in your HTML's <head> -->

    <title>{{$title}}</title>

    @if(App::isLocale('ar'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
              integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
              crossorigin="anonymous">

    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">

    @endif
    <script src="https://cdn.tiny.cloud/1/au6pwp9jpn18hk2yix49fmqwm0s89fklxsdlguy29ypniqoh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>



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
    </style>
</head>
<body class="d-flex flex-column  min-vh-100">

<header class="mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">


        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">{{config('app.name','Laravel')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('classrooms.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <x-user-notifications-menu/>


                </ul>


                <div class="d-flex gap-5 ">
                    <form action="{{route('classrooms.index')}}" class="d-flex" role="search" >

                        <input class="form-control me-2" type="search" name='search' value="{{session('search')}}" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <div class="d-flex gap-4  align-items-center">

                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle bg-transparent border-0"
                                    data-bs-toggle="dropdown" id="dropdown_locale" aria-expanded="false">
                                <svg id="globeIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-globe text-success" viewBox="0 0 16 16">
                                    <path
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A8 8 0 0 0 5.145 4H7.5zM4.09 4a9.3 9.3 0 0 1 .64-1.539 7 7 0 0 1 .597-.933A7.03 7.03 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a7 7 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.5 12.5 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12q.208.58.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a7 7 0 0 1-.597-.933A9.3 9.3 0 0 1 4.09 12H2.255a7 7 0 0 0 3.072 2.472M3.82 11a13.7 13.7 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7 7 0 0 0 13.745 12H11.91a9.3 9.3 0 0 1-.64 1.539 7 7 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855q.26-.487.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.7 13.7 0 0 1-.312 2.5m2.802-3.5a7 7 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7 7 0 0 0-3.072-2.472c.218.284.418.598.597.933M10.855 4a8 8 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z"/>
                                </svg>
                            </button>
                            <ul id="dropdown" class="dropdown-menu">
                                <li>
                                    <form id="localeForm" action="{{ route('locale') }}" method="POST"
                                          aria-labelledby="dropdown_locale">
                                        @csrf
                                        <button type="submit" name="locale" value="en"
                                                class="dropdown-item {{ (Auth::user()->profile->locale == 'en') ? 'active' : '' }}">
                                            English
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form id="localeForm" action="{{ route('locale') }}" method="POST"
                                          aria-labelledby="dropdown_locale">
                                        @csrf
                                        <button type="submit" name="locale" value="ar"
                                                class="dropdown-item {{ (Auth::user()->profile->locale == 'ar') ? 'active' : '' }}">
                                            Arabic
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <span
                            class="badge d-flex align-items-center p-1 pe-2 text-success-emphasis bg-success-subtle border border-success-subtle rounded-pill ">
                            <img class="rounded-circle me-1" width="24" height="24" src="{{Auth::user()?->user_image}}"
                                 alt="">
                           {{Auth::user()?->name}}

                          </span>

                        <div>

                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="Btn" type="submit">
                                    <div class="sign">
                                        <svg viewBox="0 0 512 512">
                                            <path
                                                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                                        </svg>
                                    </div>

                                    <div class="text">Logout</div>
                                </button>
                            </form>


                        </div>

                    </div>

                </div>


            </div>
        </div>
    </nav>
</header>
<main class="min-vh-120">
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
<script>
    const userId = {{Auth::id()}};
</script>
@vite(['resources/js/app.js'])


</body>
</html>

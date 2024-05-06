






<!doctype html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Email</title>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/sidebar.css','resources/css/classroom-index.css','resources/css/main.css'])


    <style>

        .main_btn {

            color: #47b2e4;
            background-color: #11101d;
        }
        .main_btn:hover {

            color: #11101d;
            background-color: #47b2e4;
        }
    </style>

</head>
<body>



<x-nav.breadcrumb >

    <x-slot name="right_nav" >

    </x-slot>

</x-nav.breadcrumb>



<section class="home-section bg-white ">




    <div class="container col-md-11 ">

        <div class="row d-flex  align-items-center justify-content-center vh100 mt-5 p-2 shadow ">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 ps-2 order-2 order-lg-1 ">
                <div class="text-center">
                    <h1 class="mb-3">Verify Email</h1>

                </div>
                <div class="row p-md-5 p-1 ">

                        <div class="mb-4 text-muted">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 text-success">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <button type="submit" class="btn main_btn">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-link">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                </div>

            </div>

            <div class="col-lg-6 order-1 order-lg-2 d-flex justify-content-center " data-aos="zoom-in" data-aos-delay="200">
                <img src="{{asset('index_assets/img/Authentication.png')}}" class="img-fluid animated" alt="" height="400" width="400">
            </div>
        </div>




    </div>
</section>



</body>
</html>

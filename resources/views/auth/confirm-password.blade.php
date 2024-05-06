




<!doctype html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirm Password</title>
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
        <a class="nav-link pe-5  thr_color" href="{{route('register')}}">Sign up</a>

    </x-slot>
</x-nav.breadcrumb>


<section class=" bg-white p-4">




    <div class="container col-md-11 ">

        <div class="row d-flex  align-items-end justify-content-center vh100 mt-5 p-2 shadow ">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 ps-2 order-2 order-lg-1 ">
                <div class="text-center">
                    <h1 class="mb-3">Confirm Password</h1>

                </div>

                <div class="row p-md-5 p-1">

                        <div class="mb-4 text-muted">
                            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                        </div>

                    <form method="POST" action="{{ route('password.confirm') }}" class="form-floating">
                        @csrf

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input type="password"
                                   id="password"
                                   class="form-control @error('password')
                            is-invalid
                        @enderror"
                                   name="password"
                                   placeholder="Password"
                                   required autocomplete="current-password">
                            <label for="password">{{ __('Password') }}</label>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm') }}
                            </button>
                        </div>
                    </form>



                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="200" >
                <img src="{{asset('index_assets/img/verified.png')}}" class="img-fluid animated" alt="" height="400" width="400">
            </div>
        </div>




    </div>
</section>


</body>
</html>

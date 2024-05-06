




<!doctype html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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
        <a class="nav-link pe-5 thr_color" href="{{route('login')}}">Login</a>

    </x-slot>

</x-nav.breadcrumb>



    <section class="home-section bg-white ">




        <div class="container col-md-11 ">

            <div class="row d-flex  align-items-end justify-content-center vh100 mt-5 p-2 shadow ">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 ps-2 order-2 order-lg-1 ">
                    <div class="text-center">
                        <h1 class="mb-3">Sign Up</h1>

                    </div>
                    <div class="row p-md-5 p-1 ">


                    <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="form-floating mb-3">
                                <input id="name" class="form-control  @error('name')
                                    is-invalid
                                    @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="{{ __('Name') }}">
                                <label for="name">{{ __('Name') }}</label>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="form-floating mb-3">
                                <input id="email" class="form-control  @error('email')
                                    is-invalid
                                    @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="{{ __('Email') }}">
                                <label for="email">{{ __('Email') }}</label>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input id="password" class="form-control   @error('password')
                                    is-invalid
                                    @enderror"  type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-floating mb-3">
                                <input id="password_confirmation" class="form-control   @error('password_confirmation')
                                    is-invalid
                                    @enderror" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                <label for="password_confirmation">
                                    {{ __('Confirm Password') }}</label>
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                @enderror
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a class="btn btn-link thr_color" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                                <button type="submit" class="btn main_btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-lg-6 order-1 order-lg-2  " data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{asset('index_assets/img/Register.png')}}" class="img-fluid animated" alt="">
                </div>
            </div>




        </div>
    </section>



</body>
</html>

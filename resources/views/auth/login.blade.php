




<!doctype html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
                        <h1 class="mb-3">Login</h1>

                    </div>

                    <div class="row p-md-5 p-1">
                        <!-- Session Status -->
                        <div class="mb-4">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-floating mb-3">
                                <input id="{{ config('fortify.username') }}"
                                       class="form-control   @error(config('fortify.username'))
                                    is-invalid
                                    @enderror
                                    "
                                       type="text"
                                       name="{{ config('fortify.username') }}"
                                       value="{{ old(config('fortify.username')) }}"
                                       required
                                       autofocus
                                       autocomplete="{{ config('fortify.username') }}"
                                       placeholder="{{ __(config('fortify.username')) }}"



                                >
                                <label for="{{ config('fortify.username') }}">{{ __(config('fortify.username')) }}</label>
                                @error(config('fortify.username'))
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input id="password"
                                       class="form-control   @error(config('fortify.username'))
                                    is-invalid
                                    @enderror"
                                       type="password"
                                       name="password"
                                       required
                                       autocomplete="current-password"
                                       placeholder="{{ __('Password') }}">
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="form-check mb-3">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label class="form-check-label secondary-color" for="remember_me">{{ __('Remember me') }}</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-decoration-none thr_color" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <button type="submit" class="btn main_btn ms-3">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </form>



                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{asset('index_assets/img/login.png')}}" class="img-fluid animated" alt="">
                </div>
            </div>




        </div>
    </section>


</body>
</html>

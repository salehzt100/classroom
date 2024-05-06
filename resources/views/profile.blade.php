<x-basic-layout title="Profile">
    @push('styles')

        @vite(['resources/css/classroom-show.css'])

        <style>

            .account-settings .user-profile {
                margin: 0 0 1rem 0;
                padding-bottom: 1rem;
                text-align: center;
            }

            .account-settings .user-profile .user-avatar {
                margin: 0 0 1rem 0;
            }

            .account-settings .user-profile .user-avatar img {
                width: 90px;
                height: 90px;
                -webkit-border-radius: 100px;
                -moz-border-radius: 100px;
                border-radius: 100px;
            }

            .account-settings .user-profile h5.user-name {
                margin: 0 0 0.5rem 0;
            }

            .account-settings .user-profile h6.user-email {
                margin: 0;
                font-size: 0.8rem;
                font-weight: 400;
                color: #9fa8b9;
            }

            .account-settings .about {
                margin: 2rem 0 0 0;
                text-align: center;
            }

            .account-settings .about h5 {
                margin: 0 0 15px 0;
                color: #007ae1;
            }

            .account-settings .about p {
                font-size: 0.825rem;
            }

            .form-control {
                border: 1px solid #cfd1d8;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                font-size: .825rem;
                background: #ffffff;
                color: #2e323c;
            }

            .card {
                background: #ffffff;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                border: 0;
                margin-bottom: 1rem;
            }

            .re-send-btn:hover{
                color: #47b2e4;
                background-color: #11101d;
            }
            .hidden-code {
                  color: transparent;
                  cursor: pointer;
                  transition: color 0.3s ease;
            }

            .hidden-code:hover {
                color: inherit;
            }




        </style>
    @endpush

    @php
        $user=Auth::user();
    @endphp
    <x-slot name="nav_tabs">


    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('classrooms.index')}}">Classroom</a></li>
        <li class="breadcrumb-item  " aria-current="page">Profile</li>
    </x-slot>
    <div class="container mt-5">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name">{{$user->name}}</h5>
                                <h6 class="user-email">{{$user->email}}</h6>
                            </div>
                           {{-- <div class="about">
                                <h5>About</h5>
                                <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human
                                    experiences.</p>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

                @if($errors->getBag('userDeletion')->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->getBag('userDeletion')->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card h-100">
                    <div class="card-body">

                        <div class="row gutters">



                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="border-start ps-4">
                                    <h6 class="mb-2 text-primary"> {{ __('Profile Information') }}</h6>

                                    <header class="mb-4">


                                        <p class="mt-1 text-sm text-secondary">
                                            {{ __("Update your account's profile information and email address.") }}
                                        </p>
                                    </header>

                                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                        @csrf
                                    </form>

                                    <form method="post" action="{{ route('profile.update') }}" class="mt-4 mb-3">
                                        @csrf
                                        @method('patch')

                                        <div class="form-floating mb-3 ">

                                            <input value="{{old('name', $user->name)}}"
                                                   name="name"
                                                   id="name"
                                                   type="text"
                                                @class(["form-control mt-3", "is-invalid"=>$errors->has('name' ?? '')  ])>
                                            <label class="mt-0 " for="name">{{ucwords('name')}}</label>
                                            @if( $errors->has('name' ?? ''))
                                                <div class=" invalid-feedback">
                                                    <ul >
                                                        @foreach ($errors->get('name' ?? '')  as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>

                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-floating mb-3 ">

                                            <input value="{{old('email', $user->email)}}"
                                                   name="email"
                                                   id="email"
                                                   type="email"
                                                @class(["form-control mt-3", "is-invalid"=>$errors->has('email' ?? '') ])
                                            >
                                            <label class="mt-0 " for="name">{{ucwords('email')}}</label>
                                            @if( $errors->get('email'))
                                                <div class=" invalid-feedback">
                                                    <ul >
                                                        @foreach ( $errors->get('email' ?? '') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                                <div class="mt-2 text-muted">
                                                    <p class="text-sm">
                                                        <small class="text-danger">
                                                            {{ __('Your email address is unverified.') }}

                                                        </small>

                                                        <button form="send-verification"
                                                                class="underline mt-2 btn thr_bg_color secondary-color re-send-btn ">
                                                            {{ __('Click here to re-send the verification email.') }}
                                                        </button>



                                                    </p>

                                                    @if (session('status') === 'verification-link-sent')
                                                        <p class="mt-2 fw-medium text-sm text-success">
                                                            {{ __('A new verification link has been sent to your email address.') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif

                                        </div>




                                        <div class="d-flex align-items-center gap-3">
                                            <button class=" btn main_btn ">{{ __('Save') }}</button>

                                            @if (session('status') === 'profile-updated')
                                                <p
                                                    x-data="{ show: true }"
                                                    x-show="show"
                                                    x-transition
                                                    x-init="setTimeout(() => show = false, 2000)"
                                                    class="text-sm text-secondary"
                                                >{{ __('Saved.') }}</p>
                                            @endif
                                        </div>
                                    </form>

                                </div>


                                <div class="mt-5">

                                    <div class="border-start ps-4">

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mb-2 text-primary">   {{ __('Update Password') }}</h6>
                                        </div>

                                        <header class="mb-4">


                                            <p class="mt-1 text-secondary">
                                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                            </p>
                                        </header>

                                        <form method="post" action="{{ route('user-password.update') }}"
                                              class="mt-4 mb-3 " >
                                            @csrf
                                            @method('put')

                                            <div class="form-floating mb-3 ">

                                                <input
                                                    name="current_password"
                                                    id="update_password_current_password"
                                                    type="password"
                                                    @class(["form-control mt-3", "is-invalid"=>$errors->updatePassword->has('current_password' ?? '') ])
                                                >
                                                <label class="mt-0 " for="update_password_current_password">{{ucwords(__('Current Password'))}}</label>
                                                @if( $errors->updatePassword->get('current_password'))
                                                    <div class=" invalid-feedback">
                                                        <ul >
                                                            @foreach ( $errors->updatePassword->get('current_password') as $message)
                                                                <li>{{ $message }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif


                                            </div>

                                            <div class="form-floating mb-3 ">

                                                <input
                                                    name="password"
                                                    id="update_password_password"
                                                    type="password"
                                                    class="form-control mt-3 @if($errors->updatePassword->has('password')) is-invalid @endif "
                                                >
                                                <label class="mt-0 " for="update_password_password">
                                                    {{ucwords(__('New Password'))}}</label>
                                                @if( $errors->updatePassword->has('password'))
                                                    <div class="invalid-feedback">
                                                        <ul >
                                                            @foreach ( $errors->updatePassword->get('password') as $message)
                                                                <li>{{ $message }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif


                                            </div>
                                            <div class="form-floating mb-3 ">

                                                <input
                                                    name="password_confirmation"
                                                    id="update_password_password_confirmation"
                                                    type="password"
                                                    class="form-control mt-3 @if($errors->updatePassword->has('password_confirmation')) is-invalid @endif "
                                                >
                                                <label class="mt-0 " for="update_password_password_confirmation">
                                                    {{ucwords(__('Confirm Password'))}}</label>
                                                @if( $errors->updatePassword->has('password_confirmation'))
                                                    <div class="invalid-feedback">
                                                        <ul >
                                                            @foreach ( $errors->updatePassword->get('password_confirmation') as $message)
                                                                <li>{{ $message }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif


                                            </div>



                                            <div class="d-flex align-items-center gap-3">
                                                <button class="btn main_btn">{{ __('Save') }}</button>

                                                @if (session('status') === 'password-updated')
                                                    <p
                                                        x-data="{ show: true }"
                                                        x-show="show"
                                                        x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-secondary"
                                                    >{{ __('Saved.') }}</p>
                                                @endif
                                            </div>
                                        </form>

                                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                            @csrf
                                        </form>

                                    </div>
                                    </div>



                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-lg-0 mt-md-5 mt-sm-5 mt-5  ">

                                <div class="border-start ps-4">
                                    <h6 class="mb-2 text-primary">  Two-Factor Authentication Settings </h6>

                                    <header class="mb-4">

                                        <p class="mt-1 text-sm text-secondary"></p>

                                    </header>

                                    <div id="twoFactorAuth">


                                        @if ($user->two_factor_secret && $user->two_factor_confirmed_at )

                                            <div class="p-1 shadow mb-4 recovery_codes ">
                                                <h4 class="mb-3 mt-2 ms-2">Recovery Codes</h4>


                                               <ul>
                                                    @foreach($user->recoveryCodes() as $code)
                                                        <li class="pb-1 secondary-color hidden-code">
                                                            {{$code}}
                                                        </li>

                                                    @endforeach
                                                </ul>
                                            </div>


                                            <form action="{{route('two-factor.disable')}}" method="post" id="d_twoFactorForm">
                                                @csrf
                                                @method('delete')

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="d_toggle2FA" checked>
                                                    <label for="d_toggle2FA">Disable Two-Factor Authentication.</label>
                                                </div>
                                            </form>

                                        @else

                                            @if(session('status') == 'two-factor-authentication-enabled')
                                                <div class="mb-4 font-medium text-sm">
                                                    Please finish configuring two factor authentication below.
                                                </div>

                                                <div class="d-flex justify-content-center p-2 mb-5">
                                                    {!! $user->twoFactorQrCodeSvg() !!}

                                                </div>

                                                <form action="{{route('two-factor.confirm')}}" method="post">
                                                    @csrf

                                                    <div class="mb-2 font-medium text-sm">
                                                        Enter To Confirm Enable 2FA
                                                    </div>
                                                    <div class="form-floating mb-3 ">

                                                        <input
                                                            name="code"
                                                            id="code"
                                                            type="text"
                                                            class="form-control mt-3">
                                                        <label class="mt-0 " for="update_password_password_confirmation">
                                                            {{ucwords(__('Confirm'))}}</label>



                                                    </div>

                                                    <button class="btn main_btn">Confirm</button>

                                                </form>
                                            @else
                                                <form action="{{route('two-factor.enable')}}" method="post" id="e_twoFactorForm">
                                                    @csrf

                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="e_toggle2FA">
                                                        <label for="e_toggle2FA">Enable Two-Factor Authentication.</label>

                                                    </div>


                                                </form>

                                            @endif


                                        @endif


                                    </div>


                                </div>

                        </div>

                        <div class="row gutters mt-5 ">


                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="border-start ps-4">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">  {{ __('Delete Account') }}</h6>
                                </div>
                                <header>

                                    <p class="mt-1 text-secondary">
                                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                    </p>
                                </header>

                                <button
                                    id="delete_account"
                                    type="button"
                                    class="btn btn-danger mt-3"
                                    data-bs-toggle="modal"
                                    data-bs-target="#confirmUserDeletionModal"
                                >{{ __('Delete Account') }}</button>

                                <!-- Modal -->
                                <div class="modal  " id="confirmUserDeletionModal" tabindex="4"
                                     aria-labelledby="confirmUserDeletionLabel" aria-hidden="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="{{ route('profile.destroy') }}">
                                                @csrf
                                                @method('delete')

                                                <div class="modal-header">
                                                    <h5 class="modal-title fs-5 fw-medium"
                                                        id="confirmUserDeletionLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>

                                                    <div class="mb-3">
                                                        <label for="password"
                                                               class="form-label sr-only">{{ __('Password') }}</label>
                                                        <input
                                                            id="password"
                                                            name="password"
                                                            type="password"
                                                            class="form-control mt-1"
                                                            placeholder="{{ __('Password') }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ __('Delete Account') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>
    </section>


    @push('scripts')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


            <script>
                $(document).ready(function() {
                    $('#e_toggle2FA').change(function() {
                        $('#e_twoFactorForm').submit();
                    });

                    $('#d_toggle2FA').change(function() {
                        $('#d_twoFactorForm').submit();
                    });

                    $('#delete_account').click(function () {
                        $('.modal-backdrop').remove();  // Remove existing backdrops if any
                        $('.modal').modal('show');
                    });
                });
            </script>


        @endpush


</x-basic-layout>



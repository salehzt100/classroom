<nav class="navbar   secondary-bg-color align-items-center pe-4">

    <nav aria-label="breadcrumb left">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item ">
                <a class="navbar-brand logo" href="{{route('home')}}"><img
                        src="{{Storage::disk('public')->url('images/logo-1.png')}}" width="180" height="60" class="p-0 m-0"
                        alt="logo">
                </a>
            </li>
            {{$slot}}
        </ol>
    </nav>

    <nav class="right ">

        {{$right_nav}}
    </nav>


</nav>

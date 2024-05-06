<!doctype html>
<html lang="en" dir="ltr">
<head>
{{--{{App::currentLocale() =='ar' ? 'rtl' : 'ltr'}}"--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title',config('app.name'))</title>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/sidebar.css','resources/css/classroom-index.css','resources/css/main.css'])

    <style>

        #avatar{
            width: 4px;
        }
        .nav-list {
            max-height: 100vh; /* Adjust to the max height you want */
        }
        span .teaching_list{
            display: block;
            max-height: 7rem;
            overflow-y:scroll;
            overflow-x:hidden;
            scrollbar-width: none; /* This hides the scrollbar in Firefox */

        }
        .teaching_list::-webkit-scrollbar {
            display: none; /* This will hide the scrollbar in WebKit browsers */
        }
        .enrolled_list::-webkit-scrollbar {
            display: none; /* This will hide the scrollbar in WebKit browsers */
        }

        span .enrolled_list{
            display: block;
            max-height: 7rem;
            overflow-y:scroll;
            overflow-x:hidden;
            scrollbar-width: none; /* This hides the scrollbar in Firefox */


        }
        span .teaching_list.active {
            display: none;
        }
        span .enrolled_list.active {
            display: none;

        }

        .pl-9{
            padding-right: 12rem;
        }

        /* This CSS will hide elements with the class 'hide-on-small-screens' on screens smaller than 768px wide */
        @media (max-width: 768px) {
            .hide-on-small-screens {
                display: none !important;
            }
        }

    </style>
    @stack('styles')
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">


</head>
<body >


<x-sidebar />


<div class="right-sid ">

    <section class="home-section bg-white">
        <x-nav.breadcrumb >


            {{$breadcrumb}}

<x-slot name="right_nav" >
       <span class="text-primary d-flex justify-content-end align-items-center ">
    @auth
            <x-user-notifications-menu/>
        @endauth

           <a href="{{route('profile')}}" class="text-decoration-none ">
                <span id="profile"
                      class="badge d-flex align-items-center p-1 pe-2 rounded-pill ms-3 gap-2 profile hide-on-small-screens">
        {{ucwords(Auth::user()?->name)}}
<img class="rounded-circle me-1" width="24" height="24" src="{{Auth::user()?->user_image}}" alt="">


</span>
           </a>




    </span>
</x-slot>

        </x-nav.breadcrumb>

        <ul class="nav nav-tabs ">
          {{$nav_tabs}}
        </ul>

        <div class="container ms-5 ">



            {{$slot}}


        </div>
    </section>

</div>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->



@vite(['resources/js/sidebar.js'])
@vite(['resources/js/app.js'])
@stack('scripts')

<script>
        // Wait for the DOM to be loaded
        document.addEventListener('DOMContentLoaded', function () {
        // Get the teaching button and the teaching list elements
        var teachingButton = document.getElementById('teachingButton');
        var teachingList = document.querySelector('.teaching_list');

        // Add click event listener to the teaching button
        teachingButton.addEventListener('click', function (event) {
        // Prevent the default anchor action
        event.preventDefault();

        // Toggle the active class on the teaching list
        teachingList.classList.toggle('active');

    });

            var enrolledButton = document.getElementById('enrolledButton');
            var enrolledList = document.querySelector('.enrolled_list');

            enrolledButton.addEventListener('click', function (event) {
                // Prevent the default anchor action
                event.preventDefault();

                // Toggle the active class on the teaching list
                enrolledList.classList.toggle('active');
            });


        });




</script>


</body>
</html>

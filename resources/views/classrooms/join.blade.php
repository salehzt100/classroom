
<!doctype html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Join Classroom</title>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/sidebar.css','resources/css/classroom-index.css','resources/css/main.css'])


    <style>
    </style>

</head>
<body>



<x-nav.breadcrumb >

    <x-slot name="right_nav" >
    </x-slot>
</x-nav.breadcrumb>

<div class="right-sid ">

    <section class="home-section bg-white">




        <div class="container ">

            <div class="row d-flex  align-items-start justify-content-center vh100 mt-5 p-4 shadow">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 ps-2 order-2 order-lg-1 ">
                    <h1 class="mb-3">Welcome EduClassroom!</h1>
                    <p>To join our class and start participating in activities, simply click the button below .</p>

                    <div class="row mt-4 justify-content-between align-items-end ">
                        <div class="col-6 ">

                            <strong class="">Class Name:</strong>
                            <span id="className" class="secondary-color ms-2" > {{$classroom->name}}</span>
                            <br class="mb-1">
                            <strong>Instructor:</strong> <span id="instructorName" class="secondary-color ms-2">{{$classroom->user->name}}</span><br>


                        </div>

                        <div class="col-3">
                            <form  action="{{route('classrooms.join',$classroom->id)}}" method="post" >
                                @csrf
                                <button type="submit" class="btn main_btn w-100">

                                    {{__('join')}}

                                </button>
                            </form>

                        </div>


                    </div>

                </div>
                <div class="col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{asset('index_assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
                </div>
            </div>




        </div>
    </section>

</div>

</body>
</html>

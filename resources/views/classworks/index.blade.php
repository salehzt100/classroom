


<x-basic-layout title="Home">
    @push('styles')

        @vite(['resources/css/classroom-show.css'])

        <style>
            .small-font {
                font-size: 0.75rem; /* Adjust the size as needed */
            }


            .create_classwork{
                padding: 1rem;
                background-color: #47b2e4;
                border-radius: 40%;
                box-shadow: 1px 1px #11101d;
            }
            .find_btn:hover{
                background-color:#47b2e4 ;
                color: #11101d;
            }

            .classwork{

                display: flex;
                justify-content: space-between;
                align-items: start;
            }


            .status_submission{
                display: flex;
                justify-content: space-around;
                margin-top: 2rem;
                color: red;
            }
            @media (min-width: 800px) {

                .classwork{
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    justify-content: start;
                    align-items: start;
                }
                .status_submission{

                    display: flex;
                    justify-content: space-around;
                    border-top: 1px solid red;
                    margin-top: 2rem;
                    padding-top: 2rem;
                }

            }

        </style>
    @endpush

        <x-classroom-nav :classroom="$classroom" active="classwork" />


        <x-slot name="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('classrooms.index')}}">Classroom</a></li>
            <li class="breadcrumb-item  " aria-current="page"><a href="{{route('classrooms.show',$classroom->id)}}">{{$classroom->name}}</a></li>
            <li class="breadcrumb-item  " aria-current="page">Classwork</li>
        </x-slot>





        <div class=" mt-5">

            @can('create',[\App\Models\Classwork::class,$classroom])
                <div class="btn-group dropend " >
                    <button type="button" class="create_classwork" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        + Create
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                               href="{{route('classrooms.classworks.create',[$classroom->id,'type'=>'assignment'])}}">Assignment</a>
                        </li>
                        <li><a class="dropdown-item"
                               href="{{route('classrooms.classworks.create',[$classroom->id,'type'=>'question'])}}">Question</a>
                        </li>
                        <li><a class="dropdown-item"
                               href="{{route('classrooms.classworks.create',[$classroom->id,'type'=>'material'])}}">Material</a>
                        </li>
                    </ul>
                </div>
            @endcan
            <hr class="m-4">

            <x-alert name="success" class="alert-success"/>
            <x-alert name="error" class="alert-danger"/>


            <div class="row">
                <div class="col-md-11 ">
                    <div class="shadow my-3 p-3 bg-body rounded shadow-sm border border-gray-400 accordion accordion-flush"
                         id="accordionFlushExample">

                        <form  action="" class="row row-cols-lg-auto g-3 align-items-center mb-3" method="get">
                            <div class="col-12">
                                <label class="visually-hidden" for="search">Search</label>
                                <div class="input-group">
                                    <input name="search" type="text" class="form-control" id="search" placeholder="Search...">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn thr_color secondary-bg-color find_btn ">Find</button>
                            </div>
                        </form>

                        <div class="accordion accordion-flush" id="classworks">

                            {{--                    <h6 class="border-bottom pb-2 mb-0 text text-info fs-2 text-center ">{{$group->first()->topic?->name}}</h6>--}}

                            @foreach($classworks as $classwork)

                                <div class="accordion-item  shadow">
                                    <h2 class="accordion-header ">
                                        <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{$classwork->id}}" aria-expanded="false"
                                                aria-controls="flush-collapse{{$classwork->id}}">
                                            {{$classwork->title}}
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{$classwork->id}}" class="accordion-collapse collapse "
                                         data-bs-parent="#classworks">
                                        <div class="row  p-1 ">

                                            <div class="col ">
                                                <div class="accordion-body ">{!!  $classwork->description!!}</div>


                                            </div>



                                                <div class="col-12 col-md-5 d-flex flex-column justify-content-between">
                                                    @can('teacher',[$classroom])

                                                    <div class="row justify-content-center pt-3 pb-3 mt-3 shadow rounded ms-1 me-1   ">
                                                        <div class="col-3 text-center ">
                                                            <div class="fs-6 small-font">{{$classwork->assigned_count}}</div>
                                                            <div class="fs-7 text-muted small-font">Assigned</div>
                                                        </div>
                                                        <div class="col-4 text-center ms-2">
                                                            <div class="fs-6 small-font">{{$classwork->turnedin_count}}</div>
                                                            <div class="fs-7 text-muted small-font">Turned in</div>
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <div class="fs-6 small-font">{{$classwork->graded_count}}</div>
                                                            <div class="fs-7 text-muted small-font">Graded</div>
                                                        </div>
                                                    </div>
                                                    @endcan

                                                    <div class="p-2 p-md-4 d-flex   justify-content-end  align-items-start gap-3 ms-3 mt-4">
                                                        @can('update',[\App\Models\Classwork::class,$classwork])

                                                        <a class="btn main_btn"
                                                           href="{{route('classrooms.classworks.edit',[$classroom->id,$classwork->id])}}" >Edit</a>
                                                     @endcan
                                                        <a class="btn main_btn"
                                                           href="{{route('classrooms.classworks.show',[$classroom->id,$classwork->id])}}">View</a>
                                                    </div>
                                                </div>




                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                        <div class="mt-5 d-flex justify-content-end">
                            {{ $classworks->withQueryString()->links() }}

                        </div>

                    </div>

                </div>
                <div class="col-md-4">


                </div>
            </div>




        </div>



    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Place the following <script> and <textarea> tags your HTML's <body> -->

        @vite(['resources/js/classroom-show.js'])
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            const classroomId="{{$classroom->id}}";

        </script>
    @endpush


</x-basic-layout>



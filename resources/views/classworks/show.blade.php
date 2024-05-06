





<x-basic-layout title="Classwork Create">
    @push('styles')

        @vite(['resources/css/classroom-show.css'])

        <style>
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
            .submission_file a{
                padding: 1rem;
                text-decoration: none;
                color:#47b2e4 ;
                margin-left: 1rem;
                font-size: 1.2rem;
            }
            .submission_file{
                padding: 1rem;
                background-color: #11101d;
                margin: 1rem 1rem 1rem 0;
                border-radius: 15px;

            }
        </style>
    @endpush

    <x-slot name="nav_tabs" >

        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('classrooms.show',$classroom->id)}}">Stream</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('classrooms.classworks.index',$classroom->id)}}">Classwork</a>

        </li>
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('classrooms.people',$classroom->id)}}">People</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="#">Marks</a>
        </li>
    </x-slot>


    <x-slot name="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('classrooms.index')}}">Classroom</a></li>
        <li class="breadcrumb-item  " aria-current="page"><a href="{{route('classrooms.show',$classroom->id)}}">{{$classroom->name}}</a></li>
        <li class="breadcrumb-item  " aria-current="page"><a href="{{route('classrooms.classworks.index',$classroom->id)}}">Classwork</a></li>
        <li class="breadcrumb-item  " aria-current="page">{{$classwork->title}}</li>
    </x-slot>




    <div class="container mt-5 mb-5">
        <div class="row " >
            <div class="col-md-8 border p-3 rounded ">
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{$classwork->user->user_image}}" alt="avatar" width="25"
                                 height="25" class="rounded"/>
                            <p class="small mb-0 ms-2">{{$classwork->user->name}}</p>
                        </div>
                        <small class="secondary-color">{{$classwork->created_at->diffForHumans()}}</small>
                    </div>

                    <p class="mb-5 mt-4 ms-5  ">{!! $classwork->description !!}</p>



                    <div class="border-top">

                        <div class="comments pt-3" id="comments">


                            @foreach($comments as $comment)
                                <div class="row pt-3">
                                    <div class="col-md-1 class_img">
                                        <img src="{{$comment->user->user_image}}" alt="avatar" width="25"
                                             height="25" class="rounded"/>
                                    </div>

                                    <div class="col-md-10 border p-2 rounded">
                                        <div class="d-flex bor">
                                            <h6 class="secondary-color">{{$comment->user->name}} </h6>
                                            <small
                                                class="text-muted ms-3">{{$comment->created_at?->format('H:i')}}</small>
                                        </div>


                                        <p class="mb-0">{!! $comment->content !!}</p>
                                    </div>


                                </div>
                            @endforeach

                        </div>

                        <form action="{{route('comments.store')}}"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <input type="hidden" name="id" value="{{$classwork->id}}">
                            <input type="hidden" name="type" value="classwork">


                            <div class="row mt-4 align-items-center">

                                <div class="col-md-1">
                                    <img src="{{Auth::user()->user_image}}" alt="avatar" width="25" height="25"
                                         class="rounded"/>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  name="content" class="form-control"
                                           placeholder="Add comment..."/>

                                </div>
                                <button type="submit" class="col-md-1 border-0 bg-white pb-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#47b2e4" class="bi bi-send" viewBox="0 0 16 16">
                                        <path
                                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                                    </svg>                                        </button>
                            </div>
                        </form>
                    </div>


                </div>

            </div>
            <div class="col-md-4">



                @can('submission.create',[$classwork])

                    <div class="bordered rounded p-3 bg-light ">
                        <h4 class="mb-5 "> Submissions </h4>
                        @if($submissions->count())

                            <div class="files ">

                                <ul>
                                    @foreach($submissions as $submission)
                                        <li class="submission_file">
                                            <a href="{{route('submissions.file',$submission->id)}}" class="row p-1 " target="_blank"> File  {{$loop->iteration}}</a>
                                        </li>
                                    @endforeach
                                </ul>


                            </div>
                        @else
                            <form action="{{ route('submissions.store', $classwork->id) }}" method="post"
                                  class="d-flex flex-column align-items-start mt-3" enctype="multipart/form-data">
                                @csrf

                                <x-form.floating-control name="files.0">
                                    <x-form.input type="file" name="files[]" errorname="files.0" label="Uploads Files"
                                                  placeholder="Uploads Files" multiple/>
                                </x-form.floating-control>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>

                        @endif
                    </div>
                @endcan
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






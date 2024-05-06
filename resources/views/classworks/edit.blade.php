
<x-basic-layout title="Classwork Create">


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
        <li class="breadcrumb-item  " aria-current="page"><a href="{{route('classrooms.classworks.show',[$classroom->id,$classroom->id])}}">{{$classwork->title}}</a></li>

        <li class="breadcrumb-item  " aria-current="page">Edit</li>
    </x-slot>




    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-start">
            <h3 class="mb-5 col">Edit Classwork</h3>
            <form class="container col ml-auto d-flex justify-content-end align-items-start" action="{{route('classrooms.classworks.destroy',[$classroom->id,$classwork->id])}}"
                  method="post"
                >
                @csrf
                @method('delete')


                <button type="submit" class="btn btn-danger ">Delete Classwork</button>

            </form>

        </div>



        <form class="container" action="{{route('classrooms.classworks.update',[$classroom->id,$classwork->id,'type'=>$type])}}"
              method="post"
              enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('classworks._form')

            <button type="submit" class="btn main_btn">Update</button>

        </form>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Topic</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{route('topics.store')}}" method="post">

                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="classroom_id" value="{{$classroom->id}}">



                            <x-form.floating-control name="name">
                                <x-form.input name="name" value="" label="Topic Name" placeholder="Topic Name" id="topic_name" />
                            </x-form.floating-control>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary thr_bg_color">Add</button>
                        </div>
                    </form>

                </div>
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




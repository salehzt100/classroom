
<x-basic-layout :title="'Create Classroom '">
    @push('styles')

        @vite(['resources/css/classroom-show.css'])

        <style>
            .edit_classroom {

                text-decoration: none;
            }
            .edit_classroom:hover{
                color: white;
                cursor: pointer;
            }


        </style>
    @endpush

    <x-slot name="nav_tabs">


    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('classrooms.index')}}">Classroom</a></li>
        <li class="breadcrumb-item " aria-current="page">Create</li>
    </x-slot>

    <div class="container mt-4">
            <h1>Create classroom</h1>
            @if($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('classrooms.store')}}" method="post" enctype="multipart/form-data">

                {{--<input type="hidden" name="_token" value="{{csrf_token()}}">
                {{csrf_field()}}
                @csrf
                --}}
                @csrf
                @include('classrooms._form',
                   [
                      'button_label'=>'Create'
                   ])


            </form>


    </div>

    </section>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Place the following <script> and <textarea> tags your HTML's <body> -->

        @vite(['resources/js/classroom-show.js'])
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            $('#myModal').modal(options)

        </script>
    @endpush


</x-basic-layout>



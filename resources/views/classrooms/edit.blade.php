

<x-basic-layout :title="'Edit Classroom '.$classroom->name">
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
        <li class="breadcrumb-item  " aria-current="page"><a href="{{route('classrooms.show',$classroom->id)}}">{{$classroom->name}}</a></li>
        <li class="breadcrumb-item  " aria-current="page">Edit</li>
    </x-slot>

        <div class="container mt-4">
            <h1 class="mb-4 secondary-color">Edit classroom</h1>
            <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST" enctype="multipart/form-data">
                {{--  Form Method Sppofing  --}}
                {{--  @method_field('patch') --}}

                @csrf
                @method('put')
                @include('classrooms._form',
                             [
                                'button_label'=>'Update'
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



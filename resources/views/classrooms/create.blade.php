@extends('layouts.master')
@section('title','Create Classroom')
@section('content')
    <div class="container">
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
                  'button_label'=>'Create Classroom'
               ])


    </form>
      {{--  <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script>
            // Get a reference to the file input element
            const inputElement = document.querySelector('input[type="file"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement);
        </script>--}}

</div>
@endsection

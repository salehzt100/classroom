@extends('layouts.master')
{{--  auto escape ,  jsut insert string not tag--}}
@section('title','Classrooms')
@section('content')
<div class="container">
    <h1 class="mb-5"> Classrooms</h1>
    @if($success)
        <div class="alert alert-success">
            {{$success}}
        </div>

    @endif

    <div class="row">
        @foreach($classrooms as $classroom)
            <div class="col-md-3">

                <div class="card">
                     <img src="storage/{{$classroom->cover_image_path}}" class="card-img-top" alt>
                    <div class="card-body">
                        <h5 class="card-title fs-2">{{$classroom->name}}</h5>
                        <p class="card-text">{{$classroom->section}}</p>
                        <div class="d-inline-flex gap-1">
                            <a href="{{route('classrooms.show',$classroom->id)}}" class="btn btn-primary">Show</a>
                            <a href="{{route('classrooms.edit',$classroom->id)}}" class="btn btn-success">Update</a>
                            <form action="{{route('classrooms.destroy',$classroom->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger"></input>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>


</div>
@endsection
@push('scripts')
    <script>console.log('@@stack')</script>
@endpush


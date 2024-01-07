@extends('layouts.master')
@section('title','Edit Classroom '."$classroom->name")
@section('content')
<div class="container">
    <h1>Create classroom</h1>
    <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST">
        {{--  Form Method Sppofing  --}}
        {{--  @method_field('patch') --}}

        @csrf
        @method('put')

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name='name' value="{{$classroom->name}} " id="name" placeholder="Classroom Name">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="section" value="{{$classroom->section}} "  id="section" placeholder="Section">
            <label for="section">Section</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name='subject' value="{{$classroom->subject}} "  id="subject" placeholder="Subject">
            <label for="subject">Subject</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name='room' value="{{$classroom->room}} "  id="room" placeholder="Room">
            <label for="room">Room</label>
        </div>
        <img src= "{{ Storage::disk('public')->url($classroom->cover_image_path)}}" class="card-img-top" alt>

        <div class="form-floating mb-3">
            <input type="file" class="form-control" name='cover_image' value="" id="cover_image" placeholder="Cover Image">
            <label for="cover_image">Cover Image</label>
        </div>
        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
</div>
@endsection

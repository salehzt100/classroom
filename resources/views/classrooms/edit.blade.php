@extends('layouts.master')
@section('title','Edit Classroom '."$classroom->name")
@section('content')
<div class="container">
    <h1>Create classroom</h1>
    <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST" enctype="multipart/form-data">
        {{--  Form Method Sppofing  --}}
        {{--  @method_field('patch') --}}

        @csrf
        @method('put')
        @include('classrooms._form',
                     [
                        'button_label'=>'Update Classroom'
                     ])
    </form>
</div>
@endsection

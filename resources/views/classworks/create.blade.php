<x-main-layout title="Classwork Create">
    <div class="container">
        <h1 class="mb-3"> {{$classroom->name}}</h1>
        <h3 class="mb-4">Create Classwork</h3>

        <form action="{{route('classrooms.classworks.store',[$classroom->id,'type'=>$type])}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @include('classworks._form')

            <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </div>
</x-main-layout>

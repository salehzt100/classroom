
<x-main-layout title="Classroom">

<div class="container">
    <h1 class="mb-5"> Classrooms</h1>

    <x-alert name="success" class="alert-success" />

    <x-alert name="error" class="alert-danger" />

    <div class="row">
        @foreach($classrooms as $classroom)
            <x-classroom-card :classroom="$classroom" />
        @endforeach
    </div>


</div>
@push('scripts')
    <script>console.log('@@stack')</script>
@endpush
</x-main-layout>

<x-main-layout :title="__('Classrooms')">

    <div class="container">

        <h1 class="mb-5"> {{__('Classrooms')}}</h1>

        <x-alert name="success" class="alert-success"/>

        <x-alert name="error" class="alert-danger"/>


        <div class="row">
            @foreach($classrooms as $classroom)
                <x-classroom-card :classroom="$classroom"/>
            @endforeach
        </div>


    </div>
    @push('scripts')
        <script>console.log('@@stack')</script>
    @endpush
{{--    <button class="btn btn-primary position-relative">--}}
{{--        <i class="fa-solid fa-envelope"></i>--}}
{{--        <span class="position-absolute top-0 start-100 translate-middle p-1 text-bg-danger border border-light rounded-circle">--}}
{{--    <span class="visually-hidden">New alerts</span>--}}
{{--  </span>--}}
{{--    </button>--}}
{{--    <button type="button" class="btn btn-primary position-relative">--}}
{{--        Inbox--}}
{{--        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger">--}}
{{--    99+--}}
{{--    <span class="visually-hidden">unread messages</span>--}}
{{--  </span>--}}
{{--    </button>--}}
</x-main-layout>



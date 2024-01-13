<x-main-layout :title="$classroom->name">
    <div class="container">
        <h1 class="mb-3"> {{$classroom->name}}</h1>
        <h3 class="mb-4">Classworks</h3>

        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                + Create
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item"
                       href="{{route('classrooms.classworks.create',[$classroom->id,'type'=>'assignment'])}}">Assignment</a>
                </li>
                <li><a class="dropdown-item"
                       href="{{route('classrooms.classworks.create',[$classroom->id,'type'=>'question'])}}">Question</a>
                </li>
                <li><a class="dropdown-item"
                       href="{{route('classrooms.classworks.create',[$classroom->id,'type'=>'material'])}}">Material</a>
                </li>
            </ul>
        </div>
        <hr class="m-4">

        <x-alert name="success" class="alert-success"/>
        <x-alert name="error" class="alert-danger"/>

        {{--        @forelse($classworks as $group)--}}

        {{--        <div class="accordion accordion-flush" id="accordionFlushExample">--}}

        {{--            <h3 class="text-center bg  bg-gray-500 ">{{$group->first()->topic->name}}</h3>--}}
        {{--            <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">--}}
        {{--                {{$group->first()->topic->name}}--}}
        {{--            </div>--}}
        {{--            @foreach($group as $classwork)--}}
        {{--                <div class="accordion-item">--}}
        {{--                    <h2 class="accordion-header">--}}
        {{--                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"--}}
        {{--                                data-bs-target="#flush-collapse{{$classwork->id}}" aria-expanded="false"--}}
        {{--                                aria-controls="flush-collapse{{$classwork->id}}">--}}
        {{--                            {{$classwork->title}}--}}
        {{--                        </button>--}}
        {{--                    </h2>--}}
        {{--                    <div id="flush-collapse{{$classwork->id}}" class="accordion-collapse collapse"--}}
        {{--                         data-bs-parent="#accordionFlushExample">--}}
        {{--                        <div class="accordion-body">{{$classwork->description}}</div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--            @endforeach--}}
        {{--            @empty--}}
        {{--                <div class="text-center fs-3">No Classworks Found!</div>--}}
        {{--            @endforelse--}}

        @forelse($classworks as $group)

            <div class="shadow my-3 p-3 bg-body rounded shadow-sm border border-gray-400 accordion accordion-flush" id="accordionFlushExample{{$group->first()->id}}">
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <h6 class="border-bottom pb-2 mb-0 text text-info fs-2 text-center ">{{$group->first()->topic?->name}}</h6>

                    @foreach($group as $classwork)

                        <div class="accordion-item ">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse{{$classwork->id}}" aria-expanded="false"
                                        aria-controls="flush-collapse{{$classwork->id}}">
                                    {{$classwork->title}}
                                </button>
                            </h2>
                            <div id="flush-collapse{{$classwork->id}}" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample{{$group->first()->id}}">
                                <div class="accordion-body">{{$classwork->description}}</div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        @empty
            <div class="text-center fs-3">No Classworks Found!</div>
        @endforelse


    </div>

</x-main-layout>

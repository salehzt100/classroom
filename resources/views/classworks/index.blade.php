<x-main-layout :title="$classroom->name">
    <div class="container">
        <h1 class="mb-3"> {{$classroom->name}}</h1>
        <h3 class="mb-4">Classworks</h3>


        @can('classwork.create',[$classroom])
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
        @endcan
        <hr class="m-4">

        <x-alert name="success" class="alert-success"/>
        <x-alert name="error" class="alert-danger"/>


        <div class="row">
            <div class="col-md-8">
                <div class="shadow my-3 p-3 bg-body rounded shadow-sm border border-gray-400 accordion accordion-flush"
                     id="accordionFlushExample">

                    <form  action="" class="row row-cols-lg-auto g-3 align-items-center mb-3" method="get">
                        <div class="col-12">
                            <label class="visually-hidden" for="search">Search</label>
                            <div class="input-group">
                                <input name="search" type="text" class="form-control" id="search" placeholder="Search...">
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Find</button>
                        </div>
                    </form>

                    <div class="accordion accordion-flush" id="classworks">

                        {{--                    <h6 class="border-bottom pb-2 mb-0 text text-info fs-2 text-center ">{{$group->first()->topic?->name}}</h6>--}}

                        @foreach($classworks as $classwork)

                            <div class="accordion-item ">
                                <h2 class="accordion-header ">
                                    <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{$classwork->id}}" aria-expanded="false"
                                            aria-controls="flush-collapse{{$classwork->id}}">
                                        {{$classwork->title}}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{$classwork->id}}" class="accordion-collapse collapse"
                                     data-bs-parent="#classworks">
                                    <div class="row p-4">
                                        <div class="accordion-body col-md-9">{{$classwork->description}}</div>
                                        <div class="col-md-3 d-flex justify-content-between align-items-start gap-1">
                                            <a class="btn btn-outline-dark"
                                               href="{{route('classrooms.classworks.edit',[$classroom->id,$classwork->id])}}" >Update</a>
                                            <a class="btn btn-outline-success"
                                               href="{{route('classrooms.classworks.show',[$classroom->id,$classwork->id])}}">View</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>

                    <div>
                        {{ $classworks->withQueryString()->links() }}

                    </div>

                </div>

            </div>
            <div class="col-md-4">


            </div>
        </div>




    </div>

</x-main-layout>

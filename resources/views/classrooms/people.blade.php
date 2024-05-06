
<x-basic-layout title="People">
    @push('styles')

        @vite(['resources/css/classroom-show.css'])

    @endpush

        <x-classroom-nav :classroom="$classroom" active="people"/>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('classrooms.index')}}">Classroom</a></li>
        <li class="breadcrumb-item  " aria-current="page"><a href="{{route('classrooms.show',$classroom->id)}}">{{$classroom->name}}</a></li>
        <li class="breadcrumb-item  " aria-current="page">People</li>

    </x-slot>


        <div class="container mt-4">
            <h1 class="mb-5"> {{$classroom->name}} People</h1>
            <x-alert name="success" class="alert-success" />

            <x-alert name="error" class="alert-danger" />
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($classroom->users()->orderBy('name')->get() as $user)

                    <tr>
                        <td></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->pivot->role}}</td>
                        @can('deletePeople',[$classroom,\App\Models\User::find($user->id)])
                            <td>
                                <form action="{{route('classrooms.people.destroy',$classroom->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-outline-dark">Remove</button>
                                </form>
                            </td>
                        @endcan

                    </tr>

                @endforeach

                </tbody>
            </table>


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



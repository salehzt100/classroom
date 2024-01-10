<div class="col-md-3">

    <div class="card">
        @if($classroom->cover_image_path)
            <img src="{{asset('storage/'.$classroom->cover_image_path)}}" class="card-img-top" alt>

        @endif
        <div class="card-body">
            <h5 class="card-title fs-2">{{$classroom->name}}</h5>
            <p class="card-text">{{$classroom->section}}</p>
            <div class="d-flex justify-content-between">
                <form action="{{route('classrooms.restore',$classroom->id)}}" method="post">
                    @csrf
                    @method('put')
                    <input type="submit" value="restore" class="btn btn-success"></input>

                </form>
                <form action="{{route('classrooms.forceDelete',$classroom->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete Forever" class="btn btn-danger"></input>

                </form>
            </div>
        </div>
    </div>
</div>

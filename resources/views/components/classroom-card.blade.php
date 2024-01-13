<div class="col-md-3">

    <div class="card">
            <img src="{{$classroom->cover_image_url}}" class="card-img-top" alt>
        <div class="card-body">
            <h5 class="card-title fs-2">{{$classroom->name}}</h5>
            <p class="card-text">{{$classroom->section}}</p>
            <div class="d-flex justify-content-between">
                <a href="{{$classroom->url}}" class="btn btn-primary">Show</a>
                <a href="{{route('classrooms.edit',$classroom->id)}}" class="btn btn-success">Edit</a>
                <form action="{{route('classrooms.destroy',$classroom->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger"></input>

                </form>
            </div>
        </div>
    </div>
</div>

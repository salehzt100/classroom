<div class="col-md-3 mb-3">

    <div class="card">
            <img src="{{$classroom->cover_image_url}}" class="card-img-top" alt>
        <div class="card-body">
            <h5 class="card-title fs-2">{{$classroom->name}}</h5>
            <p class="card-text">{{$classroom->section}}</p>
            <div class="d-flex justify-content-between">
                <a href="{{$classroom->url}}" class="btn btn-primary">{{__('View')}}</a>
                <a href="{{route('classrooms.edit',$classroom->id)}}" class="btn btn-success">{{__('Edit')}}</a>
                <form action="{{route('classrooms.destroy',$classroom->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="{{__('Delete')}}" class="btn btn-danger">

                </form>
            </div>
        </div>
    </div>
</div>

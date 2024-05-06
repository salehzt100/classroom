


<div class="col-lg-4 col-md-6 classroom-item filter-web">
    <a href="#" class="classroom-card">

        <div class="classroom-img classroom-card">
            <img src="{{asset('index_assets/img/project.jpg')}}"

          class="img-fluid" alt=""></div>
        <div class="classroom-info classroom-link">

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-4 mt-2">{{$classroom->name}}</h4>
                    <p>{{$classroom->section}}
                    </p>
                </div>
                <div class="flex-column justify-content-center align-items-center">
                    <form   action="{{route('classrooms.restore',$classroom->id)}}" method="post">
                        @csrf
                        @method('put')
                        <input type="submit" value="restore" class="btn btn-success w-100 mb-2"></input>

                    </form>
                    <form  action="{{route('classrooms.forceDelete',$classroom->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete Forever" class="btn btn-danger w-100"></input>

                    </form>
                </div>

            </div>

        </div>
    </a>

</div>


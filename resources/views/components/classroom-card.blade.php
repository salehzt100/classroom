
<div class="col-lg-4 col-md-6 classroom-item filter-web mb-4">
    <a href="{{$classroom->url}}" class="classroom-card">

        <div class="classroom-img classroom-card">
            <img src="{{$classroom->cover_image_url ?? asset('index_assets/img/project.jpg')}}"
          class="img-fluid" alt=""></div>
        <div class="classroom-info classroom-link">
            <h4 class="mb-4 mt-2">{{$classroom->name}}</h4>
            <p>{{$classroom->section}}
            </p>

            <a>
                <img class="details-link" src="{{$classroom->user->user_image}}" alt="user img">
            </a>


            <h6 class="user_name">{{$classroom->user->name}} </h6>
        </div>
    </a>

</div>

<x-main-layout title="Classwork Create">
    <div class="container">
        <h1 class="mb-3"> {{$classroom->name}}</h1>
        <x-alert name="success" class="alert-success"/>
        <x-alert name="error" class="alert-danger"/>
        <h3 class="mb-4">{{$classwork->title}}</h3>
        <hr>
        <div class="row">
            <div class="col-md-8">

                <div>
                    <p class="p-4 bg-light rounded">
                        {{$classwork->description}}
                    </p>
                </div>
                <h4>Comments</h4>

                <form action="{{route('comments.store')}}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row ps-5 mt-3">

                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{$classwork->id}}">
                            <input type="hidden" name="type" value="classwork">

                            <div class="form-outline mb-2 ">
                                <input type="text" id="addANote" name="content" class="form-control"
                                       placeholder="Type comment..."/>
                            </div>


                        </div>
                        <div class="col-md-2 ">
                            <button type="submit" class="btn btn-primary ms-2">
                                Add
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-send-plus-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                                    <path
                                        d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5"/>
                                </svg>
                            </button>


                        </div>


                    </div>

                </form>
                <hr>
                <div class="comments ps-5 pe-5 pb-4">
                    @foreach($comments as $comment)
                        <div class="card mb-4">
                            <div class="card-body">
                                <p>{{$comment->content}}</p>

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="{{$comment->user->user_image}}" alt="avatar" width="25"
                                             height="25" class="rounded"/>
                                        <p class="small mb-0 ms-2">{{$comment->user->name}}</p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0">{{$comment->created_at->diffForHumans()}}</p>
                                        <i class="far fa-thumbs-up mx-2 fa-xs text-black"
                                           style="margin-top: -0.16rem;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-4">

                <div class="bordered rounded p-3 bg-light ">
                    <h4> Submissions </h4>
                    @if($submissions->count())

                        <div class="files ">

                            <ul>
                                @foreach($submissions as $submission)
                                    <li>
                                        <a href="{{route('submissions.file',$submission->id)}}" class="row p-1" target="_blank"> File #{{$loop->iteration}}</a>
                                    </li>
                                @endforeach
                            </ul>


                        </div>

                    @else
                        <form action="{{ route('submissions.store', $classwork->id) }}" method="post"
                              class="d-flex flex-column align-items-start mt-3" enctype="multipart/form-data">
                            @csrf

                            <x-form.floating-control name="files.0">
                                <x-form.input type="file" name="files[]" errorname="files.0" label="Uploads Files"
                                              placeholder="Uploads Files" multiple/>
                            </x-form.floating-control>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>

                    @endif
                </div>
            </div>
        </div>

    </div>
</x-main-layout>


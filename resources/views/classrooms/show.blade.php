@extends('layouts.master')
@section('title','Classroom '."$classroom->name")
@section('content')
    <div class="container">

        <h1>{{$classroom->name}} (#{{$classroom->id}})</h1>
        <h3>{{$classroom->section}}</h3>


        <div class="row">
            <div class="col-md-3">
                <div class="border rounded p-3 text-center">
                    <span class="text-success fs-2">{{$classroom->code}}</span>
                </div>
            </div>
            <div class="col-md-9">
                <p><a href="{{$classroom->invitation_link}}"
                      class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><span
                            class="text text-success"> Invitation Link :</span> {{$classroom->invitation_link}}</a></p>
                <p><a href="{{route('classrooms.classworks.index',$classroom->id)}}" class="btn btn-outline-dark">
                        Classworks</a></p>
                <hr>

                <form action="{{route('posts.store',$classroom->id)}}" method="post">
                    @csrf
                    <textarea class="description" name="content" placeholder="Announce Something To Your Class">
                </textarea>
                    <input type="submit" class="btn btn-primary">
                </form>
                <script
                    src="https://cdn.tiny.cloud/1/ypd4cvvgeu7d0tb1xnaimv4xwd08nk40dspr2izixb25s4rs/tinymce/6/tinymce.min.js"></script>
                <script>
                    tinymce.init({
                        selector: 'textarea.description',
                        width: 900,
                        height: 300,
                    });
                </script>


                <hr class="m-4">
                <h3>Posts</h3>

                <hr>
                @foreach($classroom->posts as $post)

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <img src="{{$post->user->user_image}}" alt="avatar" width="25"
                                         height="25" class="rounded"/>
                                    <p class="small mb-0 ms-2">{{$post->user->name}}</p>
                                </div>
                                <small class="text-muted">{{$post->created_at->diffForHumans()}}</small>
                            </div>

                            <p class="mb-0 m-4">{!! $post->content !!}</p>

                            <div class="border-top">

                                <div class="comments pt-3">
                                    @foreach($post->comments as $comment)
                                        <div class="row pt-3">
                                            <div class="col-md-1">
                                                <img src="{{$post->user->user_image}}" alt="avatar" width="25"
                                                     height="25" class="rounded"/>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="d-flex ">
                                                    <h6>{{$comment->user->name}} </h6>
                                                    <small
                                                        class="text-muted ms-3">{{$comment->created_at?->format('H:i')}}</small>
                                                </div>


                                                <p class="mb-0">{!! $comment->content !!}</p>
                                            </div>


                                        </div>
                                    @endforeach

                                </div>

                                <form action="{{route('comments.store')}}"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$post->id}}">
                                    <input type="hidden" name="type" value="post">
                                    <div class="row mt-4 ">

                                        <div class="col-md-1">
                                            <img src="{{$post->user->user_image}}" alt="avatar" width="25" height="25"
                                                 class="rounded"/>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name='content' class="form-control "
                                                   placeholder="Add class comment...">

                                        </div>
                                        <button type="submit" class="col-md-1 bg-white ">
                                            <i class="fa-solid fa-circle-arrow-right fs-2"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                    <hr>

                    {{--                    <div class="card mb-4">--}}
                    {{--                        <div class="card-body">--}}
                    {{--                            <p>{!! $post->content !!}</p>--}}

                    {{--                            <div class="d-flex justify-content-between">--}}
                    {{--                                <div class="d-flex flex-row align-items-center">--}}
                    {{--                                    <p class="small text-muted mb-0">{{$post->created_at->diffForHumans()}}</p>--}}
                    {{--                                    <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                @endforeach

            </div>


        </div>

    </div>

@endsection

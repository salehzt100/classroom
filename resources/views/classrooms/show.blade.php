<x-basic-layout title="Home">

    @push('styles')

        @vite(['resources/css/classroom-show.css'])

        <style>
            .edit_classroom {

                text-decoration: none;
            }

            .edit_classroom:hover {
                color: white;
                cursor: pointer;
            }

            .classroom_choices {

                background-color: transparent;
                border: none;
                border-radius: 50%;
                padding: 1rem;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .classroom_choices:hover {

                background-color: #47b2e4;
                box-shadow: 1px 1px 20px #11101d;

            }
            .class_img{
                border-radius: 50%;
            }
        </style>
    @endpush

        <x-classroom-nav :classroom="$classroom" active="classroom" />

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('classrooms.index')}}">Classroom</a></li>
        <li class="breadcrumb-item  " aria-current="page">{{$classroom->name}}</li>
    </x-slot>


    <div class="col ">

        <div class=" col classroom_header  text-white col-md-11 mt-4 ps-4">


            <div class="mb-3 head">
                    <span class="fw-semibold fs-2">
                                            {{$classroom->name}}
                    </span>

                <span class="mr-4 d-flex align-items-center  ">

                                    <div class="btn-group dropend">
            <button type="button" class="classroom_choices p-1 fs-5" data-bs-toggle="dropdown"
                    aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                             viewBox="0 0 16 16">
                                            <path fill="currentColor"
                                                  d="M9.5 13a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0"/></svg>
            </button>



            <ul class="dropdown-menu">
                <li class="">

                    <a href="{{route('classrooms.edit',$classroom->id)}}">
                          <button class="dropdown-item fs-6 justify-content-start">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#47b2e4" class="bi bi-pen"
                        viewBox="0 0 16 16">
                        <path
                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                    </svg>
                   <span class="ms-3">Edit</span>
               </button>
                    </a>


                </li>

                <li class="">



                            <form action="{{route('classrooms.destroy',$classroom->id)}}"
                                  method="post">
                    @csrf
                                @method('delete')




                        <button class="dropdown-item fs-6 justify-content-start ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#47b2e4"
                                                             class="bi bi-trash" viewBox="0 0 16 16">
  <path
      d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path
      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>

                                                <span class="ms-3">Delete</span>

                             </button>


                </form>



                </li>
                <!-- For copying the class code -->

                <!-- For copying a link -->


            </ul>
        </div>





                </span>

            </div>
            <div class="fs-4 thr_color">
                {{$classroom->section}}

            </div>


        </div>

        <div class="row classroom_body col-md-12  ">
                <span class="classroom_code  col-md-2">

                    <div class="code_box border ">
                        <div class="row">
                            <h6 class="secondary-color col-md-9 "> class code</h6>

                            <div class="col-md-3  ">

                <div class="btn-group dropend">
            <button type="button" class="code_btn p-1 fs-5" data-bs-toggle="dropdown"
                    aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                             viewBox="0 0 16 16">
                                            <path fill="currentColor"
                                                  d="M9.5 13a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0"/></svg>
            </button>
            <ul class="dropdown-menu">
                <li class="p-3">

                <input type="hidden" value="{{$classroom->invitation_link}}" id="linkToCopy">
               <button class="dropdown-item fs-6 justify-content-start" id="copyLinkBtn">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#47b2e4" class="bi bi-link "
                        viewBox="0 0 16 16">
                   <path
                       d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9q-.13 0-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
                 <path
                     d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4 4 0 0 1-.82 1H12a3 3 0 1 0 0-6z"/>
</svg>
                   <span class="ms-3">Copy Class Invite Link</span>
               </button>

                </li>

                <li class="p-3">

                        <button class="dropdown-item fs-6 justify-content-start " id="copyCodeBtn">

                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#47b2e4"
                                 class="bi bi-copy ms-0" viewBox="0 0 16 16">
  <path fill-rule="evenodd"
        d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
</svg>
                            <span class="ms-3">Copy Class Code</span>

                        </button>

                </li>
                <!-- For copying the class code -->

                <!-- For copying a link -->


            </ul>
        </div>

                            </div>




                        </div>
                        <div class="row code ">

                                <h3 id="classCode" class="thr_color">
                                                            {{$classroom->code}}

                            </h3>

                        </div>

                    </div>

                </span>
            <span class="classroom_stream  col-md-9 ">


                    <div class="m-auto add_post ">
                          <div class=" mb-4">

                   <form
                       action="{{route('posts.store',$classroom->id)}}"
                       method="post">
                    @csrf

                    <x-form.floating-control name="content">
                        <x-form.input-text name="content" label="Post" id="editor1"
                                           placeholder="Add Post..."/>
                    </x-form.floating-control>
                    <button type="submit" class="btn main_btn">Add</button>

                </form>

                    </div>

                    </div>

                    <div class="stream_item  border">

                        <div class="user_img secondary-bg-color">

                        </div>
                        <div class="body col ">
                            <div class="title row fw-semibold">
Saleh Zetawi posted a new assignment : First Assignment

                            </div>
                            <small class="date row text-muted ">
                                5 jun
                            </small>
                        </div>

                    </div>

                @foreach($classroom->posts()->with('comments')->with('user')->latest()->get() as $post)

                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <img src="{{$post->user->user_image}}" alt="avatar" width="25"
                                         height="25" class="rounded"/>
                                    <p class="small mb-0 ms-2">{{$post->user->name}}</p>
                                </div>
                                <small class="secondary-color">{{$post->created_at->diffForHumans()}}</small>
                            </div>

                            <p class="mb-0 m-4 ">{!! $post->content !!}</p>

                            <div class="border-top">

                                <div class="comments pt-3" id="comments-{{$post->id}}">
                                    @foreach($post->comments as $comment)
                                        <div class="row pt-3">
                                            <div class="col-md-1 class_img">
                                                <img src="{{$comment->user->user_image}}" alt="avatar" class="rounded" width="25"
                                                     height="25" />
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
                                    <div class="row mt-4 align-items-center">

                                        <div class="col-md-1">
                                            <img src="{{Auth::user()->user_image}}" alt="avatar" width="25" height="25"
                                                 class="rounded"/>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name='content' class="form-control "
                                                   placeholder="Add class comment...">

                                        </div>
                                        <button type="submit" class="col-md-1 border-0 bg-white pb-2 ">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#47b2e4" class="bi bi-send" viewBox="0 0 16 16">
  <path
      d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
</svg>                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>

                @endforeach

                </span>
        </div>
    </div>


    </section>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Place the following <script> and <textarea> tags your HTML's <body> -->

        @vite(['resources/js/classroom-show.js'])
        <script>
            $('#myModal').modal(options)

        </script>
    @endpush


</x-basic-layout>




<x-basic-layout :title="'Classroom '.$classroom->name">

@vite(['resources/css/chat.css'])

<x-classroom-nav :classroom="$classroom" active="chat" />
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('classrooms.index')}}">Classroom</a></li>
        <li class="breadcrumb-item "><a href="{{route('classrooms.show',$classroom->id)}}">{{$classroom->name}}</a></li>
        <li class="breadcrumb-item  " aria-current="page">Chat Room</li>

    </x-slot>

        <div class="container mt-4 ms-md-4 ms-sm-1 ms-1 ">

            <h2 class="mb-4"> Chat Room</h2>
            <main class="content no-rtl-ltr ">
                <div class="container p-0 ">
                    <div class="card col col-lg-10 col-md-12 col-sm-12 col-12 p-0 linear-bg-gradient shadow mb-5  chat_length">
                        <div class="d-flex g-0">
                            <div class="col-xl-4 col-lg-4 col-0  border-end   ">

                                <div class="list-group-item list-group-item-action border-0 " id="online_users">

                                </div>


                                <hr class="d-block d-lg-none mt-1 mb-0">
                            </div>
                            <div class="col col-xl-8 col-lg-8 col-19  "  >


                                <div class="position-relative col  mt-4 rounded" >
                                    <div class="chat-messages chat_body" id="messages">

                                    </div>
                                </div>


                                <div class=" p-0 col">
                                    <div class=" ms-md-5 me-md-5 ms-sm-4 me-sm-4 ms-3 me-3">
                                        <form id="message-form">
                                            <div class="row">

                                                <div class="col">
                    <textarea class="form-control rounded" name="body"
                              placeholder="Type your message.."></textarea>
                                                </div>

                                                <div class="col-auto bg-transparent p-0 ">
                                                    <button type="submit" class="btn col-md-1 border-0 fs-5  ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#47b2e4" class="bi bi-send" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


        </div>



    @push('scripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

            <script>
                const messages ={
                    list_url: "{{route('classrooms.messages.index',[$classroom->id])}}",
                    store_url:"{{route('classrooms.messages.store',[$classroom->id])}}",
                }
                const classroom_id="{{$classroom->id}}";
                const user ={
                    id:"{{Auth::id()}}",
                    name : "{{Auth::user()->name}}"
                }
                const csrf_token = "{{csrf_token()}}";

            </script>

            @vite(['resources/js/chat.js'])
    @endpush


</x-basic-layout>



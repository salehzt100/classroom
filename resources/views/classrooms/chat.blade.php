@extends('layouts.master')
@section('title','Classroom '."$classroom->name")
<style>
    body {
        margin-top: 20px;
    }

    .chat-online {
        color: #34ce57
    }

    .chat-offline {
        color: #e4606d
    }


    .chat-messages {
        display: flex;
        flex-direction: column;
        max-height: 800px;
        overflow-y: scroll
    }

    .chat-message-left,
    .chat-message-right {
        display: flex;
        flex-shrink: 0;
        gap: 10px;

    }

    .chat-message-left {
        margin-right: auto;

    }

    .chat-message-right {
        flex-direction: row-reverse;
        margin-left: auto;
    }

    .py-3 {
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
    }

    .px-4 {
        padding-right: 1.5rem !important;
        padding-left: 1.5rem !important;
    }

    .flex-grow-0 {
        flex-grow: 0 !important;
    }

    .border-top {
        border-top: 1px solid #dee2e6 !important;
    }
    .no-rtl-ltr {
        direction: ltr; /* or 'rtl' if you want to force left-to-right or right-to-left */
    }

</style>
@section('content')
    <div class="container">

        <h1>{{$classroom->name}} - Chat Room</h1>
        <main class="content no-rtl-ltr">
            <div class="container p-0">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-12 col-lg-5 col-xl-3 border ">

                                     <div class="list-group-item list-group-item-action border-0 " id="online_users">

                                                        </div>


                            <hr class="d-block d-lg-none mt-1 mb-0">
                        </div>
                        <div class="col-12 col-lg-7 col-xl-9">


                            <div class="position-relative">
                                <div class="chat-messages p-4" id="messages">



                                </div>
                            </div>


                            <div class="py-3 px-4 border-top">
                                <div class="container">
                                        <form id="message-form">
                                            <div class="row">

                                            <div class="col">
                    <textarea class="form-control rounded" name="body"
                              placeholder="Type your message.."></textarea>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit"
                                                        class="btn btn-primary rounded align-items-start ">Send
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

@endsection

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

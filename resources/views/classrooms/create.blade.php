@include('partial.header')
<div class="container">
    <h1>Create classroom</h1>
    <form action="{{route('classrooms.store')}}" method="post">

                {{--<input type="hidden" name="_token" value="{{csrf_token()}}">
                {{csrf_field()}}
                @csrf
                --}}
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name='name' id="name" placeholder="Classroom Name">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="section" id="section" placeholder="Section">
            <label for="section">Section</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name='subject' id="subject" placeholder="Subject">
            <label for="subject">Subject</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name='room' id="room" placeholder="Room">
            <label for="room">Room</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" name='cover_image' id="cover_image" placeholder="Cover Image">
            <label for="cover_image">Cover Image</label>
        </div>
        <button type="submit" class="btn btn-primary">Create Room</button>
    </form>
</div>
@include('partial.footer')

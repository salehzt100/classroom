<div class="form-floating mb-3">
    <input type="text" @class(["form-control",  "is-invalid"=>$errors->has('name') ])  value="{{old('name',$classroom->name)}}" name='name' id="name" placeholder="Classroom Name">
    <label for="name">Name</label>
    @error('name')

    <div class=" invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="text" @class(["form-control",  "is-invalid"=>$errors->has('section') ])  value="{{old('section',$classroom->section)}}" name="section" id="section" placeholder="Section">
    <label for="section">Section</label>
    @error('section')

    <div class=" invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="text" @class(["form-control",  "is-invalid"=>$errors->has('subject') ]) value="{{old('subject',$classroom->subject)}}" name='subject' id="subject" placeholder="Subject">
    <label for="subject">Subject</label>
    @error('subject')

    <div class=" invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="text" @class(["form-control",  "is-invalid"=>$errors->has('room') ]) value="{{old('room',$classroom->room)}}" name='room' id="room" placeholder="Room">
    <label for="room">Room</label>
    @error('room')

    <div class=" invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="file" @class(["form-control",  "is-invalid"=>$errors->has('cover_image') ]) value="{{old('cover_image')}}" name='cover_image' id="cover_image" placeholder="Cover Image">
    <label for="cover_image">Cover Image</label>
    @error('cover_image')

    <div class=" invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{$button_label}}</button>

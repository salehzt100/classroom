
<x-form.floating-control name="name">
    <x-form.input name="name" value="{{$classroom->name}}" label="Classroom Name" placeholder="Classroom Name" />
</x-form.floating-control>

<x-form.floating-control name="section">
    <x-form.input name="section" value="{{$classroom->section}}" label="section" placeholder="Section" />
</x-form.floating-control>

<x-form.floating-control name="subject">
    <x-form.input name="subject" value="{{$classroom->subject}}" label="subject" placeholder="Subject " />
</x-form.floating-control>

<x-form.floating-control name="room">
    <x-form.input name="room" value="{{$classroom->room}}" label="room" placeholder="Room" />
</x-form.floating-control>

<x-form.floating-control name="cover_image">
    <x-form.input type="file" name="cover_image" value="{{$classroom->cover_image}}" label="cover image" placeholder="Cover Image" />
</x-form.floating-control>

<button type="submit" class="btn btn-primary">{{$button_label}}</button>


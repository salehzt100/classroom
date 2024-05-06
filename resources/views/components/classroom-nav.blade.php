<x-slot name="nav_tabs">

    <li class="nav-item">
        <a class="nav-link @if($active =='classroom' ) active @endif " aria-current="page" href="{{route('classrooms.show',$classroom->id)}}">Stream</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active =='classwork' ) active @endif  " aria-current="page" href="{{route('classrooms.classworks.index',$classroom->id)}}">Classwork</a>

    </li>
    <li class="nav-item">
        <a class="nav-link @if($active =='chat' ) active @endif   " aria-current="page" href="{{route('classrooms.chat',$classroom->id)}}">Chat</a>
    </li>
    <li class="nav-item">
        <a class="nav-link  @if($active =='people' ) active @endif  " aria-current="page" href="{{route('classrooms.people',$classroom->id)}}">People</a>
    </li>
    <li class="nav-item">
        <a class="nav-link  @if($active =='marks' ) active @endif  " aria-current="page" href="#">Marks</a>
    </li>
</x-slot>

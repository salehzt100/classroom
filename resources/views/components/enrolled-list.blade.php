
    @if($classrooms !=null)
        @foreach($classrooms as $classroom)
            @php

                $classroom_name=$classroom->name;
                $name="{$classroom_name[0]}}+{$classroom_name[1]}";

            @endphp
            <li>
            <a href="{{route('classrooms.show',$classroom->id)}}"  class="classroom_tap" >
                <span class="d-flex justify-content-center align-items-center ms-1 " >
                    <img src="https://ui-avatars.com/api/?name={{$name}}&background=random&size=10" alt="avatar"
                    />
                </span>
                <span class="links_name">{{$classroom->name}}</span>
            </a>
            <span class="tooltip">{{$classroom->name}}</span>
        </li>

        @endforeach

    @endif



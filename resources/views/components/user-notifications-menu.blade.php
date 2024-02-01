<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
       aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell"
             viewBox="0 0 16 16">
            <path
                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
        </svg>
        @if($unreadCount ==0 )
            {{$unreadCount =''}}
        @endif
        <span class="badge rounded-pill badge-notification bg-danger badge-sm">{{$unreadCount}}</span>

    </a>
    <ul class="dropdown-menu">
        @forelse($notifications as $notification)
            <li><a class="dropdown-item" href="{{$notification->data['link']}}?nid={{$notification->id}}"><span>
                        @if($notification->unRead())
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-dot text-danger"
                                 fill="currentColor" viewBox="0 0 16 16">
                                         <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                             </svg>

                        @endif
                    </span>{{$notification->data['body']}}</a>
            </li>

        @empty
            <li class="dropdown-item">There are no notifications</li>
        @endforelse


    </ul>
</li>

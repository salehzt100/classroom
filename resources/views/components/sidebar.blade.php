
<div class="sidebar ">
    <div class="logo-details">
        <div class="logo_name">EduClassroom</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list  ">
        {{--<li>
            <i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li>--}}
        <span class="">

        <li>

        <a href="{{route('classrooms.index')}}">
                <i class='bx bx-home'></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>

        <hr class="thr_color">

        <li>
            <a href="#" id="teachingButton">
                <i class='bx bx-group'></i>
                <span class="links_name">Teaching</span>
            </a>
            <span class="tooltip">Teaching</span>
        </li>

            <span class="teaching_list">

<x-teaching-list :user="Auth::user()" />
            </span>

        <hr class="thr_color">

        <li>
            <a href="#" id="enrolledButton">
                <i class='bx bxs-graduation'></i>
                <span class="links_name">Enrolled</span>
            </a>
            <span class="tooltip">Enrolled</span>
        </li>

            <span class="enrolled_list">

<x-enrolled-list :user="Auth::user()" />

            </span>

        <hr class="thr_color">

        {{--    <li>
                <a href="#">
                    <i class='bx bx-user' ></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>--}}
            {{--<li>
                <a href="#">
                    <i class='bx bx-chat' ></i>
                    <span class="links_name">Messages</span>
                </a>
                <span class="tooltip">Messages</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2' ></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-folder' ></i>
                    <span class="links_name">File Manager</span>
                </a>
                <span class="tooltip">Files</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cart-alt' ></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>--}}
            {{-- <li>
                 <a href="#">
                     <i class='bx bx-heart' ></i>
                     <span class="links_name">Saved</span>
                 </a>
                 <span class="tooltip">Saved</span>
             </li>--}}

               </span>

        <li>
            <a href="{{route('classrooms.trashed')}}">
                <i class='bx bxs-trash'></i>                <span class="links_name">Trashed Classes</span>
            </a>
            <span class="tooltip">Trash</span>
        </li>

        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <img src="{{Auth::user()->user_image}}" alt="profileImg">
                <div class="name_job">
                    <div class="name">{{Auth::user()->name}}</div>
                    <div class="job"></div>
                </div>
            </div>
                <form action="{{route('logout')}}" method="post">
                    @csrf


                    <button class="Btn" type="submit">
                        <i class='bx bx-log-out' id="log_out" ></i>

                    </button>
                </form>


        </li>
    </ul>
</div>

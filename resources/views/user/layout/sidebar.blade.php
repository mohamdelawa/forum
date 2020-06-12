@if(Session::has('session_user'))
    <input hidden  value="{{$session_user = Session::get('session_user')}}">
    @endif
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="{{$session_user->image_path}}" alt="users"
                                                   class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium">{{$session_user->name }}<i
                                        class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email">{{$session_user->email}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="{{Route('logout')}}"><i
                                        class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>


                <li class="p-15 m-t-10"><a href="{{Route('add_post_view',['id'=>$session_user->id])}}"
                                           class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i
                            class="fa fa-plus-square"></i> <span class="hide-menu m-l-5"> Create Post New</span>
                    </a></li>

                <!-- User Profile-->

                <ul id="sidebarnav">
                    @can('side_bar_admin',\Illuminate\Support\Facades\Auth::user())
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="{{Route('user_requests',['id'=>$session_user->id])}}" aria-expanded="false"><i
                                class="fa fa-table"></i><span class="hide-menu">User Requests</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="{{Route('upcoming_posts',['id'=>$session_user->id])}}" aria-expanded="false"><i
                                class="fa fa-table"></i><span class="hide-menu">Upcoming Posts</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="{{Route('add_user',['id'=>$session_user->id])}}" aria-expanded="false"><i
                                class="fa fa-plus-square"></i><span class="hide-menu">Add User</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="{{Route('all_user',['id'=>$session_user->id])}}" aria-expanded="false"><i
                                class="fa fa-table"></i><span class="hide-menu">All User</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                     href="{{Route('all_posts',['id'=>$session_user->id])}}" aria-expanded="false"><i
                                    class="fa fa-table"></i><span class="hide-menu">All Post</span></a></li>

                    @endcan
                </ul>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{Route('dashboard',['id'=>$session_user->id])}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{Route('my_profile', ['id'=>$session_user->id])}}" aria-expanded="false"><i
                            class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{Route('my_posts',['id'=>$session_user->id])}}" aria-expanded="false"><i class="mdi mdi-file"></i><span
                            class="hide-menu">My Posts</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{Route('add_post_view',['id'=>$session_user->id])}}" aria-expanded="false"><i class="fa fa-plus-square"></i><span
                            class="hide-menu">Add Posts</span></a></li>


            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

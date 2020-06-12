@extends('user.layout.app')
@section('title')
    <title>Profile User</title>
@stop
@section('name')
    Profile User
@stop
@section('page padding')

    <div class="row">
        <!-- Column -->

        <div class="card col-lg-3 col-md-4 col-sm-3 " style="height: 550px;">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{$user->image_path}}"
                                             class="rounded-circle" width="150" />
                    <h4 class="card-title m-t-6"><br>{{$user->name}}</h4>

                </center>
            </div>
            <div>
                <hr>
            </div>
            <div class="card-body"> <small class="text-muted">Email address </small>
                <h6>{{$user->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                <h6>{{$user->phone}}</h6>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
        @foreach($user->posts as $post)


            <div class="card">
                <!-- Post Content Column -->
                <br>
                <div class="col-lg-10 col-xlg-10 col-md-10 ">
                    <div class="user-pic"><img src="{{$user->image_path}}" alt="users"
                                               class="rounded-circle" width="40" />
                        &nbsp; <a href="{{route('visit_user',['id'=>$user->id])}}" class="m-b-0 user-name font-medium">{{$post->user->name}}</a>
                    </div>
                    <!-- Date/Time -->
                    <p>Posted on {{$post->updated_at}}</p>

                    <hr>
                    <!-- Title -->
                    <h1 class="mt-4">{{$post->title}}</h1>

                    <hr>



                    <!-- Post Content -->
                    <p class="lead">{{$post->body}}</p>

                    <hr>

                    <div>

                        <a href="{{route('post',['id'=>$post->id])}}" > <button  class="btn btn-primary">Comments</button></a>

                    </div>
                    <br>
                </div>

            </div>



@endforeach

</div>

    </div>

@stop


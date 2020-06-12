@extends('user.layout.app')
@section('title')
    <title>My Posts</title>
@stop
@section('name')
    My Posts
@stop
@section('page padding')
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            @foreach($posts as $post)
            <div class="card">
                <!-- Post Content Column -->
                <br>
                <div class="col-lg-10 col-xlg-10 col-md-10 ">
                    <div class="user-pic"><img src="{{$post->user->image_path}}" alt="users"
                                               class="rounded-circle" width="40" />
                        &nbsp; <a href="{{route('visit_user',['id'=>$post->user->id])}}" class="m-b-0 user-name font-medium">{{$post->user->name}}</a>
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
                        <a href="{{route('delete_post',['id'=>$post->id])}}" > <button  class="btn btn-primary">Delete Post</button></a>
                        <a href="{{route('edit_post', ['id'=>$post->id])}}"> <button  class="btn btn-primary">Edit Post</button></a>
                        <a href="{{route('post',['id'=>$post->id])}}" > <button  class="btn btn-primary">Comments</button></a>

                    </div>

                    <br>
                </div>



            </div>
         @endforeach
        </div>
    </div>

@stop

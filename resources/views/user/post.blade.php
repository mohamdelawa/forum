@extends('user.layout.app')
@section('title')
    <title>Post</title>
@stop
@section('name')
   Post
@stop
@section('page padding')

        <div class="col-lg-8 col-xlg-9 col-md-7">
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

                    <!-- Comments Form -->
                    <div class="card my-4">
                        <h5 class="card-header">Leave a Comment:</h5>
                        <div class="card-body">
                            <form method="get" action="{{route('add_comment', ['post_id'=>$post->id, 'user_id'=>\Illuminate\Support\Facades\Session::get('session_user')->id])}}">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="body" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                    <!-- Single Comment -->
                    @foreach($post->comments as $comment)
                    <div class="media mb-4">
                        <div>
                            <a href="{{route('visit_user',['id'=>$comment->user->id])}}" class="m-b-0 user-name font-medium">
                        <img class="d-flex mr-3 rounded-circle" src="{{$comment->user->image_path}}" alt="" style="height: 50px; width: 50px">
                                &nbsp;</a>
                        </div>
                        <div class="media-body">
                            <a href="{{route('visit_user',['id'=>$comment->user->id])}}" class="m-b-0 user-name font-medium"><h5 class="mt-0"><br>{{$comment->user->name}}</h5></a>
                           {{$comment->body}}
                        </div>
                    </div>

                   @endforeach
                </div>

            </div>

        </div>






@stop


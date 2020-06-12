@extends('user.layout.app')
@section('title')
    <title>Result Searching</title>
@stop
@section('page padding')
    <div class="row " >
          <div class="card col-md-7 p-5 col-sm-10 " style="background-color:#eef5f9;"  >
                    <h2 class=" mx-auto ">Research Results </h2>
                  <!-- Post Content Column -->
                  @foreach($posts as $post)
                  <div class="card p-4"  >
                  <div class="mr-2">
                      <br/>
                      <div class="user-pic">
                          <!-- Title -->
                          <h1 class="mt-4">{{$post->title}}</h1>
                          <!-- Date/Time -->
                          <p>Posted on {{$post->updated_at}}</p>
                          <a href="{{Route('post',['id'=>$post->id])}}"><button class="btn btn-success">Open Post</button></a>
                      </div>







                  </div>
                  </div>

                      @endforeach


      </div>


</div>

@stop

@extends('user.layout.app')
@section('title')
    <title>Edit Post</title>
@stop
@section('name')
    Edit Post
@stop
@section('page padding')
    <div class="row">

        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7 " >
            <div class="card">
                <div class="card-body">
                    <h1 class=" mb-4"><b>Edit Post</b> </h1>
                    <hr>
                    <form class="form-horizontal form-material" method="post" action="{{route('update_post', ['id'=>$post->id])}}">
                        <div class="form-group">
                            <label class="col-md-12">Title</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$post->title}}"
                                       class="form-control form-control-line" name="title">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="example" class="col-md-12">Subject</label>
                            <div class="col-md-12">
                               <textarea  class="form-control form-control-line" name="body"
                                          id="example" rows="8">{{$post->body}}</textarea>

                            </div>
                        </div>
                        <br>

                        @csrf
                        <br>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Edit Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>


@stop

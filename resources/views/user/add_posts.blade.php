@extends('user.layout.app')
@section('title')
    <title>Add Posts</title>
@stop
@section('name')
    Add Post
@stop
@section('page padding')
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7 ">
            <div class="card">

                <div class="card-body">
                    <h1 class=" mb-4"><b>Add Post </b></h1>
                    <hr>
                    <form  class="form-horizontal form-material"  action="{{route('add_post',['id'=>$id])}}">
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="title"
                                       id="Title" value="{{old('title')}}" placeholder="Title Header" required>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                            <textarea class="form-control form-control-line" name="body"
                                                      id="subject"  rows="8" placeholder="Subject" required>{{old('body')}}</textarea>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success"><b>Post</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

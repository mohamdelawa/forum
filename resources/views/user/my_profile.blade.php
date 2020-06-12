@extends('user.layout.app')
@section('title')
    <title>My Profile</title>
@stop
@section('name')
    My Profile
@stop
@section('page padding')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="{{$user->image_path}}"
                                                 class="rounded-circle" width="150" />
                        <h4 class="card-title m-t-6"><br>{{$user->name}}</h4>
                        <form  method="post" enctype="multipart/form-data" action="{{route('update_image',['id'=>$user->id])}}">
                        <div class="form-group">
                            <label for="example-image" class="col-md-12">Update Personal Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  name="image_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>

                        </div>

                            @csrf
                            <button class="btn btn-success">Update Image</button>
                        </form>
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
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post" action="{{Route('update_my_profile',['id'=>$user->id])}}">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$user->name}}"
                                       class="form-control form-control-line" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" value="{{$user->email}}"
                                       class="form-control form-control-line"
                                       id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Date of Birth</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$user->dob}}"
                                       class="form-control form-control-line" name="dob">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$user->phone}}"
                                       class="form-control form-control-line" name="phone">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-12">Password new</label>
                            <div class="col-md-12">
                                <input type="password"
                                       class="form-control form-control-line" name="password_new" >
                            </div>
                        </div>
                        @csrf
                        <br>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@stop

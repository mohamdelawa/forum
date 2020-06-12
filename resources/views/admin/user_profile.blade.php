@extends('user.layout.app')
@section('title')
    <title>User Profile</title>
@stop
@section('name')
    User Profile
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
                    <form class="form-horizontal form-material" method="post" action="{{Route('update_user',['id'=>$user->id])}}">
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
                            <label class="col-md-12">Role</label>
                            <div class="col-md-12">
                                <select class="form-control" name="role"  required>
                                    <option value="admin" @if($user->role->type=='admin')selected @endif >Admin</option>
                                    <option value="user" @if($user->role->type=='user')selected @endif>User</option>
                                </select>

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

@stop

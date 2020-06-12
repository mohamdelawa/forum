@extends('user.layout.app')
@section('title')
    <title>Admin Add User</title>
@stop
@section('name')
    Add User
@stop
@section('page padding')

    <div class="row">
        <!-- Column -->
       <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post" action="{{Route('new_user')}}">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe"
                                       class="form-control form-control-line" name="name" value="{{old('name')}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder="johnathan@admin.com"
                                       class="form-control form-control-line" name="email"
                                       id="example-email" value="{{old('email')}}"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="123 456 7890"
                                       class="form-control form-control-line" name="phone"  value="{{old('phone')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Date of Birth</label>
                            <div class="col-md-12">
                                <input type="date"  class="form-control form-control-line" name="dob" value="{{old('dob')}}"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Role</label>
                            <div class="col-md-12">
                                <select class="form-control" name="role"  required>
                                    <option value="admin" @if(old('role')=='admin')selected @endif >Admin</option>
                                    <option value="user" @if(old('role')=='user')selected @endif>User</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Password User</label>
                            <div class="col-md-12">
                                <input type="password" value="password"
                                       class="form-control form-control-line" name="password" required>
                            </div>
                        </div>

                        @csrf
                        <br>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button  class="btn btn-success">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop


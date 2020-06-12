@extends('layout.app')
@section('title')
    <title>Register</title>
@stop
@section('page padding')
    <div class="row mt-5" >
        <div class="card col-md-5 col-sm-8  mx-auto " >
            <div class="text-center border border-light p-1">
                <img src="../../assets/images/logo.png" alt="homepage" class="light-logo" height="70px" width="70px"/>
                <br>
                <p class="h4 mb-4">Sign up</p>
            </div>
            @include('massege')
            <div class="text-center border border-light p-3">
        <form  method="post" action="{{route('create')}}">

            <input type="text"  name="name" value="{{old('name')}}" id="defaultRegisterFormFullName" class="form-control" placeholder="Full Name" required>
                   <br>
                    <!-- Date of Birth -->
            <input type="date"  name="dob" value="{{old('dob')}}" id="defaultRegisterFormDateOfBirth" class="form-control" placeholder="Date of Birth" required>
            <br>
            <input type="number" minlength="10" name="phone" value="{{old('phone')}}" id="defaultRegisterPhone" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" required>
            <br>
            <!-- E-mail -->
            <input type="email" name="email" value="{{old('email')}}" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail"required>

            <!-- Password -->
            <input type="password"  minlength="8"  name="password" id="defaultRegisterFormPassword" class="form-control mb-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>


             @csrf
            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

        </form>
        <!-- Default form register -->
        </div>
    </div>
    </div>


@stop


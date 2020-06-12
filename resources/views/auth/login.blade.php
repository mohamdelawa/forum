@extends('layout.app')
@section('title')
    <title>Login</title>
@stop
@section('page padding')
    <div class="row mt-5" >
            <div class="card col-md-4 col-sm-10  mx-auto " >
                <div class="text-center border border-light p-1">
                     <img src="../../assets/images/logo.png" alt="homepage" class="light-logo" height="70px" width="70px"/>
                     <br>
                     <p class="h4 mb-4">Login</p>
                </div>
                @include('massege')
                <form class="text-center border border-light p-2" method="post" action="{{route('authenticate')}}">

                    <!-- E-mail -->
                    <input type="email" name="email" id="defaultRegisterFormEmail" class="form-control mb-5" placeholder="E-mail" required>

                    <!-- Password -->
                    <input type="password" name="password" id="defaultRegisterFormPassword" class="form-control mb-5" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>

                    @csrf

                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Login</button>

                </form>
                <!-- Default form register -->

            </div>
    </div>

@stop

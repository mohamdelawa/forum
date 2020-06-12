@extends('user.layout.app')
@section('title')
    <title>Dashboard</title>
@stop

@section('page padding')
        <div class="row justify-content-center"  style="background-color:#eef5f9; padding-top: 100px" >
            <div>
                <h2 style=" padding-bottom:30px" >Find the publications you need here</h2>
            </div>
            <div class="col-12 col-md-10 col-lg-8" >
                <form class="card card-sm" action="{{Route('user_result_search')}}" method="get">
                    <div class="card-body row no-gutters align-items-center" >

                        <!--end of col-->
                        <div class="col" >
                            <input  name="data" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button class="btn btn-lg btn-success" type="submit">Search</button>
                        </div>
                        <!--end of col-->
                    </div>
                </form>
            </div>
            <!--end of col-->
        </div>


@stop

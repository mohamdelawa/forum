@extends('user.layout.app')
@section('title')
    <title>Admin All User  </title>
@stop
@section('name')
    All User
@stop
@section('page padding')
    <div class="row">
        <div class="col-lg-12 ">
            <section class="panel">
                <header class="panel-heading">
                    Pending User Requests
                </header>
                <br>
                <input class="form-control mb-4 col-lg-3 col-md-5 col-sm-6" id="tableSearch" type="text"
                       placeholder="Type something to search list items" >
                <table class="table table-striped table-advance table-hover" style="display: block; overflow-y: auto;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><i class="icon_profile"></i> Full Name</th>
                        <th><i class="icon_calendar"></i> Date</th>
                        <th><i class="icon_mail_alt"></i> Email</th>
                        <th><i class="icon_mobile"></i> Mobile</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php
                      $count = 0;
                    ?>
                    @foreach($users as $user)
                        <?php
                            ++$count;
                        ?>
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn" href="{{route('visit_user',['id'=>$user->id])}}"><img src="../../assets/images/zoom.png"></a>
                                <a class="btn" href="{{route('edit_user',['id'=>$user->id])}}"><img src="../../assets/images/edit.png"></a>
                                <a class="btn" href="{{route('delete_user',['id'=>$user->id])}}"><img src="../../assets/images/delete.png"></a>
                               </div>
                        </td>
                    </tr>
                      @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <!-- page end-->


@stop

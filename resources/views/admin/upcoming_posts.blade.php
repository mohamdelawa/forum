@extends('user.layout.app')
@section('title')
    <title>Admin Upcoming Posts</title>
@stop
@section('name')
    Upcoming Posts
@stop
@section('page padding')
    <div class="row">
        <div class="col-lg-12 ">
            <section class="panel">
                <header class="panel-heading">
                    Upcoming Posts
                </header>
                     <br/>
                <input class="form-control mb-4 col-lg-3 col-md-5 col-sm-6" id="tableSearch" type="text"
                       placeholder="Type something to search list items" >
                <table class="table table-striped table-advance table-hover" style="display: block; overflow-y: auto;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><i class="icon_profile"></i> Full Name</th>
                        <th><i class="icon_calendar"></i> Date</th>
                        <th><i class="icon_mail_alt"></i> Email</th>
                        <th><i class="icon_pin_alt"></i> Title Post</th>
                        <th><i class="icon_pin_alt"></i> Body Post</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php
                        $count=0;
                    ?>
                    @foreach($posts as $post)
                        <?php
                       ++$count;
                        ?>
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$post->user['name'] }}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->user['email']}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn" href="{{route('delete_post_temp',['id'=>$post->id])}}"><img src="../../assets/images/delete.png"></a>
                                <a class="btn" href="{{route('add_post_temp',['id'=>$post->id])}}"><img src="../../assets/images/ok.png"></a>

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

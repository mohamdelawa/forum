<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logo.png">
    <title> Result Search</title>
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">

</head>


<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">


    @include('layout.topbar')

    <div style="background-color: whitesmoke">

        <div class="card col-md-7 p-5 col-sm-10   mx-auto " style="background-color: whitesmoke" >
            <div class="card p-5 mx-auto ">
                <!-- Post Content Column -->
                <div class="mr-2">
                    <br/>
                    <div class="user-pic"><img class="rounded-circle mr-2" src="{{$post->user->image_path}}"  width="40" alt="users">
                        <h2>{{$post->user->name}}</h2>
                    </div>

                    <!-- Date/Time -->
                    <p>Posted on {{$post->updated_at}}</p>

                    <hr>
                    <!-- Title -->
                    <h1 class="mt-4">{{$post->title}}</h1>

                    <hr>



                    <!-- Post Content -->
                    <p class="lead">{{$post->body}}</p>

                    <hr>

                    <!-- Single Comment -->
                    @foreach($post->comments as $comment)
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="{{$comment->user->image_path}}" alt="" style="height: 50px; width: 50px">
                            <div class="media-body">
                                <h5 class="mt-0"><br>{{$comment->user->name}}</h5>
                                {{$comment->body}}
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>



        </div>


    </div>
</div>

<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
<!--Custom JavaScript -->
<script src="../../dist/js/custom.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>



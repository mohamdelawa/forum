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
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
</head>
<body >
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">


    @include('layout.topbar')



    <div >

      <div class="s003" style="background-color: #3e5569;">

    <form method="get" action="{{Route('visitor_result_search')}}">
        <h2  style=" padding-bottom:30px; padding-left:80px; color: white" >Find the publications you need here</h2>
        <div class="inner-form">

            <div class="input-field second-wrap">
                <input id="search" type="text" name="data" placeholder="Enter Keywords?" />
                @csrf
            </div>
            <div class="input-field third-wrap">
                <button class="btn-search" type="submit">
                    <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>


</div>
</div>

<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
<!--Custom JavaScript -->
<script src="../../dist/js/custom.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

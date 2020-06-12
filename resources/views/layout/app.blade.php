<!DOCTYPE html>
<html>
@include('layout.head')
<body style="background-color: #3e5569;">

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">


    @include('layout.topbar')

    <div class="container-fluid">
     <!-- Default form register -->



                <!-- Default form register -->
                @yield('page padding')



    </div>
</div>
<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
<!--Custom JavaScript -->
<script src="../../dist/js/custom.js"></script>
<!-- Material form register -->
</body>
</html>

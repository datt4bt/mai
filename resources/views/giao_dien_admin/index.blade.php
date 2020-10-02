<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Quản lý Sinh viên</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <script src={{ url('ckeditor/ckeditor.js') }}></script>



        <!--Morris Chart CSS -->
        <link href="{{ asset('css1/morris.css') }}" >
        <link href="{{ asset('css1/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css1/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css1/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css1/pace-theme-flash.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css1/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css">
       @stack('css')


    </head>

    @if (Session::has('error'))
    <script>
        alert("Bạn không có quyền truy cập");
    </script>

    @endif


    <body class="fixed-left">

        <!-- Loader -->


        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->

            @include('giao_dien_admin.sitebar')

            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    @include('giao_dien_admin.topbar')
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                      @yield('content')

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                @include('giao_dien_admin.footer')

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{ asset('js1/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js1/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js1/modernizr.min.js') }}"></script>
        <script src="{{ asset('js1/detect.js') }}"></script>
        <script src="{{ asset('js1/fastclick.js') }}"></script>
        <script src="{{ asset('js1/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js1/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('js1/waves.js') }}"></script>
        <script src="{{ asset('js1/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('js1/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('js1/skycons.min.js') }}"></script>
        <script src="{{ asset('js1/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('js1/morris.min.js') }}"></script>
        <script src="{{ asset('js1/raphael-min.js') }}"></script>
        <script src="{{ asset('js1/dashboard.js') }}"></script>
        <script src="{{ asset('js1/name.js') }}"></script>
        @stack('js')

    </body>
</html>

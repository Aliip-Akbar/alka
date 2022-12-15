<!DOCTYPE html>
<html>
<head>
    <title>Labani Pos</title>
    <link rel="icon" href="{!! asset('../img/market.png') !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('layout.style')
    <link href="{{ URL::to('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/PrintArea.css') }}" rel="stylesheet">
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            @include('layout.menu')
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <a href="{{ ('logout') }}" class="text-decoration-none btn btn-danger">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @yield('isi')
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Labani Media 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <script src="{{ URL::to('js/sb-admin-2.min.js') }}"></script>
        <script src="{{ URL::to('js/jquery.PrintArea.js') }}"></script>
        <script src="{{ URL::to('js/jquery-ui-1.10.4.custom.js') }}"></script>
        @include('layout.script')
</body>
</html>

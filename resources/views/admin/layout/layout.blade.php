<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.style')

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('sweetalert::alert')
        @include('admin.layout.header')



        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include('admin.layout.theme-setting')




            @include('admin.layout.setting')


            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->


            @include('admin.layout.sidebar')



            <!-- partial -->
            <div class="main-panel">




                @yield('content')




                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                @include('admin.layout.footer')


                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.layout.script')

</body>

</html>

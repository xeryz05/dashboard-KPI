<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.style')

    {{-- @yield('style') --}}

</head>

<body class="main-body app sidebar-mini ltr">

    <!-- Loader -->
    <div id="global-loader">
        <img class="loader-img" src="{{ asset('assets/img/logo/verdanco-title.png') }}" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page custom-index">
        <div>
            <!-- main-header -->
            @include('layouts.header')
            <!-- main-header -->
            
            <!-- main-sidebar -->
            @include('layouts.sidebar')
            <!-- main-sidebar -->
        </div>

        <!-- main-content -->
        @yield('content')
        <!-- /main-content -->

        <!-- Footer opened -->
        <div class="main-footer">
            <div class="container-fluid pd-t-0 ht-100p">
                <span> 2023 © Copyright Verdanco Group | Beta Version</span>
            </div>
        </div>
        <!-- Footer closed -->

    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a id="back-to-top" href="#top"><i class="las la-angle-double-up"></i></a>

    @include('layouts.script')
    {{-- @yield('script') --}}

</body>

</html>
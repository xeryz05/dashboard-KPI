<!DOCTYPE html>
<html lang="en">

<head>

        <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/logo/verdanco-title.png') }}" type="image/x-icon" />
    <!-- Title -->
    <title> @yield('title') - Verdanco Group </title>

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Bootstrap css -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- style css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">

    {{-- Toastr --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://kit.fontawesome.com/aee6c06acc.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: white;
            color: black;
        }

        .side-menu__label {
            color: #000000;
        }

        .side-item_side-item-category {
            color: #000000;
        }

        .slide.is-expanded a {
            color: #000000;
        }

        .angle {
            color: #000000 !important;
        }

        .app.sidenav-toggled .side-menu__label {
            color: #000000;
        }

        .app-sidebar .slide-menu a:before {
            color: #000000;
        }

        .app-sidebar .slide .side-menu__item.active::before {
            background: yellow;
        }

        .side-menu__item.active .side-menu__label {
            color: yellow !important;
        }

        .bg-primary {
            background-color: rgb(208, 217, 28) !important;
        }

        .dark-theme .side-menu__label,
        .dark-theme .side-menu .side-menu__icon {
            color: #000000;
        }

        .dark-theme .text-dark {
            color: #000000 !important;
        }

        .text-light {
            color: #000000 !important;
        }

        /* @yield('style')

        ;
        */
    </style>

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
            <!-- main-header -->
            <div class="main-header side-header nav nav-item sticky"
                style="background:radial-gradient(circle at 20% 20%, rgb(167, 162, 149) 0%, rgb(249, 252, 84) 90%);">
                <div class="container-fluid main-container">
                    <div class="main-header-left">
                        <div class="responsive-logo">
                            <a class="" href="">
                                <img class="logo-1" src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}"
                                    width="150" alt="logo">
                                <img class="dark-logo-1"
                                    src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}" width="150"
                                    alt="logo">
                            </a>
                        </div>
                        <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                            <a class="open-toggle" href="javascript:void(0);"><i
                                    class="header-icon fe fe-align-left text-light"></i></a>
                            <a class="close-toggle" href="javascript:void(0);"><i
                                    class="header-icons fe fe-x text-light"></i></a>
                        </div>
                    </div>
                    <div class="main-header-right">
                        <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent-4" type="button"
                            aria-controls="navbarSupportedContent-4" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                        </button>
                        <div class="navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark mb-0 p-0">
                            <div class="navbar-collapse collapse" id="navbarSupportedContent-4">
                                <ul class="nav nav-item navbar-nav-right ms-auto">
                                    <li class="dropdown nav-item main-layout">
                                        <a class="new nav-link theme-layout nav-link-bg layout-setting">
                                            <span class="dark-layout">
                                                <i class="fa-regular fa-moon" style="color: #000000;"></i>
                                            </span>
                                            <span class="light-layout">
                                                <i class="fa fa-sun-o" style="color: #000000;" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item full-screen fullscreen-button">
											<a class="new nav-link full-screen-link" href="javascript:void(0);">
												<i class="fa-solid fa-expand" style="color: #000000;"></i>
											</a>
										</li> --}}
                                    <li class="dropdown main-profile-menu nav nav-item nav-link">
                                        <a class="profile-user d-flex" href="javascript:void(0);"><img
                                                style="height:30px" alt=""
                                                src="{{ asset('assets/img/user/Sample_User_Icon.png') }}"></a>
                                        <div class="dropdown-menu">
                                            <div class="main-header-profile bg-primary p-3">
                                                <div class="d-flex wd-100p">
                                                    <div class="main-img-user"><img class="" alt=""
                                                            src="{{ asset('assets/img/user/Sample_User_Icon.png') }}">
                                                    </div>
                                                    <div class="ms-3 my-auto">
                                                        <h6>{{ Auth::user()->name }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                                    class="bx bx-user-circle"></i>Profile</a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="dropdown-item" type="submit"><i
                                                        class="bx bx-log-out"></i> Sign Out</button>
                                            </form>

                                            {{-- <a class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-log-out"></i> Sign Out</a> --}}
                                        </div>
                                    </li>
                                    <li class="dropdown main-header-message right-toggle">
                                        {{-- <a class="nav-link pe-0" data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
											</a> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /main-header -->
            
            <!-- main-header -->
            
            <!-- main-sidebar -->
            <!-- main-sidebar -->
            <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
            <div class="sticky">
                <aside class="app-sidebar sidebar-scroll" style="background: rgb(167, 162, 149)">
                    <div class="main-sidebar-header active" style="background: rgb(167, 162, 149)">
                        <a class="desktop-logo logo-light active" href=""><img class="main-logo"
                                src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}" width="130"
                                alt="logo"></a>
                        <a class="desktop-logo logo-dark active" href=""><img class="main-logo"
                                src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}" width="130"
                                alt="logo"></a>
                        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img
                                src="{{ asset('assets/img/logo/verdanco-title.png') }}" width="130" alt="logo"></a>
                        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img
                                src="{{ asset('assets/img/logo/verdanco-title.png') }}" width="130" alt="logo"></a>
                    </div>
                    <div class="main-sidemenu">
                        <div class="app-sidebar__user clearfix">
                            <div class="dropdown user-pro-body">
                            </div>
                        </div>
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            @role('admin')
                                <li class="side-item side-item-category text-dark">Admin</li>
                                <li class="slide">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                        <i class="fas fa-user-shield" style="color: #000000;"></i>
                                        <span class="side-menu__label" style="margin-left: 20px">Admin Pages</span><i
                                            class="angle fe fe-chevron-down"></i>
                                    </a>
                                    <ul class="slide-menu">
                                        <li class="panel sidetab-menu">
                                            <div class="panel-body tabs-menu-body border-0 p-0">
                                                <div class="tab-content">
                                                    <div class="tab-pane tab-content-show active" id="side41">
                                                        <ul class="sidemenu-list">
                                                            <li class="side-menu__label1"><a
                                                                    href="javascript:void(0);">Admin Pages</a></li>
                                                            <li><a class="slide-item" href="{{ route('users.index') }}">User Management</a>
                                                            </li>
                                                            <li class="sub-slide">
                                                                <a class="slide-item" href="{{ route('departements.index') }}">Departement Management</a>
                                                            </li>
                                                            <li><a class="slide-item" href="">Company Management</a></li>
                                                            <li><a class="slide-item" href="">Role Management</a></li>
                                                            {{-- <li><a class="slide-item" href="">Revenue Verdanco Indonesia</a></li>
                                                            <li><a class="slide-item" href="">Revenue Verdanco Engineering</a></li> --}}
                                                            <li><a class="slide-item" href="">Periode</a></li>
                                                            <li><a class="slide-item" href="{{ route('role.index') }}">Roles</a></li>
                                                            <li><a class="slide-item" href="{{ route('permission.index') }}">Permissions</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            @endrole
                            @can('Uji Coba')
                                <li class="side-item side-item-category text-dark">Dashboard KPI Uji Coba</li>
                                <li class="slide">
                                    <a class="{{ Request::routeIs('verevs') ? 'active' : '' }} side-menu__item" href="{{ route('verevs.index') }}">
                                        <i class="fas fa-columns" style="color: #000000;"></i>
                                        <span class="side-menu__label" style="margin-left: 20px">Revenue Verdanco Indonesia</span></a>
                                </li>
                                <li class="slide">
                                    <a class="{{ Request::routeIs('CorVE') ? 'active' : '' }} side-menu__item" href="{{ route('CorVE') }}">
                                        <i class="fas fa-columns" style="color: #000000;"></i>
                                        <span class="side-menu__label" style="margin-left: 20px">Verdanco Engineering</span></a>
                                </li>
                            @endcan
                            
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </aside>
            </div>
            <!-- main-sidebar -->
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

    <!-- JQuery min js -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

    <!--Internal Sparkline js -->
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>

    <!--Internal Apexchart js-->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

    <!-- Eva-icons js -->
    <script src="{{ asset('assets/js/eva-icons.min.js') }}"></script>

    <!-- right-sidebar js -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/js/modal-popup.js') }}"></script>

    <!-- Left-menu js-->
    <script src="{{ asset('assets/plugins/side-menu/sidemenu.js') }}"></script>

    <!-- Internal Map -->
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

    <!--Internal  index js -->
    <script src="{{ asset('assets/js/index.js') }}"></script>

    <!--themecolor js-->
    <script src="{{ asset('assets/js/themecolor.js') }}"></script>

    <!-- Apexchart js-->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- switcher-styles js -->
    <script src="{{ asset('assets/js/swither-styles.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
    {{-- @yield('script') --}}

</body>

</html>
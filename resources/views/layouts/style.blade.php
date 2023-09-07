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

    <!-- style css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">

    {{-- Toastr --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://kit.fontawesome.com/aee6c06acc.js" crossorigin="anonymous"></script>

    @yield('style')

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
    <meta charset="UTF-8">
    <meta
        name='viewport'
        content='width=device-width, initial-scale=1.0, user-scalable=0'
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >
    <!-- Favicon -->
    <link
        rel="icon"
        href="{{ asset('assets/img/logo/verdanco-title.png') }}"
        type="image/x-icon"
    />
    <!-- Title -->
    <title> @yield('title') - Verdanco Group </title>

    <!-- Icons css -->
    <link
        href="{{ asset('assets/css/icons.css') }}"
        rel="stylesheet"
    >

    <!-- Bootstrap css -->
    <link
        id="style"
        href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet"
    >

    <link
        href="https://unpkg.com/aos@2.3.1/dist/aos.css"
        rel="stylesheet"
    >

    <!-- style css -->
    <link
        href="{{ asset('assets/css/style.css') }}"
        rel="stylesheet"
    >
    <link
        href="{{ asset('assets/css/plugins.css') }}"
        rel="stylesheet"
    >

    <!--- Animations css-->
    <link
        href="{{ asset('assets/css/animate.css') }}"
        rel="stylesheet"
    >

    {{-- Toastr --}}
    <link
        rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    >

    <script
        src="https://kit.fontawesome.com/aee6c06acc.js"
        crossorigin="anonymous"
    ></script>

    @yield('style')

    <style>
        body {
            background-color: white;
            color: black;
        }

        #back-to-top {
            display: none;
            /* Sembunyikan tombol saat tampilan awal */
            position: fixed;
            background-color: #ffed66;
            color: #fff;
            border: none;
            padding: 2px;
            color: #000000;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        #back-to-top:hover {
            background-color: #d6d6d6;
            transition: background-color 1s ease;
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
            color: rgb(0, 0, 0) !important;
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

        .main-sidemenu {
            top: 0;
            left: 0;
            transition: left 2s ease;
        }

        .main-sidemenu span:hover {
            left: 0px;
            transition: left 0.5s ease-in-out;
        }

        @keyframes slideDown {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(0);
            }
        }

        .main-header {
            background: rgba(0, 0, 0, 0);
            transition: background 0.3s ease;
            /* Efek transisi */
            animation: none;
        }

        /* Animasi header solid dari atas ke bawah */
        .main-header.solid {
            background: linear-gradient(to right, #d6d6d6 0%, #ffed66 55%);
            animation: slideDown 0.5s;
        }

        @keyframes slideDown {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* .slide{
            background-color: #ffed66;
        } */
        .slide {
            background-color: #d6d6d6;
            transition: background-color 0.5s ease;
        }

        .slide:hover {
            background-color: #ffed66;
            /* Gantilah 'your-desired-color' dengan warna yang Anda inginkan */
            transition: background-color 1s ease;
        }

        .main-header-left {
            /* background-color:#ffed66; */
            transition: background-color 0.5s ease;
        }

        .main-header-left:hover {
            background-color: #ffed66;
            transition: background-color 1s ease;
        }

        .fe-sunset {
            /* background-color:#ffed66; */
        }

        .fe-sunset:hover {
            background-color: #ffed66;
        }

        .profile-user {
            /* background-color:#ffed66; */
        }

        .profile-user:hover {
            background-color: #ffed66;
        }
    </style>

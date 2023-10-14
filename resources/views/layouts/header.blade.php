<div
    class="main-header side-header nav nav-item bg-body-tertiary sticky mb-5 rounded shadow"
    {{-- style="background: linear-gradient(to right, #d6d6d6 0%, #ffed66 55%);" --}}
>
    <div class="container-fluid main-container">
        <div class="main-header-left bg-body-tertiary rounded shadow">
            <div class="responsive-logo">
                <a
                    class=""
                    href=""
                >
                    <img
                        class="logo-1"
                        src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}"
                        width="150"
                        alt="logo"
                    >
                    <img
                        class="dark-logo-1"
                        src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}"
                        width="150"
                        alt="logo"
                    >
                </a>
            </div>
            <div
                class="app-sidebar__toggle"
                data-bs-toggle="sidebar"
            >
                <a
                    class="open-toggle"
                    href="javascript:void(0);"
                ><i class="header-icon fe fe-align-left text-light"></i></a>
                <a
                    class="close-toggle"
                    href="javascript:void(0);"
                ><i class="header-icons fe fe-x text-light"></i></a>
            </div>
        </div>
        <div class="main-header-right">
            <button
                class="navbar-toggler navresponsive-toggler d-lg-none ms-auto"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent-4"
                type="button"
                aria-controls="navbarSupportedContent-4"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
            </button>
            <div class="navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark mb-0 p-0">
                <div
                    class="navbar-collapse collapse"
                    id="navbarSupportedContent-4"
                >
                    <ul class="nav nav-item navbar-nav-right ms-auto">
                        <li class="dropdown nav-item main-layout">
                            <a class="new nav-link theme-layout nav-link-bg layout-setting">
                                <span class="dark-layout">
                                    <i
                                        class="fe fe-sunset bg-body-tertiary rounded shadow"
                                        style="color: #000000;"
                                    ></i>
                                </span>
                                <span class="light-layout">
                                    <i
                                        class="fe fe-sunrise bg-body-tertiary rounded shadow"
                                        style="color: #000000;"
                                        aria-hidden="true"
                                    ></i>
                                </span>
                            </a>
                        </li>
                        {{-- <li class="nav-item full-screen fullscreen-button">
											<a class="new nav-link full-screen-link" href="javascript:void(0);">
												<i class="fa-solid fa-expand" style="color: #000000;"></i>
											</a>
										</li> --}}
                        <li class="dropdown main-profile-menu nav nav-item nav-link">
                            <a
                                class="profile-user d-flex bg-body-tertiary rounded p-2 shadow"
                                href="javascript:void(0);"
                            >
                                <img
                                    style="width:25px; height:25px"
                                    alt=""
                                    src="{{ asset('assets/img/user/Sample_User_Icon.png') }}"
                                ></a>
                            <div class="dropdown-menu">
                                <div class="main-header-profile bg-secondary p-3">
                                    <div class="d-flex wd-100p">
                                        <div class="main-img-user">
                                            <img
                                                class=""
                                                alt=""
                                                src="{{ asset('assets/img/user/Sample_User_Icon.png') }}"
                                            >
                                        </div>
                                        <div class="my-auto ms-3">
                                            <h6>{{ Auth::user()->name }}</h6>
                                            <span>
                                                @if (Auth::user()->online)
                                                    <span class="text-danger">Offline</span>
                                                @else
                                                    <span class="text-success">Online</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <a
                                    class="dropdown-item"
                                    href="{{ route('profile.edit') }}"
                                >
                                    <i class="bx bx-user-circle"></i>Profile</a>
                                <form
                                    method="POST"
                                    action="{{ route('logout') }}"
                                >
                                    @csrf
                                    <button
                                        class="dropdown-item"
                                        type="submit"
                                    >
                                        <i class="bx bx-log-out"></i> Sign Out
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

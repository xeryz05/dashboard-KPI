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
                                <li class="side-item side-item-category text-dark">Dashboard KPI Corporate</li>
                            <li class="slide">
                                <a class="side-menu__item" href="{{ route('admin') }}">
                                    <i class="fas fa-columns" style="color: #000000;"></i>
                                    <span class="side-menu__label" style="margin-left: 20px">Page Admin</span></a>
                            </li>
                            @endrole
                            <li class="side-item side-item-category text-dark">Dashboard KPI Corporate</li>
                            <li class="slide">
                                <a class="{{ Request::routeIs('CorpVI') ? 'active' : '' }} side-menu__item" href="{{ route('CorpVI') }}">
                                    <i class="fas fa-columns" style="color: #000000;"></i>
                                    <span class="side-menu__label" style="margin-left: 20px">Verdanco Indonesia</span></a>
                            </li>
                            <li class="slide">
                                <a class="{{ Request::routeIs('CorVE') ? 'active' : '' }} side-menu__item" href="{{ route('CorVE') }}">
                                    <i class="fas fa-columns" style="color: #000000;"></i>
                                    <span class="side-menu__label" style="margin-left: 20px">Verdanco Engineering</span></a>
                            </li>

                            <li class="side-item side-item-category text-dark">Dashboard KPI Departement</li>
                            <li class="slide">
                                <a class="side-menu__item {{ Request::routeIs('deptVI') ? 'active' : '' }}" href="{{route('deptVI')}}">
                                    <i class="fas fa-columns" style="color: #000000;"></i>
                                    <span class="side-menu__label" style="margin-left: 20px">Verdanco
                                        Indonesia</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item {{ Request::routeIs('deptVE') ? 'active' : '' }}" style="color: #000000" href="{{route('deptVE')}}">
                                    <i class="fas fa-columns" style="color: #000000;"></i>
                                    <span class="side-menu__label" style="margin-left: 20px">Verdanco
                                        Engineering</span></a>
                            </li>
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
                            @can('read')
                            <!--<li class="side-item side-item-category text-dark">KPI Corporate</li>-->
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item {{ Request::is('verdancoKPI*') ? 'active' : '' }}"-->
                            <!--        data-bs-toggle="slide" href="">-->
                            <!--        <i class="fas fa-chart-line" style="color: #000000;"></i>-->
                            <!--        <span class="side-menu__label" style="margin-left: 20px">KPI Verdanco-->
                            <!--            Indonesia</span><i class="angle fe fe-chevron-down"-->
                            <!--            style="color:#ffffff"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="panel sidetab-menu">-->
                            <!--            <div class="panel-body tabs-menu-body border-0 p-0">-->
                            <!--                <div class="tab-content">-->
                            <!--                    <div class="tab-pane tab-content-show active" id="side14">-->
                            <!--                        <ul class="sidemenu-list">-->
                            <!--                            <li class="side-menu__label1"><a-->
                            <!--                                    href="javascript:void(0);">KPI Corporate</a></li>-->
                            <!--                            <li><a class="slide-item"-->
                            <!--                                    href="{{ url('/revenueVI/tipe-pekerjaan') }}">Revenue-->
                            <!--                                    VI</a></li>-->
                            <!--                        </ul>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">-->
                            <!--        <i class="fas fa-chart-line" style="color: #000000;"></i>-->
                            <!--        <span class="side-menu__label" style="margin-left: 20px">KPI Verdanco-->
                            <!--            Engineering</span><i class="angle fe fe-chevron-down"-->
                            <!--            style="color:#000000;"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="panel sidetab-menu">-->
                            <!--            <div class="panel-body tabs-menu-body border-0 p-0">-->
                            <!--                <div class="tab-content">-->
                            <!--                    <div class="tab-pane tab-content-show active" id="side14">-->
                            <!--                        <ul class="sidemenu-list">-->
                            <!--                            <li class="side-menu__label1"><a-->
                            <!--                                    href="javascript:void(0);">KPI Corporate</a></li>-->
                            <!--                            <li><a class="slide-item"-->
                            <!--                                    href="{{ url('/revenueVE/tipe-pekerjaan') }}">Revenue-->
                            <!--                                    VE</a></li>-->
                            <!--                        </ul>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
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
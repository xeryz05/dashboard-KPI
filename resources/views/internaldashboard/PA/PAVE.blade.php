@extends('layouts.main') 
@section('style')
    <!-- Swiper CSS -->
    {{-- <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/carouselcss/owl.carousel.min.css') }}"
    />
    <link
        rel="stylesheet"
        href="{{ asset('css/carouselcss/owl.theme.default.min.css') }}"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css"
    />
    <link rel="stylesheet" href="{{ asset('css/carouselcss/style.css') }}" />
@endsection 
@section('content')
<body class="main-body app sidebar-mini ltr">
    <!-- Loader -->
    
    <div id="global-loader">
        <img
            src="{{ asset('img/svgicons/loader.svg') }}"
            class="loader-img"
            alt="Loader"
        />
    </div>
   
    <!-- /Loader -->

    <!-- Page -->
    <div class="page custom-index">
        <!-- main-content -->
        <div class="main-content app-content">
            <!-- container -->
            <div class="main-container container-fluid">
                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-center">
                    <h4 class="page-title">Revenue Verdanco Engineering</h4>
                </div>
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </button>
                        <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item {{ request()->segment(1) == 'revenues' ? 'active' : '' }}" href="{{ route('revenues.index') }}">Revenue VI</a></li>
                            <li><a class="dropdown-item {{ request()->segment(1) == 'revenuesVE' ? 'active' : '' }}" href="{{ route('revenuesVE.index') }}">Revenue VE</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->
                <!-- row -->

                <div class="row row-sm">
                    <!-- row closed -->

                    <!-- row opened -->
                    <div class="row row-sm">
                        <div class="col-xl-8 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-title my-2 mx-2">
                                    Grafik KPI Revenue 2023
                                </div>
                                <div class="chartjs-wrapper-demo">
                                    <canvas id="chartBar3"></canvas>
                                </div>
                                @section('script')
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                <script>
                                 

                                $.get("http://localhost:8000/api/revenuesVE/data",function(dataRev, status){ //ambil data dari DashboardRevenueController
                             
                                          
                                    var ctx3 = document
                                        .getElementById("chartBar3")
                                        .getContext("2d");
                                    var gradient = ctx3.createLinearGradient(
                                        0,
                                        0,
                                        0,
                                        250
                                    );
                                    gradient.addColorStop(0, "#1ad60d");
                                    gradient.addColorStop(1, "#d60d25");
                                    new Chart(ctx3, {
                                        type: "bar",
                                        data: {
                                            labels: [
                                                "Jan",
                                                "Feb",
                                                "Mar",
                                                "Apr",
                                                "May",
                                                "Jun",
                                                "Jul",
                                                "Aug",
                                                "Sept",
                                                "Okt",
                                                "Nov",
                                                "Des"
                                            ],
                                            datasets: [
                                                {
                                                    label: "Revenue 2023",
                                                    data: dataRev,
                                                    backgroundColor: gradient,
                                                },
                                            ],
                                        },
                                        options: {
                                            maintainAspectRatio: false,
                                            responsive: true,
                                            plugins: {
                                                legend: {
                                                    display: false,
                                                    labels: {
                                                        display: false,
                                                    },
                                                },
                                            },
                                            scales: {
                                                y: {
                                                    ticks: {
                                                        beginAtZero: true,
                                                        fontSize: 10,
                                                        max: 80,
                                                        fontColor:
                                                            "rgba(171, 167, 167,0.9)",
                                                    },
                                                    grid: {
                                                        display: true,
                                                        color: "rgba(171, 167, 167,0.2)",
                                                        drawBorder: false,
                                                    },
                                                },
                                                x: {
                                                    barPercentage: 0.6,
                                                    ticks: {
                                                        beginAtZero: true,
                                                        fontSize: 11,
                                                        fontColor:
                                                            "rgba(171, 167, 167,0.9)",
                                                    },
                                                    grid: {
                                                        display: true,
                                                        color: "rgba(171, 167, 167,0.2)",
                                                        drawBorder: false,
                                                    },
                                                },
                                            },
                                        },
                                    });
                                });  
                                </script>
                                @endsection {{-- @endforeach --}}
                            </div>
                        </div>
                        {{-- <div class="col-xl-4 col-md-12 col-lg-12">
                            
                        </div> --}}
                        
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="card card-dashboard-eight pb-2">
								<h6 class="card-title">Detail Revenue</h6><span class="d-block mg-b-10 text-muted tx-12">Sales performance revenue based by country</span>
								<div class="list-group border">
                                    @forelse ($verevenues as $item)
                                        <div class="list-group-item border-top-0" id="br-t-0">
										<i class="flag-icon flag-icon-us flag-icon-squared"></i>
										<p>{{ $item->period['month'] }}</p><span>Rp.{{ number_format($item->pendapatan_perbulan) }}</span>
                                        </div>
                                        {{-- <div class="list-group-item">
                                            <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                                            <p>Netherlands</p><span>$1,064.75</span>
                                        </div> --}}
                                    <div class="list-group-item border-top-0" id="br-t-0">
										<i class="flag-icon flag-icon-us flag-icon-squared"></i>
                                        {{-- @foreach ($revenues as $item) --}}
                                        {{-- @endforeach --}}
										{{-- <p>Total :</p><span>Rp.{{ number_format($item->sum('pendapatan_perbulan')) }}</span> --}}
                                    </div>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Blog belum Tersedia.
                                        </div>
                                    @endforelse
								</div>
							</div>
                        </div>
                        {{--
                        <div class="col-xl-4 col-md-12 col-lg-6">cc</div>
                        --}} {{--
                        <div class="col-xl-4 col-md-12 col-lg-6">dd</div>
                        --}}
                    </div>
                    <!-- row close -->
                </div>
                <!-- /Container -->
            </div>
            <!-- /main-content -->
        </div>
        <!-- End Page -->

        @endsection @section('script')
            <script src="{{ asset('js/carouseljs/jquery.min.js') }}"></script>
            <script src="{{ asset('js/carouseljs/popper.js') }}"></script>
            <script src="{{ asset('js/carousel/owl.carousel.min.js') }}"></script>
            <script src="{{ asset('js/carouseljs/main.js') }}"></script>
        @endsection
    </div>
</body>

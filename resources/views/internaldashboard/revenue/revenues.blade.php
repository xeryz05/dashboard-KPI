<!-- Favicon -->
{{-- <link
            rel="icon"
            href="{{ asset('logo/verdanco-title.png') }}"
            type="image/x-icon"
        /> --}}
@section('title')
    Grafik Revenue
@endsection
@section('style')
    <!-- Swiper CSS -->
    {{-- <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/carouselcss/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/carouselcss/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/carouselcss/style.css') }}" />

    <script src="https://code.highcharts.com/highcharts.js"></script>
@endsection
@extends('layouts.app')
@section('content')

    <body class="main-body app sidebar-mini ltr">
        <!-- Page -->
        <div class="page custom-index">
            <!-- main-content -->
            <div class="main-content app-content">
                <!-- container -->
                <div class="main-container container-fluid">
                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-center">
                        <h4 class="page-title">Revenue Verdanco Indoenesia</h4>
                    </div>
                    <div class="breadcrumb-header justify-content-between">
                        <div class="left-content">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Verdanco Indonesia
                                </button>
                                <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item {{ request()->segment(1) == 'revenueVI' ? 'active' : '' }}"
                                            href="/revenueVI">Revenue VI</a></li>
                                    <li><a class="dropdown-item {{ request()->segment(1) == 'revenueVE' ? 'active' : '' }}"
                                            href="/revenueVE">Revenue VE</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="left-content">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Detail Tipe Pekerjaan
                                </button>
                                <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item {{ request()->segment(1) == 'AC' ? 'active' : '' }}"
                                            href="{{ url('/detail/solahart') }}">Solahart</a></li>
                                    <li><a class="dropdown-item {{ request()->segment(1) == 'Solahart' ? 'active' : '' }}"
                                            href="">AC</a></li>
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
                                    <div class="container px-4 mx-auto">
                                        <div class="p-6 m-20">
                                            <script src="https://code.highcharts.com/highcharts.js"></script>
                                            <script src="https://code.highcharts.com/highcharts-more.js"></script>
                                            <script src="https://code.highcharts.com/highcharts-3d.js"></script>
                                            <script src="https://code.highcharts.com/modules/stock.js"></script>
                                            <script src="https://code.highcharts.com/maps/modules/map.js"></script>
                                            <script src="https://code.highcharts.com/modules/gantt.js"></script>
                                            <script src="https://code.highcharts.com/modules/exporting.js"></script>
                                            <script src="https://code.highcharts.com/modules/parallel-coordinates.js"></script>
                                            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                                            <script src="https://code.highcharts.com/modules/annotations-advanced.js"></script>
                                            <script src="https://code.highcharts.com/modules/data.js"></script>
                                            <script src="https://code.highcharts.com/modules/draggable-points.js"></script>
                                            <script src="https://code.highcharts.com/modules/static-scale.js"></script>
                                            <script src="https://code.highcharts.com/modules/broken-axis.js"></script>
                                            <script src="https://code.highcharts.com/modules/heatmap.js"></script>
                                            <script src="https://code.highcharts.com/modules/tilemap.js"></script>
                                            <script src="https://code.highcharts.com/modules/timeline.js"></script>
                                            <script src="https://code.highcharts.com/modules/treemap.js"></script>
                                            <script src="https://code.highcharts.com/modules/treegraph.js"></script>
                                            <script src="https://code.highcharts.com/modules/item-series.js"></script>
                                            <script src="https://code.highcharts.com/modules/drilldown.js"></script>
                                            <script src="https://code.highcharts.com/modules/histogram-bellcurve.js"></script>
                                            <script src="https://code.highcharts.com/modules/bullet.js"></script>
                                            <script src="https://code.highcharts.com/modules/funnel.js"></script>
                                            <script src="https://code.highcharts.com/modules/funnel3d.js"></script>
                                            <script src="https://code.highcharts.com/modules/pyramid3d.js"></script>
                                            <script src="https://code.highcharts.com/modules/networkgraph.js"></script>
                                            <script src="https://code.highcharts.com/modules/pareto.js"></script>
                                            <script src="https://code.highcharts.com/modules/pattern-fill.js"></script>
                                            <script src="https://code.highcharts.com/modules/price-indicator.js"></script>
                                            <script src="https://code.highcharts.com/modules/sankey.js"></script>
                                            <script src="https://code.highcharts.com/modules/arc-diagram.js"></script>
                                            <script src="https://code.highcharts.com/modules/dependency-wheel.js"></script>
                                            <script src="https://code.highcharts.com/modules/series-label.js"></script>
                                            <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
                                            <script src="https://code.highcharts.com/modules/sonification.js"></script>
                                            <script src="https://code.highcharts.com/modules/stock-tools.js"></script>
                                            <script src="https://code.highcharts.com/modules/streamgraph.js"></script>
                                            <script src="https://code.highcharts.com/modules/sunburst.js"></script>
                                            <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
                                            <script src="https://code.highcharts.com/modules/variwide.js"></script>
                                            <script src="https://code.highcharts.com/modules/vector.js"></script>
                                            <script src="https://code.highcharts.com/modules/venn.js"></script>
                                            <script src="https://code.highcharts.com/modules/windbarb.js"></script>
                                            <script src="https://code.highcharts.com/modules/wordcloud.js"></script>
                                            <script src="https://code.highcharts.com/modules/xrange.js"></script>
                                            <script src="https://code.highcharts.com/modules/no-data-to-display.js"></script>
                                            <script src="https://code.highcharts.com/modules/drag-panes.js"></script>
                                            <script src="https://code.highcharts.com/modules/debugger.js"></script>
                                            <script src="https://code.highcharts.com/modules/dumbbell.js"></script>
                                            <script src="https://code.highcharts.com/modules/lollipop.js"></script>
                                            <script src="https://code.highcharts.com/modules/cylinder.js"></script>
                                            <script src="https://code.highcharts.com/modules/organization.js"></script>
                                            <script src="https://code.highcharts.com/modules/dotplot.js"></script>
                                            <script src="https://code.highcharts.com/modules/marker-clusters.js"></script>
                                            <script src="https://code.highcharts.com/modules/hollowcandlestick.js"></script>
                                            <script src="https://code.highcharts.com/modules/heikinashi.js"></script>
                                            <div id="container"></div>
                                        @section('script')
                                            <script>
                                                Highcharts.chart('container', {
                                                    chart: {
                                                        type: 'pie',
                                                        options3d: {
                                                            enabled: true,
                                                            alpha: 45,
                                                            beta: 0
                                                        }
                                                    },
                                                    title: {
                                                        text: 'Revenue Verdanco Indonesia'
                                                    },
                                                    series: [{
                                                        name: '',
                                                        colorByPoint: true,
                                                        data: <?php echo json_encode($data); ?>
                                                    }],
                                                    plotOptions: {
                                                        pie: {
                                                            allowPointSelect: true,
                                                            cursor: 'pointer',
                                                            depth: 35,
                                                            dataLabels: {
                                                                enabled: true,
                                                                format: '{point.name}: Rp.{point.y:,.0f}'
                                                            },
                                                            showInLegend: true
                                                        }
                                                    },
                                                    credits: {
                                                        enabled: false
                                                    }
                                                });
                                            </script>
                                        @endsection
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="card card-dashboard-eight pb-2">
                                <h6 class="card-title">Detail Revenue</h6><span
                                    class="d-block mg-b-10 text-muted tx-12">KPI performance revenue Verdanco
                                    Indonesia</span>
                                <div class="table-responsive">
                                    <table class="table table-bordered mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Tipe Pekerjaan</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($revenues as $item)
                                                <tr>
                                                    <td>{{ $item->type_jobs }}</a></td>
                                                    <td>Rp.{{ number_format($item->grand_total) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

    @endsection
    @section('script')
        <script src="{{ asset('js/carouseljs/jquery.min.js') }}"></script>
        <script src="{{ asset('js/carouseljs/popper.js') }}"></script>
        <script src="{{ asset('js/carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/carouseljs/main.js') }}"></script>
    @endsection
</div>
</body>

<link
    rel="icon"
    href="{{ asset('assets/img/logo/verdanco-title.png') }}"
    type="image/x-icon"
/>
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
@endsection 
@extends('layouts.main')
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
                    <h4 class="page-title">Revenue Verdanco Engineering</h4>
                </div>
                <!-- breadcrumb -->
                <!-- row -->

                <div class="row row-sm">
                    <!-- row closed -->

                    <!-- row opened -->
                    <div class="row row-sm">
                        <div class="col-xl-8 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="px-4 mx-auto">
                                    <div class="p-6 m-20">
                                        <script src="https://code.highcharts.com/highcharts.js"></script><script src="https://code.highcharts.com/highcharts-more.js"></script><script src="https://code.highcharts.com/highcharts-3d.js"></script><script src="https://code.highcharts.com/modules/stock.js"></script><script src="https://code.highcharts.com/maps/modules/map.js"></script><script src="https://code.highcharts.com/modules/gantt.js"></script><script src="https://code.highcharts.com/modules/exporting.js"></script><script src="https://code.highcharts.com/modules/parallel-coordinates.js"></script><script src="https://code.highcharts.com/modules/accessibility.js"></script><script src="https://code.highcharts.com/modules/annotations-advanced.js"></script><script src="https://code.highcharts.com/modules/data.js"></script><script src="https://code.highcharts.com/modules/draggable-points.js"></script><script src="https://code.highcharts.com/modules/static-scale.js"></script><script src="https://code.highcharts.com/modules/broken-axis.js"></script><script src="https://code.highcharts.com/modules/heatmap.js"></script><script src="https://code.highcharts.com/modules/tilemap.js"></script><script src="https://code.highcharts.com/modules/timeline.js"></script><script src="https://code.highcharts.com/modules/treemap.js"></script><script src="https://code.highcharts.com/modules/treegraph.js"></script><script src="https://code.highcharts.com/modules/item-series.js"></script><script src="https://code.highcharts.com/modules/drilldown.js"></script><script src="https://code.highcharts.com/modules/histogram-bellcurve.js"></script><script src="https://code.highcharts.com/modules/bullet.js"></script><script src="https://code.highcharts.com/modules/funnel.js"></script><script src="https://code.highcharts.com/modules/funnel3d.js"></script><script src="https://code.highcharts.com/modules/pyramid3d.js"></script><script src="https://code.highcharts.com/modules/networkgraph.js"></script><script src="https://code.highcharts.com/modules/pareto.js"></script><script src="https://code.highcharts.com/modules/pattern-fill.js"></script><script src="https://code.highcharts.com/modules/price-indicator.js"></script><script src="https://code.highcharts.com/modules/sankey.js"></script><script src="https://code.highcharts.com/modules/arc-diagram.js"></script><script src="https://code.highcharts.com/modules/dependency-wheel.js"></script><script src="https://code.highcharts.com/modules/series-label.js"></script><script src="https://code.highcharts.com/modules/solid-gauge.js"></script><script src="https://code.highcharts.com/modules/sonification.js"></script><script src="https://code.highcharts.com/modules/stock-tools.js"></script><script src="https://code.highcharts.com/modules/streamgraph.js"></script><script src="https://code.highcharts.com/modules/sunburst.js"></script><script src="https://code.highcharts.com/modules/variable-pie.js"></script><script src="https://code.highcharts.com/modules/variwide.js"></script><script src="https://code.highcharts.com/modules/vector.js"></script><script src="https://code.highcharts.com/modules/venn.js"></script><script src="https://code.highcharts.com/modules/windbarb.js"></script><script src="https://code.highcharts.com/modules/wordcloud.js"></script><script src="https://code.highcharts.com/modules/xrange.js"></script><script src="https://code.highcharts.com/modules/no-data-to-display.js"></script><script src="https://code.highcharts.com/modules/drag-panes.js"></script><script src="https://code.highcharts.com/modules/debugger.js"></script><script src="https://code.highcharts.com/modules/dumbbell.js"></script><script src="https://code.highcharts.com/modules/lollipop.js"></script><script src="https://code.highcharts.com/modules/cylinder.js"></script><script src="https://code.highcharts.com/modules/organization.js"></script><script src="https://code.highcharts.com/modules/dotplot.js"></script><script src="https://code.highcharts.com/modules/marker-clusters.js"></script><script src="https://code.highcharts.com/modules/hollowcandlestick.js"></script><script src="https://code.highcharts.com/modules/heikinashi.js"></script><div id="container"></div>
                                        <div id="container"></div>
                                        @section('script')
                                            <script>
                                                Highcharts.chart('container', {
                                                    chart: {
                                                        type: 'line'
                                                    },
                                                    title: {
                                                        text: 'Grafik Penjualan Bulanan'
                                                    },
                                                    xAxis: {
                                                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
                                                    },
                                                    yAxis: {
                                                        title: {
                                                            text: 'Total Penjualan'
                                                        }
                                                    },
                                                    series: [{
                                                        name: 'Penjualan',
                                                        data: [123123123,123123123,12312312,3000000000,6346234234,2352342,2342342,2000000000,234234,23423423,1000000000]
                                                    }]
                                                });
                                            </script>
                                        @endsection
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="card card-dashboard-eight pb-2">
								<h6 class="card-title">Detail Revenue</h6><span class="d-block mg-b-10 text-muted tx-12">KPI performance revenue Verdanco Indonesia</span>
								<div class="table-responsive">
                                    <table class="table table-bordered mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Tipe Pekerjaan</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($revenue as $item)
                                            <tr>
                                                <td>{{ $item->customer['name'] }}</a></td>
                                                <td>Rp. 1231231</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
							</div>
                        </div>
                    </div>
                    <!-- row close -->
                </div>
                <!-- /Container -->
            </div>
            <!-- /main-content -->
        </div>
        <!-- End Page -->
    </div>
</body>
@endsection

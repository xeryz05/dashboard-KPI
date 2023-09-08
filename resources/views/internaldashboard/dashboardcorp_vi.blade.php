
@section('title')
    Dashboard VI
@endsection
@extends('layouts.app')
{{-- @extends('admin.dashboard') --}}
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->

<script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
" rel="stylesheet">
<style>
    .slick-prev:before, .slick-next:before{
        color:rgba(99, 97, 97, 0.285);
    }
    .slick-prev, .slick-next {
        top: 240px;
        bottom: 100px;
        right: 35px;
        z-index: 10;
    }
    .slick-prev {
        left: 5px;
    
    }
    .slick-next {
        right: 5px;
    }
    <!-- Style the bar as you like -->
    .my-slider-progress {
        background: #ccc;
    }
    
    .my-slider-progress-bar {
        background: greenyellow;
        height: 2px;
        transition: width 400ms ease;
        width: 0;
    }

    canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    }
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 500px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

</style>

@endsection
@section('content')
    <!-- main-content -->
			<div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <!-- breadcrumb -->
                            <div class="breadcrumb-header justify-content-center">
                                <h4 class="page-title">Verdanco Engineering 2023</h4>
                            </div>
                            {{-- @foreach ($resultArray as $item)
                                    
                            @endforeach --}}
                            <section class="splide" aria-label="Splide Basic HTML Example">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach ($virevs as $item)
                                            <li class="splide__slide">
                                            <div class="col-md mg-md-t-0">
                                                <div class="card">
                                                    <div class="card-body">
                                                        {{-- revenue VI Januari--}}
                                                        <div class="my-3">
                                                            <h3 class="card-title tx-dark tx-medium mg-b-10 font-weight-bold text-center">{{ $item->event }}<span class="badge bg-success">Data Final</span></h3>
                                                            <h6 class="card-text bd-t">Revenue</h6>
                                                                    {{-- <span class="card-text">Tercapai :Rp.854,563,964</span><br> --}}
                                                                <span class="card-text">Tercapai :Rp. {{ number_format($item->total_value) }}</span><br>
                                                                @php
                                                                    $pendapatan =   $item->total_value; //total perbulan
                                                                    $target =      4000000000; //target perbulan vi  4,000,000,000  ve  7,000,000,000
                                                                    $persentase = ceil(($pendapatan / $target) * 100);
                                                                @endphp
                                                            <span class="">Persentasi: {{ $persentase }}%</span>
                                                            <div class="container">
                                                                <div class="row mt-3 text-center">
                                                                    <div class="col-12">
                                                                        <div class="progress">
                                                                            <div class="progress-bar bg-{{ $persentase > 60 ? $persentase > 80 ? 'success' : 'warning' : 'danger' }}" role="progressbar" style="width: {{ $persentase > 100 ? 100 : $persentase }}%" aria-valuenow="42.72" aria-valuemin="0" aria-valuemax="100">
                                                                                <span>{{ $persentase }}%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- end revenue VI januari --}}
                                                        {{-- Net Profit VI januari --}}
                                                        <div class="my-3">
                                                            <h6 class="card-text bd-t">Net Profit</h6>
                                                            <span class="card-text">
                                                                <span class="">Profit/Loss : {{ $item->total_profit }}</span><br>
                                                                <span class="">Persentasi: {{ $persentase }}%</span>
                                                                @php
                                                                    $total_profit =   $item->total_profit; //total perbulan
                                                                    $total_revenue =  $item->total_value; //target perbulan vi  4,000,000,000  ve  7,000,000,000
                                                                    $persentase = ceil(($total_profit / $total_revenue) * 100);
                                                                @endphp
                                                            </span><br>
                                                            <div class="container">
                                                                <div class="row mt-3 text-center">  
                                                                    <div class="col-12">
                                                                        @if ($persentase < 6)
                                                                            <progress class="w-100" style="accent-color: red;" value="{{ $persentase }}" max="7"></progress>
                                                                        @elseif ($persentase < 7)
                                                                            <progress class="w-100" style="accent-color: yellow;" value="{{ $persentase }}" max="7"></progress>
                                                                        @else
                                                                            <progress class="w-100" style="accent-color: green;" value="{{ $persentase }}" max="7"></progress>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- end Net Profit VI januari--}}
                                                        {{-- Aging VI januari--}}
                                                        <div class="my-3">
                                                            <h6 class="card-text bd-t">Aging</h6>
                                                            <span class="">Persentasi : 0%</span>
                                                            <div class="container">
                                                                <div class="row mt-3 text-center">
                                                                    <div class="col-12">
                                                                        {{-- <div class="progress-bar bg-{{ $persen > 60 ? $persen > 80 ? 'success' : 'warning' : 'danger' }}" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                            <span>0%</span>
                                                                        </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- end Aging VI januari --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        {{-- @dd($item) --}}
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                    {{-- coba chart --}}
                    <div class="row mt-5">
                        <div class="splide" id="ss">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($semesterSums as $item)
                                        {{-- @dd($item) --}}
                                         @php
                                            $totalNilaiAkhir = 0;
                                            $bobot = 40;
                                            $target = 12000000000;
                                            $revenue = $item['total_value'];
                                            $profit = $item['total_profit'];
                                            $aging = $item['total_agings'];
                                            $nilai = ($revenue / $target) * 100;
                                            $nilai_akhir = ($nilai * $bobot) / 100;

                                            $bobot_profit = 30;
                                            $target_profit = 7;
                                            $pencapaian_profit = $item['total_profit'];
                                            $nilai_profit = ($pencapaian_profit / $target_profit) * 100;
                                            if ($nilai_profit < 0) { 
                                                $nilai_profit = 0;
                                            }
                                            $nilai_akhir_profit = ($nilai_profit * $bobot_profit) / 100;

                                            if ($nilai_akhir_profit < 0) {
                                                $nilai_akhir_profit = 0;
                                            }

                                            $totalNilaiAkhir += $nilai_akhir + $nilai_akhir_profit;
                                        @endphp
                                        
                                        <li class="splide__slide">
                                            <div class="row" >
                                                <div class="col-md-8">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive" style="margin-bottom: 36px">
                                                                <h4>KPI Corporate Semester {{ $item['semester'] }}</h4>
                                                                <table  class="table table-sm" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Item KPI</th>
                                                                            <th>Bobot</th>
                                                                            <th>Target</th>
                                                                            <th>Pencapaian</th>
                                                                            <th>Nilai</th>
                                                                            <th>Hasil Akhir</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Revenue Perusahaan</td>
                                                                            <td>{{ $bobot . '%' }}</td>
                                                                            <td>{{ 'Rp'. number_format($target) }}</td>
                                                                            <td>{{ 'Rp'. number_format($item['total_value']) }}</td>
                                                                            <td>{{ ceil($nilai) . '%' }}</td>
                                                                            <td>{{ ceil($nilai_akhir) . '%' }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Net Profit</td>
                                                                            <td>{{ $bobot . '%' }}</td>
                                                                            <td>{{ number_format($target_profit) . '%' }}</td>
                                                                            <td>{{ 'Rp'. number_format($item['total_profit']) }}</td>
                                                                            <td>{{ ceil($nilai_profit) . '%' }}</td>
                                                                            <td>{{ ceil($nilai_akhir_profit) . '%' }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Aging</td>
                                                                            <td>30%</td>
                                                                            <td>30%</td>
                                                                            <td></td>
                                                                            <td>Belum di hitung</td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th colspan="5">Total</th>
                                                                            <th>{{ ceil($totalNilaiAkhir) . '%' }}</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div>
                                                            <figure class="highcharts-figure">
                                                                <div id="corporate{{ $item['semester'] }}"></div>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                ...
                                </ul>
                            </div>
                            <!-- Add the progress bar element -->
                            <div class="my-slider-progress">
                                <div class="my-slider-progress-bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="card">
                            <div class="card-body">
                                <div id="tipe_pekerjaan"></div>
                            <div id="sliders">
                                <table>
                                    <tr>
                                        <td><label for="alpha">Alpha Angle</label></td>
                                        <td><input id="alpha" type="range" min="0" max="45" value="15"/> <span id="alpha-value" class="value"></span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="beta">Beta Angle</label></td>
                                        <td><input id="beta" type="range" min="-45" max="45" value="15"/> <span id="beta-value" class="value"></span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="depth">Depth</label></td>
                                        <td><input id="depth" type="range" min="20" max="100" value="50"/> <span id="depth-value" class="value"></span></td>
                                    </tr>
                                </table>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- Container closed -->
			</div>
			<!-- main-content closed -->
            @section('script')
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/highcharts-more.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                <script src="https://code.highcharts.com/highcharts-3d.js"></script>

                <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                <script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/fc-4.2.2/r-2.4.1/datatables.min.js"></script>
                <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
                <button class="splide__toggle" type="button"></button>
                @foreach ($semesterSums as $item)
                    @php
                        $totalNilaiAkhir = 0;
                        $bobot = 40;
                        $target = 12000000000;
                        $revenue = $item['total_value'];
                        $profit = $item['total_profit'];
                        $aging = $item['total_agings'];
                        $nilai = ($revenue / $target) * 100;
                        $nilai_akhir = ($nilai * $bobot) / 100;

                        $bobot_profit = 30;
                        $target_profit = 7;
                        $pencapaian_profit = $item['total_profit'];
                        $nilai_profit = ($pencapaian_profit / $target_profit) * 100;
                        if ($nilai_profit < 0) { 
                            $nilai_profit = 0;
                        }
                        $nilai_akhir_profit = ($nilai_profit * $bobot_profit) / 100;

                        if ($nilai_akhir_profit < 0) {
                            $nilai_akhir_profit = 0;
                        }

                        $totalNilaiAkhir += $nilai_akhir + $nilai_akhir_profit;
                    @endphp
                    <script>
                        Highcharts.chart('corporate{{ $item['semester'] }}', {

                                chart: {
                                    type: 'gauge',
                                    plotBackgroundColor: null,
                                    plotBackgroundImage: null,
                                    plotBorderWidth: 0,
                                    plotShadow: false,
                                    height: '80%'
                                },

                                title: {
                                    text: 'Corporate'
                                },

                                pane: {
                                    startAngle: -90,
                                    endAngle: 89.9,
                                    background: null,
                                    center: ['50%', '75%'],
                                    size: '110%'
                                },

                                // the value axis
                                yAxis: {
                                    min: 0,
                                    max: 100,
                                    tickPixelInterval: 72,
                                    tickPosition: 'inside',
                                    tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                                    tickLength: 20,
                                    tickWidth: 2,
                                    minorTickInterval: null,
                                    labels: {
                                        distance: 20,
                                        style: {
                                            fontSize: '14px'
                                        }
                                    },
                                    lineWidth: 0,
                                    plotBands: [{
                                        from: 0,
                                        to: 59,
                                        color: '#DF5353', // red
                                        thickness: 20
                                    }, {
                                        from: 60,
                                        to: 79,
                                        color: '#DDDF0D', // yellow
                                        thickness: 20
                                    }, {
                                        from: 80,
                                        to: 100,
                                        color: '#55BF3B', // green
                                        thickness: 20
                                    }]
                                },

                                series: [{
                                    name: 'Speed',
                                    data: [{{ ceil($totalNilaiAkhir) }}],
                                    tooltip: {
                                        valueSuffix: '%'
                                    },
                                    dataLabels: {
                                        format: '{y} %',
                                        borderWidth: 0,
                                        color: (
                                            Highcharts.defaultOptions.title &&
                                            Highcharts.defaultOptions.title.style &&
                                            Highcharts.defaultOptions.title.style.color
                                        ) || '#333333',
                                        style: {
                                            fontSize: '16px'
                                        }
                                    },
                                    dial: {
                                        radius: '80%',
                                        backgroundColor: 'gray',
                                        baseWidth: 12,
                                        baseLength: '0%',
                                        rearLength: '0%'
                                    },
                                    pivot: {
                                        backgroundColor: 'gray',
                                        radius: 6
                                    }
                                }],
                                credits: {
                                    enabled: false
                                }
                            });
                    </script>
                @endforeach
                    
                    @foreach ($records as $item)
                        <script>
                            // Set up the chart
                            var records = <?php echo json_encode($records); ?>;
                            const chart = new Highcharts.Chart({
                                chart: {
                                    renderTo: 'tipe_pekerjaan',
                                    type: 'column',
                                    options3d: {
                                        enabled: true,
                                        alpha: 15,
                                        beta: 15,
                                        depth: 50,
                                        viewDistance: 25
                                    }
                                },
                                xAxis: {
                                    categories: ['Genset','Solahart','Other']
                                },
                                yAxis: {
                                    title: {
                                        enabled: false
                                    }
                                },
                                tooltip: {
                                    headerFormat: '<b>{point.key}</b><br>',
                                    pointFormat: 'Pendapatan: {point.y}%'
                                },
                                title: {
                                    text: 'Diagram Tipe Pekerjaan',
                                    align: 'left'
                                },
                                
                                legend: {
                                    enabled: false
                                },
                                plotOptions: {
                                    column: {
                                        depth: 25
                                    }
                                },
                                credits: {
                                    enabled: false
                                },
                                series: [{
                                    data: records.map(function(record) {
                                    return parseFloat(record.percentage);
                                }),
                                    colorByPoint: true
                                }]
                            });

                            function showValues() {
                                document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
                                document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
                                document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
                            }

                            // Activate the sliders
                            document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
                                chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
                                showValues();
                                chart.redraw(false);
                            }));

                            showValues();
                        </script>
                    @endforeach
                
                <script>
                    var splide = new Splide( '#ss' );
                    var bar    = splide.root.querySelector( '.my-carousel-progress-bar' );
                    
                    // Updates the bar width whenever the carousel moves:
                    splide.on( 'mounted move', function () {
                        var end  = splide.Components.Controller.getEnd() + 1;
                        var rate = Math.min( ( splide.index + 1 ) / end, 1 );
                        bar.style.width = String( 100 * rate ) + '%';
                    } );
                    
                    splide.mount();
                </script>
                <script>
                    var splide = new Splide( '.splide', {
                    type   : 'loop',
                    perPage: 3,
                    autoplay : false,
                    } );

                    splide.mount();
                </script>
                <script type="text/javascript">
                   $('.responsive').slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        responsive: [
                            {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true,
                                dots: true
                            }
                            },
                            {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                            },
                            {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                            }
                        ]
                        });
                </script>
                
                <script>
                    $(document).ready(function() {
                        $('#example').DataTable( {
                            dom: 'Bfrtip',
                            buttons: [
                                { extend: 'copyHtml5', footer: true },
                                { extend: 'excelHtml5', footer: true },
                                { extend: 'csvHtml5', footer: true },
                                { extend: 'pdfHtml5', footer: true }
                            ],
                            "ordering": false,
                            fixedColumns:   {
                                leftColumns: 1
                            },
                        } );
                    } );
                </script>
            @endsection
@endsection
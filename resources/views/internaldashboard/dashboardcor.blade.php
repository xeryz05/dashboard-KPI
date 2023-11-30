@section('title')
    Dashboard VE
@endsection
@extends('layouts.app')
{{-- @extends('admin.dashboard') --}}
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css"
    />

    <script src="
        https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
        "></script>
    <link
        href="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
"
        rel="stylesheet"
    >
    <style>
        .slick-prev:before,
        .slick-next:before {
            color: rgba(99, 97, 97, 0.285);
        }

        .slick-prev,
        .slick-next {
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

        < !-- Style the bar as you like -->.my-slider-progress {
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
                    <div class="col-md-3">
                        <span>
                            Last Update: {{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}
                        </span>
                    </div>
                    <div class="breadcrumb-header d-flex justify-content-center">
                        <h4 class="page-title">Verdanco Engineering 2023</h4>
                    </div>
                    <div class="slick-list">
                        <div class="col-md mg-md-t-0">
                            <div class="card" id="card-slide">
                                <div class="card-body">
                                    <div class="my-3">
                                        <h3
                                            class="card-title tx-dark tx-medium mg-b-10 font-weight-bold text-center"
                                            style="font-size: 16px">
                                        </h3>
                                        <h6
                                            class="card-text bd-t"
                                            style="font-size: 15px; padding-top:10px"
                                        >Revenue</h6>
                                        <br>
                                        <span class="card-text">Tercapai : {{ 'Rp.' . number_format($valueSum) }}</span><br>
                                        <span class="">Persentasi: {{ number_format($valuePersent) }}%</span>
                                        <div class="container">
                                            <div class="row mt-3 text-center">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ number_format($valuePersent) }}%" aria-valuenow="42.72" aria-valuemin="0" aria-valuemax="100">
                                                            <span>{{ number_format($valuePersent) }}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end revenue VI januari --}}
                                    {{-- Net Profit VI januari --}}
                                    <div class="my-3">
                                        <h6
                                            class="card-text bd-t"
                                            style="font-size: 15px; padding-top:10px"
                                        >Net Profit</h6>
                                        <span class="card-text">
                                            <span class="">Profit/Loss : {{ 'Rp.'. number_format($profitSum) }}</span><br>
                                            <span class="">Persentasi: %</span>
                                        </span><br>
                                        <div class="container">
                                            <div class="row mt-3 text-center">
                                                <div class="col-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end Net Profit VI januari --}}
                                    {{-- physical availability VI januari --}}
                                    <div class="my-3">
                                        <h6
                                            class="card-text bd-t"
                                            style="font-size: 15px; padding-top:10px"
                                        >Physical Availability</h6>
                                        <span class="">Persentasi : %</span>
                                        <div class="container">
                                            <div class="row mt-3 text-center">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div
                                                            class="progress-bar bg-dabger"
                                                            role="progressbar"
                                                            style="width: %"
                                                            aria-valuenow="42.72"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                        >
                                                            <span>%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end physical availability VI januari --}}
                                </div>
                            </div>
                        </div>
                        @foreach ($verevs as $item)
                            <div class="col-md mg-md-t-0">
                                <div
                                    class="card"
                                    id="card-slide"
                                >
                                    <div class="card-body">
                                        {{-- revenue VI Januari --}}
                                        <div class="my-3">
                                            <h3
                                                class="card-title tx-dark tx-medium mg-b-10 font-weight-bold text-center"
                                                style="font-size: 16px"
                                            >{{ $item->event }}
                                                @if ($loop->last)
                                                    <span class="badge bg-warning">Ongoing</span>
                                                @else
                                                    <span class="badge bg-success">Data Final</span>
                                                @endif
                                            </h3>
                                            <h6
                                                class="card-text bd-t"
                                                style="font-size: 15px; padding-top:10px"
                                            >Revenue</h6>
                                            <span>
                                                {{-- @if ($item->latest_updated_at)
                                                                Update: {{ \Carbon\Carbon::parse($item->latest_updated_at)->format("d/M/Y") }}
                                                            @else
                                                                No update information
                                                            @endif --}}

                                            </span>
                                            <br>
                                            <span class="card-text">Tercapai
                                                :{{ 'Rp.' . number_format($item->total_value) }}</span><br>
                                            @php
                                                $pendapatan = $item->total_value; //total perbulan
                                                $target = 3500000000; //target perbulan ve  4,000,000,000  ve  7,000,000,000
                                                $persentase = ceil(($pendapatan / $target) * 100);
                                            @endphp
                                            <span class="">Persentasi: {{ $persentase }}%</span>
                                            <div class="container">
                                                <div class="row mt-3 text-center">
                                                    <div class="col-12">
                                                        <div class="progress">
                                                            <div
                                                                class="progress-bar bg-{{ $persentase > 60 ? ($persentase > 80 ? 'success' : 'warning') : 'danger' }}"
                                                                role="progressbar"
                                                                style="width: {{ $persentase > 100 ? 100 : $persentase }}%"
                                                                aria-valuenow="42.72"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100"
                                                            >
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
                                            <h6
                                                class="card-text bd-t"
                                                style="font-size: 15px; padding-top:10px"
                                            >Net Profit</h6>
                                            <span class="card-text">
                                                <span class="">Profit/Loss :
                                                    {{ 'Rp.' . number_format($item->total_profit) }}</span><br>
                                                @php
                                                    $total_profit = $item->total_profit; //total perbulan
                                                    $total_revenue = $item->total_value; //target perbulan vi  4,000,000,000  ve  7,000,000,000
                                                    $persentase = ceil(($total_profit / $total_revenue) * 100);
                                                @endphp
                                                <span class="">Persentasi: {{ $persentase }}%</span>
                                            </span><br>
                                            <div class="container">
                                                <div class="row mt-3 text-center">
                                                    <div class="col-12">
                                                        @if ($persentase < 6)
                                                            <progress
                                                                class="w-100"
                                                                style="accent-color: red;"
                                                                value="{{ $persentase }}"
                                                                max="7"
                                                            ></progress>
                                                        @elseif ($persentase < 7)
                                                            <progress
                                                                class="w-100"
                                                                style="accent-color: yellow;"
                                                                value="{{ $persentase }}"
                                                                max="7"
                                                            ></progress>
                                                        @else
                                                            <progress
                                                                class="w-100"
                                                                style="accent-color: green;"
                                                                value="{{ $persentase }}"
                                                                max="7"
                                                            ></progress>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end Net Profit VI januari --}}
                                        {{-- physical availability VI januari --}}
                                        <div class="my-3">
                                            <h6
                                                class="card-text bd-t"
                                                style="font-size: 15px; padding-top:10px"
                                            >Physical Availability</h6>
                                            <span class="">Persentasi :
                                                {{ number_format($item->total_physical_availabilities / 100, 2) }}%</span>
                                            <div class="container">
                                                <div class="row mt-3 text-center">
                                                    <div class="col-12">
                                                        <div class="progress">
                                                            <div
                                                                class="progress-bar bg-{{ number_format($item->total_physical_availabilities / 100, 2) > 60 ? (number_format($item->total_physical_availabilities / 100, 2) > 80 ? 'success' : 'warning') : 'danger' }}"
                                                                role="progressbar"
                                                                style="width: {{ number_format($item->total_physical_availabilities / 100, 2) > 100 ? 100 : number_format($item->total_physical_availabilities / 100, 2) }}%"
                                                                aria-valuenow="42.72"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100"
                                                            >
                                                                <span>{{ number_format($item->total_physical_availabilities / 100, 2) }}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end physical availability VI januari --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- coba chart --}}
            <div class="row mt-5">
                <div class="rekap">
                    @foreach ($semesterSums as $item)
                        {{-- @dd($item) --}}
                        @php
                            $totalNilaiAkhir = 0;
                            $bobot = 40;
                            $target = 21000000000; //target per semester
                            $revenue = $item['total_value'];
                            $profit = $item['total_profit'];
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
                        <div class="card" id="card-rekap" data-aos="fade-right" data-aos-duration="1000">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="table-responsive">
                                            <h4 class="d-flex justify-content-center">KPI Corporate Semester
                                                {{ $item['semester'] }}</h4>
                                            <table
                                                class="table-sm table-striped mg-b-0 text-md-nowrap table table"
                                                style="width:100%"
                                            >
                                                <thead>
                                                    <tr>
                                                        <th style="font-size: 13px;">Item KPI</th>
                                                        <th style="font-size: 13px;">Bobot</th>
                                                        <th style="font-size: 13px;">Target</th>
                                                        <th style="font-size: 13px;">Pencapaian</th>
                                                        <th style="font-size: 13px;">Nilai</th>
                                                        <th style="font-size: 13px;">Hasil Akhir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="font-size: 13px;">Revenue Perusahaan</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ $bobot . '%' }}</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ 'Rp' . number_format($target) }}</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ 'Rp' . number_format($item['total_value']) }}</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ ceil($nilai) . '%' }}</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ ceil($nilai_akhir) . '%' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 13px;">Net Profit</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ $bobot . '%' }}</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ number_format($target_profit) . '%' }}</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ 'Rp' . number_format($item['total_profit']) }}</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ ceil($nilai_profit) . '%' }}</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >{{ ceil($nilai_akhir_profit) . '%' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 13px;">Physical Availability</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >30%</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >30%</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        ></td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        >N/A</td>
                                                        <td
                                                            class="text-center"
                                                            style="font-size: 13px;"
                                                        ></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5">Total</th>
                                                        <th class="text-center">{{ ceil($totalNilaiAkhir) . '%' }}</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div>
                                                <figure class="highcharts-figure">
                                                    <div id="corporate{{ $item['semester'] }}"></div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 mt-2">
                    <div class="card" id="card-rekap">
                        <div class="card-body">
                            <div id="tipe_pekerjaan"></div>
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

    <script
        type="text/javascript"
        src="//code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
        type="text/javascript"
        src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/fc-4.2.2/r-2.4.1/datatables.min.js"
    ></script>
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
    <script
        type="text/javascript"
        src="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"
    ></script>
    @foreach ($semesterSums as $item)
        @php
            $totalNilaiAkhir = 0;
            $bobot = 40;
            $target = 21000000000; //target per semester
            $revenue = $item['total_value'];
            $profit = $item['total_profit'];
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
                    height: '80%',
                    backgroundColor:'transparent'
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
                        radius: '70%',
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
            var records = <?php echo json_encode($records); ?>;
            const chart = new Highcharts.Chart({
                chart: {
                    backgroundColor: "rgba(0,0,0,0)",
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
                    categories: {!! json_encode($records->pluck('job_name')) !!}
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
                    text: 'Diagram Top 3 Tipe Pekerjaan (Revenue)',
                    align: 'center'
                },

                legend: {
                    enabled: false
                },
                plotOptions: {
                    column: {
                        depth: 25,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.2f}%',
                            outside: true
                        },
                        colorByPoint: true,
                        colors: ['#52575D', '#FDDB3A', '#F6F4E6'] // Ganti warna kolom sesuai kebutuhan Anda
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
        $('.slick-list').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true,
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
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>

    <script>
        $('.rekap').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        footer: true
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true
                    },
                    {
                        extend: 'csvHtml5',
                        footer: true
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true
                    }
                ],
                "ordering": false,
                fixedColumns: {
                    leftColumns: 1
                },
            });
        });
    </script>
@endsection
@endsection

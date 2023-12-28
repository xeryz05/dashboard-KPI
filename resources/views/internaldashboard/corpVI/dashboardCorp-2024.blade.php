@section('title')
    Dashboard VE
@endsection
@extends('layouts.app')
{{-- @extends('admin.dashboard') --}}
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css" />

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
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
                        <form method="GET" action="">
                            <div class="d-flex">
                                <div class="me-2">
                                    <label for="year" class="form-label">Tahun:</label>
                                </div>
                                <div class="me-2">
                                    <select name="year" class="form-select" id="year">
                                        <option value="">-- Semua Tahun --</option>
                                        @foreach (range(date('Y'), 2024, -1) as $year)
                                            <option value="{{ $year }}"
                                                {{ $selectedYear == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline-dark">Submit</button>
                                </div>
                            </div>
                        </form>
                        <span>
                            {{-- @foreach ($item as $i)
                                Last Update: {{ \Carbon\Carbon::parse($i->updated_at)->format('d M Y') }}
                            @break
                        @endforeach --}}
                    </span>
                </div>

                <div class="breadcrumb-header d-flex justify-content-center">
                    <h4 class="page-title">Verdanco Indonesia {{ $selectedYear }}</h4>
                </div>
                <div class="slick-list">
                    @foreach ($dataSUM as $item)
                        <div class="col-md mg-md-t-0">
                            <div class="card" id="card-slide">
                                <div class="card-body">
                                    <div class="my-3">
                                        <h3 class="card-title tx-dark tx-medium mg-b-10 font-weight-bold text-center"
                                            style="font-size: 16px">{{ $item->event['start'] }}
                                        </h3>
                                        <h6 class="card-text bd-t" style="font-size: 15px; padding-top:10px">Revenue
                                        </h6>
                                        <br>
                                        @php
                                            $pendapatan = $item->count; //total perbulan
                                            $target = 3500000000; //target perbulan ve  4,000,000,000  ve  7,000,000,000
                                            $persentase = ceil(($pendapatan / $target) * 100);
                                        @endphp
                                        {{-- @dd($persentase) --}}
                                        <span class="card-text">Tercapai :{{ number_format($item->count) }}</span><br>
                                        <span class="">Persentasi: {{ $persentase }}%</span>
                                        <div class="container">
                                            <div class="row mt-3 text-center">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-{{ $persentase > 60 ? ($persentase > 80 ? 'success' : 'warning') : 'danger' }}"
                                                            role="progressbar"
                                                            style="width: {{ $persentase > 100 ? 100 : $persentase }}%"
                                                            aria-valuenow="42.72" aria-valuemin="0" aria-valuemax="100">
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
                                        <h6 class="card-text bd-t" style="font-size: 15px; padding-top:10px">Net Profit
                                        </h6>
                                        <span class="card-text">
                                            <span class="">Profit/Loss
                                                :{{ 'Rp.' . number_format($item->total_aging) }}</span><br>

                                            @php
                                                $total_aging = $item->total_aging; //total perbulan
                                                $total_revenue = $item->count; //target perbulan vi  4,000,000,000  ve  7,000,000,000
                                                $persentase = ceil(($total_aging / $total_revenue) * 100);
                                            @endphp
                                            <span class="">Persentasi: {{ $persentase }}%</span>
                                        </span><br>
                                        <div class="container">
                                            <div class="row mt-3 text-center">
                                                <div class="col-12">
                                                    @if ($persentase < 6)
                                                        <progress class="w-100" style="accent-color: red;"
                                                            value="{{ $persentase }}" max="7"></progress>
                                                    @elseif ($persentase < 7)
                                                        <progress class="w-100" style="accent-color: yellow;"
                                                            value="{{ $persentase }}" max="7"></progress>
                                                    @else
                                                        <progress class="w-100" style="accent-color: green;"
                                                            value="{{ $persentase }}" max="7"></progress>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end Net Profit VI januari --}}
                                    {{-- Aging VI januari --}}
                                    <div class="my-3">
                                        <h6 class="card-text bd-t" style="font-size: 15px; padding-top:10px">Aging</h6>
                                        <span class="">Persentasi : %</span>
                                        <div class="container">
                                            <div class="row mt-3 text-center">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-dabger" role="progressbar"
                                                            style="width: %" aria-valuenow="42.72" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                            <span>%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end Aging VI januari --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="rekap" data-aos="fade-right" data-aos-duration="1000">
                    @foreach ($semesterSums as $item)
                        @php
                            $totalNilaiAkhir = 0;
                            $bobot = 40;
                            $target = 21000000000; //target per semester
                            $revenue = $item['total_value'];
                            $profit = $item['total_aging'];
                            $nilai = ($revenue / $target) * 100;
                            $nilai_akhir = ($nilai * $bobot) / 100;

                            $bobot_profit = 30;
                            $target_profit = 7;
                            $pencapaian_profit = $item['total_aging'];
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
                        <div class="card" id="card-rekap">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="table-responsive">
                                            <h4 class="d-flex justify-content-center">KPI Corporate
                                                Semester {{ $item['semester'] }}</h4>
                                            <table class="table-sm table-striped mg-b-0 text-md-nowrap table table"
                                                style="width:100%">
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
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ $bobot . '%' }}</td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ 'Rp' . number_format($target) }}</td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ 'Rp' . number_format($item['total_value']) }}</td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ ceil($nilai) . '%' }}</td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ ceil($nilai_akhir) . '%' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 13px;">Net Profit</td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ $bobot . '%' }}</td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ number_format($target_profit) . '%' }}</td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ 'Rp' . number_format($item['total_aging']) }}</td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ ceil($nilai_profit) . '%' }}</td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ ceil($nilai_akhir_profit) . '%' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 13px;">Aging</td>
                                                        <td class="text-center" style="font-size: 13px;">30%</td>
                                                        <td class="text-center" style="font-size: 13px;">30%</td>
                                                        <td class="text-center" style="font-size: 13px;"></td>
                                                        <td class="text-center" style="font-size: 13px;">N/A</td>
                                                        <td class="text-center" style="font-size: 13px;"></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5">Total</th>
                                                        <th class="text-center">{{ ceil($totalNilaiAkhir) . '%' }}
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div>
                                                <div id="corporate{{ $item['semester'] }}" style="height:300px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="card text-center">
                    <div class="card-title">
                        <h4 class="d-flex justify-content-center mt-3">Diagram top 3 Tipe Pekerjaan (Revenue)</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div id="top3" style="height:400px;"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <div id="top3-2" style="width: 300px;height:300px;"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <div id="top3-3" style="width: 300px;height:300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- coba chart --}}
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    @section('script')
        {{-- Echart --}}
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
        {{--  --}}
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"></script>
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

        @foreach ($semesterSums as $item)
            @php
                $totalNilaiAkhir = 0;
                $bobot = 40;
                $target = 21000000000; //target per semester
                $revenue = $item['total_value'];
                $profit = $item['total_aging'];
                $nilai = ($revenue / $target) * 100;
                $nilai_akhir = ($nilai * $bobot) / 100;

                $bobot_profit = 30;
                $target_profit = 7;
                $pencapaian_profit = $item['total_aging'];
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

            <script type="text/javascript">
                // Initialize the echarts instance based on the prepared dom
                var myChart = echarts.init(document.getElementById('corporate{{ $item['semester'] }}'));

                // Specify the configuration items and data for the chart
                option = {
                    title: {
                        text: 'Corporate',
                        left: 'center',
                        // rich: {}
                    },
                    series: [{
                        type: 'gauge',
                        startAngle: 180,
                        endAngle: 0,
                        center: ['50%', '75%'],
                        radius: '90%',
                        min: 0,
                        max: 100,
                        animation: false,
                        splitNumber: 8,
                        axisLine: {
                            lineStyle: {
                                width: 6,
                                color: [
                                    [0.60, '#FF6E76'],
                                    [0.75, '#FDDD60'],
                                    // [0.75, '#58D9F9'],
                                    [1, '#7CFFB2']
                                ]
                            }
                        },
                        pointer: {
                            icon: 'path://M12.8,0.7l12,40.1H0.7L12.8,0.7z',
                            length: '12%',
                            width: 20,
                            offsetCenter: [0, '-60%'],
                            itemStyle: {
                                color: 'auto'
                            }
                        },
                        axisTick: {
                            length: 12,
                            lineStyle: {
                                color: 'auto',
                                width: 2
                            }
                        },
                        splitLine: {
                            length: 20,
                            lineStyle: {
                                color: 'auto',
                                width: 5
                            }
                        },
                        axisLabel: {
                            color: '#464646',
                            fontSize: 20,
                            distance: -60,
                            rotate: 'tangential',
                            formatter: function(value) {
                                if (value === 0.875) {
                                    return 'Grade A';
                                } else if (value === 0.625) {
                                    return 'Grade B';
                                } else if (value === 0.375) {
                                    return 'Grade C';
                                } else if (value === 0.125) {
                                    return 'Grade D';
                                }
                                return '';
                            }
                        },
                        title: {
                            offsetCenter: [0, '-10%'],
                            fontSize: 20
                        },
                        detail: {
                            fontSize: 30,
                            offsetCenter: [0, '-35%'],
                            valueAnimation: true,
                            formatter: function(value) {
                                return Math.round(value * 1) + '';
                            },
                            color: 'inherit'
                        },
                        data: [{
                            value: [{{ ceil($totalNilaiAkhir) }}],
                            name: 'Grade Rating'
                        }]
                    }]
                };

                // Display the chart using the configuration items and data just specified.
                myChart.setOption(option);
            </script>
        @endforeach

        <script>
            var myChart = echarts.init(document.getElementById('top3'));
            var option;

            var pieData = [
                @foreach ($records as $item)
                    {
                        value: {{ $item->total_value }},
                        name: '{{ $item->job_name }}'
                    },
                @endforeach
            ];

            option = {
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                    top: 20,
                },
                series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: '50%',
                    data: pieData,
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            };

            option && myChart.setOption(option);
        </script>

        <script>
            var myChart = echarts.init(document.getElementById('top3-2'));
            var option;

            var xAxisData = []; // Array to store X-axis labels
            var seriesData = []; // Array to store series data

            @foreach ($records as $item)
                xAxisData.push('{{ $item->job_name }}');
                seriesData.push({{ $item->total_value }});
            @endforeach


            option = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    }
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: [{
                    type: 'category',
                    data: xAxisData,
                    axisTick: {
                        alignWithLabel: true
                    }
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                    name: 'Direct',
                    type: 'bar',
                    barWidth: '60%',
                    data: seriesData
                }]
            };

            option && myChart.setOption(option);
        </script>
        <script>
            var myChart = echarts.init(document.getElementById('top3-3'));
            var option;

            var yAxisData = []; // Array to store Y-axis labels
            var seriesData = []; // Array to store series data

            @foreach ($records as $item)
                yAxisData.push('{{ $item->job_name }}');
                seriesData.push({{ $item->total_value }});
            @endforeach

            option = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    }
                },
                legend: {},
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: false
                },
                xAxis: {
                    type: 'value',
                    boundaryGap: [0, 0.01]
                },
                yAxis: {
                    type: 'category',
                    data: yAxisData,
                    axisLabel: {
                        formatter: function(value, index) {
                            return formatLargeNumber(value);
                        }
                    }
                },
                series: [{
                    name: 'Total Value',
                    type: 'bar',
                    data: seriesData
                }]
            };

            option && myChart.setOption(option);

            function formatLargeNumber(value) {
                var suffixes = ["", "K", "M", "B", "T"];
                var order = Math.floor(Math.log10(value) / 3);
                var suffix = suffixes[order];
                var shortValue = value / Math.pow(10, order * 3);

                return shortValue.toFixed(2) + suffix;
            }
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

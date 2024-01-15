<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}

    {{-- @yield('style') --}}
    @include('layouts.style')
    <style>
        #tombolNya {
            z-index: 99; /* agar tak tersembunyi di balik element lain */
            font-size: 18px;
            color: gray;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            border: none;
            outline: none;
            background-color: yellow;
        }
        #tombolNya:hover {
            background-color: #f1e129;
        }
        canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        width: 30%;
        }
        div[id$="license"] {
            display: none !important;
        }

    </style>
</head>

<body class="main-body app sidebar-mini ltr" >
    <button onclick="halamanBerGerakKeAtas()" id="tombolNya" title="Kembali ke atas halaman"><i class="las la-angle-double-up"></i></i></button>

    <!-- Loader -->
    <div id="global-loader">
        <img class="loader-img" src="{{ asset('assets/img/gif/vg2.gif') }}" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page custom-index">
        <div>
            <!-- main-header -->
            @include('layouts.header')
            <!-- main-header -->
            
            <!-- main-sidebar -->
            @include('layouts.sidebar')
            <!-- main-sidebar -->
        </div>

        <!-- main-content -->
        <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- Row -->
            <div class="row">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto" >
                        @foreach ($groupViitems as $departmentId => $viitems)
                            @if ($loop->first)
                                @php $firstViitem = $viitems[0]; @endphp
                                <h4 class="page-title">KPI Corporate {{ $firstViitem->event['start'] }}</h4>
                            @endif
                        @endforeach
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">VI</a></li>
                            <li class="breadcrumb-item active" aria-current="page">KPI Departement</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="pe-1 mb-xl-0">
                            <form action="" method="GET" class="d-flex">
                                <select class="form-select" name="event_id">
                                    {{-- <option value="1">All Data</option> --}}
                                    @foreach ($events as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $filterEvent ? 'selected' : '' }}>{{ $item->start }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-secondary ml-2" id="apply_filter">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <!-- End Row -->
            <!-- Row -->
            <div class="card">
                <div class="row"> 
                    <div class="col-md-4">
                        <div class="card">
                            <div class="">
                                <div>
                                    @foreach ($deptsems as $item)
                                        <div id="summary{{ $item->id }}" style="height:300px;"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="font-weight: bold; font-size: 14px">Company</th>
                                        <th scope="col" style="font-weight: bold; font-size: 14px">Director</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Verdanco Indonesia</th>
                                        <td>Ardi Setiadharma</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table class="table table-condensed" style="border-collapse:collapse;">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th colspan="1" class="d-flex justify-content-center" style="font-weight: bold; font-size: 14px">Departement Rank</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr data-toggle="collapse" data-target="#rankDept" class="accordion-toggle">
                                                        <td><button class="btn btn-default btn-xs"><i class="fa fa-low-vision"></i></button></td>
                                                        <td style="font-weight: bold; font-size: 14px">Departement</td>
                                                        <td style="font-weight: bold; font-size: 14px">Persentase</td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td colspan="12" class="hiddenRow">
                                                            <div class="accordian-body collapse" id="rankDept">
                                                                <table class="table table-striped">
                                                                    <tbody>
                                                                        {{-- @foreach ($sumByDepartment->sortByDesc() as $departmentId => $totalPercentage) --}}
                                                                        @php
                                                                            $sortedDepartments = $sumByDepartment->toArray();
                                                                            arsort($sortedDepartments);
                                                                        @endphp

                                                                        @foreach ($sortedDepartments as $departmentId => $totalPercentage)
                                                                            <tr>
                                                                                <td>{{ $loop->iteration }}</td>
                                                                                <td><a href="#item{{ $groupViitems[$departmentId]->first()->departement['name'] }}">{{ $groupViitems[$departmentId]->first()->departement['name'] }}</a></td>
                                                                                <td>{{ number_format($totalPercentage, 2) . '%' }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    
                                                </tfoot>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @forelse ($veitems as  $departmentId => $items) --}}
            @forelse($groupViitems as $departmentId => $viitems)
            <div class="card" id="item{{ $groupViitems[$departmentId]->first()->departement['name'] }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <table>
                                <thead class="">
                                </thead>
                                <tbody>
                                    <div class="d-flex justify-content-center mt-3">
                                        <span class="fw-bolder fs-5">{{ $groupViitems[$departmentId]->first()->departement['name'] }}</span>
                                    </div>
                                    <div id="avg{{ $departmentId }}" style="height:300px;"></div>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        {{-- <th>Periode</th> --}}
                                        <th>KPI</th>
                                        <th>Achievement</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="items">
                                    @forelse ($viitems as $viitem)
                                        <tr>
                                            <th scope="row">
                                                <p class="d-inline-flex gap-1">
                                                    <a
                                                        class="btn"
                                                        id="arrow-down{{ $viitem->id }}"
                                                        data-bs-toggle="collapse"
                                                        onclick="rotateArrow('arrow-down{{ $viitem->id }}')"
                                                        href="#collapseExample{{ $viitem->id }}"
                                                        role="button"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExample"
                                                    ><i class="bi bi-capslock"></i></a>
                                                </p>
                                            </th>
                                            <th>
                                                <span
                                                    class="d-inline-block text-truncate"
                                                    style="max-width: 150px;"
                                                >
                                                    {{ $viitem->kpi }}
                                                </span>
                                            </th>
                                            <th>{{ number_format($viitem->percentage, 2) . '%' }}
                                            </th>
                                            <th class="text-center">
                                                @if ($viitem->percentage < 60)
                                                    <div
                                                        class="spinner-grow text-danger"
                                                        role="status"
                                                    >
                                                        <span class="sr-only"></span>
                                                    </div>
                                                @elseif ($viitem->percentage < 80)
                                                    <div
                                                        class="spinner-grow text-warning"
                                                        role="status"
                                                    >
                                                        <span class="sr-only"></span>
                                                    </div>
                                                @else
                                                    <div
                                                        class="spinner-grow text-success"
                                                        role="status"
                                                    >
                                                        <span class="sr-only"></span>
                                                    </div>
                                                @endif
                                            </th>
                                        </tr>

                                        <tr>
                                            <td colspan="4">
                                                <div
                                                    class="collapse"
                                                    id="collapseExample{{ $viitem->id }}"
                                                >
                                                    <div class="card card-body">
                                                        <div
                                                            class="position-relative start-50 translate-middle-x bottom-0"
                                                            id="chartContainerr{{ $viitem->id }}"
                                                            style="width: 400px;height:300px;"
                                                        ></div>
                                                        {{-- <div id="chartContainerr{{ $viitem->id }}"></div> --}}
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-responsive table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <td>{{ $viitem->kpi }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="col">Periode</th>
                                                                    <th scope="col">Weight</th>
                                                                    <th scope="col">Target</th>
                                                                    <th scope="col">Realization
                                                                    </th>
                                                                    <th scope="col">Nilai</th>
                                                                    <th scope="col">Nilai Akhir
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $viitem->event['start'] }}
                                                                        -
                                                                        {{ $viitem->event['end'] }}
                                                                    </td>
                                                                    <td>{{ $viitem->weight }}</td>
                                                                    <td>{{ number_format($viitem->target) }}
                                                                    </td>
                                                                    <td>{{ number_format($viitem->realization) }}
                                                                    </td>
                                                                    <td>{{ number_format($viitem->percentage, 2) . '%' }}
                                                                    </td>
                                                                    <td>{{ number_format($viitem->weight_percentage, 2) . '%' }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- panggil endforeach --}}
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @break --}}
            @empty
                <div>Data Not Found</div>
            @endforelse
        </div>
    </div>
        <!-- Container closed -->
    </div>
        <!-- /main-content -->

        <!-- Footer opened -->
        <div class="main-footer">
            <div class="container-fluid pd-t-0 ht-100p">
                <span> 2023 © Copyright Verdanco Group | Beta Version</span>
            </div>
        </div>
        <!-- Footer closed -->

    </div>
    <!-- End Page -->

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <!-- Add Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @foreach ($deptsems as $item)
        <script type="text/javascript">
        // Initialize the echarts instance based on the prepared dom
        var myChart = echarts.init(document.getElementById('summary{{ $item->id }}'));

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
                    value: {{ $item->value }},
                    name: 'Grade Rating'
                }]
            }]
        };

        // Display the chart using the configuration items and data just specified.
        myChart.setOption(option);
    </script>
    @endforeach
    

    <script>

        window.onscroll = function() {fungsiScrollnya()};
        // tombol akan muncul setelah scroll barnya di turunkan 20 pixel
        function fungsiScrollnya() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("tombolNya").style.display = "block";
            } else {
                document.getElementById("tombolNya").style.display = "none";
            }
        }

        function halamanBerGerakKeAtas() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0; // 0 untuk kembali kepaling atas halaman, ubah jikalau perlu
        }
    </script>
    
    @endsection
    
    @include('layouts.script')
    

    @forelse ($groupViitems as $departmentId => $viitems)
        @foreach ($viitems as $viitem)
        <script type="text/javascript">
                // Initialize the echarts instance based on the prepared dom
                var myChart = echarts.init(document.getElementById('avg{{ $departmentId }}'));
                // Specify the configuration items and data for the chart
                option = {
                    series: [{
                        type: 'gauge',
                        startAngle: 180,
                        endAngle: 0,
                        center: ['50%', '75%'],
                        radius: '90%',
                        min: 0,
                        animation: false,
                        max: 100,
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
                            // formatter: function(value) {
                            //     return Math.round(value * 1) + '';
                            // },
                            color: 'inherit'
                        },
                        data: [{
                            value: {{ number_format($sumByDepartment[$departmentId],2) }},
                            name: 'Grade',
                        }]
                    }]
                };

                // Display the chart using the configuration items and data just specified.
                myChart.setOption(option);
            </script>

        <script type="text/javascript">
                // Initialize the echarts instance based on the prepared dom
                var myChart = echarts.init(document.getElementById('chartContainerr{{ $viitem->id }}'));

                // Specify the configuration items and data for the chart
                option = {
                    animation: false,
                    dataset: [{
                            dimensions: ['name', 'score'],
                            source: [
                                ['Target', {{ $viitem->target }}],
                                ['Realization', {{ $viitem->realization }}]
                            ]
                        },
                        {
                            transform: {
                                type: 'sort',
                                config: {
                                    dimension: 'score',
                                    order: 'desc'
                                }
                            }
                        }
                    ],
                    xAxis: {
                        type: 'category',
                        axisLabel: {
                            interval: 0,
                            rotate: 30
                        }
                    },
                    yAxis: {},
                    series: {
                        type: 'bar',
                        encode: {
                            x: 'name',
                            y: 'score'
                        },
                        datasetIndex: 1,
                        label: {
                            show: true,
                            position: 'top' // Anda dapat menyesuaikan posisi label sesuai kebutuhan
                        },
                        color: [
                            '#f5f552',
                        ]
                    },
                    grid: {
                        left: '100px',
                        right: '15px'
                    },
                };

                // Display the chart using the configuration items and data just specified.
                myChart.setOption(option);
            </script>

        
        @endforeach
    @empty
    @endforelse


</body>

</html>
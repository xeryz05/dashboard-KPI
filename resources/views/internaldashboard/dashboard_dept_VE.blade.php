<!DOCTYPE html>
<html lang="en">

<head>
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    >

    <!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}

    {{-- @yield('style') --}}
    @include('layouts.style')
    @foreach ($groupVeitems as $departementId => $veitems)
        @foreach ($veitems as $veitem)
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

                #tombolNya {
                    z-index: 99;
                    /* agar tak tersembunyi di balik element lain */
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

                #arrow-down{{ $veitem->id }} {
                    transform: rotate(0deg);
                    transition: transform 0.5s ease-in-out;
                }
            </style>
        @endforeach
    @endforeach
</head>

<body class="main-body app sidebar-mini ltr">
    <button
        id="tombolNya"
        onclick="halamanBerGerakKeAtas()"
        title="Kembali ke atas halaman"
    ><i class="las la-angle-double-up"></i></i></button>

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
                        <div class="my-auto">
                            @foreach ($groupVeitems as $departmentId => $veitems)
                                @if ($loop->first)
                                    @php $firstVeitem = $veitems[0]; @endphp
                                    <h4 class="page-title">KPI Corporate {{ $firstVeitem->event['start'] }}</h4>
                                @endif
                            @endforeach
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">VE</a></li>
                                <li
                                    class="breadcrumb-item active"
                                    aria-current="page"
                                >KPI Departement</li>
                            </ol>
                        </div>
                        <div class="d-flex">
                            <div class="mb-xl-0 pe-1">
                                <form action="" method="GET" class="d-flex">
                                    <select class="form-select" name="event_id">
                                        {{-- <option value="1">All Data</option> --}}
                                        @foreach ($events as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $eventFilter ? 'selected' : '' }}>{{ $item->start }}</option>
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
                <div class="card">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                @foreach ($deptsems as $item)
                                    <div id="corporate{{ $item->id }}" style="height:300px;"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card">
                                <table class="table">
                                    <thead>
                                        <tr class="text-uppercase text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Director</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        {{-- panggil foreach --}}
                                        <tr>
                                            <th scope="row">
                                                <p class="d-inline-flex gap-1">
                                                    <a
                                                        class="btn"
                                                        id="arrow-down"
                                                        data-bs-toggle="collapse"
                                                        onclick="rotateArrow()"
                                                        href="#collapseExample"
                                                        role="button"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExample"
                                                    ><i class="bi bi-capslock"></i></a>
                                                </p>
                                            </th>
                                            <th>Verdanco Engineering</th>
                                            <th>Ardi Setiadharma</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td
                                                class="text-uppercase text-center"
                                                colspan="2"
                                            >
                                                <span class="ps-3">Department Rank</span>
                                            </td>
                                        </tr>
                                        {{-- panggil endforeach --}}
                                        <tr>
                                            <td colspan="4">
                                                <div
                                                    class="collapse"
                                                    id="collapseExample"
                                                >
                                                    {{-- <div class="card card-body">
                                                        <div
                                                            id="main"
                                                            style="width: 400px;height:300px;"
                                                        ></div>
                                                    </div> --}}
                                                    <div class="table-responsive">
                                                        <table class="table-sm table text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"></th>
                                                                    <th scope="col">Department</th>
                                                                    <th scope="col">Persentase</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($sumByDepartment as $departmentId => $totalPercentage)
                                                                    <tr>
                                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                                        <td>
                                                                            <a
                                                                                href="#scrollspyHeading{{ $groupVeitems[$departmentId]->first()->departement['name'] }}">{{ $groupVeitems[$departmentId]->first()->departement['name'] }}</a>
                                                                        </td>
                                                                        <td>{{ number_format($totalPercentage, 2) . '%' }}
                                                                            </th>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($groupVeitems as $departementId => $veitems)
                <div class="card" id="item{{ $groupVeitems[$departmentId]->first()->departement['name'] }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <table>
                                                    <thead class="">
                                                        <div class="d-flex justify-content-center">
                                                            <span class="fw-bolder fs-5">{{ $veitem->departement['name'] }}</span>
                                                        </div>
                                                    </thead>
                                                    <tbody>
                                                        <div class="card" id="scrollspyHeading{{ $groupVeitems[$departmentId]->first()->departement['name'] }}" style="border: 0">
                                                            <div id="main{{ $departementId }}" style="height:300px;"></div>
                                                        </div>
                                                    </tbody>
                                                    <tfoot></tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="table-responsive">
                                                <table class="table-hover table-sm table">
                                                    <thead>
                                                        <tr class="text-uppercase">
                                                            <th>&nbsp;</th>
                                                            <th style="font-weight: bold; font-size: 14px">KPI</th>
                                                            <th style="font-weight: bold; font-size: 14px">Achievement
                                                            </th>
                                                            <th style="font-weight: bold; font-size: 14px">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($veitems as $veitem)
                                                            <tr>
                                                                <th scope="row">
                                                                    <p class="d-inline-flex gap-1">
                                                                        <a
                                                                            class="btn"
                                                                            id="arrow-down{{ $veitem->id }}"
                                                                            data-bs-toggle="collapse"
                                                                            onclick="rotateArrow('arrow-down{{ $veitem->id }}')"
                                                                            href="#collapseExample{{ $veitem->id }}"
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
                                                                        {{ $veitem->kpi }}
                                                                    </span>
                                                                </th>
                                                                <th>{{ number_format($veitem->percentage, 2) . '%' }}
                                                                </th>
                                                                <th class="text-center">
                                                                    @if ($veitem->percentage < 60)
                                                                        <div
                                                                            class="spinner-grow text-danger"
                                                                            role="status"
                                                                        >
                                                                            <span class="sr-only"></span>
                                                                        </div>
                                                                    @elseif ($veitem->percentage < 80)
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
                                                                        id="collapseExample{{ $veitem->id }}"
                                                                    >
                                                                        <div class="card card-body">
                                                                            <div
                                                                                class="position-relative start-50 translate-middle-x bottom-0"
                                                                                id="bar{{ $veitem->id }}"
                                                                                style="width: 400px;height:300px;"
                                                                            ></div>
                                                                        </div>
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>{{ $veitem->kpi }}</td>
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
                                                                                        <td>{{ $veitem->event['start'] }}
                                                                                            -
                                                                                            {{ $veitem->event['end'] }}
                                                                                        </td>
                                                                                        <td>{{ $veitem->weight }}</td>
                                                                                        <td>{{ number_format($veitem->target) }}
                                                                                        </td>
                                                                                        <td>{{ number_format($veitem->realization) }}
                                                                                        </td>
                                                                                        <td>{{ number_format($veitem->percentage, 2) . '%' }}
                                                                                        </td>
                                                                                        <td>{{ number_format($veitem->weight_percentage, 2) . '%' }}
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
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <ul class="pagination">
                <li class="page-item"><a href="{{ route('deptVE').'
                    ?page=1' }}" class="page-link">1</a></li>
                <li class="page-item"><a href="{{ route('deptVE').'?page=2' }}" class="page-link">2</a></li>
                <li class="page-item"><a href="{{ route('deptVE').'?page=3' }}" class="page-link">3</a></li>
                <li class="page-item"><a href="{{ route('deptVE').'?page=4' }}" class="page-link">4</a></li>
                <li class="page-item">
                    <a href="{{ route('deptVE').'?page=5' }}" class="page-link">Last</a>
                </li>
            </ul> --}}
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

    @section('script')
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        {{-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> --}}
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
            function rotateArrow(id) {
                var arrow = document.getElementById(id);
                if (arrow.style.transform === "rotate(0deg)") {
                    arrow.style.transform = "rotate(180deg)";
                } else {
                    arrow.style.transform = "rotate(0deg)";
                }
            }
        </script>

        {{-- Echart --}}
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
        {{--  --}}
        <script
            type="text/javascript"
            src="//code.jquery.com/jquery-1.11.0.min.js"
        ></script>

        <script
            type="text/javascript"
            src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
        ></script>

        <!-- Add Bootstrap JS and jQuery -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- JavaScript -->

        <script>
            window.onscroll = function() {
                fungsiScrollnya()
            };
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
    {{-- grafik untuk kolom --}}
    {{-- @forelse ($veitemsByDepartment as $departmentId => $veitems) --}}
    @foreach ($deptsems as $item)
            <script type="text/javascript">
                // Initialize the echarts instance based on the prepared dom
                var myChart = echarts.init(document.getElementById('corporate{{ $item->id }}'));

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
    @forelse($groupVeitems as $departementId => $veitems)
        @foreach ($veitems as $veitem)
            <script type="text/javascript">
                // Initialize the echarts instance based on the prepared dom
                var myChart = echarts.init(document.getElementById('main{{ $departementId }}'));
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
                            value: {{ number_format($sumByDepartment[$departementId], 2) }},
                            name: 'Grade',
                        }]
                    }]
                };

                // Display the chart using the configuration items and data just specified.
                myChart.setOption(option);
            </script>
            <script type="text/javascript">
                // Initialize the echarts instance based on the prepared dom
                var myChart = echarts.init(document.getElementById('bar{{ $veitem->id }}'));

                // Specify the configuration items and data for the chart
                option = {
                    animation: false,
                    dataset: [{
                            dimensions: ['name', 'score'],
                            source: [
                                ['Target', {{ $veitem->target }}],
                                ['Realization', {{ $veitem->realization }}]
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

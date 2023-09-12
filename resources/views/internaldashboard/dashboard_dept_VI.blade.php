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
    {{-- <script>
        const periodFilter = document.getElementById('period_id');
        const applyFilterButton = document.getElementById('apply_filter');

        applyFilterButton.addEventListener('click', function() {
            const selectedPeriodId = periodFilter.value;
            // Redirect to a URL with the selected period filter
            window.location.href = '/deptVE?period_id=' + selectedPeriodId;
        });
    </script> --}}
</head>

<body class="main-body app sidebar-mini ltr" >
    <button onclick="halamanBerGerakKeAtas()" id="tombolNya" title="Kembali ke atas halaman"><i class="las la-angle-double-up"></i></i></button>

    <!-- Loader -->
    {{-- <div id="global-loader">
        <img class="loader-img" src="{{ asset('assets/img/logo/verdanco-title.png') }}" alt="Loader">
    </div> --}}
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
                        @foreach ($viitemsByDepartment as $departmentId => $viitems)
                            @if ($loop->first)
                                @php $firstViitem = $viitems[0]; @endphp
                                <h4 class="page-title">KPI Corporate {{ $firstViitem->period['month'] }} {{ $firstViitem->period['year'] }}</h4>
                            @endif
                        @endforeach
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">VI</a></li>
                            <li class="breadcrumb-item active" aria-current="page">KPI Departement</li>
                        </ol>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center">
                        <div class="pe-1 mb-xl-0">
                            <form action="" method="GET">
                                <select name="period_id" id="period_id">
                                    <option value="1">All Data</option>
                                    @foreach ($periods as $item)
                                        <option value="{{ $item->id }}">{{ $item->month }} {{ $item->year }}</option>
                                    @endforeach
                                </select>
                                <button id="apply_filter">Apply Filter</button>
                            </form>
                            {{-- <select id="periodFilter">
                                @foreach ($periods as $period)
                                    <option value="{{ $period->id }}">{{ $period->month }} {{ $period->year }}</option>
                                @endforeach
                            </select> --}}
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
                                    <div id="summary"></div>
                                    {{-- {{ $persentase }}% --}}
                                    @foreach ($viitemsByDepartment as $departmentId => $viitems)
                                        @if ($loop->first)
                                            @php $firstViitem = $viitems[0]; @endphp
                                            <h4 class="page-title d-flex justify-content-center">{{ $firstViitem->period['month'] }} {{ $firstViitem->period['year'] }}</h4>
                                        @endif
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
                                        <td>
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
                                                                                <td><a href="#item{{ $viitemsByDepartment[$departmentId]->first()->departement['name'] }}">{{ $viitemsByDepartment[$departmentId]->first()->departement['name'] }}</a></td>
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
            @forelse($viitemsByDepartment as $departmentId => $viitems)
            <div class="card" id="item{{ $viitemsByDepartment[$departmentId]->first()->departement['name'] }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="d-flex justify-content-center mt-2"><h4></h4></div>
                                {{-- ini untuk grafik summry --}}
                                <div id="avg{{ $departmentId }}"></div>
                                {{-- <canvas id='chart{{ $departmentId }}' style="width: 40%"></canvas> --}}
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        {{-- @foreach ($veitemsByDepartment as $departmentId => $veitems)
                                            @if ($loop->first)
                                                @php $firstVeitem = $veitems[0]; @endphp
                                                <h4 class="page-title d-flex justify-content-center">{{ $firstVeitem->period['month'] }} {{ $firstVeitem->period['year'] }}</h4>
                                            @endif
                                        @endforeach --}}
                                        {{-- untuk Nama User --}}
                                    </tr>
                                </tbody>    
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="filteredItems">
                                    <table class="table table-condensed" style="border-collapse:collapse;">
                                        {{-- ini table untuk isi table kpi ve --}}
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
                                            {{-- @dd($veitem) --}}
                                                <tr data-toggle="collapse" data-target="#demo{{ $viitem->id }}" class="accordion-toggle">
                                                    <td><button class="btn btn-default btn-xs"><i class="fa fa-low-vision"></i></button></td>
                                                    {{-- <td>{{ $viitem->period['month'] }} {{ $viitem->period['year'] }}</td> --}}
                                                    <td>{{ $viitem->kpi }}</td>
                                                    <td>{{ number_format($viitem->percentage, 2) }}%</td>
                                                    <td>
                                                        @if ( $viitem->percentage < 60 )
                                                            <div class="spinner-grow text-danger" role="status">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        @elseif ($viitem->percentage < 80 )
                                                            <div class="spinner-grow text-warning" role="status">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        @else
                                                            <div class="spinner-grow text-success" role="status">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse" id="demo{{ $viitem->id }}">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <td>{{ $viitem->kpi }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="6">
                                                                            <div id="chartContainerr{{ $viitem->id }}"></div>
                                                                            {{-- <div id="chart"></div> --}}
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Periode</td>
                                                                        <td>Weight</td>
                                                                        <td>Target</td>
                                                                        <td>Realization</td>
                                                                        <td>Nilai</td>
                                                                        <td>Nilai Akhir</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ $viitem->period['month'] }} {{ $viitem->period['year'] }}</td>
                                                                        <td>{{ $viitem->weight }}</td>
                                                                        <td>{{ number_format($viitem->target) }}</td>
                                                                        <td>{{ number_format($viitem->realization) }}</td>
                                                                        <td>{{ number_format($viitem->percentage, 2) .'%' }}</td>
                                                                        <td>{{ number_format($viitem->weight_percentage, 2) .'%' }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No user found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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

    <!-- Back-to-top -->
    {{-- <a id="back-to-top" href="#top"><i class="las la-angle-double-up"></i></a> --}}

    {{-- @yield('script') --}}

    @section('script')

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

    <!-- JavaScript -->
    {{-- <script>
        $(document).ready(function() {
        $('#periodFilter').change(function() {
            var filterPeriod = $(this).val();

            $.ajax({
                url: '{{ route('deptVE') }}',
                type: 'GET',
                data: { 'period_id': filterPeriod },
                success: function(response) {
                    console.log('Data fetched successfully:', response);
                    $('#items').html(response);
                },
                error: function(xhr, status, error) {
                        console.log('An error occurred:', error);
                    }
            });
        });
    });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
        $('#periodFilter').on('change',function() {
            var filterPeriod = $(this).val();

            $.ajax({
                url: "{{ route('deptVE') }}",
                type: 'GET',
                data: { 'period_id': filterPeriod },
                success: function(data) {
                    console.log('Data fetched successfully:', data);
                    var filterPeriod = data.filterPeriod;
                    var html '';
                    if(veitems.length > 0){
                        for(let i = 1;i<veitems.length;i++){
                            html += `

                            `;
                        }
                    }else{
                        html +='<tr><td colspan="11">No Data Found</td></tr>'
                    }
                    $("#items").html(html)
                },
            });
        });
    });
    </script> --}}
    <script>
            Highcharts.chart('summary', {

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
                    data: [15],
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
    <script>
        
    var config = {
        type: 'gauge',
        data: {
            datasets: [{
            data: [60,79,100],
            value: 15,
            // data: [60,79,100],
            backgroundColor: ['red', 'yellow', 'green'],
            }]
        },
        options:{
            responsive: true,
            title: {
                display: true,
                text: 'Corporate'
            },
        }
        };  

        window.onload = function() {
        var ctx = document.getElementById('chart').getContext('2d');
        window.myGauge = new Chart(ctx, config);
        };
    </script>

    @forelse ($viitemsByDepartment as $departmentId => $viitems)
        @foreach ($viitems as $viitem)
        <script>
            Highcharts.chart('avg{{ $departmentId }}', {

                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },

                title: {
                    text: '{{ $viitem->departement['name'] }}'
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
                    data: [{{ number_format($sumByDepartment[$departmentId],2) }}],
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
        {{-- <script>
            var config = {
            type: 'gauge',
            data: {
                datasets: [{
                data: [60,79,100],
                value: 15,
                backgroundColor: ['red', 'yellow', 'green'],
                }]
            },
            options:{
                responsive: true,
                title: {
                    display: true,
                    text: 'sss'
                },
            }
            };  

            window.onload = function() {
            var ctx = document.getElementById("chartt").getContext('2d');
            window.myGauge = new Chart(ctx, config);
            };
        </script> --}}

         {{-- @endforeach
    @empty
    @endforelse --}}

        <script>
            
            Highcharts.chart('chartContainerr{{ $viitem->id }}', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Target', 'Realization']
            },
            yAxis: {
                title: {
                text: 'Value'
                },
                labels: {
                formatter: function() {
                    return '' + Highcharts.numberFormat(Math.abs(this.value), 0);
                }
                }
            },
            plotOptions: {
                column: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                    return '' + Highcharts.numberFormat(Math.abs(this.y), 0);
                    }
                }
                }
            },credits: {
                enabled: false
            },
            series: [{
                name: 'Target',
                data: [{{ $viitem->target }}]
            }, {
                name: 'Realization',
                data: [{{ $viitem->realization }}]
            }]
            });

        </script>

        {{-- <script>
            let myConfig = {
            type: 'bar',
            title: {
                text: 'Data Basics',
                fontSize: 24,
            },
            legend: {
                draggable: true,
            },
            scaleX: {
                // Set scale label
                label: { text: 'Days' },
                // Convert text on scale indices
                labels: [ 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' ]
            },
            scaleY: {
                // Scale label with unicode character
                label: { text: 'Temperature (°F)' }
            },
            plot: {
                // Animation docs here:
                // https://www.zingchart.com/docs/tutorials/styling/animation#effect
                animation: {
                effect: 'ANIMATION_EXPAND_BOTTOM',
                method: 'ANIMATION_STRONG_EASE_OUT',
                sequence: 'ANIMATION_BY_NODE',
                speed: 275,
                }
            },
            series: [
                {
                // plot 1 values, linear data
                values: [{{ $viitem->realization }}],
                text: 'Realization',
                },
                {
                // plot 2 values, linear data
                values: [{{ $viitem->target }}],
                text: 'Target'
                },
            ]
            };
            // Render Method[3]
                zingchart.render({
                id: 'chartContainerr{{ $viitem->id }}',
                data: myConfig,
                });
        </script> --}}
        
        @endforeach
    @empty
    @endforelse


</body>

</html>
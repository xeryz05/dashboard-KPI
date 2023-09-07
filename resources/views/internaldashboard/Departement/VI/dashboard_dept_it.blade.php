@section('title')
    Dashboard VI
@endsection
@extends('layouts.app')
{{-- @extends('admin.dashboard') --}}
@section('style')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" /> --}}
    <style>

    </style>
@endsection
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- Row -->
            <div class="row">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <h4 class="page-title">KPI Departement</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">VI</a></li>
                            <li class="breadcrumb-item active" aria-current="page">KPI Departement</li>
                        </ol>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center">
                        <div class="pe-1 mb-xl-0">
                            <div class="btn-group">
                                <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" type="button" aria-expanded="false">
                                    Departement
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">PDCA</a></li>
                                    <li><a class="dropdown-item" href="#">Menu item</a></li>
                                    <li><a class="dropdown-item" href="#">Menu item</a></li>
                                </ul>
                            </div>
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
                                <div id="container"></div>
                                {{-- {{ $persentase }}% --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Company</th>
                                    <th scope="col">Director</th>
                                    <th scope="col">Departement</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Verdanco Indonesia</th>
                                    <td>Ardi Setiadharma</td>
                                    <td>
                                        <li><a href="">PDCA</a></li>
                                        <li>IT</li>
                                        <li>Legal</li>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            
            <!-- End Row -->
            <div class="card">
                <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="">
                            <div>
                                <div class="d-flex justify-content-center mt-2"><h4>{{ $name }}</h4></div>
                                <div id="it"></div>
                                <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th scope="row">Users</th>
                                        <td>Mark</td>
                                    </tr>
                                </tbody>
                                </table>
                                {{-- {{ $persentase }}% --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">KPI</th>
                                <th scope="col">Achievement</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                                <tr>
                                <th scope="row"><button class="btn btn-primary btn-rounded btn-block" data-bs-toggle="collapse"
                                        data-bs-target="#it_revenue" type="button" aria-expanded="false"
                                        aria-controls="it_revenue">
                                        Show
                                    </button>
                                </th>
                                <th>Revenue</th>
                                <td>
                                    {{ $persen1 }}
                                </td>
                                <td>
                                    @if ( $persen1 < 60 )
                                        <div class="spinner-grow text-danger" role="status">
                                            <span class="sr-only"></span>
                                        </div>
                                    @elseif ($persen1 < 80 )
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
                                <td colspan="5">
                                    <div class="collapse" id="it_revenue">
                                        <div class="card card-body">
                                            <div>
                                                <div id="it"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><button class="btn btn-primary btn-rounded btn-block" data-bs-toggle="collapse"
                                        data-bs-target="#it_po" type="button" aria-expanded="false"
                                        aria-controls="it_po">
                                        Show
                                    </button>
                                </th>
                                <th>Net Profit</th>
                                <td>
                                    {{ $persen2 }}
                                </td>
                                <td>
                                    @if ( $persen2 < 60 )
                                        <div class="spinner-grow text-danger" role="status">
                                            <span class="sr-only"></span>
                                        </div>
                                    @elseif ($persen2 < 80 )
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
                                <td colspan="5">
                                    <div class="collapse" id="it_po">
                                        <div class="card card-body">
                                            <div>
                                                <div id="it2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><button class="btn btn-primary btn-rounded btn-block" data-bs-toggle="collapse"
                                        data-bs-target="#it_aging" type="button" aria-expanded="false"
                                        aria-controls="it_aging">
                                        Show
                                    </button>
                                </th>
                                <th>Aging Pekerjaan</th>
                                <td>
                                    {{ $persen3 }}
                                </td>
                                <td>
                                    @if ( $persen3 < 60 )
                                        <div class="spinner-grow text-danger" role="status">
                                            <span class="sr-only"></span>
                                        </div>
                                    @elseif ($persen3 < 80 )
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
                                <td colspan="5">
                                    <div class="collapse" id="it_aging">
                                        <div class="card card-body">
                                            <div>
                                                <div id="it3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><button class="btn btn-primary btn-rounded btn-block" data-bs-toggle="collapse"
                                        data-bs-target="#it_flow" type="button" aria-expanded="false"
                                        aria-controls="it_flow">
                                        Show
                                    </button>
                                </th>
                                <th>Penerbitan Flow Proses / Pedoman / Instruksi Kerja / SOP /</th>
                                <td>
                                    {{ $persen4 }}
                                </td>
                                <td>
                                    @if ( $persen4 < 60 )
                                        <div class="spinner-grow text-danger" role="status">
                                            <span class="sr-only"></span>
                                        </div>
                                    @elseif ($persen4 < 80 )
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
                                <td colspan="5">
                                    <div class="collapse" id="it_flow">
                                        <div class="card card-body">
                                            <div>
                                                <div id="it4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            </div>
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@section('script')
    {{-- <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script> --}}
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

    <script>
        Highcharts.chart('container', {

            chart: {
                type: 'gauge',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                height: '80%'
            },

            title: {
                text: 'Summary'
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
                data: [{{ $avg }}],
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

            }]

        });

        // Add some life
    </script>
    <script>
        Highcharts.chart('container2', {

            chart: {
                type: 'gauge',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                height: '80%'
            },

            title: {
                text: ''
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
                data: [{{ $avg }}],
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

            }]

        });

    </script>
    <script>
        
        Highcharts.chart('pdca', {
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
                return 'Rp' + Highcharts.numberFormat(Math.abs(this.value), 0);
            }
            }
        },
        plotOptions: {
            column: {
            dataLabels: {
                enabled: true,
                formatter: function() {
                return 'Rp' + Highcharts.numberFormat(Math.abs(this.y), 0);
                }
            }
            }
        },
        series: [{
            name: 'Target',
            data: [{{ $target_satu }}]
        }, {
            name: 'Realization',
            data: [{{$satu}}]
        }]
        });

    </script>
    <script>
        
        Highcharts.chart('pdca2', {
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
                return 'Rp' + Highcharts.numberFormat(Math.abs(this.value), 0);
            }
            }
        },
        plotOptions: {
            column: {
            dataLabels: {
                enabled: true,
                formatter: function() {
                return 'Rp' + Highcharts.numberFormat(Math.abs(this.y), 0);
                }
            }
            }
        },
        series: [{
            name: 'Target',
            data: [{{ $target_dua }}]
        }, {
            name: 'Realization',
            data: [{{$dua}}]
        }]
        });

    </script>
    <script>
        
        Highcharts.chart('pdca3', {
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
                return 'Rp' + Highcharts.numberFormat(Math.abs(this.value), 0);
            }
            }
        },
        plotOptions: {
            column: {
            dataLabels: {
                enabled: true,
                formatter: function() {
                return 'Rp' + Highcharts.numberFormat(Math.abs(this.y), 0);
                }
            }
            }
        },
        series: [{
            name: 'Target',
            data: [{{ $target_tiga }}]
        }, {
            name: 'Realization',
            data: [{{$tiga}}]
        }]
        });

    </script>
    <script>
        
        Highcharts.chart('pdca4', {
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
                return 'Rp' + Highcharts.numberFormat(Math.abs(this.value), 0);
            }
            }
        },
        plotOptions: {
            column: {
            dataLabels: {
                enabled: true,
                formatter: function() {
                return 'Rp' + Highcharts.numberFormat(Math.abs(this.y), 0);
                }
            }
            }
        },
        series: [{
            name: 'Target',
            data: [{{ $target_empat }}]
        }, {
            name: 'Realization',
            data: [{{$empat}}]
        }]
        });

    </script>



    <script>
        Highcharts.chart('it', {

            chart: {
                type: 'gauge',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                height: '80%'
            },

            title: {
                text: ''
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
                data: [{{ $it_avg }}],
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

            }]

        });

    </script>
    
@endsection
@endsection

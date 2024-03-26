@section('title')
    Dashboard Corp VE
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

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
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
                        <form
                            method="GET"
                            action=""
                        >
                            <div class="d-flex">
                                <div class="me-2">
                                    <label
                                        class="form-label"
                                        for="year"
                                    >Tahun:</label>
                                </div>
                                <div class="me-2">
                                    <select
                                        class="form-select"
                                        id="year"
                                        name="year"
                                    >
                                        <option value="">-- Semua Tahun --</option>
                                        @foreach (range(date('Y'), 2023, -1) as $year)
                                            <option
                                                value="{{ $year }}"
                                                {{ $selectedYear == $year ? 'selected' : '' }}
                                            >
                                                {{ $year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button
                                        class="btn btn-outline-dark"
                                        type="submit"
                                    >Submit</button>
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
                        <h4 class="page-title">Verdanco Engineering {{ $selectedYear }}</h4>
                    </div>
                    <div class="slick-list">
                        @foreach ($dataSUM as $item)
                            {{-- @dd($item) --}}
                            @php
                                $pendapatan = $item->count; //total perbulan
                                if ($item->event_id < 14) {
                                    $target = 3500000000; //target perbulan ve  4,000,000,000  ve  7,000,000,000
                                } elseif ($item->event_id > 14) {
                                    $target = 5000000000;
                                }
                                $persentase = ceil(($pendapatan / $target) * 100);

                                $bobot_revenue = ceil(40);
                                $pencapaian_revenue = $item->count;
                                $nilai_revenue = ($pencapaian_revenue / $target) * 100;
                                if ($nilai_revenue < 0) {
                                    $nilai_revenue = 0;
                                } elseif ($nilai_revenue > 100) {
                                    $nilai_revenue = 100;
                                }

                                $nilai_akhir_revenue = ($nilai_revenue * $bobot_revenue) / 100;
                                if ($nilai_akhir_revenue < 0) {
                                    $nilai_akhir_revenue = 0;
                                }

                                //profit

                                $bobot_profits = 40;
                                $revenues = $pencapaian_revenue;
                                $nilai_profits = ($item->total_profit / $revenues) * 100;
                                if ($nilai_profits < 0) {
                                    $nilai_profits = 0;
                                }

                                $nilai_akhir_profits = ($nilai_profits / 100) * $bobot_profits;
                                if ($nilai_akhir_profits < 0) {
                                    $nilai_akhir_profits = 0;
                                }

                                //end profit

                                $PA_bobot = 30;
                                $PA_target = 85;
                                $PA_pencapaian = $item->total_physical_availabilities;
                                $PA_nilai = ($PA_pencapaian / $PA_target) * 100;
                                if ($PA_nilai < 0) {
                                    $PA_nilai = 0;
                                }

                                $nilai_akhir_PA = $PA_nilai * (30 / 100);

                                $event_id = $item->event_id;
                                if ($event_id == 1 || $event_id == 2) {
                                    $totalNilai_Akhir = 0;
                                } else {
                                    $totalNilai_Akhir = $nilai_akhir_revenue + $nilai_akhir_profits + $nilai_akhir_PA;
                                    if ($totalNilai_Akhir > 100) {
                                        $totalNilai_Akhir = 100;
                                    }
                                }
                            @endphp
                            <div
                                class="card"
                                style="width: auto;"
                            >
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center">
                                        <b class="fs-6">{{ $item->event['start'] }}</b>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="card-text"><i
                                                class="fa-solid fa-hand-holding-dollar fs-6 mx-2"></i><b>Revenue</b></h6>
                                        <span class="card-text">Tercapai :{{ number_format($item->count) }}</span><br>
                                        <span class="">Persentasi: {{ $persentase }}%</span>
                                        <div class="container">
                                            <div class="row mt-1 text-center">
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
                                    </li>
                                    <li class="list-group-item">
                                        @php
                                            $total_profit = $item->total_profit; //total perbulan
                                            $total_revenue = $item->count; //target perbulan vi  4,000,000,000  ve  7,000,000,000
                                            $persentase = ceil(($total_profit / $total_revenue) * 100);
                                        @endphp
                                        <h6 class="card-text"><i class="fas fa-chart-line fs-6 mx-2"></i><b>Net Profit</b>
                                        </h6>
                                        <span class="card-text">
                                            <span class="">Profit/Loss
                                                :{{ 'Rp.' . number_format($item->total_profit) }}</span><br>
                                            <span class="">Persentasi: {{ $persentase }}%</span>
                                        </span>
                                        <div class="container">
                                            <div class="row mt-1 text-center">
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
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="card-text"><i class="fa-solid fa-truck-monster fa-6 mx-2"></i><b>Physical
                                                Availability</b></h6>
                                        <span class="">Persentasi :
                                            {{ $item->total_physical_availabilities . '%' }}</span>
                                        <div class="container">
                                            <div class="row mt-1 text-center">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div
                                                            class="progress-bar bg-{{ $item->total_physical_availabilities > 60 ? ($item->total_physical_availabilities > 80 ? 'success' : 'warning') : 'danger' }}"
                                                            role="progressbar"
                                                            style="width: {{ $item->total_physical_availabilities > 100 ? 100 : $item->total_physical_availabilities }}%"
                                                            aria-valuenow="42.72"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                        >
                                                            <span>{{ $item->total_physical_availabilities }}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="card-text"><i
                                                class="fa-solid fa-truck-monster fa-6 mx-2"></i><b>Utilisasi Asset</b></h6>
                                        <span class="">Persentasi : {{ $item->total_utilisasi_assets . '%' }}</span>
                                        <div class="container">
                                            <div class="row mt-1 text-center">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div
                                                            class="progress-bar bg-{{ $item->total_utilisasi_assets > 60 ? ($item->total_utilisasi_assets > 80 ? 'success' : 'warning') : 'danger' }}"
                                                            role="progressbar"
                                                            style="width: {{ $item->total_utilisasi_assets > 100 ? 100 : $item->total_utilisasi_assets }}%"
                                                            aria-valuenow="42.72"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                        >
                                                            <span>{{ $item->total_utilisasi_assets }}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @if (!in_array($event_id, [1, 2]))
                                        <li class="list-group-item">
                                            <p class="d-inline-flex gap-1">
                                                <a
                                                    class="btn btn-outline-dark"
                                                    data-bs-toggle="collapse"
                                                    href="#collapseExample"
                                                    role="button"
                                                    aria-expanded="false"
                                                    aria-controls="collapseExample"
                                                >
                                                    <i class="fa-solid fa-file-invoice-dollar fa-bounce fa-6"></i> Hasil Akhir
                                                </a>
                                            </p>
                                            <div
                                                class="collapse"
                                                id="collapseExample"
                                            >
                                            <span class="">Persentasi : {{ round($totalNilai_Akhir) . '%' }}</span>
                                            <div class="container">
                                                <div class="row text-center">
                                                    <div class="col-12">
                                                        <div class="progress">
                                                            <div
                                                                class="progress-bar bg-{{ ceil($totalNilai_Akhir) > 60 ? (ceil($totalNilai_Akhir) > 80 ? 'success' : 'warning') : 'danger' }}"
                                                                role="progressbar"
                                                                style="width: {{ ceil($totalNilai_Akhir) > 100 ? 100 : ceil($totalNilai_Akhir) }}%"
                                                                aria-valuenow="42.72"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100"
                                                            >
                                                                <span>{{ round($totalNilai_Akhir) }}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            {{-- <h6
                                                class="card-text"
                                                style="font-size: 15px; padding-top:10px"
                                            ><i class="fa-solid fa-file-invoice-dollar fa-bounce fa-6 mx-2"></i><b>Hasil
                                                    Akhir</b></h6>
                                            <span class="">Persentasi : {{ round($totalNilai_Akhir) . '%' }}</span>
                                            <div class="container">
                                                <div class="row text-center">
                                                    <div class="col-12">
                                                        <div class="progress">
                                                            <div
                                                                class="progress-bar bg-{{ ceil($totalNilai_Akhir) > 60 ? (ceil($totalNilai_Akhir) > 80 ? 'success' : 'warning') : 'danger' }}"
                                                                role="progressbar"
                                                                style="width: {{ ceil($totalNilai_Akhir) > 100 ? 100 : ceil($totalNilai_Akhir) }}%"
                                                                aria-valuenow="42.72"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100"
                                                            >
                                                                <span>{{ round($totalNilai_Akhir) }}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </li>
                                    @endif
                                </ul>
                                {{-- @if (!in_array($event_id, [1, 2]))
                        <div class="card-footer">
                            <h6 class="card-text bd-t" style="font-size: 15px; padding-top:10px"><i class="fa-solid fa-file-invoice-dollar fa-bounce mx-2 fa-6"></i><b>Hasil Akhir</b></h6>
                            <span class="">Persentasi : {{ round($totalNilai_Akhir) .'%' }}</span>
                            <div class="container">
                                <div class="row text-center">
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-{{ ceil($totalNilai_Akhir) > 60 ? (ceil($totalNilai_Akhir) > 80 ? 'success' : 'warning') : 'danger' }}"
                                                role="progressbar"
                                                style="width: {{ ceil($totalNilai_Akhir) > 100 ? 100 : ceil($totalNilai_Akhir) }}%"
                                                aria-valuenow="42.72" aria-valuemin="0" aria-valuemax="100">
                                                <span>{{ round($totalNilai_Akhir) }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif --}}
                            </div>
                            {{-- <div class="col-md mg-md-t-0">
                            @php
                                            $pendapatan = $item->count; //total perbulan
                                            $target = 3500000000; //target perbulan ve  4,000,000,000  ve  7,000,000,000
                                            $persentase = ceil(($pendapatan / $target) * 100);

                                            $bobot_revenue = ceil(40);
                                            $pencapaian_revenue = $item->count;
                                            $nilai_revenue = ($pencapaian_revenue / $target) * 100;
                                            if ($nilai_revenue < 0) {
                                                $nilai_revenue = 0;
                                            }else if($nilai_revenue > 100) {
                                                $nilai_revenue = 100;
                                            }

                                            $nilai_akhir_revenue = ($nilai_revenue * $bobot_revenue) / 100;
                                            if ($nilai_akhir_revenue < 0) {
                                                $nilai_akhir_revenue = 0;
                                            }

                                            //profit

                                            $bobot_profits = 40;
                                            $revenues = $pencapaian_revenue;
                                            $nilai_profits = ($item->total_profit / $revenues) * 100;
                                            if ($nilai_profits < 0) {
                                                $nilai_profits = 0;
                                            }
                                            
                                            $nilai_akhir_profits = ($nilai_profits / 100 * $bobot_profits);
                                            if ($nilai_akhir_profits < 0) {
                                                $nilai_akhir_profits = 0;
                                            }

                                            //end profit

                                            $PA_bobot= 30;
                                            $PA_target = 85;
                                            $PA_pencapaian = $item->total_physical_availabilities;
                                            $PA_nilai = ($PA_pencapaian / $PA_target) * 100;
                                            if ($PA_nilai < 0) {
                                                $PA_nilai = 0;
                                            } 

                                            $nilai_akhir_PA = ($PA_nilai * (30 /100)); 
                                        
                                            $event_id = $item->event_id;
                                            if ($event_id == 1 || $event_id == 2) {
                                                $totalNilai_Akhir = 0;
                                            }else {
                                                $totalNilai_Akhir = $nilai_akhir_revenue + $nilai_akhir_profits + $nilai_akhir_PA;
                                                if ($totalNilai_Akhir > 100) {
                                                    $totalNilai_Akhir = 100;
                                                }
                                            }
                                        @endphp
                            <div class="card" id="card-slide">
                                <div class="card-body">
                                    <div class="my-3">
                                        <h3 class="card-title tx-dark tx-medium mg-b-10 font-weight-bold text-center"
                                            style="font-size: 16px">{{ $item->event['start'] }}
                                        </h3>
                                        <h6 class="card-text bd-t" style="font-size: 15px; padding-top:10px">Revenue</h6>
                                        <br>
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
                                    <div class="my-3">
                                        <h6 class="card-text bd-t" style="font-size: 15px; padding-top:10px">Net Profit
                                        </h6>
                                        <span class="card-text">
                                            <span class="">Profit/Loss
                                                :{{ 'Rp.' . number_format($item->total_profit) }}</span><br>

                                            @php
                                                $total_profit = $item->total_profit; //total perbulan
                                                $total_revenue = $item->count; //target perbulan vi  4,000,000,000  ve  7,000,000,000
                                                $persentase = ceil(($total_profit / $total_revenue) * 100);
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
                                    <div class="my-3">
                                        <h6 class="card-text bd-t" style="font-size: 15px; padding-top:10px">Utilisasi Aset</h6>
                                        <span class="card-text">
                                            <span class="">Persentasi: %</span>
                                        </span><br>
                                        <div class="container">
                                            <div class="row mt-3 text-center">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-{{ 20 > 60 ? (20 > 80 ? 'success' : 'warning') : 'danger' }}"
                                                            role="progressbar"
                                                            style="width: {{ 20 > 100 ? 100 : 20 }}%"
                                                            aria-valuenow="42.72" aria-valuemin="0" aria-valuemax="100">
                                                            <span>%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <h6 class="card-text bd-t" style="font-size: 15px; padding-top:10px">Physical
                                            Availability</h6>
                                        <span class="">Persentasi : {{ $item->total_physical_availabilities .'%' }}</span>
                                        <div class="container">
                                            <div class="row mt-3 text-center">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-{{ $item->total_physical_availabilities > 60 ? ($item->total_physical_availabilities > 80 ? 'success' : 'warning') : 'danger' }}"
                                                            role="progressbar"
                                                            style="width: {{ $item->total_physical_availabilities > 100 ? 100 : $item->total_physical_availabilities }}%"
                                                            aria-valuenow="42.72" aria-valuemin="0" aria-valuemax="100">
                                                            <span>{{ $item->total_physical_availabilities }}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (!in_array($event_id, [1, 2]))
                                    <div class="my-3">
                                        <h6 class="card-text bd-t" style="font-size: 15px; padding-top:10px">Hasil Akhir</h6>
                                        <span class="">Persentasi : {{ round($totalNilai_Akhir) .'%' }}</span>
                                        <div class="container">
                                            <div class="row mt-3 text-center">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-{{ ceil($totalNilai_Akhir) > 60 ? (ceil($totalNilai_Akhir) > 80 ? 'success' : 'warning') : 'danger' }}"
                                                            role="progressbar"
                                                            style="width: {{ ceil($totalNilai_Akhir) > 100 ? 100 : ceil($totalNilai_Akhir) }}%"
                                                            aria-valuenow="42.72" aria-valuemin="0" aria-valuemax="100">
                                                            <span>{{ round($totalNilai_Akhir) }}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div
                        class="rekap"
                        data-aos="fade-right"
                        data-aos-duration="1000"
                    >
                        @foreach ($semesterSums as $item)
                            @foreach ($item['event'] as $event)
                        {{-- @dd($item['total_value']) --}}
                            @php
                                $totalNilaiAkhir = 0;
                                $bobot = 40;
                                if ($event['event_id'] < 14) {
                                    $target = 21000000000; //target per semester    
                                }elseif ($event['event_id'] > 14) {
                                    $target = 30000000000; //target per semester
                                } 
                                
                                $revenue = $item['total_value'];
                                $profit = $item['total_profit'];
                                $nilai = ($revenue / $target) * 100;
                                $nilai_akhir = ($nilai * $bobot) / 100;

                                $bobot_profit = 40;
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

                                $bobot_PA = 30;
                                $target_PA = 85;
                                $pencapaian_PA = $item['total_physical_availabilities'];
                                $nilai_PA = ($pencapaian_PA / $target_PA) * 100;
                                if ($nilai_PA < 0) {
                                    $nilai_PA = 0;
                                }
                                $nilai_akhir_PA = ($nilai_PA * $bobot_PA) / 100;

                                if ($nilai_akhir_PA < 0) {
                                    $nilai_akhir_PA = 0;
                                }

                                $totalNilaiAkhir = $nilai_akhir + $nilai_akhir_profit + $nilai_akhir_PA;
                            @endphp
                            <div
                                class="card"
                                id="card-rekap"
                            >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="table-responsive">
                                                <h4 class="d-flex justify-content-center">KPI Corporate
                                                    Semester {{ $item['semester'] }}</h4>
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
                                                            >
                                                                {{ $bobot . '%' }}</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            >
                                                                {{ 'Rp' . number_format($target) }}</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            >
                                                                {{ 'Rp' . number_format($item['total_value']) }}</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            >
                                                                {{ ceil($nilai) . '%' }}</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            >
                                                                {{ ceil($nilai_akhir) . '%' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 13px;">Net Profit</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            >
                                                                {{ $bobot . '%' }}</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            >
                                                                {{ number_format($target_profit) . '%' }}</td>
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
                                                            >85%</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            >{{ $item['total_physical_availabilities'] }}</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            >{{ ceil($nilai_PA) . '%' }}</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            >{{ ceil($nilai_akhir_PA) . '%' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 13px;">utilisasi Aset</td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            ></td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            ></td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            ></td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            ></td>
                                                            <td
                                                                class="text-center"
                                                                style="font-size: 13px;"
                                                            ></td>
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
                                                    <div
                                                        id="corporate{{ $item['semester'] }}"
                                                        style="height:300px;"
                                                    >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
                                    <div
                                        id="top3"
                                        style="height:400px;"
                                    ></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-4">
                                        <div
                                            id="top3-2"
                                            style="width: 300px;height:300px;"
                                        ></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-4">
                                        <div
                                            id="top3-3"
                                            style="width: 300px;height:300px;"
                                        ></div>
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
        <script
            type="text/javascript"
            src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
        ></script>
        <script
            type="text/javascript"
            src="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"
        ></script>
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
                if ($event['event_id'] < 14) {
                    $target = 21000000000; //target per semester    
                }elseif ($event['event_id'] > 14) {
                    $target = 30000000000; //target per semester
                }
                // $target = 21000000000; //target per semester
                $revenue = $item['total_value'];
                $profit = $item['total_profit'];
                $nilai = ($revenue / $target) * 100;
                $nilai_akhir = ($nilai * $bobot) / 100;

                $bobot_profit = 40;
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

                $bobot_PA = 30;
                $target_PA = 85;
                $pencapaian_PA = $item['total_physical_availabilities'];
                $nilai_PA = ($pencapaian_PA / $target_PA) * 100;
                if ($nilai_PA < 0) {
                    $nilai_PA = 0;
                }
                $nilai_akhir_PA = ($nilai_PA * $bobot_PA) / 100;

                if ($nilai_akhir_PA < 0) {
                    $nilai_akhir_PA = 0;
                }

                $totalNilaiAkhir = $nilai_akhir + $nilai_akhir_profit + $nilai_akhir_PA;
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

@section('style')
    <style>
    .ui-datepicker-calendar {
    display: none;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <link href="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.css" rel="stylesheet"/>
@endsection
@extends('layouts.admin')
{{-- @extends('admin.dashboard') --}}
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <h4 class="page-title">KPI Item Management</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">VE</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table KPI Item Management</li>
                    </ol>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center">
                    <div class="pe-1 mb-xl-0">
                        {{-- <a href="{{ route('pdca.create') }}" class="btn btn-primary">Add KPI Item</a> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#ModalAdd">
                            <i
                            class="bi bi-plus"></i> Add KPI Item
                        </button>
                    </div>
                    <div class="pe-1 mb-xl-0">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Departement</label>
                            </div>
                            <select class="custom-select form-select" id="departement">
                                    <option value="">Select Departement</option>
                                    @foreach ($departement as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>        
                                    @endforeach
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Modal add item-->
            <div class="modal fade" id="ModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('veitem.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <select name="period_id" class="form-select" aria-label="Default select example">
                                        @foreach ($period as $item)
                                            <option value="{{ $item->id }}">{{ $item->month }} {{ $item->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select name="departement_id" class="form-select" aria-label="Default select example">
                                        @foreach ($departement as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="area" class="form-label">Area</label>
                                    <input type="text" name="area" class="form-control" id="area">
                                </div>
                                <div class="mb-3">
                                    <label for="kpi" class="form-label">KPI Name</label>
                                    <input type="text" name="kpi" class="form-control" id="kpi">
                                </div>
                                <div class="mb-3">
                                    <select name="calculation" class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="cummulative">Cummulative</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="target" class="form-label">Target</label>
                                    <input type="number" name="target" class="form-control" id="target">
                                </div>
                                <div class="mb-3">
                                    <label for="realization" class="form-label">Realization</label>
                                    <input type="number" name="realization" class="form-control" id="realization">
                                </div>
                                <div class="mb-3">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="number" name="weight" class="form-control" id="weight" max="100">
                                    <div id="weightHelp" class="form-text">isi dari 0 - 100</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="example" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Periode</th>
                                            <th>Departement</th>
                                            <th>Area</th>
                                            <th>KPI</th>
                                            <th>Calculation</th>
                                            <th>Target</th>
                                            <th>Weight</th>
                                            <th>Realization</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="items">
                                        @forelse ($veitems as $item)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                <td>{{ $item['id'] }}</td>
                                                <td>{{ $item->period['month']}} {{ $item->period['year']}}</td>
                                                <td>{{ $item->departement['name'] }}</td>
                                                <td>{{ $item->area }}</td>
                                                <td>{{ $item->kpi }}</td>
                                                <td>{{ $item->calculation }}</td>
                                                <td>{{ $item->target }}</td>
                                                <td>{{ $item->weight }}</td>
                                                <td>{{ $item->realization }}</td>
                                                <td>{{ $item->created_by }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('veitem.destroy',$item->id) }}" method="POST">
                                                        <a href="{{ route('veitem.edit', $item->id) }}"
                                                            class="btn btn-sm btn-primary"><span
                                                                class="fe fe-edit"></span>
                                                        </a>
                                                        <a href="{{ route('veitem.show', $item->id) }}"
                                                            class="btn btn-sm btn-info"><span
                                                                class="fe fe-more-vertical"></span></a>

                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"><span
                                                                class="fe fe-trash-2"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.js"></script>
{{-- <script>
    $(document).ready(function(){
        $("#departement").on('change',function(){
            var veitems = $(this).val();
            $.ajax({
                url:"{{ route('veitem.index') }}",
                type:"GET",
                data:{'departement':veitems},
                success:function(data){
                    console.log('Data fetched successfully:', data);
                    var veitems = data.veitems;
                    var html = '';
                    if(veitems.length > 0){
                        // console.log(veitems[2])
                        for(let i = 1;i<veitems.length;i++){
                            html += `
                                <tr>
                                    <td>${i}</td>
                                    <td>${veitems[i]['period'] ? (veitems[i]['period']['month'] + ' ' + veitems[i]['period']['year']) : ''}</td>
                                    <td>${veitems[i]['departement'] ? (veitems[i]['departement']['name']):''}</td>
                                    <td>${veitems[i]['area'] || ''}</td>
                                    <td>${veitems[i]['kpi'] || ''}</td>
                                    <td>${veitems[i]['calculation'] || ''}</td>
                                    <td>${veitems[i]['target'] || ''}</td>
                                    <td>${veitems[i]['weight'] || ''}</td>
                                    <td>${veitems[i]['realization'] || ''}</td>
                                    <td>${veitems[i]['created_by'] || ''}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('veitem.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('veitem.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                                <span class="fe fe-edit"></span>
                                            </a>
                                            <a href="{{ route('veitem.show', $item->id) }}" class="btn btn-sm btn-info">
                                                <span class="fe fe-more-vertical"></span>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><span class="fe fe-trash-2"></span></button>
                                        </form>
                                    </td>
                                </tr>`;
                        }
                    }else{
                        html +='<tr><td colspan="11">No Data Found</td></tr>'
                    }
                    $("#items").html(html);
                }
            })
        })
    })
</script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('filterSelect').addEventListener('change', function() {
        
        var selectedFilter = this.value;
        // Lakukan permintaan Ajax untuk mengambil hasil filter
        axios.get('{{ route('veitem.filter') }}', {
            params: {
                filter: selectedFilter
            }
        }).then(function(response) {
            var veitems = response.data.veitems;
            var resultTableBody = document.querySelector('#resultTable tbody');
            
            // Hapus baris hasil sebelumnya
            resultTableBody.innerHTML = '';
            
            // Tampilkan hasil filter dalam tabel
            veitems.forEach(function(item, index) {
                var row = document.createElement('tr');
                
                var indexCell = document.createElement('td');
                indexCell.textContent = index + 1;
                row.appendChild(indexCell);

                var periodCell = document.createElement('td');
                periodCell.textContent = item.period.month + ' ' + item.period.year // Ganti 'nama' dengan atribut yang sesuai
                row.appendChild(periodCell);

                var departementCell = document.createElement('td');
                departementCell.textContent = item.departement.name // Ganti 'nama' dengan atribut yang sesuai
                row.appendChild(departementCell);

                var areaCell = document.createElement('td');
                areaCell.textContent = item.area;
                row.appendChild(areaCell);
                
                // Tambahkan kolom lainnya sesuai kebutuhan
                
                resultTableBody.appendChild(row);
            });
        });
    });
</script> --}}
    <script>
let table = new DataTable('#example');
    </script>
@endsection

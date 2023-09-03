@extends ('layouts.layout')

@section('content')
    <div class="card m-5">
        <div class="card-header shadow-sm">
            <h3 class="card-title fw-bold fs-2">Daftar Investigasi Laporan Insiden</h3>
            <div class="card-toolbar">
                <div id="kt_docs_search_handler_basic" class="mt-3" data-kt-search-keypress="true"
                    data-kt-search-min-length="2" data-kt-search-enter="true" data-kt-search-layout="inline">
                    <form data-kt-search-element="form" class="w-100 position-relative shadow-sm rounded"
                        autocomplete="off">
                        <input type="hidden" />
                        <i
                            class="ki-duotone ki-magnifier fs-3 fs-lg-2 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span
                                class="path1"></span><span class="path2"></span></i>
                        <input type="text" class="form-control form-control-solid px-15 bg-white" name="search"
                            value="" placeholder="Search " data-kt-search-element="input" />
                        <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                            data-kt-search-element="spinner">
                            <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                        </span>
                        <span
                            class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                            data-kt-search-element="clear">
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (auth()->user()->hak_akses == 'Admin' ||
                        auth()->user()->hak_akses == 'P2K3' ||
                        auth()->user()->hak_akses == 'K3 Departemen')
                    <table class="table table-rounded table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Kategori</th>
                                {{-- <th scope="col">Nama Pelapor</th> --}}
                                <th scope="col">Lokasi Kejadian</th>
                                {{-- <th scope="col">Tenggat Waktu</th> --}}
                                <th scope="col">Penanggung Jawab</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($investigasis as $investigasi)
                                <tr>
                                    <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $investigasi->kategori }}</td>
                                    {{-- <td>{{ $investigasi->laporinsiden->nama_pelapor }}</td> --}}
                                    <td>
                                        {{ $investigasi->departemen->name }}
                                    </td>
                                    {{-- <td>{{ $investigasi->tenggat_waktu ? $investigasi->tenggat_waktu->translatedFormat('d F Y') : '' }}</td> --}}
                                    <td>{{ $investigasi->p2k3->nama }}</td>

                                    <td>
                                        <a href="{{ route('daftarinvestigasi.lihat', $investigasi->id) }}" type="button"
                                            class="btn btn-sm btn-warning px-4"><i class="bi bi-eye text-dark pe-0"></i></a>
                                        <a href="{{ route('daftarinvestigasi.ubah', $investigasi->id) }}" type="button"
                                            class="btn btn-sm btn-primary px-4"><i class="bi bi-pencil-square pe-0"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm px-4" data-bs-toggle="modal"
                                            data-bs-target="#deleteForm{{ $investigasi->id }}"><i
                                                class="bi bi-trash pe-0"></i></button>

                                        <div class="modal fade" id="deleteForm{{ $investigasi->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content">

                                                    <form method="POST"
                                                        action="{{ route('daftarinvestigasi.delete', $investigasi->id) }}">
                                                        @csrf
                                                        <div
                                                            class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                            <h2 class="mt-5 text-center"
                                                                style="color: #16243D; font-size: 20px font-weight:700">
                                                                Yakin
                                                                data
                                                                ingin dihapus?
                                                            </h2>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center border-0">
                                                            <button type="submit"
                                                                class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                                style="width:76px; height:31px; background: #29CC6A;">Ya</button>
                                                            <button type="button"
                                                                class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                                data-bs-dismiss="modal"
                                                                style="width:76px; height:31px; ">Tidak</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if (auth()->user()->hak_akses == 'Pimpinan')
                    <table class="table table-rounded table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col"class="3">Kategori</th>
                                {{-- <th scope="col">Nama Pelapor</th> --}}
                                <th scope="col"class="3">Lokasi Kejadian</th>
                                {{-- <th scope="col">Tenggat Waktu</th> --}}
                                <th scope="col"class="4">Penanggung Jawab</th>
                                <th scope="col" class="">Status Investigasi</th>
                                <th scope="col" class="2">Ubah Status investigasi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($investigasis as $investigasi)
                                <tr>
                                    <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $investigasi->kategori }}</td>
                                    {{-- <td>{{ $investigasi->laporinsiden->nama_pelapor }}</td> --}}
                                    <td>
                                        {{ $investigasi->departemen->name }}
                                    </td>
                                    {{-- <td>{{ $investigasi->tenggat_waktu ? $investigasi->tenggat_waktu->translatedFormat('d F Y') : '' }}</td> --}}
                                    <td>{{ $investigasi->p2k3->nama }}</td>
                                    <td align="center" class="mx-15">                                  
                                                                                    
                                            @if ($investigasi->status == '1')
                                                <a href=""
                                                    class="text-center fw-bold  text-danger border border-2 rounded-2 border-danger px-5 py-1"
                                                    style=" cursor: default !important;">
                                                    Pending</a>

                                            @elseif ($investigasi->status == '2')
                                                <a class="text-center fw-bold  text-warning border border-2 rounded-2 border-warning py-2 px-4"
                                                        style=" cursor: default !important;">
                                                        Ditindaklanjuti</a>
                                                
                                            @elseif ($investigasi->status == '3')
                                                <a class="text-center fw-bold  text-success border border-2 rounded-2 border-success px-5 py-1"
                                                    style=" cursor: default !important;">
                                                    Tuntas </a>
                                            @endif
                                        

                                        {{-- <a href="" class="text-center fw-bold  text-warning  px-4">
                                            Pending
                                        </a> --}}
                                    </td>

                                    <td class="d-flex
                                            justify-content-center">
                                        <a id="update" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editmodal"
                                            data-bs-p2k3_id="{{ $investigasi->p2k3_id }}"
                                            data-bs-status="{{ $investigasi->status }}"
                                            >Ubah Status Investigasi
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ route('daftarinvestigasi.lihat', $investigasi->id) }}" type="button"
                                            class="btn btn-sm btn-warning px-4"><i
                                                class="bi bi-eye text-dark pe-0"></i></a>
                                        {{-- <a href="{{ route('daftarinvestigasi.ubah', $investigasi->id) }}" type="button"
                                            class="btn btn-sm btn-primary px-4"><i class="bi bi-pencil-square pe-0"></i></a> --}}
                                        <button type="button" class="btn btn-danger btn-sm px-4" data-bs-toggle="modal"
                                            data-bs-target="#deleteForm{{ $investigasi->id }}"><i
                                                class="bi bi-trash pe-0"></i></button>

                                        <div class="modal fade" id="deleteForm{{ $investigasi->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content">
                                                    
                                                        <div
                                                            class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                            <h2 class="mt-5 text-center"
                                                                style="color: #16243D; font-size: 20px font-weight:700">
                                                                Yakin
                                                                data
                                                                ingin dihapus?
                                                            </h2>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center border-0">
                                                            <button type="submit"
                                                                class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                                style="width:76px; height:31px; background: #29CC6A;">Ya</button>
                                                            <button type="button"
                                                                class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                                data-bs-dismiss="modal"
                                                                style="width:76px; height:31px; ">Tidak</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <div class="modal fade" id="editmodal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <form action="{{ route("daftarinvestigasi.edit", $investigasi->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="staticBackdropLabel">Ubah Data Investigasi
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" id="update"></button>
                                                </div>
    
                                                <div class="modal-body mt-5 ">
                                                    <div id="additionalForm">
                                                        <div class="ps-3 pe-5 pb-5">
                                                            <label class="col-form-label ps-2">P2K3</label>
                                                            <div class=" w-100">
                                                                <select id="p2k3_id" name="p2k3_id" class="form-select fs-6 w-100"
                                                                    data-control="select2" data-hide-search="true"
                                                                    data-placeholder="p2k3_id">
                                                                    @foreach ($p2k3s as $p2k3)
                                                                        <option value="{{ $p2k3->id }}">
                                                                           {{  $p2k3->nama }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
    
                                                        <div id="additionalForm">
                                                            <div class="ps-3 pe-5">
                                                                <label class="col-form-label ps-2">Status Investigasi </label>
                                                                <div class=" w-100">
                                                                    <select name="status" id="status" class="form-select fs-6 w-100"
                                                                        data-control="select2" data-hide-search="true"
                                                                        data-placeholder="status">
                                                                        <option value="2" >Investigasi
                                                                        </option>
                                                                        <option value="3" >Sukses
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center border-0 mt-5">
                                                        <button type="submit"
                                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                            style="background: #29CC6A;height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                                                            Data</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        {{-- <div class="card-footer">
            {{ $investigasis->links('pagination::customb5') }}
        </div> --}}
    </div>
@stop

@section('customscript')
    <script>
        $(document).on("click", "#update", function () {
        var p2k3_id = $(this).attr('data-bs-p2k3_id');
        var status = $(this).attr('data-bs-status');
        $("#p2k3_id").val( p2k3_id ).setAttribute('selected','selected');
        $("#status").val( status ).setAttribute('selected','selected');
     
});
    </script>
@stop

@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Edit Data Lapor Insiden</h2>
                    <a href="{{ route('laporan-insiden.index') }}" type="button"
                        class="btn text-white btn-secondary btn-sm d-flex justify-content-center align-items-center mb-2"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #505050; width:90px"><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">
                                {{-- <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari edit data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('laporan-insiden.index') }}" type="button"
                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                        style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                    <button type="button"
                                        class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                        data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-title  gap-1 mx-5 my-5  ">
                    <div id="kt_app_content"
                        class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">

                        <div class="card bg-light">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong style="color: #16243D; font-family: Roboto Flex; font-size:16px;">Data
                                        Kejadian</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="lh-lg" method="POST" action="{{ route('laporan-insiden.update', $lap->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method ('PUT')
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Status</label>
                                        <div class="w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <select name="status" class="form-select fs-6  w-100"
                                                    data-control="select2" data-hide-search="true" data-placeholder="Status"
                                                    id="status">
                                                    <option value="1" {{ $lap->status == 1 ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="2" {{ $lap->status == 2 ? 'selected' : '' }}>
                                                        Investigasi
                                                    </option>
                                                    <option value="3" {{ $lap->status == 3 ? 'selected' : '' }}>Sukses
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">P2K3</label>
                                        <div class=" w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <select name="p2k3_id" class="form-select fs-6 w-100" data-control="select2"
                                                    data-hide-search="true" data-placeholder="P2K3" required>
                                                    @foreach ($p2k3s as $p2k3)
                                                        <option value="{{ $p2k3->id }}"
                                                            {{ $lap->p2k3_id == $p2k3->id ? 'selected' : '' }}>
                                                            {{ $p2k3->nama != '' ? $p2k3->nama : 'Pilih P2K3' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label ">Kode Lapor Insiden</label>
                                        <div class=" w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control bg-secondary" name="kode_laporinsiden"
                                                    id="kode_laporinsiden" value="{{ $lap->kode_laporinsiden }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Waktu Kejadian</label>
                                        <div class=" w-100">
                                            <input type="date" id="date" name="waktu_kejadian"
                                                class="form-control tanggalPicker" value="{{ $lap->waktu_kejadian }}"
                                                placeholder="dd/mm/yyyy" max="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Lokasi</label>
                                        <div class=" w-100">
                                            <select name="departemen_id" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Lokasi">
                                                @foreach ($departments as $dep)
                                                    <option value="{{ $dep->id }}"
                                                        {{ $lap->departemen_id == $dep->id ? 'selected' : '' }}>
                                                        {{ $dep->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Lokasi Rinci</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="lokasi_rinci"
                                                id="lokasi_rinci" value="{{ $lap->lokasi_rinci }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Jenis Insiden</label>
                                        <div class=" w-100">
                                            <select name="jenis_insiden" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Jenis Insiden">
                                                <option value="Pingsan"
                                                    {{ $lap->jenis_insiden == 'Pingsan' ? 'selected' : '' }}>Pingsan
                                                </option>
                                                <option value="Serangan Jantung"
                                                    {{ $lap->jenis_insiden == 'Serangan Jantung' ? 'selected' : '' }}>
                                                    Serangan Jantung</option>
                                                <option value="Asma"
                                                    {{ $lap->jenis_insiden == 'Asma' ? 'selected' : '' }}>Asma</option>
                                                <option value="Pendarahan"
                                                    {{ $lap->jenis_insiden == 'Pendarahan' ? 'selected' : '' }}>Pendarahan
                                                </option>
                                                <option value="Keracunan"
                                                    {{ $lap->jenis_insiden == 'Keracunan' ? 'selected' : '' }}>Keracunan
                                                </option>
                                                <option value="Cidera"
                                                    {{ $lap->jenis_insiden == 'Cidera' ? 'selected' : '' }}>Cidera</option>
                                                <option value="Lainnya"
                                                    {{ $lap->jenis_insiden == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kronologi Kejadian</label>
                                        <div class=" w-100">
                                            <textarea rows="3" class="form-control" name="kronologi" id="kronologi">{{ $lap->kronologi }}</textarea>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Penyebab Insiden</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="penyebab_insiden"
                                                id="penyebab_insiden" value="{{ $lap->penyebab_insiden }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Foto Kejadian</label>
                                        <div class=" w-100">
                                            <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                                href="{{ asset('storage/laporan_insiden/gambarkejadian/' . $lap->gambar) }}">
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                    style="background-image:url('{{ asset('storage/laporan_insiden/gambarkejadian/' . $lap->gambar) }}')">
                                                </div>
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                </div>
                                            </a>
                                            <input type="hidden" class="form-control" name="gambar_old"
                                                value="{{ $lap->gambar }}">
                                            <input type="file" class="form-control mt-3" name="gambar"
                                                id="gambar" accept="image/png, image/jpeg">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <!-- {{-- Data Pelapor --}} -->
                    <div class="animated fadeIn">

                        <div class="card">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong style="color: #16243D; font-family: Roboto Flex; font-size:16px;">Data
                                        Pelapor</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Nama Pelapor</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="nama_pelapor"
                                            value="{{ $lap->nama_pelapor }}">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputEmail3" class="col-form-label">Email Pelapor</label>
                                    <div class=" w-100">
                                        <input type="email" class="form-control" name="email_pelapor"
                                            value="{{ $lap->email_pelapor }}">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputNomertelepon3" class="col-form-label">No. Telp
                                        Pelapor</label>
                                    <div class=" w-100">
                                        <input type="number" class="form-control" name="nomer_telepon_pelapor"
                                            value="{{ $lap->nomer_telepon_pelapor }}">
                                    </div>
                                </div>

                                {{-- <div class="ps-3 pe-5">
                                    <label for="inputUnit" class="col-form-label">Unit</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="unit_pelapor"
                                            value="{{ $lap->unit_pelapor }}">
                                    </div>
                                </div> --}}
                                <div class="ps-3 pe-5">
                                    <label for="inputfotokejadian" class="col-form-label">Foto Tanda
                                        Pengenal</label>
                                    <div class=" w-100">
                                        <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                            href="{{ asset('storage/laporan_insiden/tanda_pengenal/' . $lap->tanda_pengenal) }}">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                style="background-image:url('{{ asset('storage/laporan_insiden/tanda_pengenal/' . $lap->tanda_pengenal) }}')">
                                            </div>
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                                            </div>
                                        </a>
                                        <input type="hidden" class="form-control" name="tanda_pengenal_old"
                                            value="{{ $lap->tanda_pengenal }}">
                                        <input type="file" class="form-control mt-3" name="tanda_pengenal"
                                            accept="image/png, image/jpeg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="animated fadeIn mt-10 mb-10">
                        <div class="card">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong style="color: #16243D; font-family: Roboto Flex; font-size:16px;">Data Korban
                                        <span style="color:#fc0000">(Apabila tidak mengetahui data korban dapat
                                            dikosongkan)
                                        </span></strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Nama Korban</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="nama_korban"
                                            value="{{ $lap->nama_korban }}">

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputEmail3" class="col-form-label">Email Korban</label>
                                    <div class=" w-100">
                                        <input type="email" class="form-control" name="email_korban"
                                            value="{{ $lap->email_korban }}">

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputNomertelepon3" class="col-form-label">No. Telp
                                        Korban</label>
                                    <div class=" w-100">
                                        <input type="number" class="form-control" name="nomer_telepon_korban"
                                            value="{{ $lap->nomer_telepon_korban }}">
                                    </div>
                                </div>

                                {{-- <div class="ps-3 pe-5">
                                    <label for="inputUnit" class="col-form-label">Unit</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="unit_korban"
                                            value="{{ $lap->unit_korban }}">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>


                    <div class="container d-flex justify-content-center">
                        <div class=" d-flex justify-content-center">
                            <button type="submit"
                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                style="background: #29CC6A;height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                                Data</button>
                            {{-- <a href="{{ route('laporan-insiden.tambah') }}" type="submit"
                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                data-bs-toggle="modal" data-bs-target="#resetform"
                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px;height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                            <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">

                                        <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                            <h2 class="mt-5 text-center"
                                                style="color: #16243D; font-size: 20px font-weight:700">keluar dari tambah
                                                data?
                                                <p class="mb-0 mt-2 text-center "
                                                    style="color: #DC3545; font-weight:400; font-size:14px"> data yang
                                                    dimasukkan belum tersimpan </p>
                                            </h2>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center border-0">
                                            <a href="{{ route('laporan-insiden.tambah') }}" type="button"
                                                class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                            <button type="button"
                                                class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!--end::Content container-->

        </div>
    </div>
@stop

@section('customscript')
    <script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $(".tanggalPicker").flatpickr({
        //         altInput: true,
        //         altFormat: "d F Y",
        //         dateFormat: "Y-m-d",
        //         locale: "id"
        //     });
        // });

        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#txtDate').attr('max', maxDate);
        });
    </script>
@stop

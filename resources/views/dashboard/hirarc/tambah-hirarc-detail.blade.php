@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>HIRARC</h2>
                    <a href="{{ route('hirarc.tambah') }}" type="button"
                        class="btn text-white btn-sm btn-secondary d-flex justify-content-center align-items-center mb-2"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #505050; width:90px"><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">

                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari tambah data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('hirarc.tambah') }}" type="button"
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
                        class="app-content flex-column-fluid rounded   mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">

                        <div class="card ">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong>Tambah Data HIRARC</strong>
                                </div>
                            </div>
                            <div class="card-body">

                                @include('layouts.alerts')

                                <form action="{{ route('hirarc.save') }}" method="POST">

                                @csrf
                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Kesesuaian Dengan Aturan</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="kesesuaian" id="kesesuaian"
                                            value="">
                                    </div>
                                </div>
                                
                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Kondisi</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="kondisi" id="kondisi"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Pengendalian</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="kendali" id="kendali"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Keparahan Saat Ini</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="keparahan_ini" id="keparahan_ini"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Paparan Saat Ini</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="paparan_ini" id="paparan_ini"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Probabilitas Kejadian Saat Ini</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="probabilitas_ini" id="probabilitas_ini"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Tingkat Resiko Saat Ini</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="tingkat_ini" id="tingkat_ini"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Kategori Saat Ini</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="kategori_ini" id="kategori_ini"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Penyebab Utama</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="penyebab" id="penyebab"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Usulan</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="usulan" id="usulan"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Formulir yang Dibutuhkan</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="formulir" id="formulir"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">SOP</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="sop" id="sop"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Keparahan Residual</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="keparahan_residual" id="keparahan_residual"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Paparan Residual</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="paparan_residual" id="paparan_residual"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Probabilitas Residual</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="probabilitas_residual" id="probabilitas_residual"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Tingkat Resiko Residual</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="tingkat_residual" id="tingkat_residual"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Kategori Residual</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="kategori_residual" id="kategori_residual"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Penanggung Jawab</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="penanggung" id="penanggung"
                                            value="">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Status</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="status" id="status"
                                            value="">
                                    </div>
                                </div>

                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <div class=" d-flex justify-content-center">
                                        <button type="submit" id="save"
                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                            style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                            data-bs-toggle="modal" data-bs-target="#simpandata">Simpan
                                            Data</button>

                                        <a href="{{ route('hirarc.index') }}" type="submit"
                                            class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                            data-bs-toggle="modal" data-bs-target="#resetform"
                                            style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="resetform" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">

                                <div
                                    class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center"
                                        style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari tambah
                                        data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px">
                                            data yang
                                            dimasukkan belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('hirarc.index') }}" type="button"
                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                        style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                    <button type="button"
                                        class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                        data-bs-dismiss="modal"
                                        style="width:76px; height:31px; ">Tidak</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


                <!--end::Content container-->

        </div>
    </div>
@stop

@section('customscript')
    <script>
        $(document).ready(function() {
            $(".tanggalPicker").flatpickr({
                altInput: true,
                altFormat: "d F Y",
                dateFormat: "Y-m-d",
                locale: "id"
            });
        });
    </script>
@stop

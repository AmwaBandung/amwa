@extends('layouts_admin.master')
@section('content')
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Daftar Paket</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <button type="button" id="addAntar" data-toggle="modal" data-target="#modalAntar"
                    class="btn btn-outline-primary mb-4"><i class="fa fa-plus"></i> Tambah Paket</button>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination tableAntar">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell text-center" style="width: 5%;">no</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 25%;">dari</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 25%;">menuju</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Tarif (Avanza)</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Tarif (Innova)</th>
                                <th class="d-none d-sm-table-cell text-center">Tanggal</th>
                                <th class="d-none d-sm-table-cell text-center">action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add Antar --}}
    <div class="modal fade" id="modalAntar" tabindex="-1" role="dialog" aria-labelledby="modalAntar" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Paket Antar Kendaraan</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="" name="frm_antar" id="frm_antar" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Paket</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Lombok International Airport">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga"
                                    placeholder="Mataram, Cakra, dan Sweta">
                            </div>
                            <div class="form-group">
                                <label for="hotel">Hotel</label>
                                <input type="text" class="form-control input-currency" type-currency="IDR" id="hotel"
                                    name="hotel" placeholder="Rp">
                            </div>
                            <div class="form-group">
                                <label for="maskapai">Maskapai</label>
                                <input type="text" class="form-control input-currency" type-currency="IDR" id="maskapai"
                                    name="maskapai" placeholder="Rp">
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-primary" id="saveBtn">
                        <i class="fa fa-check"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection


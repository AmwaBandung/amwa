@extends('layouts_admin.master')
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar List Umrah</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <button type="button" id="addUmrah" data-toggle="modal" data-target="#modalUmrah" class="btn btn-outline-primary mb-4"><i class="fa fa-plus"></i> Tambah Paket Umrah</button>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination tableUmrah">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center" style="width: 5%;">no</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">nama</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">thumbnail</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">banner</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">harga</th>
                            <th class="d-none d-sm-table-cell text-center">hotel</th>
                            <th class="d-none d-sm-table-cell text-center">status</th>
                            <th class="d-none d-sm-table-cell text-center">action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalUmrah" tabindex="-1" role="dialog" aria-labelledby="modalUmrah" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Umrah</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form class="js-validation-bootstrap" action="" name="frm_umrah" id="frm_umrah" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Paket Umrah">
                                </div>
                                <div class="form-group">
                                    <label for="overtime">Harga</label>
                                    <input type="text" class="form-control input-currency" type-currency="IDR" id="harga" name="harga" placeholder="Rp">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Hotel</label>
                                    <input type="text" class="form-control" id="hotel" name="hotel" placeholder="Nama Hotel">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Maskapai</label>
                                    <input type="text" class="form-control" id="maskapai" name="maskapai" placeholder="Nama Maskapai">
                                </div>
                                <div class="form-group ">
                                    <label class="col-form-label" for="status">Status</label>
                                    <div class="">
                                        <select class="js-select2 form-control" id="status" name="status" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Itenary</label>
                                    <textarea name="itenary" id="itenary" class="form-control" cols="30" rows="10" placeholder="itenary"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Harga Termasuk</label>
                                    <textarea name="harga_termasuk" id="harga_termasuk" class="form-control" cols="30" rows="10" placeholder="Deskripsi Paket"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga Tidak Termasuk</label>
                                    <textarea name="harga_tidak" id="harga_tidak" class="form-control" cols="30" rows="10" placeholder="Deskripsi Paket"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Pendaftaran</label>
                                    <textarea name="pendaftaran" id="pendaftaran" class="form-control" cols="30" rows="10" placeholder="Deskripsi Paket"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Upload Thumbnail</label>
                                        <input type="file" name="thumbnail" placeholder="Choose image" id="thumbnail">
                                        @error('thumbnail')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <img id="preview-thumbnail" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image" style="max-height: 250px;">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Upload Banner</label>
                                        <input type="file" name="banner" placeholder="Choose image" id="banner">
                                        @error('banner')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <img id="preview-banner" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image" style="max-height: 250px;">
                                </div>
                            </div>
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

<div class="modal" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p class="mt-2">Loading...</p>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
@include('admin.umrah.javascript')
@include('admin.umrah.validate')
@endpush
@extends('layouts_admin.master')
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Kelebihan</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <button type="button" id="addKelebihan" data-toggle="modal" data-target="#modalKelebihan"
                class="btn btn-outline-primary mb-4"><i class="fa fa-plus"></i> Tambah Kelebihan</button>
            <div class="table-responsive">
                <table
                    class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination tableKelebihan">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center">no</th>
                            <th class="d-none d-sm-table-cell text-center">kelebihan</th>
                            <th class="d-none d-sm-table-cell text-center">deskripsi kelebihan</th>
                            <th class="d-none d-sm-table-cell text-center">icon</th>
                            <th class="d-none d-sm-table-cell text-center">action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Kelebihan -->
<div class="modal fade" id="modalKelebihan" tabindex="-1" role="dialog" aria-labelledby="modalKelebihan"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Kelebihan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="" name="frm_kelebihan" id="frm_kelebihan" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kelebihan">Kelebihan </label>
                            <input type="text" class="form-control" id="kelebihan" name="kelebihan"
                                placeholder="Kelebihan ">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_kelebihan">Deskripsi Kelebihan </label>
                            <textarea name="deskripsi_kelebihan" id="deskripsi_kelebihan" class="form-control" cols="30"
                                rows="10" placeholder="Deskripsi Paket"></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Upload Icon</label>
                                <input type="file" name="icon" placeholder="Choose image" id="icon">
                                @error('icon')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <img id="preview-image-before-upload"
                                src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image"
                                style="max-height: 250px;">
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

<div class="modal" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
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
@include('admin.kelebihan.javascript')
@endpush
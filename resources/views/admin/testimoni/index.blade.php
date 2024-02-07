@extends('layouts_admin.master')
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar Testimoni</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <button type="button" id="addTestimoni" data-toggle="modal" data-target="#modalTestimoni" class="btn btn-outline-primary mb-4"><i class="fa fa-plus"></i> Tambah Testimoni</button>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination tableTestimoni">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center" style="width: 5%;">no</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">nama</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">gender</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">foto</th>
                            <th class="d-none d-sm-table-cell text-center">Testimoni</th>
                            <th class="d-none d-sm-table-cell text-center">action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Add Testimoni --}}
<div class="modal fade" id="modalTestimoni" tabindex="-1" role="dialog" aria-labelledby="modalTestimoni" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Testimoni</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="" class="js-validation-bootstrap" name="frm_testimoni" id="frm_testimoni" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="JhonDue">
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label" for="gender">Gender</label>
                            <div class="">
                                <select class="js-select2 form-control" id="gender" name="gender" style="width: 100%;">
                                    <option></option>
                                    <option value="Ikhwat">Ikhwan</option>
                                    <option value="Akhwan">Akhwat</option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Upload Foto</label>
                                <input type="file" name="foto" placeholder="Choose image" id="foto">
                                @error('foto')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image" style="max-height: 250px;">
                        </div>
                        <div class="form-group">
                            <label for="">Testimoni</label>
                            <textarea name="testimoni" id="testimoni" class="form-control" cols="30" rows="10" placeholder="Deskripsi Paket"></textarea>
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
@include('admin.testimoni.javascript')
@include('admin.testimoni.validate')
@endpush
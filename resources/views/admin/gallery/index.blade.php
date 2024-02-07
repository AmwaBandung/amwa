@extends('layouts_admin.master')
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar List Gallery</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <button type="button" id="addGallery" data-toggle="modal" data-target="#modalGallery"
                class="btn btn-outline-primary mb-4"><i class="fa fa-plus"></i> Tambah Paket Gallery</button>
            <div class="table-responsive">
                <table
                    class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination tableGallery">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center" style="width: 5%;">no</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">title</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">media type</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">ratio</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 25%;">media</th>
                            <th class="d-none d-sm-table-cell text-center">action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalGallery" tabindex="-1" role="dialog" aria-labelledby="modalGallery" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Gallery</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form class="js-validation-bootstrap" action="" name="frm_gallery" id="frm_gallery" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                        >
                                </div>
                                <div class="form-group">
                                    <label for="media_type">Media Type</label>
                                    <select class="form-control" id="media_type" name="media_type">
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label class="col-form-label" for="aspect_ratio">Aspect Ratio</label>
                                    <div class="">
                                        <select class="js-select2 form-control" id="aspect_ratio" name="aspect_ratio"
                                            style="width: 100%;">
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="media">Upload Media</label>
                                    <input type="file" name="media" id="media">
                                    @error('media')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <img id="preview-media"
                                        src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                        alt="preview image" style="max-height: 250px;">
                                </div>
                                <div class="col-md-12 mb-2" id="video-preview" style="display: none;">
                                    <video id="preview-video" width="320" height="240" controls>
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-alt-primary btn-loading" id="saveBtn">
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
@include('admin.gallery.javascript')
@include('admin.gallery.validate')
@endpush
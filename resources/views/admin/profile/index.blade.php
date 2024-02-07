@extends('layouts_admin.master')
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Deskripsi Profile</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <button type="button" id="addProfile" data-toggle="modal" data-target="#modalProfile" class="btn btn-outline-primary mb-4"><i class="fa fa-plus"></i> Tambah Profile</button>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination tableProfile">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center">no</th>
                            <th class="d-none d-sm-table-cell text-center">deskripsi</th>
                            <th class="d-none d-sm-table-cell text-center">action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Add Profile --}}
<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="modalProfile" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Profile</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="" name="frm_profile" id="frm_profile" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Profile</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10" placeholder="Deskripsi Paket"></textarea>
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
@include('admin.profile.javascript')
@endpush
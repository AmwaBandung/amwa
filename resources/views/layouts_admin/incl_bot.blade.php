<script src="{{asset('assets/js/codebase.core.min.js')}}"></script>
<script src="{{asset('assets/js/codebase.app.min.js')}}"></script>

<!-- Page JS Plugins -->
{{-- chart --}}
<script src="{{asset('assets/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>
{{-- End Chart --}}

{{-- datatable --}}
<script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
{{-- end datatable --}}

{{-- Select --}}
<script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
{{-- End Select --}}

{{-- Swal --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- End Swal --}}

{{-- Datepicer --}}
<script src="{{asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
{{-- End Datepicker --}}

{{-- Form Input File --}}
<script src="{{asset('assets/js/plugins/kartik/js/plugins/sortable.js')}}"></script>
<script src="{{asset('assets/js/plugins/kartik/js/plugins/piexif.js')}}"></script>
<script src="{{asset('assets/js/plugins/kartik/js/fileinput.js')}}"></script>
<script src="{{asset('assets/js/plugins/kartik/themes/fa/theme.js')}}"></script>
{{-- End Form Input File --}}

{{-- Summernote --}}
<script src="{{asset('assets/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
{{-- End Summernote --}}

<script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.js')}}"></script>

<!-- Page JS Helpers (Select2 plugin) -->
<script>jQuery(function(){ Codebase.helpers('select2'); });</script>
<script>jQuery(function(){ Codebase.helpers('content-filter'); });</script>

<script>
     $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
</script>



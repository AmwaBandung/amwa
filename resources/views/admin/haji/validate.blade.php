<script>
    $.validator.addMethod('summernoteRequiredItenary', function(value, element) {
    return $('#itenary').summernote('isEmpty') === false;
    }, 'Masukan itenary.');

    $.validator.addMethod('summernoteRequiredHargaTermasuk', function(value, element) {
        return $('#harga_termasuk').summernote('isEmpty') === false;
    }, 'Masukan Harga Termasuk.');

    $.validator.addMethod('summernoteRequiredHargaTidak', function(value, element) {
        return $('#harga_tidak').summernote('isEmpty') === false;
    }, 'Masukan Harga Tidak Termasuk.');

    $.validator.addMethod('summernoteRequiredPendaftaran', function(value, element) {
        return $('#pendaftaran').summernote('isEmpty') === false;
    }, 'Masukan Pendaftaran.');

    $('.js-validation-bootstrap').validate({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: (error, element) => {
            $(element).parents('.form-group').append(error);
        },
        highlight: e => {
            $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: e => {
            $(e).closest('.form-group').removeClass('is-invalid');
            $(e).remove();
        },
        rules: {
            'nama': {
                required: true,
            },
            'dp': {
                required: true,
            },
            'hotel': {
                required: true,
            },
            'itenary': {
            summernoteRequiredItenary: true,
            },
            'harga_termasuk': {
                summernoteRequiredHargaTermasuk: true,
            },
            'harga_tidak': {
                summernoteRequiredHargaTidak: true,
            },
            'pendaftaran': {
                summernoteRequiredPendaftaran: true,
            },
            'thumbnail': {
            required: function(element) {
                return window.idEdit === 0;
            },
            },
            'banner': {
            required: function(element) {
                return window.idEdit === 0;
            },
            },
        },
        messages: {
            'nama': {
                required: 'Masukan nama',
            },
            'dp': {
                required: 'Masukan dp',
            },
            'hotel': {
                required: 'Masukan hotel',
            },
            'itenary': {
                required: 'Masukan itenary',
            },
            'harga termasuk': {
                required: 'Masukan harga termasuk',
            },
            'harga tidak': {
                required: 'Masukan harga tidak termasuk',
            },
            'pendaftaran': {
                required: 'Masukan pendaftaran',
            },
            'thumbnail': {
                required: 'Masukan thumbnail',
            },
            'banner': {
                required: 'Masukan banner',
            },
        }
    });

    // Tambahkan event handler untuk mereset validasi ketika modal ditutup
    $("#modalHaji").on("hidden.bs.modal", function () {
        $("#frm_haji").validate().resetForm();
    });
    
</script>
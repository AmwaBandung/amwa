<script>
    $.validator.addMethod('summernoteRequiredTestimoni', function(value, element) {
    return $('#testimoni').summernote('isEmpty') === false;
    }, 'Masukan testimoni.');

    $.validator.addMethod('select2Required', function(value, element) {
    // Menggunakan Select2: validasi jika nilai yang dipilih tidak kosong
    return value !== null && value.length > 0;
}, 'Pilih opsi dari daftar.');

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
            'gender': {
                select2Required: true,
            },
            'testimoni': {
                summernoteRequiredTestimoni: true,
            },
           
        },
        messages: {
            'nama': {
                required: 'Masukan nama',
            },
            'gender': {
                required: 'Masukan dp',
            },
            'testimoni': {
                required: 'Masukan testimoni',
            },
        }
    });

    // Tambahkan event handler untuk mereset validasi ketika modal ditutup
    $("#modalTestimoni").on("hidden.bs.modal", function () {
        $("#frm_testimoni").validate().resetForm();
    });
    
</script>
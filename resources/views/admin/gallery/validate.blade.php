<script>
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
            'title': {
                required: true,
            },
            'media_type': {
                required: true,
            },
            'aspect_ratio': {
                required: function(element) {
                    // Hanya dibutuhkan jika media_type bukan video
                    return $('#media_type').val() !== 'Video';
                },
            },
            'media': {
                required: true,
            },
        },
        messages: {
            'title': {
                required: 'Masukan Title',
            },
            'media': {
                required: 'Masukan Media',
            },
            'aspect_ratio': 'Masukan Aspect Ratio',
            'media_type': 'Masukan Media Type',
        }
    });

        // Tambahkan event handler untuk mereset validasi ketika modal ditutup
        $("#modalGallery").on("hidden.bs.modal", function () {
            $("#frm_gallery").validate().resetForm();
        });
    
</script>
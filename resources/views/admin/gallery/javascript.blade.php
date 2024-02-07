<script>
    $(document).ready(function() {
        var idEdit = 0; // Initialize the variable to track editing

        $('#media').change(function() {
            var mediaType = $('#media_type').val();

            if (mediaType === 'Image') {
                // Menampilkan preview gambar jika media yang dipilih adalah gambar
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-media').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                $('#preview-media').show();
                $('#video-preview').hide();
            } else if (mediaType === 'Video') {
                // Menampilkan preview video jika media yang dipilih adalah video
                var videoURL = URL.createObjectURL(this.files[0]);
                $('#preview-video').attr('src', videoURL);
                $('#preview-media').hide();
                $('#video-preview').show();
            }
        });

        $('#media_type').change(function () {
            var mediaType = $(this).val();

            // Sembunyikan preview gambar dan video secara default
            $('#preview-media').hide();
            $('#video-preview').hide();
            var aspectRatioElement = $('#aspect_ratio').parent().parent();

            if (mediaType === 'Image') {
                $('#preview-media').show();
                aspectRatioElement.show();
            } else if (mediaType === 'Video') {
                $('#video-preview').show();
                aspectRatioElement.hide();
            }
        });


        // Show Data
        var table = $('.tableGallery').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('gallery.admin.data') }}",
            'columnDefs': [{
                "targets": [0, 2, 3, 4, 5],
                "className": "text-center"
            }],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'media_type',
                    name: 'media_type'
                },
                {
                    data: 'aspect_ratio',
                    name: 'aspect_ratio'
                },
                {
                    data: 'media',
                    name: 'media',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        // End Show

        // Create Modal
        $('#addGallery').click(function() {
            idEdit = 0;
            $('#frm_gallery').trigger("reset");
            $('#modalGallery').modal('show');
            $('#preview-media').attr('src', '');
            // Media Type
            $("#media_type").empty();
            $("#media_type").append('<option value="">Choose Media Type</option>');
            $("#media_type").append('<option value="Image">Image</option>');
            $("#media_type").append('<option value="Video">Video</option>');
            // Aspect Ratio
            $("#aspect_ratio").empty();
            $("#aspect_ratio").append('<option value="">Choose Aspect Ratio</option>');
            $("#aspect_ratio").append('<option value="1:1">1:1</option>');
            $("#aspect_ratio").append('<option value="4:3">4:3</option>');
            $("#aspect_ratio").append('<option value="9:16">9:16</option>');
            $("#aspect_ratio").append('<option value="16:9">16:9</option>');
        });

        // Store Data
        $('#saveBtn').click(function(e) {
            e.preventDefault();

            // Validasi formulir
            if ($('.js-validation-bootstrap').valid()) {
                $(this).html('<i class="fas fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
                // Menampilkan modal loading
                $('#loadingModal').modal('show');

                var formData = new FormData($('#frm_gallery')[0]);
                var url = idEdit === 0 ? "{{ route('gallery.admin.store') }}" : "{{ route('gallery.admin.update', ':id') }}";
                url = url.replace(':id', idEdit);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: idEdit === 0 ? "POST" : "POST",
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            icon: 'success',
                            text: 'Berhasil',
                            showConfirmButton: true
                        });

                        $('#saveBtn').html('Save').prop('disabled', false);
                        // Menyembunyikan modal loading
                        $('#loadingModal').modal('hide');

                        idEdit = 0;
                        $('#frm_gallery').trigger("reset");
                        $('#modalGallery').modal('hide');
                        $('#preview-media').attr('src', '');
                        table.draw();
                    },
                    error: function(error) {
                        console.log(error);
                        $('#saveBtn').html('Save').prop('disabled', false);
                        // Menyembunyikan modal loading
                        $('#loadingModal').modal('hide');

                    }
                });
            } else {
                // Tampilkan pesan kesalahan karena formulir tidak valid
                Swal.fire({
                    title: 'Error!',
                    text: 'Silakan isi semua field yang diperlukan.',
                    icon: 'error',
                    showConfirmButton: true
                });
            }
        });


        // End Store Data

        // EDIT DATA
        $('body').on('click', '#edit', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route('gallery.admin.edit', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    idEdit = res.data.id;
                    $('#frm_gallery').trigger("reset");
                    $('#modalGallery').modal('show');
                    $('#title').val(res.data.title);
                    $('#preview-media').attr('src', '{{ url("asset_web/gallery/") }}/' + encodeURIComponent(res.data.media));
                    // Media Type
                    $("#media_type").empty();
                    $("#media_type").append('<option value="">Choose Media Type</option>');
                    $("#media_type").append('<option value="Image">Image</option>');
                    $("#media_type").append('<option value="Video">Video</option>');
                    // Aspect Ratio
                    $("#aspect_ratio").empty();
                    $("#aspect_ratio").append('<option value="">Choose Aspect Ratio</option>');
                    $("#aspect_ratio").append('<option value="1:1">1:1</option>');
                    $("#aspect_ratio").append('<option value="16:9">16:9</option>');
                    $("#aspect_ratio").append('<option value="4:3">4:3</option>');
                    $("#aspect_ratio").append('<option value="9:16">9:16</option>');

                    $("#media_type").val(res.data.media_type).trigger('change');
                    $("#aspect_ratio").val(res.data.aspect_ratio).trigger('change');

                    // Tampilkan popup jika aspect_ratio berubah saat mengedit
                    var prevAspectRatio = res.data.aspect_ratio;

                    $("#aspect_ratio").change(function() {
                        var newAspectRatio = $(this).val();

                        if (prevAspectRatio !== newAspectRatio) {
                            Swal.fire({
                                title: 'Peringatan',
                                text: 'Harap unggah ulang gambar untuk mengikuti aspek rasio baru.',
                                icon: 'warning',
                                showConfirmButton: true
                            });
                        }
                    });
                }
            });
        });
        // END EDIT

        // Delete
        $('body').on('click', '#delete', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route('gallery.admin.delete', ':id') }}';
            url = url.replace(':id', id);

            Swal.fire({
                title: 'Anda Yakin ?',
                text: 'Data Yang Sudah Dihapus Tidak Akan Bisa Dikembalikan',
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Tidak, Batalkan!',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: 'DELETE',
                        url: url,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil!',
                                icon: 'success',
                                text: 'Data Berhasil Di Hapus',
                                showConfirmButton: true
                            });
                            table.draw();
                        }
                    });
                } else {
                    Swal.close();
                }
            });
        });
        // End Delete
    });
</script>

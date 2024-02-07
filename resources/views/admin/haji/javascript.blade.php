<script>
     var idEdit = 0;
    $(document).ready(function() {
        // inisiasi summernote
        $('#itenary').summernote({
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
        $('#harga_termasuk').summernote({
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
        $('#harga_tidak').summernote({
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
        $('#pendaftaran').summernote({
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });


        $('#thumbnail').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-thumbnail').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });
        $('#banner').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-banner').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

        // Show Data
        var table = $('.tableHaji').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('haji.admin.data') }}",
            'columnDefs': [{
                    "targets": [0, 2, 3,4, 5], // your case first column
                    "className": "text-center"
            },
            {
            "targets": [4], // Kolom harga
            "render": function(data, type, row) {
                if (type === 'display') {
                    return 'Rp ' + formatAngka(data); // Menambahkan "Rp" dan format angka
                }
                return data;
            },
            "type": "num-fmt" // Mengatur tipe kolom agar dapat diurutkan secara numerik
            },
            ],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'thumbnail',
                    name: 'thumbnail'
                },
                {
                    data: 'banner',
                    name: 'banner'
                },
                {
                    data: 'dp',
                    name: 'dp'
                },
                {
                    data: 'hotel',
                    name: 'hotel'
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
        $('#addHaji').click(function() {
            $('#frm_haji').trigger("reset");
            $('#modalHaji').modal('show');
            $('#preview-thumbnail').attr('src', '');
            $('#preview-banner').attr('src', '');
            $('#itenary').summernote('code', '');
            $('#harga_termasuk').summernote('code', '');
            $('#harga_tidak').summernote('code', '');
            $('#pendaftaran').summernote('code', '');
        });

        // Store Data
        $('#saveBtn').click(function(e) {
            var url;
            var type;
            e.preventDefault();
            if ($('.js-validation-bootstrap').valid()) {
                $(this).html('<i class="fas fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
                // Menampilkan modal loading
                $('#loadingModal').modal('show');

                var formData = new FormData($('#frm_haji')[0]);
                formData.append("itenary", $('#itenary').summernote('code'));
                formData.append("harga_termasuk", $('#harga_termasuk').summernote('code'));
                formData.append("harga_tidak", $('#harga_tidak').summernote('code'));
                formData.append("pendaftaran", $('#pendaftaran').summernote('code'));
                // formData.append('nama', nama);
                // formData.append('featured_image', featured_image);

                if (idEdit === 0) {
                    url = "{{ route('haji.admin.store') }}"
                    type = "POST"
                    console.log(formData)
                } else {
                    url = "{{ route('haji.admin.update', ':id') }}";
                    url = url.replace(':id', idEdit);
                    type = "POST"
                    console.log(formData)
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: type,
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil !',
                            icon: 'success',
                            text: 'Berhasil',
                            showConfirmButton: true
                        })

                        $('#saveBtn').html('Save').prop('disabled', false);
                        // Menyembunyikan modal loading
                        $('#loadingModal').modal('hide');

                        idEdit = 0;
                        $('#frm_haji').trigger("reset");
                        $('#modalHaji').modal('hide');
                        $('#preview-thumbnail').attr('src', '');
                        $('#preview-banner').attr('src', '');
                        $('#itenary').summernote('code', '');
                        $('#harga_termasuk').summernote('code', '');
                        $('#harga_tidak').summernote('code', '');
                        $('#pendaftaran').summernote('code', '');
                        table.draw()
                    },
                    error: function(error) {
                        console.log(error);
                        $('#saveBtn').html('Save').prop('disabled', false);
                        // Menyembunyikan modal loading
                        $('#loadingModal').modal('hide');

                    }
                })
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
            var url = '{{ route('haji.admin.edit',':id') }}'
            url = url.replace(':id', id)

            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    idEdit = res.data.id;
                    gambar = res.data.foto;
                    base_thumbnail = 'http://localhost:8000/asset_web/paket/haji/' + encodeURIComponent(res.data.thumbnail) + ''
                    console.log(base_thumbnail)
                    base_banner = 'http://localhost:8000/asset_web/paket/haji/' + encodeURIComponent(res.data.banner) + ''
                    idEdit = res.data.id;
                    $('#frm_haji').trigger("reset");
                    $('#modalHaji').modal('show');
                    $('#nama').val(res.data.nama);
                    $('#dp').val(res.data.dp);
                    $('#hotel').val(res.data.hotel);
                    $('#itenary').summernote('code', res.data.itenary);
                    $('#harga_termasuk').summernote('code', res.data.harga_termasuk);
                    $('#harga_tidak').summernote('code', res.data.harga_tidak);
                    $('#pendaftaran').summernote('code', res.data.pendaftaran);
                    $('#preview-thumbnail').attr('src', '{{ url("asset_web/paket/haji/") }}/' + encodeURIComponent(res.data.thumbnail));
                    $('#preview-banner').attr('src', '{{ url("asset_web/paket/haji/") }}/' + encodeURIComponent(res.data.banner));

                }
            })
        })
        // END EDIT

        // Delete
        $('body').on('click', '#delete', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route('haji.admin.delete',':id') }}';
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
                })
                .then((result) => {
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
                                })

                                table.draw()
                            }
                        })
                    } else {
                        Swal.close()
                    }
                })
        })
        // End Delete

        function formatAngka(angka) {
            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Event handler saat input berubah
        $('.input-currency').on('input', function() {
            var inputValue = $(this).val();
            if (inputValue.trim() !== "") {
                var unformatted = inputValue.replace('Rp ', '').split('.').join('');
                var formatted = formatAngka(unformatted);
                $(this).val('Rp ' + formatted);
            }
        });

        // Event handler saat input kehilangan fokus (blur)
        $('.input-currency').on('blur', function() {
            var formattedValue = $(this).val();
            if (formattedValue === 'Rp ') {
                $(this).val('');
            }
        });

    })
</script>

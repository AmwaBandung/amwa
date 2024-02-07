<script>
    $('#testimoni').select2({
        theme: 'bootstrap4',
    });
    $(document).ready(function() {
        var idEdit = 0;
        $('#foto').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

           });

        // Show Data
        var table = $('.tableTestimoni').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('testimoni.admin.data') }}",
            // 'columnDefs': [{
            //         "targets": [0, 2, 3, 5], // your case first column
            //         "className": "text-center"

            //     },
            //     {
            //         "targets": 3,
            //         "render": function(data, type, row) {
            //             return type === 'display' && data.length > 50 ? data.substr(0, 50) +
            //                 '…' : data;
            //         }
            //     }
            // ],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'foto',
                    name: 'foto'
                },
                {
                    data: 'testimoni',
                    name: 'testimoni'
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
        // inisiasi summernote
        $('#testimoni').summernote({
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
        // Create Modal
        $('#addTestimoni').click(function() {
            $('#frm_testimoni').trigger("reset");
            $('#modalTestimoni').modal('show');
            $('#preview-image-before-upload').attr('src','');
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

            var nama = $("#nama").val();
            var featured_image = $("#foto")[0].files[0];
            var formData = new FormData( $('#frm_testimoni')[0] );
            formData.append("testimoni", $('#testimoni').summernote('code') );
            // formData.append('nama', nama);
            // formData.append('featured_image', featured_image);

            if (idEdit === 0) {
                url = "{{ route('testimoni.admin.store') }}"
                type = "POST"
                console.log(formData)
            }else {
                url = "{{ route('testimoni.admin.update', ':id') }}";
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
                    $('#frm_testimoni').trigger("reset");
                    $('#modalTestimoni').modal('hide');
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
            var url = '{{ route('testimoni.admin.edit', ':id') }}'
            url = url.replace(':id', id)

            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    idEdit = res.data.id;
                    gambar = res.data.foto;
                    base_url = 'http://localhost:8000/asset_web/testimoni/'+encodeURIComponent(res.data.foto)+''
                    console.log(base_url)
                    idEdit = res.data.id;
                    $('#frm_testimoni').trigger("reset");
                    $('#modalTestimoni').modal('show');
                    $('#nama').val(res.data.nama);
                    $('#testimoni').summernote('code', res.data.testimoni);
                    $('#preview-image-before-upload').attr('src', '{{ url("asset_web/testimoni/") }}/' + encodeURIComponent(res.data.foto));

                }
            })
        })
        // END EDIT

        // Delete
        $('body').on('click', '#delete', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route('testimoni.admin.delete', ':id') }}';
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

    })

</script>

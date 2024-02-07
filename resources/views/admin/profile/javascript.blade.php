<script>
    $('#profile').select2({
        theme: 'bootstrap4',
    });
    $(document).ready(function() {
        var idEdit = 0;
        // Show Data
        var table = $('.tableProfile').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('profile.admin.data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi'
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
        $('#deskripsi').summernote({
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
        $('#addProfile').click(function() {
            // Check the number of rows in the table
            var rowCount = table.rows().count();

            // Show SweetAlert if the condition is met
            if (rowCount >= 1) {
                Swal.fire({
                    title: 'Data Profile Sudah Ada!',
                    icon: 'warning',
                    text: 'Anda hanya dapat menambahkan satu data profile.',
                    showConfirmButton: true
                });
                return false
            } else {
                // Open the modal if the condition is not met
                $('#frm_profile').trigger("reset");
                $('#modalProfile').modal('show');
                $('#deskripsi').summernote('code', '');
            }
        });


        // Store Data
        $('#saveBtn').click(function(e) {
            var url;
            var type;
            e.preventDefault();

            $(this).html('<i class="fas fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
            // Menampilkan modal loading
            $('#loadingModal').modal('show');

            var formData = new FormData( $('#frm_profile')[0] );
            formData.append("deskripsi", $('#deskripsi').summernote('code') );
            // formData.append('nama', nama);
            // formData.append('featured_image', featured_image);

            if (idEdit === 0) {
                url = "{{ route('profile.admin.store') }}"
                type = "POST"
                console.log(formData)
            }else {
                url = "{{ route('profile.admin.update', ':id') }}";
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
                    $('#frm_profile').trigger("reset");
                    $('#modalProfile').modal('hide');
                    table.draw()
                },
                error: function(error) {
                    console.log(error);
                    $('#saveBtn').html('Save').prop('disabled', false);
                    // Menyembunyikan modal loading
                    $('#loadingModal').modal('hide');
                    
                }
            })
        });
        // End Store Data

        // EDIT DATA
        $('body').on('click', '#edit', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route('profile.admin.edit', ':id') }}'
            url = url.replace(':id', id)

            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    idEdit = res.data.id;
                    idEdit = res.data.id;
                    $('#frm_profile').trigger("reset");
                    $('#modalProfile').modal('show');
                    $('#deskripsi').summernote('code', res.data.deskripsi);
                }
            })
        })
        // END EDIT

        // Delete
        $('body').on('click', '#delete', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route('profile.admin.delete', ':id') }}';
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
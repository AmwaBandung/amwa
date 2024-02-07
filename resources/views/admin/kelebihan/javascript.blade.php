<script>
    $(document).ready(function() {
        var idEdit = 0;

        $('#icon').change(function(){
            
            let reader = new FileReader();
         
            reader.onload = (e) => { 
         
              $('#preview-image-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });

        // Show Data
        var table = $('.tableKelebihan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('kelebihan.admin.data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'kelebihan',
                    name: 'kelebihan'
                },
                {
                    data: 'deskripsi_kelebihan',
                    name: 'deskripsi_kelebihan'
                },
                {
                    data: 'icon',
                    name: 'icon'
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
        $('#deskripsi_kelebihan').summernote({
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
        })
        // Create Modal
        $('#addKelebihan').click(function() {
            var rowCount = table.rows().count();

            // Show SweetAlert if the condition is met
            if (rowCount >= 6) {
                Swal.fire({
                    title: 'Data Kelebihan Sudah Ada!',
                    icon: 'warning',
                    text: 'Anda hanya dapat menambahkan 6 data kelebihan.',
                    showConfirmButton: true
                });
                return false
            } else {
                $('#frm_kelebihan').trigger("reset");
                $('#modalKelebihan').modal('show');
                $('#deskripsi_kelebihan').summernote('code', '');
                $('#preview-image-before-upload').attr('src',''); 
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

            var formData = new FormData( $('#frm_kelebihan')[0] );
            formData.append("deskripsi_kelebihan", $('#deskripsi_kelebihan').summernote('code') );
            // formData.append('nama', nama);
            // formData.append('featured_image', featured_image);

            if (idEdit === 0) {
                url = "{{ route('kelebihan.admin.store') }}"
                type = "POST"
                console.log(formData)
            }else {
                url = "{{ route('kelebihan.admin.update', ':id') }}";
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
                    $('#frm_kelebihan').trigger("reset");
                    $('#modalKelebihan').modal('hide');
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
            var url = '{{ route('kelebihan.admin.edit', ':id') }}'
            url = url.replace(':id', id)

            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    idEdit = res.data.id;
                    idEdit = res.data.id;
                    $('#frm_kelebihan').trigger("reset");
                    $('#modalKelebihan').modal('show');
                    $('#kelebihan').val(res.data.kelebihan);
                    $('#deskripsi_kelebihan').summernote('code', res.data.deskripsi_kelebihan);
                    $('#preview-image-before-upload').attr('src', '{{ url("asset_web/kelebihan/") }}/' + encodeURIComponent(res.data.icon));
                }
            })
        })
        // END EDIT

        // Delete
        $('body').on('click', '#delete', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route('kelebihan.admin.delete', ':id') }}';
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
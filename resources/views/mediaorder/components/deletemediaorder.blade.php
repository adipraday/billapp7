<script>
    //button create post event
    $('body').on('click', '#btn-delete-mediaorder', function () {

        let k_order = $(this).attr("data-id"); 
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini !",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {

                console.log(k_order);

                //fetch to delete data
                $.ajax({

                    url: `/mediaorders/${k_order}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //remove post on table
                        $(`#index_${k_order}`).remove();
                        location.reload();
                    }
                });

                
            }
        })
        
    });
</script>
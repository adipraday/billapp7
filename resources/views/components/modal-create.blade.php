<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Media Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label">No Kontrak</label>
                    <input class="form-control" type="text" id="no_kontrak">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no_kontrak"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Biro</label>
                    <select class="form-control" id="k_biro">
                        <option selected>Choose a biro</option>
                        @foreach($biros as $biro)
                        <option value="{{ $biro->k_biro }}" selected>{{ $biro->n_biro }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-k_biro"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Klien</label>
                    <select class="form-control" id="k_klien">
                        <option selected>Choose a klien</option>
                        @foreach($kliens as $klien)
                        <option value="{{ $klien->k_klien }}" selected>{{ $klien->n_klien }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-k_klien"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Nilai</label>
                    <input class="form-control" type="text" id="nilai">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nilai"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Jenis Kontrak</label>
                    <div class="flex">
                        <div class="form-check form-check-inline mx-5">
                          <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 
                          focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                          type="radio" id="jenis_kontrak" value="N">
                          <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">Non Barter</label>
                        </div>
                        <div class="form-check form-check-inline mx-5">
                          <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 
                          focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                          type="radio" id="jenis_kontrak" value="B">
                          <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">Barter</label>
                        </div>
                        <div class="form-check form-check-inline mx-5">
                            <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 
                            focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                            type="radio" id="jenis_kontrak" value="S">
                            <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">Barter & Non Barter</label>
                        </div>
                      </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-dismiss="modal">TUTUP</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-post', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let no_kontrak = $('#no_kontrak').val();
        let nilai = $('#nilai').val();
        let k_biro = $('#k_biro').val();
        let k_klien = $('#k_klien').val();
        let jenis_kontrak = $('#jenis_kontrak').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/mediaorders`,
            type: "POST",
            cache: false,
            data: {
                "no_kontrak": no_kontrak,
                "nilai": nilai,
                "k_biro": k_biro,
                "k_klien": k_klien,
                "jenis_kontrak": jenis_kontrak,
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

                //data post
                let mediaorder = `
                    <tr id="index_${response.data.no_kontrak}">
                        <td>${response.data.no_kontrak}</td>
                        <td>${response.data.k_biro}</td>
                        <td>${response.data.k_klien}</td>
                        <td>${response.data.nilai}</td>
                        <td>${response.data.jenis_kontrak}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.no_kontrak}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.no_kontrak}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-mediaorders').prepend(mediaorder);
                
                //clear form
                $('#no_kontrak').val('');
                $('#k_biro').val('');
                $('#k_klien').val('');
                $('#nilai').val('');
                $('#jenis_kontrak').val('');

                //close modal
                $('#modal-create').modal('hide');
                

            },
            error:function(error){

                if(error.responseJSON.no_kontrak[0]) {

                    //show alert
                    $('#alert-no_kontrak').removeClass('d-none');
                    $('#alert-no_kontrak').addClass('d-block');

                    //add message to alert
                    $('#alert-no_kontrak').html(error.responseJSON.no_kontrak[0]);
                } 

                if(error.responseJSON.k_biro[0]) {

                    //show alert
                    $('#alert-k_biro').removeClass('d-none');
                    $('#alert-k_biro').addClass('d-block');

                    //add message to alert
                    $('#alert-k_biro').html(error.responseJSON.k_biro[0]);
                } 

                if(error.responseJSON.k_klien[0]) {

                    //show alert
                    $('#alert-k_klien').removeClass('d-none');
                    $('#alert-k_klien').addClass('d-block');

                    //add message to alert
                    $('#alert-k_klien').html(error.responseJSON.k_klien[0]);
                } 

                if(error.responseJSON.nilai[0]) {

                    //show alert
                    $('#alert-nilai').removeClass('d-none');
                    $('#alert-nilai').addClass('d-block');

                    //add message to alert
                    $('#alert-nilai').html(error.responseJSON.nilai[0]);
                } 

                if(error.responseJSON.jenis_kontrak[0]) {

                    //show alert
                    $('#alert-jenis_kontrak').removeClass('d-none');
                    $('#alert-jenis_kontrak').addClass('d-block');

                    //add message to alert
                    $('#alert-jenis_kontrak').html(error.responseJSON.jenis_kontrak[0]);
                } 

            }

        });

    });

</script>
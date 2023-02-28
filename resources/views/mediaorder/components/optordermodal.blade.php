<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
  id="opt-sbu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div
      class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div
        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">
          Input Order <span id="k_order"></span>
        </h5>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body relative p-4">
        <p>Pilih product untuk input order</p><br/>
        <div class="flex justify-center"> 
            <div class="mb-3 xl:w-96">
              <select class="form-select appearance-none
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
                id="id_sbu" name="id_sbu" required>
                  <option selected>Pilih Product</option>
                  <option value="1">Majalah Tempo Indonesia</option>
                  <option value="2">Tempo English Edition</option>
                  <option value="3">Koran Tempo</option>
                  <option value="4">TempoTV</option>
                  <option value="5">TEMPO.CO</option>
                  <option value="6">TEMPO.CO -IMD-</option>
                  <option value="7">Majalah Tebi Digital</option>
                  <option value="8">Majalah Tempo Digital</option>
                  <option value="9">Koran Tempo Digital</option>
              </select>
            </div>
          </div>
      </div>
      <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        <button type="button"
        class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg 
        focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out"
          data-dismiss="modal">Close</button>
        <button type="button"
          id="next_input_order"
          class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">Input Order</button>
      </div>
    </div>
  </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-opt-sbu', function () {

        let k_order = $(this).attr("data-id"); 
        $('#k_order').text(k_order);
        $('#opt-sbu').modal('show');

        $('#next_input_order').click(function(e) {
            e.preventDefault();

            //define variable
            let id_sbu = $('#id_sbu').val();

            if(id_sbu == 1){
                window.location.replace("mediaorder/iomajalahtempoindonesia/"+k_order);
            }

            if(id_sbu == 2){
                window.location.replace("mediaorder/iotempoenglishedition/"+k_order);
            }

            if(id_sbu == 3){
                window.location.replace("mediaorder/iokorantempo/"+k_order);
            }

            if(id_sbu == 4){
                window.location.replace("mediaorder/iotempotv/"+k_order);
            }

            if(id_sbu == 5){
                window.location.replace("mediaorder/iotempoco/"+k_order);
            }

            if(id_sbu == 6){
                window.location.replace("mediaorder/iotempocoimd/"+k_order);
            }

            if(id_sbu == 7){
                window.location.replace("mediaorder/iomajalahtebidigital/"+k_order);
            }

            if(id_sbu == 8){
                window.location.replace("mediaorder/iomajalahtempodigital/"+k_order);
            }

            if(id_sbu == 9){
                window.location.replace("mediaorder/iokorantempodigital/"+k_order);
            }

        });

    });

</script>
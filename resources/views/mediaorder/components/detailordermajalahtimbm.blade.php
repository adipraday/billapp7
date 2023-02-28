<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
  id="modal-detail-omtimbm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div
      class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div
        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">
          Detail Order <span id="no_kwt"></span>
        </h5>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none 
          focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body relative p-4">
            <table class="min-w-full text-left">
                <tbody>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      No. Kwitansi
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->no_kwt }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      Kode Order
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_order }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      No. Kontrak
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->no_kontrak }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      Kode Biro
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_biro }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      Kode Klien
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_klien }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Atas Nama
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->atasnama }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      Penanggung Jawab Atas Name
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->j_atasnama }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      Kode Industri
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_indus }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      Judul
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->judul }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      Kode Edisi
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_edisi }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                      Tanggal Terbit
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->tgl_terbit }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        k_jenis
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_jenis }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Kode Tarif
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_tarif }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Harga Tarif
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->hrg_tarif }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Kode Jasa
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_jasa }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Harga Jasa
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->hrg_jasa }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Jumlah Eksemplar
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->jml_eks }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        nharga
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->nharga }} 
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Diskon Dalam (%)
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->discp_in }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Diskon Dalam (IDR)
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->discr_in }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Netto
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->neto }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Diskon Luar (%)
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->discp_out }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Diskon Luar (IDR)
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->discr_out }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        PPN (%)
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->ppnp }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        PPN (IDR)
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->ppnr }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Total Tagihan
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->ttagih }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Type
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->type }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        sts_barter
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->sts_barter }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Tgl Input
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->tgl_input }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        User Input
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->user_input }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Catatan
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->catatan }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Cara Bayar
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->cara_bayar }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Kode Produk
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_produk }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Kode SProduk
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_sproduk }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Kode Sales
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_sales }}
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-500 font-light px-6 py-4 whitespace-nowrap">
                        Kode Group
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $iklanmbm->k_grup }}
                    </td>
                  </tr>
                </tbody>
            </table>
      </div>
      <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        <button type="button"
        class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg 
        focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out"
          data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-detail-omtimbm', function () {

        let no_kwt = $(this).attr("data-id"); 
        $('#no_kwt').text(no_kwt);
        $('#modal-detail-omtimbm').modal('show');

    });

</script>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Media Order') }}
        </h2>
    </x-slot>

    <br/>

    <div class="container justify-center">
        <table class="ml-3">
            <tr>
                <td>
                    <label
                      for="kode_media_order" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Kode Media Order
                    </label>
                </td>
                <td>
                    <label
                      for="no_kontrak" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      No Kontrak
                    </label>
                </td>
                <td>
                    <label
                      for="dari_tgl" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Dari Tanggal
                    </label>
                </td>
                <td>
                    <label
                      for="sampai_tgl" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Sampai Tanggal
                    </label>
                </td>
                <td>
                    <label
                      for="jenis_kontrak" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Jenis Kontrak
                    </label>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input
                      type="text"
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="k_order" id="k_order"
                      placeholder="Kode Media Order"/>
                </td>
                <td>
                    <input
                      type="text"
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="no_kontrak" id="no_kontrak"
                      placeholder="No. Kontrak"/>
                </td>
                <td>
                    <input
                      type="date"
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="dari_tgl" id="dari_tgl"
                      placeholder="Dari Tanggal"/>
                </td>
                <td>
                    <input
                      type="date"
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="sampai_tgl" id="sampai_tgl"
                      placeholder="Sampai Tanggal"/>
                </td>
                <td>
                    <select
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      placeholder="Pilih Jenis Kontrak" id="jkontrak" name="jkontrak">
                      <option>Pilih Jenis Barter</option>
                      <option value="">Barter</option>
                      <option value="">Non Barter</option>
                      <option value="">Barter & Non Barter</option>
                    </select>
                </td>
                <td>
                    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg 
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-3" 
                    id="cari_media_order">
                        Search...
                    </button>
                </td>
            </tr>
        </table>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full text-center">
                    <thead class="border-b bg-blue-100">
                      <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Data ID
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Informasi Umum
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Kontrak Info
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Nilai Kontrak
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Keterangan Nilai Kontrak
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Input Info
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Input Info
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Atas Nama
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Produk Info
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Account Info
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                        Ket Iklan
                        </th>
                      </tr>
                    </thead class="border-b">
                    <tbody>
                    @foreach($mediaorders as $mediaorder)

                    <?php

                    $jk = $mediaorder->jenis_kontrak;
                    if ($jk == "N"){
                        $jkontrak = "Non Barter";
                    } if ($jk == "B"){
                        $jkontrak = "Barter";
                    } if ($jk == "S") {
                        $jkontrak = "Barter & Non Barter";
                    }

                    $jb = $mediaorder->jbarter;
                    if ($jb == "1"){
                        $jenis_barter = "Asset";
                    }
                    if ($jb == "2"){
                        $jenis_barter = "Promosi";
                    }
                    if ($jb == "3"){
                        $jenis_barter = "Promosi (Dijual)";
                    }
                    if ($jb == "4") {
                        $jenis_barter = "Barter Lainnya";
                    } 
                    if ($jb == "0") {
                        $jenis_barter = "~";
                    }

                    $sp = $mediaorder->status_ppn;
                    if ($sp == "1"){
                        $ppn_status ="Termasuk PPN";
                    }
                    if ($sp == "0"){
                        $ppn_status = "Tanpa PPN";
                    }

                    $an = $mediaorder->atasnama;
                    if ($an == "K"){
                        $atas_nama = "Klien";
                    }
                    if ($an == "B"){
                        $atas_nama = "Biro";
                    }

                    $j_an = $mediaorder->j_atasnama;
                    if ($j_an == "K"){
                        $j_atas_nama = "Klien";
                    }
                    if ($j_an == "B"){
                        $j_atas_nama = "Biro";
                    }

                    $kib = $mediaorder->flag_paket;
                    if ($kib == "1"){
                        $ket_iklan_bundling = "Yes";
                    }
                    if ($kib == "0"){
                        $ket_iklan_bundling = "No";
                    }

                    $psp = $mediaorder->flag_pktnoseri;
                    if ($psp == "*"){
                        $penomoran_seri_pajak = "Bundling";
                    }
                    if ($psp == ""){
                        $penomoran_seri_pajak = "Per Invoice";
                    }

                    ?>

                        <tr class="bg-white border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-left text-xs font-medium text-gray-900">
                            Kode Order : <b>{{ $mediaorder->k_order }}</b> <br/>No Kontrak : <b>{{ $mediaorder->no_kontrak }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Biro : <b>{{ $mediaorder->n_biro }}</b> <br/>Klien : <b>{{ $mediaorder->n_klien }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Jenis Kontrak : <b>{{ $jkontrak }}</b> <br/>Keterangan : <b>{{ $jenis_barter }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Nilai Kontrak : <b>{{ $mediaorder->nilai }}</b> <br/>Status Pajak : <b>{{ $ppn_status }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Nilai Barter : <b>{{ $mediaorder->nilai_barter }}</b> ~~ Nilai Non Barter : <b>{{ $mediaorder->nilai_nonbarter }}</b> <br/>
                            Nilai Real : <b>{{ $mediaorder->nilai_real }}</b> ~~ Nilai PPN 11% : <b>{{ $mediaorder->nilai_ppn }}</b> 
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            User Input : <b>{{ $mediaorder->user_input }}</b> <br/> Tgl Input : <b>{{ $mediaorder->tgl_input }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            User Update : <b>{{ $mediaorder->user_update }}</b> <br/> Tgl Input : <b>{{ $mediaorder->tgl_update }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Pengiklan Atas Nama : <b>{{ $atas_nama }}</b> <br/> Jatuh Tempo Atas Nama : <b>{{ $j_atas_nama }}</b> (<b>{{ $mediaorder->jtempo }}</b> hari)
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Nama Produk : <b>{{ $mediaorder->n_sproduk }}</b> <br/> Jenis Industri : <b>{{ $mediaorder->n_indus }}</b> 
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Group Head : <b>{{ $mediaorder->n_gruphead }}</b> <br/> Account Executive : <b>{{ $mediaorder->n_sales }}</b> 
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Ket Iklan Bundling : <b>
                                @if($ket_iklan_bundling == 'Yes')
                                Yes
                                @else
                                {{ $ket_iklan_bundling }}
                                @endif    
                            </b> <br/> Penomoran Seri Pajak : <b>{{ $penomoran_seri_pajak }}</b> 
                            </td>
                        </tr class="bg-white border-b">
                    @endforeach
                    </tbody>
                  </table>
                  <p class="text-sm font-light leading-relaxed mt-0 mb-4 text-gray-800">Showing 50 last data record...</p>
                </div>
              </div>
            </div>
          </div>
    </div>

</x-app-layout>

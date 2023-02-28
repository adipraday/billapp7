<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tempo | Media Order</title>
    <style>
        body {
            background-color: lightgray !important;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Media Order') }}
            </h2>
        </x-slot>

        <br/>

        <div class="container mx-auto">
            <a href="{{ route('addmediaorder') }}">
                <button class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    + Tambah Media Order
                </button>
            </a>
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
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2">
                            Aksi
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
                                    Yes ~ <a class="text-blue-500" href="javascript:void(0)" id="btn-opt-sbu" data-id="{{ $mediaorder->k_order }}">Input Order</a>
                                    @else
                                    {{ $ket_iklan_bundling }}
                                    @endif    
                                </b> <br/> Penomoran Seri Pajak : <b>{{ $penomoran_seri_pajak }}</b> 
                                </td>
                                <td class="text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                                  <a href="{{ url('mediaorder/edit/'.$mediaorder->k_order.'/') }}" id="btn-edit-post" data-id="{{ $mediaorder->k_order }}">
                                      <button class="inline-block px-4 py-1.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                          Edit
                                      </button>
                                  </a> 
                                  <a href="javascript:void(0)" id="btn-delete-mediaorder" data-id="{{ $mediaorder->k_order }}">
                                      <button class="inline-block px-4 py-1.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                          Delete
                                      </button>
                                  </a>
                                  <?php $k_order = $mediaorder->k_order; ?>
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
        @include('mediaorder.components.deletemediaorder')
        @include('mediaorder.components.optordermodal')
    </x-app-layout>
</body>
</html>



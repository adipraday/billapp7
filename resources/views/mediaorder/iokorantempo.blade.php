<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tempo || Input Order Koran Tempo</title>
    <style>
        body {
            background-color: lightgray !important;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>

<x-app-layout>

    @foreach($mediaorders as $mediaorder)
        <?php 
            $k_order = $mediaorder->k_order;
            $no_kontrak = $mediaorder->no_kontrak;
            $nilai = $mediaorder->nilai;
            $k_biro = $mediaorder->k_biro;
            $n_biro = $mediaorder->n_biro;
            $k_klien = $mediaorder->k_klien;
            $n_klien = $mediaorder->n_klien;
            $jenis_kontrak = $mediaorder->jenis_kontrak;
            $jbarter = $mediaorder->jbarter;
            $status_ppn = $mediaorder->status_ppn;
            $nilai_nonbarter = $mediaorder->nilai_nonbarter;
            $nilai_barter = $mediaorder->nilai_barter;
            $nilai_ppn = $mediaorder->nilai_ppn;
            $nilai_real = $mediaorder->nilai_real;
            $user_input = $mediaorder->user_input; 
            $tgl_input = $mediaorder->tgl_input;
            $user_update = $mediaorder->user_update;
            $tgl_update = $mediaorder->tgl_update;
            $atasnama = $mediaorder->atasnama;
            $j_atasnama = $mediaorder->j_atasnama;
            $k_produk = $mediaorder->k_produk;
            $k_sproduk = $mediaorder->k_sproduk;
            $n_sproduk = $mediaorder->n_sproduk;
            $k_grup = $mediaorder->k_grup;
            $k_indus = $mediaorder->k_indus;
            $n_indus = $mediaorder->n_indus;
            $k_sales = $mediaorder->k_sales;
            $flag_paket = $mediaorder->flag_paket;
            $flag_pktnoseri = $mediaorder->flag_pktnoseri;
            $user_input = $mediaorder->user_input;
            $n_gruphead = $mediaorder->n_gruphead;
            $n_sales = $mediaorder->n_sales;
            $jtempo = $mediaorder->jtempo;

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
    @endforeach

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Order Koran Tempo :') }} {{ $k_order }}
        </h2>
    </x-slot>

<br/>

<div class="container">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center" id="lastupdatetable">
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
                        <tr class="bg-white border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-left text-xs font-medium text-gray-900">
                            Kode Order : <b>{{ $k_order }}</b> <br/>No Kontrak : <b>{{ $no_kontrak }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Biro : <b>{{ $n_biro }}</b> <br/>Klien : <b>{{ $n_klien }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Jenis Kontrak : <b>{{ $jkontrak }}</b> <br/>Keterangan : <b>{{ $jenis_barter }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Nilai Kontrak : <b>{{ $nilai }}</b> <br/>Status Pajak : <b>{{ $ppn_status }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Nilai Barter : <b>{{ $nilai_barter }}</b> ~~ Nilai Non Barter : <b>{{ $nilai_nonbarter }}</b> <br/>
                            Nilai Real : <b>{{ $nilai_real }}</b> ~~ Nilai PPN 11% : <b>{{ $nilai_ppn }}</b> 
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            User Input : <b>{{ $user_input }}</b> <br/> Tgl Input : <b>{{ $tgl_input }}</b>
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Pengiklan Atas Nama : <b>{{ $atas_nama }}</b> <br/> Jatuh Tempo Atas Nama : <b>{{ $j_atas_nama }}</b> (<b>{{ $jtempo }}</b> hari)
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Nama Produk : <b>{{ $n_sproduk }}</b> <br/> Jenis Industri : <b>{{ $n_indus }}</b> 
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Group Head : <b>{{ $n_gruphead }}</b> <br/> Account Executive : <b>{{ $n_sales }}</b> 
                            </td>
                            <td class="text-left text-xs text-gray-900 px-6 py-2 whitespace-nowrap">
                            Ket Iklan Bundling : <b>{{ $ket_iklan_bundling }}</b> <br/> Penomoran Seri Pajak : <b>{{ $penomoran_seri_pajak }}</b> 
                            </td>
                        </tr class="bg-white border-b">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><br/><br/>

<div class="container">

    <div class="flex flex-row">

        <div class="basis-1/3">

          <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <label
                  for="judul" class="form-label inline-block mb-2 text-gray-700 text-sm">
                  Judul :
                </label>
                <input
                type="text"
                class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  name="judul" id="judul" placeholder="Judul"/>
            </div>
        </div>

        <div class="flex justify-center">
          <div class="mb-3 xl:w-96">
              <label
                for="cara_bayar" class="form-label inline-block mb-2 text-gray-700 text-sm">
                Cara Bayar :
              </label>
              <select
                class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Cara Bayar" name="cara_bayar" id="cara_bayar">
                <option>Pilih Cara Bayar</option>
                <option value="1">Pembayaran Ditunda</option>
                <option value="2">Pembayaran Uang Muka</option>
                <option value="3">Pembayaran Cash</option>
              </select>
          </div>
        </div>

        <div class="flex justify-center">
          <div class="mb-3 xl:w-96">
              <label
                for="kolom_tinggi" class="form-label inline-block mb-2 text-gray-700 text-sm">
                Jumlah Kolom & Tinggi :
              </label>
              <input
              type="number"
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                name="jumlah_kolom" id="jumlah_kolom" placeholder="Jumlah Kolom"/>
              <input
              type="number"
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                name="tinggi" id="tinggi" placeholder="Tinggi"/>  
          </div>
        </div>

        <div class="flex justify-center">
          <div class="mb-3 xl:w-96" id="ket_muat_order">
              <label
                for="ket_muat_order" class="form-label inline-block mb-2 text-gray-700 text-sm">
                Pilih Jenis Pemuatan :
              </label>
              <div class="ml-3">
                <div class="form-check mr-5">
                    <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                    transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="radio" id="ket_muat_order" name="ket_muat_order" value="1" >
                    <label class="form-check-label inline-block text-gray-800 text-sm" for="ket_muat_order">
                    Tanggal
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                    transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="radio" id="ket_muat_order" name="ket_muat_order" value="2">
                    <label class="form-check-label inline-block text-gray-800 text-sm" for="ket_muat_order">
                    Periode
                    </label>
                </div>
              </div>
          </div>
        </div><br/>

        <div class="flex justify-center">
          <div class="mb-3 xl:w-96">
              <label
                for="tgl_order" class="form-label inline-block mb-2 text-gray-700 text-sm">
                Tanggal Order :
              </label>
              <label
                for="tgl_order" class="form-label inline-block mb-2 text-gray-700 text-sm">
                <input
              type="date"
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                name="tgl_order" id="tgl_order" placeholder="Tanggal Order"/>
              </label>
          </div>
        </div>

        <div class="flex justify-left ml-5">
          <label
                for="periode_order" class="form-label inline-block mb-2 text-gray-700 text-sm">
                Periode Order :
          </label>
        </div>

        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <label
                  for="periode_order1" class="form-label inline-block mb-2 text-gray-700 text-sm">
                  Start
                  <input
                type="date"
                class="form-control block w-32 px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  name="periode_order_start1" id="periode_order_start1" placeholder="Awal Periode Order"/>
                </label>
                <label
                  for="periode_order1" class="form-label inline-block mb-2 text-gray-700 text-sm">
                  End
                  <input
                type="date"
                class="form-control block w-32 px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  name="periode_order_akhir1" id="periode_order_akhir1" placeholder="Akhir Periode Order"/>
                </label>
                <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 
                    hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                    id="btn-add-periode-2">
                        +
                </button>
            </div>
        </div>

        <div id="periode-2" class="flex justify-center invisible">
          <div class="mb-3 xl:w-96">
              <label
                for="periode_order2" class="form-label inline-block mb-2 text-gray-700 text-sm">
                Start
                <input
              type="date"
              class="form-control block w-32 px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                name="periode_order_start2" id="periode_order_start2" placeholder="Awal Periode Order"/>
              </label>
              <label
                for="periode_order" class="form-label inline-block mb-2 text-gray-700 text-sm">
                End
                <input
              type="date"
              class="form-control block w-32 px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                name="periode_order_akhir2" id="periode_order_akhir2" placeholder="Akhir Periode Order"/>
              </label>
              <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 
                  hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                  id="btn-add-periode-3">
                      +
              </button>
              <button type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 
                  hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                  id="btn-remove-periode-2">
                      -
              </button>
          </div>
      </div>

      <div id="periode-3" class="flex justify-center invisible">
        <div class="mb-3 xl:w-96">
            <label
              for="periode_order3" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Start
              <input
            type="date"
            class="form-control block w-32 px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
              rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              name="periode_order_start3" id="periode_order_start3" placeholder="Awal Periode Order"/>
            </label>
            <label
              for="periode_order3" class="form-label inline-block mb-2 text-gray-700 text-sm">
              End
              <input
            type="date"
            class="form-control block w-32 px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
              rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              name="periode_order_akhir3" id="periode_order_akhir3" placeholder="Akhir Periode Order"/>
            </label>
            <button type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 
                hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                id="btn-remove-periode-3">
                    -
            </button>
        </div>
    </div>

        <div class="flex justify-center">
          <div class="mb-3 xl:w-96">
              <label
                for="jumlah_tayang" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                Jumlah Tayang :
              </label>
              <input
                type="number"
                class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  name="jumlah_tayang" id="jumlah_tayang" placeholder="Jumlah Tayang" readonly/>
          </div>
        </div> 

          {{-- <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <label
                  for="jumlah_tayang" class="form-label inline-block mb-2 text-gray-700 text-sm">
                  Jumlah Tayang :
                </label>
                <input
                type="number"
                class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  name="jumlah_tayang" id="jumlah_tayang" placeholder="Jumlah Tayang"/>
            </div>
          </div> --}}

            {{-- <div class="flex justify-center">
                <div class="mb-3 xl:w-96" id="io_jinvoice">
                    <label
                      for="jenis_invoice" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Pilih Jenis Invoice :
                    </label>
                    <div class="form-check mr-5">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="jenis_invoice" id="jenis_invoice" value="*">
                        <label class="form-check-label inline-block text-gray-800" for="jenis_invoice">Check All</label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="jenis_invoice" id="jenis_invoice" value="*">
                        <label class="form-check-label inline-block text-gray-800" for="jenis_invoice">Custom</label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="jenis_invoice" id="jenis_invoice" value="*">
                        <label class="form-check-label inline-block text-gray-800" for="jenis_invoice">Perbulan</label>
                    </div>
                </div>
            </div><br/><br/> --}}
            
        </div>

        <div class="basis-1/3">

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="jenis_iklan" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Jenis Iklan :
                    </label>
                    <select
                      class="form-control block w-sm px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      placeholder="Jenis Iklan" name="jenis_iklan" id="jenis_iklan">
                      <option>Pilih Jenis Iklan</option>
                      @foreach($mjenis_koran as $mjeniskoran)
                        <option value="{{ $mjeniskoran->k_jenis }}">{{ $mjeniskoran->n_jenis }}</option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="rubrikasi" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Rubrikasi :
                    </label>
                    <select
                      class="form-control block w-sm px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      placeholder="Rubrikasi" name="rubrikasi" id="rubrikasi">
                      <option selected>Pilih Jenis Iklan</option>
                      @foreach($mrubrik_koran as $mrubrikkoran)
                        <option value="{{ $mrubrikkoran->k_rubrik }}">{{ $mrubrikkoran->n_rubrik }}</option>
                      @endforeach
                    </select>
                </div>
            </div> 

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="jenis_tarif" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                      Jenis Tarif :
                    </label>
                    <div class="ml-3">
                      <div class="form-check">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"  
                        type="radio" name="jenis_tarif" id="jenis_tarif" value="tarif standart">
                        <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="jenis_tarif">Tarif Standart</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="jenis_tarif" id="jenis_tarif" value="tarif khusus">
                        <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="jenis_tarif">Tarif Khusus</label>
                      </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="layout" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Layout :
                    </label>
                    <select
                      class="form-control block w-sm px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      placeholder="Layout" name="layout" id="layout">
                      <option value="">Pilih Layout</option>
                      @foreach($mtarif_koran as $mtarifkoran)
                        <option class="{{ $mtarifkoran->tarif }}" value="{{ $mtarifkoran->k_tarif }}">{{ $mtarifkoran->n_tarif }}</option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="ket_display" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                    Ket Display :
                  </label>
                  <div class="ml-3">
                    <div class="form-check">
                      <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                      transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"  
                      type="radio" name="ket_display" id="ket_display" value="black and white">
                      <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="ket_display">Black & White</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                      transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                      type="radio" name="ket_display" id="ket_display" value="full color">
                      <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="ket_display">Full Color</label>
                    </div>
                  </div>
              </div>
            </div>
            
            <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="jumlah_tayang" class="form-label inline-block mb-2 text-gray-700 text-sm">
                    Halaman :
                  </label>
                  <input
                  type="number"
                  class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                    rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    name="halaman" id="halaman" placeholder="Halaman"/>
              </div>
            </div>
            
            <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="diskon_dalam" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                    Diskon Dalam :
                  </label>
                  <div class="form-check ml-3">
                      <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                      transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                      type="radio" name="opt_diskon_dalam" id="opt_diskon_dalam" value="idr">
                      <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="opt_diskon_dalam">IDR</label>
                  </div>
                  <div class="form-check ml-3">
                      <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                      transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                      type="radio" name="opt_diskon_dalam" id="opt_diskon_dalam" value="persen">
                      <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="opt_diskon_dalam">Persen %</label>
                  </div>
                  <input
                  type="number"
                  class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  name="diskon_dalam" id="diskon_dalam" placeholder="Nominal Diskon Dalam"/>
              </div>
            </div>
            
        </div>

        <div class="basis-1/3">

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="tarif" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Tarif :
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="tarif" id="tarif" placeholder="Tarif"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="brutto" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Brutto :
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="brutto" id="brutto" placeholder="Brutto"/>
                </div>
            </div>
            
            <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="nominal_diskon_dalam" class="form-label inline-block mb-2 text-gray-700 text-sm">
                    Jumlah Diskon Dalam (IDR) :
                  </label>
                  <input
                  type="number"
                  class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                    rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    name="nominal_diskon_dalam" id="nominal_diskon_dalam" placeholder="Jumlah Diskon Dalam"/>
              </div>
            </div>
            
            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="netto" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                      Netto :
                    </label>
                    <input
                      type="number"
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="netto" name="netto" placeholder="Netto"/>
                </div>
            </div>
            
            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="ppn" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                      PPN 11% :
                    </label>
                    <input
                      type="number"
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="ppn" id="ppn" placeholder="PPN 11%"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="tagihan" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                      Tagihan :
                    </label>
                    <input
                      type="number"
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="tagihan" id="tagihan" placeholder="Tagihan"/>
                </div>
            </div>
            
            <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="biaya_produksi" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                    Biaya Produksi :
                  </label>
                  <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="biaya_produksi" id="biaya_produksi" placeholder="Masukkan Biaya Produksi"/>
              </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="keterangan" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Keterangan :
                    </label>
                    <textarea
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="keterangan" id="keterangan" rows="3" placeholder="Keterangan"></textarea>
                </div>
            </div><br/><br/><br/>
            
            <?php
            $tgl = date('Y-m-d');
            $jam = date('h:i:s');
            ?>

            <input type="hidden" name="k_order" id="k_order" value="{{ $k_order }}"/>
            <input type="hidden" name="k_biro" id="k_biro" value="{{ $k_biro }}"/>
            <input type="hidden" name="k_klien" id="k_klien" value="{{ $k_klien }}"/>
            <input type="hidden" name="atasnama" id="atasnama" value="{{ $atasnama }}"/>
            <input type="hidden" name="j_atasnama" id="j_atasnama" value="{{ $j_atasnama }}"/>
            <input type="hidden" name="k_indus" id="k_indus" value="{{ $k_indus }}"/>
            <input type="hidden" name="jenis_kontrak" id="jenis_kontrak" value="{{ $jenis_kontrak }}"/>
            <input type="hidden" name="jbarter" id="jbarter" value="{{ $jbarter }}"/>
            <input type="hidden" name="tgl_input" id="tgl_input" value="{{ $tgl }}"/>
            <input type="hidden" name="jam_input" id="jam_input" value="{{ $jam }}"/>
            <input type="hidden" name="user_input" id="user_input" value="{{ Auth::user()->name; }}"/>
            <input type="hidden" name="k_produk" id="k_produk" value="{{ $k_produk }}"/>
            <input type="hidden" name="k_sproduk" id="k_sproduk" value="{{ $k_sproduk }}"/>
            <input type="hidden" name="k_sales" id="k_sales" value="{{ $k_sales }}"/>
            <input type="hidden" name="k_grup" id="k_grup" value="{{ $k_grup }}"/>
            <input type="hidden" name="materai" id="materai" value="0"/>
            <input type="hidden" name="discp_out" id="discp_out" value="0"/>
            <input type="hidden" name="discr_out" id="discr_out" value="0"/>
            <input type="hidden" name="sts_pajak" id="sts_pajak" value="0"/>
            <input type="hidden" name="stat_validasi" id="stat_validasi" value="0"/>


            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 
                    hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                    id="saveorderkorantempo">
                        Simpan
                    </button>
                    <button class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg 
                    focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">
                    Reset / Batal
                    </button>
                </div>
            </div>

        </div>

    </div>

</div><br/>

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-center">
            <thead class="border-b bg-gray-500">
              <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  Kode Order
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  No. Media Order
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  Judul
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  Detail
                </th>
              </tr>
            </thead class="border-b">
            <tbody>
              @foreach($iklan_koran_tempo as $iklankorantempo)
              <tr class="bg-white border-b">
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ $iklankorantempo->nik }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ $iklankorantempo->k_order }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  {{ $iklankorantempo->judul }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  <a href="javascript:void(0)" id="btn-detail-omtimbm" data-id="{{ $iklankorantempo->nik }}"
                    class="inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 
                  hover:shadow-lg focus:bg-blue-800 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-lg transition duration-150 ease-in-out">
                  Detail Order
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>

    $(function(){

        $("#ket_muat_order").change(function(){     
            var jk = $('input[name=ket_muat_order]:checked').val();
            if(jk == '1') {
                $('#tgl_order').prop('disabled', false);
                $('#periode_order_start1').prop('disabled', true);
                $('#periode_order_akhir1').prop('disabled', true);
                $("#btn-add-periode-2").removeClass('visible').addClass('invisible');
            } else {
                $('#tgl_order').prop('disabled', true);
                $('#periode_order_start1').prop('disabled', false);
                $('#periode_order_akhir1').prop('disabled', false);
                $("#btn-add-periode-2").removeClass('invisible').addClass('visible');
            }
        });

        $("#tgl_order").change(function(){
            var startDate = $('#tgl_order').val();
            var endDate = $('#tgl_order').val();

            var start = new Date(startDate);
            var end = new Date(endDate);

            var diffDate = (end - start) / (1000 * 60 * 60 * 24);
            var jt = Math.round(diffDate);
            var jtayang = jt + 1;
            $('#jumlah_tayang').val(jtayang);
        });
        
        $("#layout").change(function(){  
          var jtarif = $('input[name=jenis_tarif]:checked').val();  
          var tarif_koran = $("#layout option:selected").attr("class");
          var tarif_khusus = 0;
          if(jtarif == "tarif standart"){
            $('#tarif').prop('readonly', true).val(tarif_koran);
          }
          if(jtarif == "tarif khusus"){
            $('#tarif').prop('readonly', false).val(tarif_khusus);
          }
        }); 
        
        $("#halaman").change(function(){
          var tarif = $('#tarif').val();
          var jumlah_tayang = $('#jumlah_tayang').val();
          var halaman = $('#halaman').val();
          var jumlah1 = tarif * halaman;
          var brutto = jumlah1 * jumlah_tayang;
          $('#brutto').val(brutto);
        });  

        $("#diskon_dalam").change(function(){
          var opt_diskon_dalam = $('input[name=opt_diskon_dalam]:checked').val(); 
          if(opt_diskon_dalam == 'idr'){
            var diskon_dalam = $('#diskon_dalam').val();
            var brutto = $('#brutto').val();
            var netto = brutto - diskon_dalam;
            var ppn = netto * 11 / 100;
            var tagihan = netto + ppn;
            $('#nominal_diskon_dalam').val(diskon_dalam);
            $('#netto').val(netto);
            $('#ppn').val(ppn);
            $('#tagihan').val(tagihan);
          }
          if(opt_diskon_dalam == 'persen'){
            var persen_diskon = $('#diskon_dalam').val();
            var brutto = $('#brutto').val();
            var diskon_dalam = brutto * persen_diskon / 100;
            var netto = brutto - diskon_dalam;
            var ppn = netto * 11 / 100;
            var tagihan = netto + ppn;
            $('#nominal_diskon_dalam').val(diskon_dalam);
            $('#netto').val(netto);
            $('#ppn').val(ppn);
            $('#tagihan').val(tagihan);
          }
        }); 

    });

    $(document).ready(function(){
      $("#btn-add-periode-2").click(function(){
          $("#periode-2").removeClass('invisible').addClass('visible');
          $("#btn-add-periode-2").addClass('invisible');
          $("#btn-remove-periode-2").removeClass('invisible').addClass('visible');
          $("#btn-add-periode-3").removeClass('invisible').addClass('visible');
      });
      $("#btn-remove-periode-2").click(function(){
          $("#periode-2").removeClass('visible').addClass('invisible');
          $("#btn-add-periode-2").removeClass('invisible').addClass('visible');
          $("#btn-remove-periode-2").removeClass('visible').addClass('invisible');
          $("#btn-add-periode-3").removeClass('visible').addClass('invisible');
      });
      $("#btn-add-periode-3").click(function(){
          $("#periode-3").removeClass('invisible').addClass('visible');
          $("#btn-add-periode-3").removeClass('visible').addClass('invisible');
          $("#btn-remove-periode-2").removeClass('visible').addClass('invisible');
          $("#btn-remove-periode-3").removeClass('invisible').addClass('visible');
      });
      $("#btn-remove-periode-3").click(function(){
          $("#periode-3").removeClass('visible').addClass('invisible');
          $("#btn-add-periode-3").removeClass('invisible').addClass('visible');
          $("#btn-remove-periode-2").removeClass('invisible').addClass('visible');
          $("#btn-remove-periode-3").removeClass('visible').addClass('invisible');
      });
    });

    $("#periode_order_akhir1").change(function(){
            var startDate = $('#periode_order_start1').val();
            var endDate = $('#periode_order_akhir1').val();
            var start = new Date(startDate);
            var end = new Date(endDate);
            var diffDate = (end - start) / (1000 * 60 * 60 * 24);
            var jt = Math.round(diffDate);
            var jtayang1 = jt + 1;
            $('#jumlah_tayang').val(jtayang1);
    });

    $("#periode_order_akhir2").change(function(){
            var startDate = $('#periode_order_start1').val();
            var endDate = $('#periode_order_akhir1').val();
            var start = new Date(startDate);
            var end = new Date(endDate);
            var diffDate = (end - start) / (1000 * 60 * 60 * 24);
            var jt = Math.round(diffDate);
            var jtayang1 = jt + 1;

            var startDate2 = $('#periode_order_start2').val();
            var endDate2 = $('#periode_order_akhir2').val();
            var start2 = new Date(startDate2);
            var end2 = new Date(endDate2);
            var diffDate2 = (end2 - start2) / (1000 * 60 * 60 * 24);
            var jt2 = Math.round(diffDate2);
            var jtayang2 = jt2 + 1;

            var jtayang = jtayang1 + jtayang2;

            $('#jumlah_tayang').val(jtayang);
    });

    $("#periode_order_akhir3").change(function(){
            var startDate = $('#periode_order_start1').val();
            var endDate = $('#periode_order_akhir1').val();
            var start = new Date(startDate);
            var end = new Date(endDate);
            var diffDate = (end - start) / (1000 * 60 * 60 * 24);
            var jt = Math.round(diffDate);
            var jtayang1 = jt + 1;

            var startDate2 = $('#periode_order_start2').val();
            var endDate2 = $('#periode_order_akhir2').val();
            var start2 = new Date(startDate2);
            var end2 = new Date(endDate2);
            var diffDate2 = (end2 - start2) / (1000 * 60 * 60 * 24);
            var jt2 = Math.round(diffDate2);
            var jtayang2 = jt2 + 1;

            var startDate3 = $('#periode_order_start3').val();
            var endDate3 = $('#periode_order_akhir3').val();
            var start3 = new Date(startDate3);
            var end3 = new Date(endDate3);
            var diffDate3 = (end3 - start3) / (1000 * 60 * 60 * 24);
            var jt3 = Math.round(diffDate3);
            var jtayang3 = jt3 + 1;

            var jtayang = jtayang1 + jtayang2 + jtayang3;

            $('#jumlah_tayang').val(jtayang);
    });

  </script>

  <script>

    //action save order
    $('#saveorderkorantempo').click(function(e) {
      e.preventDefault();

      var opt_disc_in = $('input[name=opt_diskon_dalam]:checked').val(); 

      if(opt_disc_in == 'idr'){
        var discr_in1 = $('#diskon_dalam').val();
        var discp_in1 = 0;
      }else{
        var discr_in1 = 0;
        var discp_in1 = $('#diskon_dalam').val();
      }

      //define variable
      let token   = $("meta[name='csrf-token']").attr("content");
      console.log('token :', token);
      let k_order         = $('#k_order').val();
      console.log('k_order :', k_order);
      let k_biro          = $('#k_biro').val();
      console.log('k_biro :', k_biro);
      let k_klien         = $('#k_klien').val();
      console.log('k_klien', k_klien);
      let atasnama        = $('#atasnama').val();
      console.log('atasnama :', atasnama);
      let j_atasnama      = $('#j_atasnama').val();
      console.log('j_atasnama :', j_atasnama);
      let k_indus         = $('#k_indus').val();
      console.log('k_indus :', k_indus);
      let judul           = $('#judul').val();
      console.log('judul :', judul);
      let k_jenis         = $('#jenis_iklan').val();  
      console.log('k_jenis :',k_jenis);
      let k_rubrik        = $('#rubrikasi').val();
      console.log('k_rubrik :',k_rubrik);
      let k_tarif         = $('#layout').val();
      console.log('k_tarif :',k_tarif);
      let warna           = $('#ket_display').val();
      console.log('warna :',warna);
      let hal             = $('#halaman').val();
      console.log('hal :',hal);
      let jmuat           = $('#jumlah_tayang').val();
      console.log('jmuat :', jmuat);
      let jkolom          = $('#jumlah_kolom').val();
      console.log('jkolom :', jkolom);
      let jtinggi         = $('#tinggi').val();
      console.log('jtinggi :', jtinggi);
      let jtarif          = $("#layout option:selected").attr("class"); 
      console.log('jtarif :', jtarif);
      let tarif           = $('#tarif').val();
      console.log('tarif :', tarif);
      let tharga          = $('#brutto').val();
      console.log('tharga :', tharga);
      let discp_in        = discp_in1;
      console.log('discp_in :', discp_in);
      let discr_in        = discr_in1;
      console.log('discr_in :', discr_in);
      let nharga          = $('#brutto').val();
      console.log('nharga :', nharga);
      let ppnp            = 11;
      console.log('ppnp :', ppnp);
      let ppnr            = $('#ppn').val();
      console.log('ppnr :', ppnr);
      let materai         = 0;
      console.log('materai :', materai);
      let ttagih          = $('#tagihan').val();   
      console.log('ttagih :', ttagih);
      let discp_out       = 0;
      console.log('discp_out :', discp_out);
      let discr_out       = 0;
      console.log('discr_out :', discr_out);
      let sts_pajak       = 0;
      console.log('sts_pajak :', sts_pajak);
      let type            = $('#jenis_kontrak').val();
      console.log('type :', type);
      let sts_barter      = $('#jbarter').val();
      console.log('sts_barter :', sts_barter);
      let tgl_input       = $('#tgl_input').val();
      console.log('tgl_input :', tgl_input);
      let jam_input       = $('#jam_input').val();
      console.log('jam_input :', jam_input);
      let user_input      = $('#user_input').val();
      console.log('user_input :', user_input);
      let note            = $('#keterangan').val();
      console.log('note :', note);
      let cara_bayar      = $('#cara_bayar').val();
      console.log('cara_bayar :', cara_bayar);
      let stat_validasi   = 0;
      console.log('stat_validasi :', stat_validasi);
      let k_produk        = $('#k_produk').val();
      console.log('k_produk :', k_produk);
      let k_sproduk       = $('#k_sproduk').val();
      console.log('k_sproduk :', k_sproduk);
      let k_sales         = $('#k_sales').val();
      console.log('k_sales :', k_sales);
      let k_grup          = $('#k_grup').val();
      console.log('k_grup :', k_grup);

      //ajax
      $.ajax({

          url: `/mediaorder/saveorderkorantempo`,
          type: "POST",
          cache: false,
          data: {
              "k_order": k_order,
              "k_biro": k_biro,
              "k_klien": k_klien,
              "atasnama": atasnama,
              "j_atasnama": j_atasnama,
              "k_indus": k_indus, 
              "judul": judul,           
              "k_jenis": k_jenis,
              "k_rubrik": k_rubrik,
              "k_tarif": k_tarif,   
              "warna": warna,
              "hal": hal, 
              "jmuat": jmuat, 
              "jkolom": jkolom, 
              "jtinggi": jtinggi,  
              "jtarif": jtarif,   
              "tarif": tarif,   
              "tharga": tharga,    
              "discp_in": discp_in,   
              "discr_in": discr_in,   
              "nharga": nharga,  
              "ppnp": ppnp,    
              "ppnr": ppnr, 
              "materai": materai, 
              "ttagih": ttagih, 
              "discp_out": discp_out,
              "discr_out": discr_out, 
              "sts_pajak": sts_pajak,  
              "type": type,       
              "sts_barter": sts_barter,   
              "tgl_input": tgl_input,  
              "jam_input": jam_input,   
              "user_input": user_input, 
              "note": note,         
              "cara_bayar": cara_bayar, 
              "stat_validasi": stat_validasi,  
              "k_produk": k_produk,    
              "k_sproduk": k_sproduk,  
              "k_sales": k_sales,    
              "k_grup": k_grup,
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

            // //append to table
            // $('#table-inputorder').prepend(inputorder);
              
            //clear form

            $('#judul').val('');
            $('#cara_bayar').val('');
            $('#jumlah_kolom').val('');
            $('#tinggi').val('');
            $('input[name="ket_muat_order"]').prop('checked', false);
            $('#tgl_order').val('');
            $('#periode_order_start').val('');
            $('#periode_order_akhir').val('');
            $('#jumlah_tayang').val('');
            $('#jenis_iklan').val('');
            $('#rubrikasi').val('');
            $('input[name="jenis_tarif"]').prop('checked', false);
            $('#layout').val('');
            $('input[name="ket_display"]').prop('checked', false);
            $('#halaman').val('');
            $('input[name="opt_diskon_dalam"]').prop('checked', false);
            $('#diskon_dalam').val('');
            $('#tarif').val('');
            $('#brutto').val('');
            $('#nominal_diskon_dalam').val('');
            $('#netto').val('');
            $('#ppn').val('');
            $('#tagihan').val('');
            $('#biaya_produksi').val('');
            $('textarea#keterangan').val('');

            location.reload();

          }

      });

    });

  </script>

</x-app-layout>

</body>
</html>
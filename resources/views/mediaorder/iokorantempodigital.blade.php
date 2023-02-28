<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tempo || Input Order Majalah Tempo Indonesia</title>
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
            {{ __('Input Order Koran Tempo Digital :') }} {{ $k_order }}
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
                      for="ket_waktu_order" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                      Ket Waktu Order :
                    </label>
                    <div class="ml-3">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"  
                        type="radio" name="ket_waktu_order" id="ket_waktu_order" value="tgl">
                        <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="inlineRadio10">Tanggal</label>
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="ket_waktu_order" id="ket_waktu_order" value="periode">
                        <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="inlineRadio20">Periode</label>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="periode_order" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Periode Order :
                    </label>
                    <input
                    type="date"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="periode_order_start" id="periode_order_start" placeholder="Awal Periode Order"/>
                    <input
                    type="date"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="periode_order_akhir" id="periode_order_akhir" placeholder="Akhir Periode Order"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="tgl_order" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Tanggal Order :
                    </label>
                    <input
                    type="date"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="tgl_order" id="tgl_order" placeholder="Tanggal Order"/>
                </div>
            </div>

            <div class="flex justify-center">
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
            </div>

            <div class="flex justify-center">
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
            </div><br/><br/>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <button type="button" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 
                    hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out" 
                    id="#">
                        Custom Invoice >>
                    </button>
                    <button type="button" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 
                    hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out" 
                    id="#">
                        Invoice Perbulan >>
                    </button>
                </div>
            </div>
            
        </div>

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
                      for="halaman" class="form-label inline-block mb-2 text-gray-700 text-sm">
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
                      for="jenis_iklan" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Jenis Iklan :
                    </label>
                    <select
                      class="form-control block w-sm px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      placeholder="Jenis Iklan" name="jenis_iklan" id="jenis_iklan">
                      <option selected>Pilih Jenis Iklan</option>
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
                      name="tinggi id="tinggi" placeholder="Tinggi"/>  
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="jenis_tarif" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                      Jenis Tarif :
                    </label>
                    <div class="ml-3">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"  
                        type="radio" name="jenis_tarif" id="jenis_tarif" value="tarif standart">
                        <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="jenis_tarif">Tarif Standart</label>
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="jenis_tarif" id="jenis_tarif" value="tarif khusus">
                        <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="jenis_tarif">Tarif Khusus</label>
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
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"  
                        type="radio" name="ket_display" id="ket_display" value="black and white">
                        <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="ket_display">Black & White</label>
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="ket_display" id="ket_display" value="full color">
                        <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="ket_display">Full Color</label>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="diskon_dalam" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                      Diskon Dalam :
                    </label>
                    <div class="ml-3">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="opt_diskon_dalam" id="opt_diskon_dalam" value="idr">
                        <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="opt_diskon_dalam">IDR</label>
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
                      for="netto" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                      Netto :
                    </label>
                    <input
                      type="number"
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="netto" name="netto" placeholder="Masukkan Netto"/>
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
                        name="biaya_produksi" id="biaya_produksi" placeholder="Biaya Produksi"/>
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
            </div><br/><br/>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 
                    hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                    id="#">
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
                  No. Edisi
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  No. Kwitansi
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  Judul
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  Action
                </th>
              </tr>
            </thead class="border-b">
            <tbody>
              <tr class="bg-white border-b">
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  #
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  #
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  #
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  <button class="inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 
                  hover:shadow-lg focus:bg-blue-800 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-lg transition duration-150 ease-in-out">
                      Detail
                  </button>
                  <button class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-900 
                  hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-900 active:shadow-lg transition duration-150 ease-in-out">
                      Batal
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

</x-app-layout>

</body>
</html>
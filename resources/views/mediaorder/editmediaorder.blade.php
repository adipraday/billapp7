<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tempo || Add Media Order</title>
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

    @foreach($mediaorders as $mediaorder)
        <?php 
            $k_order = $mediaorder->k_order;
            $no_kontrak = $mediaorder->no_kontrak;
            $nilai = $mediaorder->nilai;
            $k_biro = $mediaorder->k_biro;
            $k_klien = $mediaorder->k_klien;
            $jenis_kontrak = $mediaorder->jenis_kontrak;
            $jbarter = $mediaorder->jbarter;
            $status_ppn = $mediaorder->status_ppn;
            $nilai_nonbarter = $mediaorder->nilai_nonbarter;
            $nilai_barter = $mediaorder->nilai_barter;
            $nilai_ppn = $mediaorder->nilai_ppn;
            $nilai_real = $mediaorder->nilai_real;
            $atasnama = $mediaorder->atasnama;
            $k_sproduk = $mediaorder->k_sproduk;
            $k_grup = $mediaorder->k_grup;
            $k_indus = $mediaorder->k_indus;
            $k_sales = $mediaorder->k_sales;
            $flag_paket = $mediaorder->flag_paket;
            $flag_pktnoseri = $mediaorder->flag_pktnoseri;
            $user_input = $mediaorder->user_input;
            $_token = $mediaorder->token;
        ?>
    @endforeach

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Media Order : ') }} {{ $k_order }}
        </h2>
    </x-slot>

<br/>

<div class="container sm" id="f_mo">

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="no_kontrak" class="form-label inline-block mb-2 text-gray-700 text-sm">
              No. Kontrak 
            </label>
            <input
              type="text"
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="no_kontrak" placeholder="Masukkan No. Kontrak"/>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="k_biro" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Biro
            </label>
            <select
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              placeholder="Pilih Biro"
              id="k_biro">
              <option selected>Pilih Biro</option>
              @foreach($biros as $biro)
                <option value="{{ $biro->k_biro }}">{{ $biro->n_biro }}</option>
              @endforeach
            </select>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="k_klien" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Klien
            </label>
            <select
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              placeholder="Pilih Klien"
              id="k_klien">
              <option selected>Pilih Klien</option>
              @foreach($kliens as $klien)
                <option value="{{ $klien->k_klien }}">{{ $klien->n_klien }}</option>
              @endforeach
            </select>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96" id="jenis_kontrak">
            <label
              for="jenis_kontrak" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Jenis Kontrak
            </label>
            <div class="form-check mr-5">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" id="jenis_kontrak" name="jenis_kontrak" value="N" {{$jenis_kontrak == 'N'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="jenis_kontrak">
                Non Barter
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" id="jenis_kontrak" name="jenis_kontrak" value="B" {{$jenis_kontrak == 'B'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="jenis_kontrak">
                Barter
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" id="jenis_kontrak" name="jenis_kontrak" value="S" {{$jenis_kontrak == 'S'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="jenis_kontrak">
                Barter & Non Barter
                </label>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="jbarter" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Jenis Barter
            </label>
            <select
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              placeholder="Pilih Jenis Barter" id="jbarter" name="jbarter">
              <option id="opt_active">Pilih Jenis Barter</option>
              @foreach($opt_jenis_barter as $value_ojb=>$label_ojb)
                <option value="{{ $value_ojb }}">{{ $label_ojb }}</option>
              @endforeach
              <option id="opt_inactive" value="0">Non Active</option>
            </select>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96" id="status_ppn">
            <label
              for="status_ppn" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Keterangan Pajak
            </label>
            <div class="form-check mr-5">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" name="status_ppn" id="status_ppn" value="1" {{$status_ppn == '1'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="status_ppn">Termasuk PPN</label>
            </div>
            <div class="form-check">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" name="status_ppn" id="status_ppn" value="0" {{$status_ppn == '0'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="status_ppn">Tanpa PPN</label>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="nilai" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Nilai Kontrak
            </label>
            <input
              type="text"
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              placeholder="Masukkan Nilai Kontrak"
              id="nilai"/>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mx-3 mb-3 xl:w-96">
            <label
              for="nilai_nonbarter" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Nilai Non Barter
            </label>
            <input
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              type="text" id="nilai_nonbarter" name="nilai_nonbarter" placeholder="Nilai non barter" value="" readonly="readonly"/>
        </div>
        <div class="mx-3 mb-3 xl:w-96">
            <label
              for="nilai_barter" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Nilai Barter
            </label>
            <input
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              type="text" id="nilai_barter" name="nilai_barter" placeholder="Nilai Barter" value="" readonly="readonly"/>
        </div>
        <div class="mx-3 mb-3 xl:w-96">
            <label
              for="nilai_ppn" class="form-label inline-block mb-2 text-gray-700 text-sm">
              PPN 11%
            </label>
            <input
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              type="text" id="nilai_ppn" name="nilai_ppn" placeholder="ppn" value="" readonly="readonly"/>
        </div>
        <div class="mx-3 mb-3 xl:w-96">
            <label
              for="nilai_real" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Nilai Kontrak Real (ppn 11%)
            </label>
            <input
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              type="text" id="nilai_real" name="nilai_real" placeholder="Nilai real kontrak" value="" readonly="readonly"/>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96" id="atasnama">
            <label
              for="atasnama" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Pengiklan & Jatuh Tempo Atas Nama
            </label>
            <div class="form-check mr-5">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" name="atasnama" id="atasnama" value="B" {{$atasnama == 'B'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="atasnama">Biro</label>
            </div>
            <div class="form-check">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" name="atasnama" id="atasnama" value="K" {{$atasnama == 'K'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="atasnama">Klien</label>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="k_sproduk" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Pilih Produk
            </label>
            <select
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              placeholder="Pilih Produk" id="k_sproduk" name="k_sproduk">
              <option selected>Pilih Produk</option>
              @foreach($produks as $produk)
                <option value="{{ $produk->k_sproduk }}">{{ $produk->n_sproduk }}</option>
              @endforeach
            </select>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="k_grup" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Chose Group Head
            </label>
            <select
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="k_grup" name="k_grup">
              <option selected>Pilih Grup Head</option>
              @foreach($grup_heads as $grup_head)
                <option value="{{ $grup_head->k_grup }}">{{ $grup_head->n_gruphead }}</option>
              @endforeach
            </select>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="k_indus" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Choose Industri
            </label>
            <select
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="k_indus" name="k_indus">
              <option selected>Pilih Industri</option>
              @foreach($industris as $industri)
                <option value="{{ $industri->k_indus }}">{{ $industri->n_indus }}</option>
              @endforeach
            </select>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="k_sales" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Choose Account Executive
            </label>
            <select
              class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="k_sales" name="k_sales">
              <option selected>Pilih Account Executive</option>
              @foreach($saless as $sales)
                <option value="{{ $sales->k_sales }}">{{ $sales->n_sales }}</option>
              @endforeach
            </select>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96" id="flag_paket">
            <label
              for="flag_paket" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Ket Iklan Bundling
            </label>
            <div class="form-check mr-5">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" name="flag_paket" id="flag_paket" value="1" {{$flag_paket == '1'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="flag_paket">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" name="flag_paket" id="flag_paket" value="0" {{$flag_paket == '0'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="flag_paket">No</label>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96" id="flag_pktnoseri">
            <label
              for="flag_pktnoseri" class="form-label inline-block mb-2 text-gray-700 text-sm">
              Pengiklan & Jatuh Tempo Atas Nama
            </label>
            <div class="form-check mr-5">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" name="flag_pktnoseri" id="flag_pktnoseri" value="*" {{$flag_pktnoseri == '*'? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="flag_pktnoseri">Bundling</label>
            </div>
            <div class="form-check">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" name="flag_pktnoseri" id="flag_pktnoseri" value="" {{$flag_pktnoseri == ''? 'checked' : ''}}>
                <label class="form-check-label inline-block text-gray-800" for="flag_pktnoseri">Per Invoice</label>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label
              for="user_input" class="form-label inline-block mb-2 text-gray-700 text-sm">
              User Update : {{ session()->get('nik'); }}
            </label>
            <input type="hidden" id="user_input" name="user_input" value="{{ session()->get('nik'); }}">
        </div>
    </div>

    <br/><br/>

    <div class="flex space-x-2 justify-center">
        <a href="{{ route('allmediaorder') }}">
            <button class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">
                Selesai / Kembali
            </button>
        </a>
        <button type="button" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg 
        focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out" 
        id="update">
            Update
        </button>
    </div>

    <br/><br/><br/>

</div>

<div class="container">
    <h6 class="font-medium leading-tight text-base">Data Tersimpan...</h6>
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
                                Update Info
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
                            User Update : <b>{{ $mediaorder->user_update }}</b> <br/> Tgl update : <b>{{ $mediaorder->tgl_update }}</b>
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
                            Ket Iklan Bundling : <b>{{ $ket_iklan_bundling }}</b> <br/> Penomoran Seri Pajak : <b>{{ $penomoran_seri_pajak }}</b> 
                            </td>
                        </tr class="bg-white border-b">
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    $(function(){
        $("#jenis_kontrak").change(function(){     
            var jk = $('input[name=jenis_kontrak]:checked').val();
            if(jk == 'N') {
                $('#jbarter').prop('disabled', true);
                $('#opt_inactive').prop('selected', true);
            } else {
                $('#jbarter').prop('disabled', false);
                $('#opt_active').prop('selected', true);
                $('#opt_inactive').prop('hidden', true);
            }
        });
    });

    $(document).ready(function()
    {

        $('#no_kontrak').val('<?php echo $no_kontrak; ?>');
        $('#k_biro').val('<?php echo $k_biro; ?>');
        $('#k_klien').val('<?php echo $k_klien; ?>');
        $('#nilai').val('<?php echo $nilai; ?>');
        $('#jenis_kontrak').val('<?php echo $jenis_kontrak; ?>');
        $('#jbarter').val('<?php echo $jbarter; ?>');
        $('#status_ppn').val('<?php echo $status_ppn; ?>');
        $('#nilai_nonbarter').val('<?php echo $nilai_nonbarter; ?>');
        $('#nilai_barter').val('<?php echo $nilai_barter; ?>');
        $('#nilai_ppn').val('<?php echo $nilai_ppn; ?>');
        $('#nilai_real').val('<?php echo $nilai_real; ?>');
        $('#atasnama').val('<?php echo $atasnama; ?>');
        $('#k_sproduk').val('<?php echo $k_sproduk; ?>');
        $('#k_grup').val('<?php echo $k_grup; ?>');
        $('#k_indus').val('<?php echo $k_indus; ?>');
        $('#k_sales').val('<?php echo $k_sales; ?>');
        $('#flag_paket').val('<?php echo $flag_paket; ?>');
        $('#flag_pktnoseri').val('<?php echo $flag_pktnoseri; ?>');

        $("#jenis_kontrak, #status_ppn").on("keydown keyup", update_nilai);

        function update_nilai()
        {
            var jk = $('input[name=jenis_kontrak]:checked').val();
            var sp = $('input[name=status_ppn]:checked').val();

            if(jk == 'N' && sp == '1') {

                var nilai = $('#nilai').val();
                var nilai_pajak = nilai*11/100;
                var total_nilai = nilai - nilai_pajak;
                $("#nilai_nonbarter").val(total_nilai);
                $("#nilai_barter").val('0');
                $("#nilai_ppn").val(nilai_pajak);
                $("#nilai_real").val(nilai);

            } else if(jk == 'N' && sp == '0'){

                var nilai = $('#nilai').val();
                var nilai_pajak = nilai*11/100;
                var total_nilai = parseInt(nilai) + parseInt(nilai_pajak);
                $("#nilai_nonbarter").val(total_nilai);
                $("#nilai_barter").val('0');
                $("#nilai_ppn").val(nilai_pajak);
                $("#nilai_real").val(nilai);

            } else if(jk == 'B' && sp == '1'){

                var nilai = $('#nilai').val();
                var nilai_pajak = nilai*11/100;
                var total_nilai = nilai - nilai_pajak;
                $("#nilai_nonbarter").val('0');
                $("#nilai_barter").val(total_nilai);
                $("#nilai_ppn").val(nilai_pajak);
                $("#nilai_real").val(nilai);

            } else if (jk == 'B' && sp == '0'){

                var nilai = $('#nilai').val();
                var nilai_pajak = nilai*11/100;
                var total_nilai = parseInt(nilai) + parseInt(nilai_pajak);
                $("#nilai_nonbarter").val('0');
                $("#nilai_barter").val(total_nilai);
                $("#nilai_ppn").val(nilai_pajak);
                $("#nilai_real").val(nilai);

            } else if(jk == 'S' && sp == '1'){

                var nilai = $('#nilai').val();
                var nilai_pajak = nilai*11/100;
                var total_nilai = nilai - nilai_pajak;
                $("#nilai_nonbarter").val(total_nilai);
                $("#nilai_barter").val(total_nilai);
                $("#nilai_ppn").val(nilai_pajak);
                $("#nilai_real").val(nilai);

            } else if (jk == 'S' && sp == '0'){

                var nilai = $('#nilai').val();
                var nilai_pajak = nilai*11/100;
                var total_nilai = parseInt(nilai) + parseInt(nilai_pajak);
                $("#nilai_nonbarter").val(total_nilai);
                $("#nilai_barter").val(total_nilai);
                $("#nilai_ppn").val(nilai_pajak);
                $("#nilai_real").val(nilai);

            }

        }
        $(document).on("change, keyup", "#nilai", update_nilai);
        
    });

    //action update post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let k_order = '<?php echo $k_order; ?>';
        let no_kontrak = $('#no_kontrak').val();
        let nilai = $('#nilai').val();
        let k_biro = $('#k_biro').val();
        let k_klien = $('#k_klien').val();
        var jenis_kontrak = $("input[name='jenis_kontrak']:checked").val();
        let jbarter = $('#jbarter').val();
        var status_ppn = $("input[name='status_ppn']:checked").val();
        let nilai_nonbarter = $('#nilai_nonbarter').val();
        let nilai_barter = $('#nilai_barter').val();
        let nilai_ppn = $('#nilai_ppn').val();
        let nilai_real = $('#nilai_real').val();
        var atasnama = $("input[name='atasnama']:checked").val();
        let k_sproduk = $('#k_sproduk').val();
        let k_grup = $('#k_grup').val();
        let k_indus = $('#k_indus').val();
        let k_sales = $('#k_sales').val();
        var flag_paket = $("input[name='flag_paket']:checked").val();
        var flag_pktnoseri = $("input[name='flag_pktnoseri']:checked").val();
        let user_input = $('#user_input').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/mediaorders/${k_order}`,
            type: "PUT",
            cache: false,
            data: {
                "k_order": k_order,
                "no_kontrak": no_kontrak,
                "nilai": nilai,
                "k_biro": k_biro,
                "k_klien": k_klien,
                "jenis_kontrak": jenis_kontrak,
                "jbarter": jbarter,
                "status_ppn": status_ppn,
                "nilai_nonbarter": nilai_nonbarter,
                "nilai_barter": nilai_barter,
                "nilai_ppn": nilai_ppn,
                "nilai_real": nilai_real,
                "atasnama": atasnama,
                "k_sproduk": k_sproduk,
                "k_grup": k_grup,
                "k_indus": k_indus,
                "k_sales": k_sales,
                "flag_paket": flag_paket,
                "flag_pktnoseri": flag_pktnoseri,
                "user_input": user_input,
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
                        <td>${response.data.jbarter}</td>
                        <td>${response.data.status_ppn}</td>
                        <td>${response.data.nilai_nonbarter}</td>
                        <td>${response.data.nilai_barter}</td>
                        <td>${response.data.nilai_ppn}</td>
                        <td>${response.data.nilai_real}</td>
                        <td>${response.data.atasnama}</td>
                        <td>${response.data.k_sproduk}</td>
                        <td>${response.data.k_grup}</td>
                        <td>${response.data.k_indus}</td>
                        <td>${response.data.k_sales}</td>
                        <td>${response.data.flag_paket}</td>
                        <td>${response.data.flag_pktnoseri}</td>
                        <td>${response.data.user_input}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.no_kontrak}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.no_kontrak}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to post data
                $(`#index_${response.data.k_order}`).replaceWith(mediaorder);
                location.reload();
                

            },
            error:function(error){

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

            if(error.responseJSON.jbarter[0]) {

                //show alert
                $('#alert-jbarter').removeClass('d-none');
                $('#alert-jbarter').addClass('d-block');

                //add message to alert
                $('#alert-jbarter').html(error.responseJSON.jbarter[0]);
            } 

            if(error.responseJSON.status_ppn[0]) {

                //show alert
                $('#alert-status_ppn').removeClass('d-none');
                $('#alert-status_ppn').addClass('d-block');

                //add message to alert
                $('#alert-status_ppn').html(error.responseJSON.status_ppn[0]);
            } 

            if(error.responseJSON.nilai_nonbarter[0]) {

                //show alert
                $('#alert-nilai_nonbarter').removeClass('d-none');
                $('#alert-nilai_nonbarter').addClass('d-block');

                //add message to alert
                $('#alert-nilai_nonbarter').html(error.responseJSON.nilai_nonbarter[0]);
            } 

            if(error.responseJSON.nilai_barter[0]) {

                //show alert
                $('#alert-nilai_barter').removeClass('d-none');
                $('#alert-nilai_barter').addClass('d-block');

                //add message to alert
                $('#alert-nilai_barter').html(error.responseJSON.nilai_barter[0]);
            } 

            if(error.responseJSON.nilai_ppn[0]) {

                //show alert
                $('#alert-nilai_ppn').removeClass('d-none');
                $('#alert-nilai_ppn').addClass('d-block');

                //add message to alert
                $('#alert-nilai_ppn').html(error.responseJSON.nilai_ppn[0]);
            } 

            if(error.responseJSON.nilai_real[0]) {

                //show alert
                $('#alert-nilai_real').removeClass('d-none');
                $('#alert-nilai_real').addClass('d-block');

                //add message to alert
                $('#alert-nilai_real').html(error.responseJSON.nilai_real[0]);
            } 

            if(error.responseJSON.atasnama[0]) {

                //show alert
                $('#alert-atasnama').removeClass('d-none');
                $('#alert-atasnama').addClass('d-block');

                //add message to alert
                $('#alert-atasnama').html(error.responseJSON.atasnama[0]);
            } 

            if(error.responseJSON.k_sproduk[0]) {

                //show alert
                $('#alert-k_sproduk').removeClass('d-none');
                $('#alert-k_sproduk').addClass('d-block');

                //add message to alert
                $('#alert-k_sproduk').html(error.responseJSON.k_sproduk[0]);
            } 

            if(error.responseJSON.k_grup[0]) {

                //show alert
                $('#alert-k_grup').removeClass('d-none');
                $('#alert-k_grup').addClass('d-block');

                //add message to alert
                $('#alert-k_grup').html(error.responseJSON.k_grup[0]);
            } 

            if(error.responseJSON.k_indus[0]) {

                //show alert
                $('#alert-k_indus').removeClass('d-none');
                $('#alert-k_indus').addClass('d-block');

                //add message to alert
                $('#alert-k_indus').html(error.responseJSON.k_indus[0]);
            } 

            if(error.responseJSON.k_sales[0]) {

                //show alert
                $('#alert-k_sales').removeClass('d-none');
                $('#alert-k_sales').addClass('d-block');

                //add message to alert
                $('#alert-k_sales').html(error.responseJSON.k_sales[0]);
            } 

            if(error.responseJSON.flag_paket[0]) {

                //show alert
                $('#alert-flag_paket').removeClass('d-none');
                $('#alert-flag_paket').addClass('d-block');

                //add message to alert
                $('#alert-flag_paket').html(error.responseJSON.flag_paket[0]);
            }

            if(error.responseJSON.flag_pktnoseri[0]) {

                //show alert
                $('#alert-flag_pktnoseri').removeClass('d-none');
                $('#alert-flag_pktnoseri').addClass('d-block');

                //add message to alert
                $('#alert-flag_pktnoseri').html(error.responseJSON.flag_pktnoseri[0]);
            } 

            if(error.responseJSON.user_input[0]) {

                //show alert
                $('#alert-user_input').removeClass('d-none');
                $('#alert-user_input').addClass('d-block');

                //add message to alert
                $('#alert-user_input').html(error.responseJSON.user_input[0]);
            } 

            }

        });

    });

</script>

</x-app-layout>

</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tempo || Input Order TEMPO.CO</title>
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
            {{ __('Input Order TEMPO.CO :') }} {{ $k_order }}
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
</div><br/>

<div class="container">
  <div class="flex flex-row">
      
      <div class="basis-1/3">

          <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="judul" class="form-label inline-block mb-2 text-gray-700 text-sm">
                    Judul
                  </label>
                  <input
                    type="text"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="judul" id="judul"
                    placeholder="Judul"/>
              </div>
          </div>

          <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="cara_bayar" class="form-label inline-block mb-2 text-gray-700 text-sm">
                    Cara Bayar
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
                  for="no_edisi" class="form-label inline-block mb-2 text-gray-700 text-sm">
                  No. Edisi :
                </label>
                <select
                  class="form-control block w-sm px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                    rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none select"
                  placeholder="No. Edisi" name="no_edisi" id="no_edisi">
                  <option>Pilih No. Edisi</option>
                  @foreach($m_edisi as $medisi)
                      <option class="{{ $medisi->tgl_terbit }}" value="{{ $medisi->k_edisi }}">{{ $medisi->n_edisi }}</option>
                  @endforeach
                </select>
                <div class="mySelect_text"></div>
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
                  @foreach($mjenis_majalah as $mjenismajalah)
                      <option class="{{ $mjenismajalah->tarif }}" value="{{ $mjenismajalah->k_jenis }}">{{ $mjenismajalah->n_jenis }}</option>
                  @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-center">
          <div class="mb-3 xl:w-96">
              <label
                for="layout_majalah" class="form-label inline-block mb-2 text-gray-700 text-sm">
                Layout :
              </label>
              <select
                class="form-control block w-sm px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Layout" name="layout_majalah" id="layout_majalah">
                <option value="">Pilih Layout</option>
                @foreach($mtarif_majalah_mbm as $mtarifmajalahmbm)
                      <option class="{{ $mtarifmajalahmbm->tarif }}" value="{{ $mtarifmajalahmbm->k_tarif }}">{{ $mtarifmajalahmbm->n_tarif }}</option>
                @endforeach
              </select>
              <div class="lay_text"></div>
          </div>
        </div> 

        <div class="flex justify-center">
          <div class="mb-3 xl:w-96">
              <label
                for="jasa_produksi" class="form-label inline-block mb-2 text-gray-700 text-sm">
                Jasa Produksi :
              </label>
              <select
                class="form-control block w-sm px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Jasa Produksi" name="jasa_produksi" id="jasa_produksi">
                <option selected>Pilih Jasa Produksi</option>
                @foreach($mjasa_majalah as $mjasamajalah)
                      <option class="{{ $mjasamajalah->tarif }}" value="{{ $mjasamajalah->k_jasa }}">{{ $mjasamajalah->n_jasa }}</option>
                @endforeach
              </select>
          </div>
        </div>

        <div class="flex justify-center">
          <div class="mb-3 xl:w-96">
              <label
                for="no_kontrak" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                Diskon Dalam :
              </label>
              <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
              transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
              type="radio" name="opt_diskon_dalam" id="opt_diskon_dalam" value="idr">
              <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="inlineRadio10">IDR</label>
              <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
              transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
              type="radio" name="opt_diskon_dalam" id="opt_diskon_dalam" value="persen">
              <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="inlineRadio20">Persen %</label>
              <input
                type="number"
                class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  name="diskon_dalam" id="diskon_dalam" placeholder="Nominal Diskon Dalam"/>
          </div>
        </div>

        <div class="flex justify-center">
          <div class="mb-3 xl:w-96">
              <label
                for="no_kontrak" class="form-label inline-block mb-2 text-gray-700 text-sm mr-3">
                Diskon Luar :
              </label>
              <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
              transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"  
              type="radio" name="opt_diskon_luar" id="opt_diskon_luar" value="idr">
              <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="inlineRadio10">IDR</label>
              <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
              transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
              type="radio" name="opt_diskon_luar" id="opt_diskon_luar" value="persen">
              <label class="form-check-label inline-block text-gray-800 text-sm mr-4" for="inlineRadio20">Persen %</label>
              <input
                type="number"
                class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  name="diskon_luar" id="diskon_luar" placeholder="Nominal Diskon Luar"/>
          </div>
        </div>

      </div>
  
      <div class="basis-2/3">

          <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="tarif" class="form-label inline-block mb-2 text-gray-700 text-sm">
                    Tarif :
                  </label>
                  <input
                    type="number"
                    class="tarif form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="tarif" id="tarif" placeholder="Masukkan Tarif"/>
              </div>
          </div>
          
          <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="jml_eksemplar" class="form-label inline-block mb-2 text-gray-700 text-sm">
                    Jumlah Eksemplar :
                  </label>
                  <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="jml_eksemplar" id="jml_eksemplar" placeholder="Masukkan Jumlah Eksemplar"/>
              </div>
          </div>
          
          <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                  <label
                    for="tarif_jasa" class="form-label inline-block mb-2 text-gray-700 text-sm">
                    Tarif Jasa :
                  </label>
                  <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="tarif_jasa" id="tarif_jasa" placeholder="Masukkan Jumlah Eksemplar"/>
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
                      name="brutto" id="brutto" placeholder="Masukkan Brutto"/>
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
                    class="tagihan form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      name="tagihan" id="tagihan" placeholder="Tagihan"/>
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
          </div>
          
      </div>

      <input type="hidden" id="k_order" name="k_order" value="{{ $k_order }}"/>
      <input type="hidden" id="no_kontrak" name="no_kontrak" value="{{ $no_kontrak }}"/>
      <input type="hidden" id="k_biro" name="k_biro" value="{{ $k_biro }}"/>
      <input type="hidden" id="k_klien" name="k_klien" value="{{ $k_klien }}"/>
      <input type="hidden" id="atasnama" name="atasnama" value="{{ $atasnama }}"/>
      <input type="hidden" id="j_atasnama" name="j_atasnama" value="{{ $j_atasnama }}"/>
      <input type="hidden" id="k_indus" name="k_indus" value="{{ $k_indus }}"/>
      <input type="hidden" id="user_input" name="user_input" value="{{ session()->get('nik'); }}"/>
      <input type="hidden" id="k_produk" name="k_produk" value="{{ $k_produk }}"/>
      <input type="hidden" id="k_sproduk" name="k_sproduk" value="{{ $k_sproduk }}"/>
      <input type="hidden" id="k_sales" name="k_sales" value="{{ $k_sales }}"/>
      <input type="hidden" id="k_grup" name="k_grup" value="{{ $k_grup }}"/>
  
  </div>
</div><br/><br/><br/>

<div class="flex space-x-2 justify-center">
    <a href="{{ route('allmediaorder') }}">
        <button class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg 
        focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">
            Selesai / Kembali
        </button>
    </a>
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg 
    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
        Simpan
    </button>
</div><br/><br/>

<div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-500">
            <tr>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                #
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                No. Edisi
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                No. Kwitansi
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                Action
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            @foreach($iklan_mbm as $iklanmbm)
                        <option class="{{ $mjasamajalah->tarif }}" value="{{ $mjasamajalah->k_jasa }}">{{ $mjasamajalah->n_jasa }}</option>
                  
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $iklanmbm->no_edisi }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $iklanmbm->no_kwt }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <button class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-900 
                hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-900 active:shadow-lg transition duration-150 ease-in-out">
                    Batal
                </button>
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

  $("#layout_majalah, #jasa_produksi, #diskon_dalam").change(createSummary);

  function createSummary() {

    var tarif_majalah = $("#layout_majalah option:selected").attr("class");      
    $("#tarif").val(tarif_majalah);

    var jasa_produksi = $("#jasa_produksi option:selected").attr("class");      
    $("#tarif_jasa").val(jasa_produksi);

    var brutto = parseInt(tarif_majalah) + parseInt(jasa_produksi);
    $("#brutto").val(brutto);

    var opt_diskon_dalam = $('input[name=opt_diskon_dalam]:checked').val();
    var diskon_dalam = $('#diskon_dalam').val();
    if(opt_diskon_dalam == 'persen'){
      var nominal_diskon_dalam = brutto*diskon_dalam/100;
      var netto = brutto-nominal_diskon_dalam;
      $("#netto").val(netto);
    }else{
      var netto = brutto - diskon_dalam;
      $("#netto").val(netto);
    }

    var ppn = netto*11/100;
    $("#ppn").val(ppn);

    var tagihan = parseInt(netto) + parseInt(ppn);
    $("#tagihan").val(tagihan);

  }

</script>

</x-app-layout>

</body>
</html>
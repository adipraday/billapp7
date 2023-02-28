<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tempo || Invoice Order</title>
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

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice Order :') }}
        </h2>
    </x-slot><br/><br/>

    <div class="flex flex-row">

        <div class="basis-1/2">

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_tgl_iv" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Tanggal Invoice
                    </label>
                    <input
                    type="date"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_tgl_iv"
                    placeholder="Tanggal Invoice"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_jtempo" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Jatuh Tempo
                    </label>
                    <input
                    type="date"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_jtempo"
                    placeholder="Jatuh Tempo"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_jtayang" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Jumlah Tayang
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_jtayang"
                    placeholder="Jumlah Tayang"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96" id="flag_pktnoseri">
                    <label
                      for="io_jtarif" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Jenis Tarif
                    </label>
                    <div class="form-check mr-5">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="io_jtarif" id="io_jtarif" value="">
                        <label class="form-check-label inline-block text-gray-800" for="flag_pktnoseri">Standart</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="io_jtarif" id="io_jtarif" value="">
                        <label class="form-check-label inline-block text-gray-800" for="flag_pktnoseri">Khusus</label>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_layout" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Layout
                    </label>
                    <select
                      class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_layout">
                      <option selected>Pilih Layout</option>
                      <option value="1">Layout A</option>
                      <option value="2">Layout B</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96" id="flag_pktnoseri">
                    <label
                      for="io_jlayout" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Jenis Layout
                    </label>
                    <div class="form-check mr-5">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="io_jlayout" id="io_jlayout" value="">
                        <label class="form-check-label inline-block text-gray-800" for="io_jlayout">Black & white</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 focus:outline-none 
                        transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="radio" name="io_jlayout" id="io_jlayout" value="">
                        <label class="form-check-label inline-block text-gray-800" for="io_jlayout">Full Color</label>
                    </div>
                </div>
            </div>
        
        </div>

        <div class="basis-1/2">

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_tarif" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Tarif
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_tarif"
                    placeholder="Tarif"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_bruto" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Bruto
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_bruto"
                    placeholder="Bruto"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_diskon_dalam" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Diskon Dalam
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_diskon_dalam"
                    placeholder="Diskon Dalam"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_netto" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Netto
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_netto"
                    placeholder="Netto"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_ppn" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      PPN in 11&
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_ppn"
                    placeholder="PPN"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_tagihan" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Tagihan
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_tagihan"
                    placeholder="Tagihan"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_bproduksi" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Biaya Produksi
                    </label>
                    <input
                    type="number"
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="io_bproduksi"
                    placeholder="Biaya Produksi"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <label
                      for="io_ket" class="form-label inline-block mb-2 text-gray-700 text-sm">
                      Keterangan
                    </label>
                    <textarea
                    class="form-control block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Keterangan" rows="3"></textarea>
                </div>
            </div>

        </div>

    </div><br/><br/>

    <div class="container">
        <div class="flex space-x-2 justify-center">
            <a href="{{ route('allmediaorder') }}">
                <button class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">
                    Selesai / Kembali
                </button>
            </a>
            <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg 
            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" 
            id="save_io_inv">
                Save
            </button>
        </div>
    </div><br/><br/>

</x-app-layout>

</body>
</html>
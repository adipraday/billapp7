<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::resource('mediaorders', MediaOrderController::class, [
        'names' => [
            'index' => 'allmediaorder',
            'faddmediaorder' => 'addmediaorder',
            'store' => 'mediaorder.new',
            'update' => 'mediaorder.edit',
            // etc...
        ]
    ]);
    Route::get('/mediaorder/add', 'App\Http\Controllers\MediaOrderController@faddmediaorder')->name('addmediaorder');
    Route::get('mediaorder/edit/{k_order}', 'App\Http\Controllers\MediaOrderController@feditmediaorder')->name('editmediaorder');
    Route::get('mediaorder/iomajalahtempoindonesia/{k_order}', 'App\Http\Controllers\MediaOrderController@fiomajalahtempoindonesia')->name('iomajalahtempoindonesia');
    Route::get('mediaorder/iotempoenglishedition/{k_order}', 'App\Http\Controllers\MediaOrderController@fiotempoenglishedition')->name('iotempoenglishedition');
    Route::get('mediaorder/iokorantempo/{k_order}', 'App\Http\Controllers\MediaOrderController@fiokorantempo')->name('iokorantempo');
    Route::get('mediaorder/iotempotv/{k_order}', 'App\Http\Controllers\MediaOrderController@fiotempotv')->name('iotempotv');
    Route::get('mediaorder/iotempoco/{k_order}', 'App\Http\Controllers\MediaOrderController@fiotempoco')->name('iotempoco');
    Route::get('mediaorder/iotempocoimd/{k_order}', 'App\Http\Controllers\MediaOrderController@fiotempocoimd')->name('iotempocoimd');
    Route::get('mediaorder/iomajalahtebidigital/{k_order}', 'App\Http\Controllers\MediaOrderController@fiomajalahtebidigital')->name('iomajalahtebidigital');
    Route::get('mediaorder/iomajalahtempodigital/{k_order}', 'App\Http\Controllers\MediaOrderController@fiomajalahtempodigital')->name('iomajalahtempodigital');
    Route::get('mediaorder/iokorantempodigital/{k_order}', 'App\Http\Controllers\MediaOrderController@fiokorantempodigital')->name('iokorantempodigital');
    Route::get('mediaorder/invoiceorder', 'App\Http\Controllers\MediaOrderController@finvoiceorder')->name('invoiceorder');
    Route::post('mediaorder/saveorder', 'App\Http\Controllers\MediaOrderController@saveordermajalahtempombm')->name('saveorder');
    Route::post('mediaorder/saveorderkorantempo', 'App\Http\Controllers\MediaOrderController@saveorderkorantempo')->name('saveorderkorantempo');
    // Route::delete('mediaorder/deleteorder/{id}', 'App\Http\Controllers\MediaOrderController@deleteordermajalahtempombm')->name('deleteorder');
    Route::post('mediaorder/saveordertempotv', 'App\Http\Controllers\MediaOrderController@saveordertempotv')->name('saveordertempotv');
    Route::resource('inputorders', MediaOrderController::class, [
        'names' => [
            'saveordermajalahtempombm' => 'inputorder',
            // etc...
        ]
    ]);
    Route::get('report/mediaorder', 'App\Http\Controllers\MediaOrderReportController@index')->name('reportmediaorder');
    Route::get('report/order', 'App\Http\Controllers\OrderReportController@index')->name('reportorder');
});


<?php

use Illuminate\Support\Facades\Route;
use Elastic\Elasticsearch\ClientBuilder;
use App\Http\Controllers\FileUpload;



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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/elastic', function () {   
    $client = Elastic\Elasticsearch\ClientBuilder::create();
    var_dump($client);
});

Route::post('/serp', 'App\Http\Controllers\MainController@serp');

Route::post('/serplogin', 'App\Http\Controllers\MainController@serplogin');




Route::get('/upload-file', [FileUpload::class, 'createForm']);

Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');



Route::get('/insert', 'App\Http\Controllers\MainController@insert');

Route::post('/upload_data', 'App\Http\Controllers\MainController@upload_data');

Route::get('/etd_summary','App\Http\Controllers\MainController@etd_summary');

Route::get('/openpdf/{idvalue}','App\Http\Controllers\MainController@openpdf');


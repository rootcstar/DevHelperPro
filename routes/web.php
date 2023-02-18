<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[WebsiteController::class, 'get_index'])->name('home');
Route::get('/json-viewer', [WebsiteController::class, 'get_json_viewer'])->name('json-viewer');
Route::get('/test', [WebsiteController::class, 'get_test'])->name('test');
Route::get('/json-to-xml-converter', [WebsiteController::class, 'json_to_xml_converter'])->name('json-to-xml-converter');

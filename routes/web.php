<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\PageBuilderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/admin/pages/{id}/build', [PageBuilderController::class, 'build'])->name('pagebuilder.build');
Route::any('/admin/pages/build', [PageBuilderController::class, 'build']);

Route::any('{uri}', [
    'uses' => [WebsiteController::class, 'uri'],
    'as' => 'page',
])->where('uri', '.*');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\myCntroller;

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


Route::post('/myPage', [myCntroller::class, 'myFunction'])->name('mcon');
Route::get('/showdata', [myCntroller::class, 'getData'])->name('show');
Route::get('/delete', [myCntroller::class, 'delete'])->name('deletedata');
Route::get('/edit', [myCntroller::class, 'edit'])->name('edidata');
Route::post('/update', [myCntroller::class, 'update'])->name('updatedata');
Route::post('/search', [myCntroller::class, 'search'])->name('searchdata');
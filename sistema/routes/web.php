<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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
    return view('auth.login');
});
    
Route::resource('usuarios',UsuarioController::class)->middleware('auth');

Auth::routes();
Route::get('/home', [UsuarioController::class, 'index'])->name('home');

Route::group(['middleware'=> 'auth'],function(){

        Route::get('/home', [UsuarioController::class, 'index'])->name('home');
            
        });


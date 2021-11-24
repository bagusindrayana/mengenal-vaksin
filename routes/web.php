<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/sudah-vaksin',\App\Http\Controllers\StatusVaksinController::class.'@sudah')->name('sudah-vaksin');
Route::get('/belum-vaksin',\App\Http\Controllers\StatusVaksinController::class.'@belum')->name('belum-vaksin');
Route::get('/tentang-vaksin',\App\Http\Controllers\TentangVaksinController::class.'@index')->name('tentang-vaksin.index');
Route::get('/tentang-vaksin/{slug}',\App\Http\Controllers\TentangVaksinController::class.'@show')->name('tentang-vaksin.show');
Route::get('/informasi/{slug}',\App\Http\Controllers\InformasiController::class.'@show')->name('informasi.show');
Route::get('/quiz-vaksin',\App\Http\Controllers\QuizController::class.'@index')->name('quiz-vaksin.index');
Route::post('/quiz-vaksin',\App\Http\Controllers\QuizController::class.'@jawabAll')->name('quiz-vaksin.jawab-all');
Route::get('/quiz-vaksin/{slug}',\App\Http\Controllers\QuizController::class.'@show')->name('quiz-vaksin.show');
Route::post('/quiz-vaksin/{slug}',\App\Http\Controllers\QuizController::class.'@jawab')->name('quiz-vaksin.jawab');
Route::get('/curhat',\App\Http\Controllers\CurhatController::class.'@index')->name('curhat.index');
Route::post('/curhat',\App\Http\Controllers\CurhatController::class.'@store')->name('curhat.store');

Route::get('/login',\App\Http\Controllers\LoginController::class.'@index')->name('login.index');
Route::post('/login',\App\Http\Controllers\LoginController::class.'@auth')->name('login.auth');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('/logout',\App\Http\Controllers\LoginController::class.'@logout')->name('login.logout');
    Route::get('/',\App\Http\Controllers\Admin\DashboardController::class.'@index')->name('admin.index');
    Route::resource('vaksin',\App\Http\Controllers\Admin\VaksinController::class)->except(['show']);
    Route::resource('informasi',\App\Http\Controllers\Admin\InformasiController::class)->except(['show']);
    Route::resource('quiz',\App\Http\Controllers\Admin\QuizController::class)->except(['show']);
    Route::get('/curhat',\App\Http\Controllers\Admin\CurhatController::class.'@index')->name('admin.curhat.index');
});

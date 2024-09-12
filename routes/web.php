<?php
use App\Models\User;
use App\Models\Surat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PayungController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\HomePageController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homepage', [HomePageController::class, 'index'])->name('homepage');
Route::get('user/edit/{id}', [PayungController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [PayungController::class, 'update'])->name('user.update');
Route::delete('user/delete/{id}', [PayungController::class, 'destroy'])->name('user.destroy');
Route::get('/users', [PayungController::class, 'index'])->name('nigai');
Route::post('/users/store', [PayungController::class, 'store'])->name('user.store');

Route::get('/penduduk', [PendudukController::class, 'index'])->name('rakka');
Route::post('/penduduk/store', [PendudukController::class, 'store'])->name('penduduk.store');
Route::get('penduduk/edit/{id}', [PendudukController::class, 'edit'])->name('penduduk.edit');
Route::post('/penduduk/update/{id}', [PendudukController::class, 'update'])->name('penduduk.update');
Route::delete('penduduk/delete/{id}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');
Route::get('/penduduk/show/{id}', [PendudukController::class, 'show'])->name('penduduk.show');

Route::get('/pekerjaan', [PekerjaanController::class, 'index'])->name('reki');
Route::post('/pekerjaan/store', [PekerjaanController::class, 'store'])->name('pekerjaan.store');
Route::get('pekerjaan/edit/{id}', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
Route::post('/pekerjaan/update/{id}', [PekerjaanController::class, 'update'])->name('pekerjaan.update');
Route::delete('pekerjaan/delete/{id}', [PekerjaanController::class, 'destroy'])->name('pekerjaan.destroy');

Route::resource('surat',SuratController::class)->names([
    'index' => 'surat.index',
    'create' => 'surat.create',
    'store' => 'surat.store',
    'edit' => 'surat.edit',
    'update' => 'surat.update',
    'destroy' => 'surat.destroy',
]);

Route::get('/surat/print/{id}', [SuratController::class, 'printPdf'])->name('surat.printPdf');
Route::get('/surat/createe', [SuratController::class, 'createe'])->name('depan');
Route::post('/surat/storee', [SuratController::class, 'storee'])->name('storee');
Route::get('/surat/{id}/verify', [SuratController::class, 'verify'])->name('surat.verify');

Route::resource('jenis_surats',JenisSuratController::class)->names([
    'index' => 'jenis_surats.index',
    'create' => 'jenis_surats.create',
    'store' => 'jenis_surats.store',
    'edit' => 'jenis_surats.edit',
    'update' => 'jenis_surats.update',
    'destroy' => 'jenis_surats.destroy',
]);

Route::resource('kategoris', KategoriController::class)->names([
    'index' => 'kategoris.index',
    'create' => 'kategoris.create',
    'store' => 'kategoris.store',
    'edit' => 'kategoris.edit',
    'update' => 'kategoris.update',
    'destroy' => 'kategoris.destroy',
]);

Route::post('/user/store', [App\Http\Controllers\PayungController::class, 'store'])->name('user.store');
Route::get('/data', [DataController::class, 'index']);
Route::post('/data', [DataController::class, 'store']);
Route::post('/data/{id}', [DataController::class, 'update']);
Route::delete('/data/{id}', [DataController::class, 'destroy']);

Auth::routes();

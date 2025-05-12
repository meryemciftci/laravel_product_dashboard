<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AltKategoriController;
use App\Http\Controllers\Admin\UrunController;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//banner route
Route::controller(BannerController:: class)->group(function(){
    Route::get('/banner/duzenle','HomeBanner')->name('banner');
    Route::post('/banner/guncelle','BannerGuncelle')->name('banner.guncelle');
});


//Kategori route
Route::controller(KategoriController:: class)->group(function(){
    Route::get('/kategori/hepsi','KategoriHepsi')->name('kategori.hepsi');
    Route::get('/kategori/ekle','KategoriEkle')->name('kategori.ekle');
    Route::post('/kategori/ekle/form','KategoriEkleForm')->name('kategori.ekle.form');
    Route::get('/kategori/duzenle/{id}','KategoriDuzenle')->name('kategori.duzenle');
    Route::post('/kategori/guncelle/form','KategoriGuncelleForm')->name('kategori.guncelle.form');
    Route::get('/kategori/sil/{id}','KategoriSil')->name('kategori.sil');
});

//AltKategori route
Route::controller(AlTKategoriController:: class)->group(function(){
    Route::get('/altkategori/liste','AltKategoriListe')->name('altkategori.liste');
    Route::get('/alkategori/ekle','AltKategoriEkle')->name('altkategori.ekle');
    Route::post('/altkategori/ekle/form','AltKategoriEkleForm')->name('altkategori.ekle.form');
    Route::get('/altkategori/duzenle/{id}','AltKategoriDuzenle')->name('altkategori.duzenle');
    Route::post('/alt/guncelle/form','AltKategoriForm')->name('alt.guncelle');
    Route::get('/altkategori/sil/{id}','AltKategoriSil')->name('altkategori.sil');
});

//Urun route
Route::controller(UrunController:: class)->group(function(){
    Route::get('/urun/liste','UrunListe')->name('urun.liste');
    Route::get('/alkategori/ekle','AltKategoriEkle')->name('altkategori.ekle');
    Route::post('/altkategori/ekle/form','AltKategoriEkleForm')->name('altkategori.ekle.form');
    Route::get('/altkategori/duzenle/{id}','AltKategoriDuzenle')->name('altkategori.duzenle');
    Route::post('/alt/guncelle/form','AltKategoriForm')->name('alt.guncelle');
    Route::get('/altkategori/sil/{id}','AltKategoriSil')->name('altkategori.sil');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
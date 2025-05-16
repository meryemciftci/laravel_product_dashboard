<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AltKategoriController;
use App\Http\Controllers\Admin\UrunController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Controllers\Home\HakkimizdaController;
use App\Http\Controllers\MesajController;
use App\Http\Controllers\Admin\SurecController;
use App\Http\Controllers\Home\YorumController;
use App\Http\Controllers\Home\SeoController;
use App\Http\Controllers\Admin\RolController;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//Seo route
Route::controller(SeoController:: class)->group(function(){
    Route::get('/seo/duzenle','SeoDuzenle')->name('seo.duzenle');
    Route::post('/seo/guncelle','SeoGuncelle')->name('seo.guncelle');
});

//banner route
Route::controller(BannerController:: class)->group(function(){
    Route::get('/banner/duzenle','HomeBanner')->name('banner');
    Route::post('/banner/guncelle','BannerGuncelle')->name('banner.guncelle');
});
//hakkimizda route
Route::controller(HakkimizdaController:: class)->group(function(){
    Route::get('/hakkimizda/duzenle','Hakkimizda')->name('hakkimizda');
    Route::post('/hakkimizda/guncelle','HakkimizdaGuncelle')->name('hakkimizda.guncelle');
    Route::get('/hakkimizda','HakkimizdaFront')->name('anasayfa.hak');
    Route::get('/coklu/resim','CokluResim')->name('coklu.resim');
    Route::post('/coklu/form','CokluForm')->name('coklu.resim.form');
    Route::get('/coklu/liste','CokluListe')->name('coklu.liste');
    Route::get('/coklu/duzenle/{id}','CokluDuzenle')->name('coklu.duzenle');
    Route::post('/coklu/guncelle','CokluGuncelle')->name('coklu.guncelle');
    Route::get('/coklu/sil/{id}','CokluSil')->name('coklu.sil');
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
    Route::get('/altkategoriler/ajax/{kategori_id}','AltAjax');
});

//Urun route
Route::controller(UrunController:: class)->group(function(){
    Route::get('/urun/liste','UrunListe')->name('urun.liste');
    Route::get('/urun/durum','UrunDurum');
    Route::get('/urun/ekle','UrunEkle')->name('urun.ekle');
    Route::post('/urun/ekle/form','UrunEkleForm')->name('urun.ekle.form');
    Route::get('/urun/duzenle/{id}','UrunDuzenle')->name('urun.duzenle');
    Route::post('/urun/guncelle/','UrunGuncelle')->name('urun.guncelle.form');
    Route::get('/urun/sil/{id}','UrunSil')->name('urun.sil');
});

//Surec route
Route::controller(SurecController:: class)->group(function(){
    Route::get('/surec/liste','SurecListe')->name('surec.liste');
    Route::get('/surec/ekle','SurecEkle')->name('surec.ekle');
    Route::post('/surec/form','SurecForm')->name('surec.form');
    Route::get('/surec/durum','SurecDurum');
    Route::get('/surec/duzenle/{id}','SurecDuzenle')->name('surec.duzenle');
    Route::post('/surec/guncelle','SurecGuncelle')->name('surec.guncelle');
    Route::get('/surec/sil/{id}','SurecSil')->name('surec.sil');
});
//Yorum route
Route::controller(YorumController:: class)->group(function(){
    Route::get('/yorumlar','Yorumlar')->name('yorum.liste');
    Route::get('/yorum/ekle','YorumEkle')->name('yorum.ekle');
    Route::post('/yorum/form','YorumForm')->name('yorum.form');
    Route::get('/yorum/durum','YorumDurum');
    Route::get('/yorum/duzenle/{id}','YorumDuzenle')->name('yorum.duzenle');
    Route::post('/yorum/guncelle','YorumGuncelle')->name('yorum.guncelle');
    Route::get('/yorum/sil/{id}','YorumSil')->name('yorum.sil');
});

//İzinler  route
Route::controller(RolController:: class)->group(function(){
    Route::get('/izin/liste','IzinListe')->name('izin.liste');
    Route::get('/izin/ekle','IzinEkle')->name('izin.ekle');
    Route::post('/izin/form','IzinForm')->name('izin.ekle.form');
    Route::get('/izin/duzenle/{id}','IzinDuzenle')->name('izin.duzenle');
    Route::post('/izin/guncelle','IzinGuncelle')->name('izin.guncelle.form');
    Route::get('/izin/sil/{id}','IzinSil')->name('izin.sil');
});

//Rol route
Route::controller(RolController:: class)->group(function(){
    Route::get('/rol/liste','RolListe')->name('rol.liste');
    Route::get('/rol/ekle','RolEkle')->name('rol.ekle');
    Route::post('/rol/form','RolForm')->name('rol.ekle.form');
    Route::get('/rol/duzenle/{id}','RolDuzenle')->name('rol.duzenle');
    Route::post('/rol/guncelle','RolGuncelle')->name('rol.guncelle');
    Route::get('/rol/sil/{id}','RolSil')->name('rol.sil');



//Rollere izin verme route
   Route::get('/rol/izin/verme','RolIzinVerme')->name('rol.izin.verme');



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


//front route 

Route::get('/urun/{id}/{url}', [FrontController::class, 'UrunDetay']);
Route::get('/kategori/{id}/{url}', [FrontController::class, 'KategoriDetay']);
Route::get('/altkategori/{id}/{url}', [FrontController::class, 'AltKategoriDetay']);

//Teklif Fromu route
Route::controller(MesajController:: class)->group(function(){
    Route::get('/iletisim','Iletisim')->name('iletisim');
    Route::post('/teklif/form','TeklifFormu')->name('teklif.form');
});





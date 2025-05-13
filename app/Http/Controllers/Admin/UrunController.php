<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\AltKategoriler;
use App\Models\Urunler;
use Intervention\Image\Laravel\Facades\Image; 
use Illuminate\Support\Carbon;


class UrunController extends Controller
{
    public function UrunListe(){
        //latest -> kategorilerin sondan listlenmesini sağlar
        $urunliste = Urunler::latest()->get();
        return view('admin.urunler.urun_liste',compact('urunliste'));

    }//function sonu

    public function UrunDurum(Request $request){  //urun_id ve duruma erişim reguest ile
        $urun = urunler:: find($request->urun_id);  //id ye gör eürün bulunur
        $urun-> durum = $request->durum;  //durum alanı güncellenir
        $urun->save();  //veritabanına kaydedilir

        return response()->json(['success' =>'Başarılı.']);

    }//function sonu

    public function UrunEkle(){
        $kategoriler = Kategoriler::latest()->get();
        return view('admin.urunler.urun_ekle',compact('kategoriler'));


    }//function sonu
    

    public function UrunEkleForm(Request $request){

        $request->validate([
            'baslik' => 'required',
        ],[
            'baslik.required' => 'Başlık giriniz.',
        ]);
        
        
         $resim = $request -> file('resim');
         $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 
 
         Image::read($resim)->resize(700,370)->save('upload/urunler/'.$resimadi);
         $resim_kaydet = 'upload/urunler/'.$resimadi;
 
         Urunler::insert([
 
             'kategori_id'=> $request->kategori_id,
             'altkategori_id'=> $request->altkategori_id,
             'baslik'=> $request->baslik,
             'url'=> str()->slug($request->baslik),
             'tag'=> $request->tag,
             'metin'=> $request->metin,
             'anahtar'=> $request->anahtar,
             'aciklama'=> $request->aciklama,
             'sirano'=> $request->sirano,
             'resim' => $resim_kaydet,
             'durum' => 1,
             'created_at'=>Carbon::now(),

 
         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Resim ile yükleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('urun.liste')->with($mesaj);
 
     }//fonksiyon bitti

     
     public function UrunDuzenle($id){
        $kategoriler = Kategoriler::latest()->get();
        $altkategoriler = AltKategoriler::latest()->get();
        $urunler = Urunler::findOrFail($id);
        return view('admin.urunler.urun_duzenle',compact('kategoriler','altkategoriler','urunler'));

     }//fonksiyon bitti
     public function UrunGuncelle(Request $request){

        $request->validate([
            'baslik' => 'required',
        ],[
            'basllik.required' => 'Baslik boş olamaz.',
        ]);
        
        $urun_id =$request->id;
        $eski_resim = $request->onceki_resim;

        if($request->file('resim')){
         $resim = $request -> file('resim');
         $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 
 
         Image::read($resim)->resize(700,400)->save('upload/urunler/'.$resimadi);
         $resim_kaydet = 'upload/urunler/'.$resimadi;  //veritabanına yüklemek için

         //eski resim sil
         if(file_exists($eski_resim)){
            unlink($eski_resim);
         }
         //eski resim sil

 
         Urunler::findOrFail($urun_id)->update([
             'kategori_id'=> $request->kategori_id,
             'altkategori_id'=> $request->altkategori_id,
             'baslik'=> $request->baslik,
             'url'=> str()->slug($request->baslik),
             'tag'=> $request->tag,
             'metin'=> $request->metin,
             'anahtar'=> $request->anahtar,
             'aciklama'=> $request->aciklama,
             'sirano'=> $request->sirano,
             'resim' => $resim_kaydet,
 
         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Resim ile güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('urun.liste')->with($mesaj);
        } //end if
 
        else{
         Urunler::findOrFail($urun_id)->update([
             'kategori_id'=> $request->kategori_id,
             'altkategori_id'=> $request->altkategori_id,
             'baslik'=> $request->baslik,
             'url'=> str()->slug($request->baslik),
             'tag'=> $request->tag,
             'metin'=> $request->metin,
             'anahtar'=> $request->anahtar,
             'aciklama'=> $request->aciklama,
             'sirano'=> $request->sirano,
         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Resimsiz güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('urun.liste')->with($mesaj);
 
        } //end else
 
     }//fonksiyon bitti

     
     public function UrunSil($id){
        $urun_id = Urunler::findOrFail($id);
        //resimi siler klasörden
        $resim = $urun_id->resim;
        if(file_exists($resim)){
            unlink($resim);
        }
        
        Urunler::findOrFail($id)->delete();
        //veritabanından resimi siler

         //bildirim
         $mesaj = array(
             'bildirim' => 'Silme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->back()->with($mesaj);
 

     }//fonksiyon bitti

}

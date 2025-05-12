<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use Intervention\Image\Laravel\Facades\Image; 
use Illuminate\Support\Carbon;

class KategoriController extends Controller
{
    
    public function KategoriHepsi(){
        //latest -> kategorilerin sondan listlenmesini sağlar
        $kategorihepsi = Kategoriler::latest()->get();
        return view('admin.kategoriler.kategoriler_hepsi',compact('kategorihepsi'));


    }//function sonu

    public function KategoriEkle(){
        return view('admin.kategoriler.kategori_ekle');


    }//function sonu

    public function KategoriEkleForm(Request $request){

        $request->validate([
            'kategori_adi' => 'required',
            'anahtar' =>'required'
        ],[
            'kategori_adi.required' => 'Kategori adı boş olamaz.',
            'anahtar.required' => 'Anahtar boş olamaz.'
        ]);
        
        if($request->file('resim')){
         $resim = $request -> file('resim');
         $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 
 
         Image::read($resim)->resize(700,400)->save('upload/kategoriler/'.$resimadi);
         $resim_kaydet = 'upload/kategoriler/'.$resimadi;
 
         Kategoriler::insert([
 
             'kategori_adi'=> $request->kategori_adi,
             'kategori_url'=> str()->slug($request->kategori_adi),
             'anahtar'=> $request->anahtar,
             'aciklama'=> $request->aciklama,
             'resim' => $resim_kaydet,
             'created_at'=>Carbon::now()

 
         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Resim ile yükleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('kategori.hepsi')->with($mesaj);
        } //end if
 
        else{
         Kategoriler::insert([
            'kategori_adi'=> $request->kategori_adi,
            'kategori_url'=> str()->slug($request->kategori_adi),
            'anahtar'=> $request->anahtar,
            'aciklama'=> $request->aciklama,
            'created_at'=>Carbon::now()
         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Resimsiz yükleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('kategori.hepsi')->with($mesaj);
 
        } //end else
 
     }//fonksiyon bitti

     public function KategoriDuzenle($id){
        $KategoriDuzenle = Kategoriler::findOrFail($id);
        return view('admin.kategoriler.kategori_duzenle', compact('KategoriDuzenle'));

     }//fonksiyon bitti
    
      public function KategoriGuncelleForm(Request $request){

        $request->validate([
            'kategori_adi' => 'required',
            'anahtar' =>'required'
        ],[
            'kategori_adi.required' => 'Kategori adı boş olamaz.',
            'anahtar.required' => 'Anahtar boş olamaz.'
        ]);
        
        $kategori_id =$request->id;
        $eski_resim = $request->onceki_resim;

        if($request->file('resim')){
         $resim = $request -> file('resim');
         $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 
 
         Image::read($resim)->resize(700,400)->save('upload/kategoriler/'.$resimadi);
         $resim_kaydet = 'upload/kategoriler/'.$resimadi;  //veritabanına yüklemek için

         //eski resim sil
         if(file_exists($eski_resim)){
            unlink($eski_resim);
         }
         //eski resim sil

 
         Kategoriler::findOrFail($kategori_id)->update([
 
             'kategori_adi'=> $request->kategori_adi,
             'kategori_url'=> str()->slug($request->kategori_adi),
             'anahtar'=> $request->anahtar,
             'aciklama'=> $request->aciklama,
             'resim' => $resim_kaydet,
 
         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Resim ile güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('kategori.hepsi')->with($mesaj);
        } //end if
 
        else{
        Kategoriler::findOrFail($kategori_id)->update([
            'kategori_adi'=> $request->kategori_adi,
            'kategori_url'=> str()->slug($request->kategori_adi),
            'anahtar'=> $request->anahtar,
            'aciklama'=> $request->aciklama,
         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Resimsiz güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('kategori.hepsi')->with($mesaj);
 
        } //end else
 
     }//fonksiyon bitti
     public function KategoriSil($id){
        $kategori_id = Kategoriler::findOrFail($id);
        //resimi siler klasörden
        $resim = $kategori_id->resim;
        unlink($resim);
        //veritabanından resimi siler
        Kategoriler::findOrFail($id)->delete();

         //bildirim
         $mesaj = array(
             'bildirim' => 'Silme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->back()->with($mesaj);
 

     }//fonksiyon bitti





}//class sonu
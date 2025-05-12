<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AltKategoriler;
use App\Models\Kategoriler;
use Intervention\Image\Laravel\Facades\Image; 
use Illuminate\Support\Carbon;

class AltKategoriController extends Controller
{
    //
    public function AltKategoriListe(){
        $altkategoriler = AltKategoriler::latest()->get();
        return view('admin.altkategoriler.altkategori_liste',compact('altkategoriler'));


    }//fonksiyon bitti

    public function AltKategoriEkle(){
        $kategorigoster = Kategoriler::orderBy('kategori_adi','ASC')->get();
        return view('admin.altkategoriler.altkategori_ekle',compact('kategorigoster'));



    }//fonksiyon bitti

      public function AltKategoriEkleForm(Request $request){

        $request->validate([
            'altkategori_adi' => 'required',
            'anahtar' =>'required'
        ],[
            'ltkategori_adi.required' => 'Alt kategori adı boş olamaz.',
            'anahtar.required' => 'Anahtar boş olamaz.'
        ]);
        
        if($request->file('resim')){
         $resim = $request -> file('resim');
         $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 
 
         Image::read($resim)->resize(700,400)->save('upload/altkategoriler/'.$resimadi);
         $resim_kaydet = 'upload/altkategoriler/'.$resimadi;
 
         AltKategoriler::insert([
 
             'kategori_id'=> $request->kategori_id,
             'altkategori_adi'=> $request->altkategori_adi,
             'altkategori_url'=> str()->slug($request->altkategori_adi),
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
         return Redirect()->route('altkategori.liste')->with($mesaj);
        } //end if
 
        else{
         AltKategoriler::insert([
             'kategori_id'=> $request->kategori_id,
             'altkategori_adi'=> $request->altkategori_adi,
             'altkategori_url'=> str()->slug($request->altkategori_adi),
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
         return Redirect()->route('altkategori.liste')->with($mesaj);
 
        } //end else
 
     }//fonksiyon bitti
     public function AltKategoriDuzenle($id){
        $kategoriler = Kategoriler::orderBy('kategori_adi','ASC')->get();
        $altkategoriler = AltKategoriler::findOrFail($id);
        return view('admin.altkategoriler.altkategori_duzenle',compact('kategoriler','altkategoriler'));

     }//fonksiyon bitti
    
    public function AltKategoriForm(Request $request){

        $request->validate([
            'altkategori_adi' => 'required',
            'anahtar' =>'required'
        ],[
            'altkategori_adi.required' => 'Alt kategori adı boş olamaz.',
            'anahtar.required' => 'Anahtar boş olamaz.'
        ]);
        
        $altkategori_id =$request->id;
        $eski_resim = $request->onceki_resim;

        if($request->file('resim')){
         $resim = $request -> file('resim');
         $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 
 
         Image::read($resim)->resize(700,400)->save('upload/altkategoriler/'.$resimadi);
         $resim_kaydet = 'upload/altkategoriler/'.$resimadi;  //veritabanına yüklemek için

         //eski resim sil
         if(file_exists($eski_resim)){
            unlink($eski_resim);
         }
         //eski resim sil

 
         AltKategoriler::findOrFail($altkategori_id)->update([
             'kategori_id'=> $request->kategori_id,
             'altkategori_adi'=> $request->altkategori_adi,
             'altkategori_url'=> str()->slug($request->altkategori_adi),
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
         return Redirect()->route('altkategori.liste')->with($mesaj);
        } //end if
 
        else{
         AltKategoriler::findOrFail($altkategori_id)->update([
             'kategori_id'=> $request->kategori_id,
             'altkategori_adi'=> $request->altkategori_adi,
             'altkategori_url'=> str()->slug($request->altkategori_adi),
             'anahtar'=> $request->anahtar,
             'aciklama'=> $request->aciklama,
         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Resimsiz güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('altkategori.liste')->with($mesaj);
 
        } //end else
 
     }//fonksiyon bitti
     public function AltKategoriSil($id){
        $altkategori_id = AltKategoriler::findOrFail($id);
        //resimi siler klasörden
        $resim = $altkategori_id->resim;
        unlink($resim);
        //veritabanından resimi siler
        AltKategoriler::findOrFail($id)->delete();

         //bildirim
         $mesaj = array(
             'bildirim' => 'Silme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->back()->with($mesaj);
 

     }//fonksiyon bitti


}//class bitti

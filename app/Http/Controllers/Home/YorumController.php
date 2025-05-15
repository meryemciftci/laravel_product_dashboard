<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yorumlar;
use Illuminate\Support\Carbon;

class YorumController extends Controller
{
        public function Yorumlar(){
        //latest -> kategorilerin sondan listlenmesini sağlar
        $yorumlar = Yorumlar::latest()->get();
        return view('admin.anasayfa.yorum_liste',compact('yorumlar'));

        }//function sonu
        
        public function YorumEkle(){
        return view('admin.anasayfa.yorum_ekle');

        }//function sonu

        public function YorumForm(Request $request){

        $request->validate([
            'adi' => 'required',
        ],[
            'adi.required' => 'Ad soyad boş olamaz.',
        ]);
    
         Yorumlar::insert([
 
             'adi'=> $request->adi,
             'metin'=> $request->metin,
             'sirano' => $request->sirano,
             'durum' =>1,
             'created_at'=>Carbon::now('Europe/Istanbul'),

         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Yorum ekleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('yorum.liste')->with($mesaj);
 
     }//fonksiyon bitti



        public function YorumDurum(Request $request){  //urun_id ve duruma erişim reguest ile
        $urun = Yorumlar:: find($request->urun_id);  //id ye gör eürün bulunur
        $urun-> durum = $request->durum;  //durum alanı güncellenir
        $urun->save();  //veritabanına kaydedilir

        return response()->json(['success' =>'Başarılı.']);

      }//function sonu


        public function YorumDuzenle($id){

        $yorumduzenle = Yorumlar::findOrFail($id);
        return view('admin.anasayfa.yorum_duzenle',compact('yorumduzenle'));

     }//fonksiyon bitti

    
     public function YorumGuncelle(Request $request){

        $request->validate([
            'metin' => 'required'
        ],[
            'metin.required' => 'Yorum boş olamaz'
        ]);

        $yorum_id = $request->id;

         Yorumlar::findOrFail($yorum_id)->update([
 
             'adi'=> $request->adi,
             'metin'=> $request->metin,
             'sirano' => $request->sirano,
             'updated_at'=>Carbon::now('Europe/Istanbul'),

         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Yorum güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('yorum.liste')->with($mesaj);


     }//fonksiyon bitti

     
      public function YorumSil($id){
     
        Yorumlar::findOrFail($id)->delete();

         //bildirim
         $mesaj = array(
             'bildirim' => 'Silme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->back()->with($mesaj);
 

     }//fonksiyon bitti
}

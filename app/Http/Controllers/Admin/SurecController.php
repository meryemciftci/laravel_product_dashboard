<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surec;
use Illuminate\Support\Carbon;


class SurecController extends Controller
{
    
        public function SurecListe(){
        //latest -> kategorilerin sondan listlenmesini sağlar
        $surecler = Surec::latest()->get();
        return view('admin.surecler.surec_liste',compact('surecler'));

        }//function sonu

        public function SurecEkle(){
        return view('admin.surecler.surec_ekle');

        }//function sonu

        public function SurecForm(Request $request){

        $request->validate([
            'surec' => 'required',
            'aciklama' => 'max:220',
        ],[
            'surec.required' => 'Süreç boş olamaz.',
            'aciklama.required' => '220 karakteri aştınız',
        ]);
    
         Surec::insert([
 
             'surec'=> $request->surec,
             'baslik'=> $request->baslik,
             'aciklama'=> $request->aciklama,
             'sirano' => $request->sirano,
             'durum' =>1,
             'created_at'=>Carbon::now('Europe/Istanbul'),

         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Süreç ekleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('surec.liste')->with($mesaj);
 
     }//fonksiyon bitti

     
        public function SurecDurum(Request $request){  //urun_id ve duruma erişim reguest ile
        $urun = Surec:: find($request->urun_id);  //id ye gör eürün bulunur
        $urun-> durum = $request->durum;  //durum alanı güncellenir
        $urun->save();  //veritabanına kaydedilir

        return response()->json(['success' =>'Başarılı.']);

      }//function sonu


      
        public function SurecDuzenle($id){

        $surecduzenle = Surec::findOrFail($id);
        return view('admin.surecler.surec_duzenle',compact('surecduzenle'));

     }//fonksiyon bitti

     
      public function SurecGuncelle(Request $request){

        $request->validate([
            'aciklama' => 'max:220'
        ],[
            'aciklama.max' => '220 karakteri aştınız'
        ]);

        $surec_id = $request->id;

         Surec::findOrFail($surec_id)->update([
 
             'surec'=> $request->surec,
             'baslik'=> $request->baslik,
             'aciklama'=> $request->aciklama,
             'sirano' => $request->sirano,
             'updated_at'=>Carbon::now('Europe/Istanbul'),

         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Süreç güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('surec.liste')->with($mesaj);


     }//fonksiyon bitti
     
        public function SurecSil($id){
     
        Surec::findOrFail($id)->delete();

         //bildirim
         $mesaj = array(
             'bildirim' => 'Silme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->back()->with($mesaj);
 

     }//fonksiyon bitti

}

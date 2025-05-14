<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hakkimizda;
use App\Models\Cokluresim;
use Intervention\Image\Laravel\Facades\Image;  
use Illuminate\Support\Carbon;


class HakkimizdaController extends Controller
{
        public function Hakkimizda(){
        $hakkimizda = Hakkimizda::find(1);
        return view('admin.anasayfa.hakkimizda_duzenle',compact('hakkimizda'));
         } //fonksiyon bitti

        

        public function HakkimizdaGuncelle(Request $request){

        $hakkimizda_id = $request->id;
        $eski_resim = $request->onceki_resim;

        if($request->file('resim')){
        $resim = $request -> file('resim');
        $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 

        Image::read($resim)->resize(523,605)->save('upload/hakkimizda/'.$resimadi);
        $resim_kaydet = 'upload/hakkimizda/'.$resimadi;
        //eski resim sil
         if(file_exists($eski_resim)){
            unlink($eski_resim);
         }
        //eski resim sil


        Hakkimizda::findOrFail($hakkimizda_id)->update([

            'baslik'=> $request->baslik,
            'kisa_baslik'=> $request->kisa_baslik,
            'kisa_aciklama'=> $request->kisa_aciklama,
            'aciklama'=> $request->aciklama,
            'resim' => $resim_kaydet,

        ]);
        //bildirim
        $mesaj = array(
            'bildirim' => 'Resim ile güncelleme başarılı',
            'alert-type' => 'success'
        );
        //bildirim
        return Redirect()->back()->with($mesaj);
       } //end if

       else{
        Hakkimizda::findOrFail($hakkimizda_id)->update([

            'baslik'=> $request->baslik,
            'kisa_baslik'=> $request->kisa_baslik,
            'kisa_aciklama'=> $request->kisa_aciklama,
            'aciklama'=> $request->aciklama,
        ]);
        //bildirim
        $mesaj = array(
            'bildirim' => 'Resimsiz güncelleme başarılı',
            'alert-type' => 'success'
        );
        //bildirim
        return Redirect()->back()->with($mesaj);

       } //end else

    }//fonksiyon bitti

    public function HakkimizdaFront(){
        $hakkimizda = Hakkimizda::find(1);
        return view('frontend.anasayfa.hakkimizda',compact('hakkimizda'));



    }//fonksiyon bitti

//Çoklu Resim Alanı------------------------------------------------------------------
    public function CokluResim(){
        return view('admin.anasayfa.coklu_resim');
    }//fonksiyon bitti



    public function CokluForm(Request $request){
        $request -> validate([
            'resim' => 'required',
        ],[
            'resim.required' => 'Resim boş olamaz.',
        ]);
        $resimler = $request -> file('resim');

        //foreach başlangıç
        foreach($resimler as $resim){
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            Image::read($resim)->resize(220,220)->save('upload/coklu/'.$resimadi);
            $resim_kaydet = 'upload/coklu/'.$resimadi;


            Cokluresim::insert([
                'resim' => $resim_kaydet,
                'created_at' => Carbon::now()
            ]);
        }//foreach bitti

        $mesaj = array(
            'bildirim' => 'Çoklu resim yükleme başarılı',
            'alert-type' => 'success'
        );
        return Redirect()->route('coklu.liste')->with($mesaj);
    }//fonksiyon bitti



    public function CokluListe(){

        $coklu_resimler = Cokluresim::all();
        return view('admin.anasayfa.coklu_liste',compact('coklu_resimler'));
    }//fonksiyon bitti

    
    public function CokluDuzenle($id){
        $resim = Cokluresim::findOrFail($id);
        return view('admin.anasayfa.coklu_duzenle',compact('resim'));
    }//fonksiyon bitti



    
     public function CokluGuncelle(Request $request){

        $request->validate([
            'resim' => 'required',
        ],[
            'resim.required' => 'Resim alanı boş olamaz.',
        ]);
        
        $id =$request->id;
        $eski_resim = $request->onceki_resim;

        if($request->file('resim')){
         $resim = $request -> file('resim');
         $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 
 
         Image::read($resim)->resize(222,222)->save('upload/coklu/'.$resimadi);
         $resim_kaydet = 'upload/coklu/'.$resimadi;  //veritabanına yüklemek için

         //eski resim sil
         if(file_exists($eski_resim)){
            unlink($eski_resim);
         }
         //eski resim sil

 
         Cokluresim::findOrFail($id)->update([
             'resim' => $resim_kaydet,
 
         ]);
         //bildirim
         $mesaj = array(
             'bildirim' => 'Çoklu Rresim güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('coklu.liste')->with($mesaj);
        } //end if
    }//fonksiyon bitti 

    

     public function CokluSil($id){
        $resim_id = Cokluresim::findOrFail($id);
        //resimi siler klasörden
        $resim = $resim_id->resim;
        unlink($resim);
        //veritabanından resimi siler
        Cokluresim::findOrFail($id)->delete();

         //bildirim
         $mesaj = array(
             'bildirim' => 'Silme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->back()->with($mesaj);
 

     }//fonksiyon bitti
    

    
}//class bitti

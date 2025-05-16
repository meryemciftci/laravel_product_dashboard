<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use Intervention\Image\Laravel\Facades\Image; 
use Illuminate\Support\Carbon;


class SeoController extends Controller
{
    
    public function SeoDuzenle()
    {
    $seo = Seo::find(1);
    return view('admin.anasayfa.seo',compact('seo'));

    }//fonksiyon bitti

    
     public function SeoGuncelle(Request $request){

       $seo_id = $request->id;
       $eski_resim = $request->onceki_resim;

       if($request->file('resim')){
        $resim = $request -> file('resim');
        $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 

        Image::read($resim)->resize(197,47)->save('upload/'.$resimadi);
        $resim_kaydet = 'upload/'.$resimadi;

        //eski resim sil
        if(file_exists($eski_resim)){
            unlink($eski_resim);
        }


        Seo::findOrFail($seo_id)->update([

            'title'=> $request->title,
            'site_adi'=> $request->site_adi,
            'aciklama'=> $request->aciklama,
            'author'=> $request->author,
            'keywords'=> $request->keywords,
            'harita'=> $request->harita,
            'logo' => $resim_kaydet,
            'created_at'=>Carbon::now('Europe/Istanbul'),

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
        Seo::findOrFail($seo_id)->update([

            'title'=> $request->title,
            'site_adi'=> $request->site_adi,
            'aciklama'=> $request->aciklama,
            'author'=> $request->author,
            'keywords'=> $request->keywords,
            'harita'=> $request->harita,
            'created_at'=>Carbon::now('Europe/Istanbul'),

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


}//class bitti

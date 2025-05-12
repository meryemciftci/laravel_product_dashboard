<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\Laravel\Facades\Image; 

class BannerController extends Controller
{
    public function HomeBanner(){
        $homebanner = Banner::find(1);
    //     //eklendi id hatası
    // if (!$homebanner) {
    //     // Banner kaydı yoksa sayfayı patlatma, geri döndür ve kullanıcıya mesaj ver
    //     return redirect()->back()->with('error', 'Banner kaydı bulunamadı.');
    // }
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));


    }//fonksiyon bitti
    public function BannerGuncelle(Request $request){
       $banner_id = $request->id;
       if($request->file('resim')){
        $resim = $request -> file('resim');
        $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension(); //uzantısı orijinal olacak 16 haneli 

        Image::read($resim)->resize(636,852)->save('upload/banner/'.$resimadi);
        $resim_kaydet = 'upload/banner/'.$resimadi;

        Banner::findOrFail($banner_id)->update([

            'baslik'=> $request->baslik,
            'alt_baslik'=> $request->alt_baslik,
            'url'=> $request->url,
            'video_url'=> $request->video_url,
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
        Banner::findOrFail($banner_id)->update([

            'baslik'=> $request->baslik,
            'alt_baslik'=> $request->alt_baslik,
            'url'=> $request->url,
            'video_url'=> $request->video_url,
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
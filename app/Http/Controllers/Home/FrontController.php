<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urunler;
use App\Models\Kategoriler;
use App\Models\AltKategoriler;

class FrontController extends Controller
{
    
    public function UrunDetay($id,$url){

        $urunler = Urunler::findOrFail($id);
        $etiketler = $urunler -> tag;
        $etiket = explode(',', $etiketler);

        return view('frontend.urunler.urun_detay',compact('urunler','etiket'));

    }//function sonu

    public function KategoriDetay(Request $request, $id, $url){
        $urunler = Urunler::where('durum',1)->where('kategori_id',$id)->orderBy('sirano','ASC')->get();
        $kategoriler = Kategoriler::orderBy('kategori_adi','ASC')->get();
        $kategori = Kategoriler::where('id',$id)->first();

         return view('frontend.urunler.kategori_detay',compact('urunler','kategoriler','kategori'));


    }//function sonu


        public function AltKategoriDetay (Request $request, $id, $url){
        $urunler = Urunler::where('durum',1)->where('altkategori_id',$id)->orderBy('sirano','ASC')->get();
        $altkategoriler = AltKategoriler::orderBy('altkategori_adi','ASC')->get();
        $altkategori = AltKategoriler::where('id',$id)->first();

         return view('frontend.urunler.altkategori_detay',compact('urunler','altkategoriler','altkategori'));


    }//function sonu

}//class bitti

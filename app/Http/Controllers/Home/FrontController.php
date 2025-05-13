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


}//class bitti

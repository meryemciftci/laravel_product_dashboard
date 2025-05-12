<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
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
}

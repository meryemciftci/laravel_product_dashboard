<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesaj;
use Illuminate\Support\Carbon;


class MesajController extends Controller
{
    //
    public function Iletisim(){
        return view('frontend.mesaj.iletisim');

    }//function bitti

    public function TeklifFormu(Request $request){
        $request -> validate([
            'adi' => 'required',
            'email' => 'required|email',
            'telefon' => 'required|digits:11|numeric',
            'konu' => 'required',
            'mesaj' => 'required'
        ],[
            'adi.required' => 'Ad soyad boş olamaz',
            'email.required' => 'Email zorunludur',
            'email.email' => 'Email, mail formatında olmalıdır',
            'telefon.required' => 'Telefon numarası yazınız',
            'telefon.digits' => 'Boşluksuz 11 sayısal akrakter olmalıdır',
            'konu.required' => 'Konu boş olamaz',
            'mesaj.required' => 'Mesajınızı yazınız'
        ]);

        Mesaj::create($request->all());

        //bildirim
         $mesaj = array(
             'bildirim' => 'En kısa sürede tarafınıza dönüş sağlanacaktır',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->back()->with($mesaj);



    }//function bitti


}//class bitti

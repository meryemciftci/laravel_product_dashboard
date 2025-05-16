<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolController extends Controller
{
    public function IzinListe(){
        $izinler = Permission::all();
        return view('admin.rol.izin_liste',compact('izinler'));
    }//function sonu

    public function IzinEkle(){
        return view('admin.rol.izin_ekle');
    }//function sonu

    public function IzinForm(Request $request){
        $rol = Permission::create([
            'name' => $request->name,
            'grup_adi' => $request->grup_adi,
        ]);

        //bildirim
         $mesaj = array(
             'bildirim' => 'İzin ekleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('izin.liste')->with($mesaj);

    }//function sonu

    public function IzinDuzenle($id){

        $izinler = Permission::findOrFail($id);  //işlem kısmına tıkaldığımızda id yakaladığımız yer 
        return view('admin.rol.izin_duzenle',compact('izinler'));

    }// function sonu

    public function IzinGuncelle(Request $request){

         $izin_id = $request->id;
         Permission::findOrFail($izin_id)->update([
            'name' => $request->name,
            'grup_adi' => $request->grup_adi,
         ]);

        //bildirim
         $mesaj = array(
             'bildirim' => 'İzin güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('izin.liste')->with($mesaj);

    }//function sonu

    
    public function IzinSil($id){
        Permission::findOrFail($id)->delete();

        //bildirim
         $mesaj = array(
             'bildirim' => 'İzin silme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->back()->with($mesaj);

    }//function sonu



////////////////////////////////////////////////  ROL   ////////////////////////////////////////////////////////////////////


    
    public function RolListe(){
        $rol = Role::all();
        return view('admin.rol.rol_liste',compact('rol'));
    }//function sonu

    public function RolEkle(){
        return view('admin.rol.rol_ekle');
    }//function sonu

    public function RolForm(Request $request){
        $rol = Role::create([
            'name' => $request->name,
        ]);

        //bildirim
         $mesaj = array(
             'bildirim' => 'Rol ekleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('rol.liste')->with($mesaj);

    }//function sonu


    public function RolDuzenle($id){

        $rol = Role::findOrFail($id);  //işlem kısmına tıkaldığımızda id yakaladığımız yer 
        return view('admin.rol.rol_duzenle',compact('rol'));

    }// function sonu

    public function RolGuncelle(Request $request){

         $rol_id = $request->id;
         Role::findOrFail($rol_id)->update([
            'name' => $request->name,
         ]);

        //bildirim
         $mesaj = array(
             'bildirim' => 'Rol güncelleme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->route('rol.liste')->with($mesaj);

    }//function sonu

    public function RolSil($id){
        Role::findOrFail($id)->delete();

        //bildirim
         $mesaj = array(
             'bildirim' => 'Rol silme başarılı',
             'alert-type' => 'success'
         );
         //bildirim
         return Redirect()->back()->with($mesaj);

    }//function sonu

////////////////////////////////////////////////  Rollere izin verme   ////////////////////////////////////////////////////////////////////

  
  public function RolIzinVerme(){
    $roller = Role::all();
    $izinler = Permission::all();
    $izin_gruplari = User::IzinGruplari();

    return view('admin.rol.rol_izin_ver',compact('roller','izinler','izin_gruplari'));

  }//function sonu

    
}//class sonu

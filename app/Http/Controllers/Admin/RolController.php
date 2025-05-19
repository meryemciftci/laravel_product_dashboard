<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;


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

  public function RolYetkiVer(Request $request){
    $data = array();
    $yetkiler = $request->yetki;

    foreach($yetkiler as $key => $item){
        $data['role_id'] = $request->rol_id;
        $data['permission_id']=$item;

        DB::table('role_has_permissions')->insert($data);

    }//foreach bitti

    //bildirim
            $mesaj = array(
                'bildirim' => 'Role yetki verildi',
                'alert-type' => 'success'
            );
    //bildirim
            return Redirect()->route('rol.liste')->with($mesaj);
   
    
  }//function sonu


  

  public function RolYetkiListe(){
    $rol = Role::all();
    return view('admin.rol.rol_yetki_liste',compact('rol'));

  }//function sonu


   public function RolYetkiDuzenle($id){
    $rol = Role::findOrFail($id);
    $yetkiler = Permission::all();
    $izin_gruplari = User::IzinGruplari();

    return view('admin.rol.rol_yetki_duzenle',compact('rol','yetkiler','izin_gruplari'));


   }//function sonu

   public function RolYetkiGuncelle(Request $request,$id){
    $rol = Role::findOrFail($id);
    $secili_yetkiler = $request->yetki;

    if(!empty($secili_yetkiler)){
        // $rol->syncPermissions($secili_yetkiler);
        $izin_adlari = Permission::whereIn('id', $secili_yetkiler)->pluck('name')->toArray();
        $rol->syncPermissions($izin_adlari);

    }//if sonu

    //bildirim
    $mesaj = array(
        'bildirim' => 'Role güncelleme başarılı',
        'alert-type' => 'success'
    );
    //bildirim
    return Redirect()->route('rol.yetki.liste')->with($mesaj);


   }//function sonu

   public function AdminRolSil($id){
    $rol = Role::findOrFail($id);
    if(!is_null($rol)){
        $rol->delete();
    }//if sonu

     //bildirim
       $mesaj = array(
        'bildirim' => 'Role silme başarılı',
        'alert-type' => 'success'
    );
    //bildirim
    return Redirect()->back()->with($mesaj);



   }//function sonu


   
public function KullaniciListe()
{
    $kullanici_liste = User::latest()->get(); // Tüm kullanıcıları getir
    return view('admin.kullanicilar.kullanici_liste', compact('kullanici_liste'));
}


   public function KullaniciEkle(){
    $roller = Role::all();
    return view('admin.kullanicilar.kullanici_ekle',compact('roller'));


   }//function sonu
   public function KullaniciEkleForm(Request $request){
            $request->validate([
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'telefon' => 'required|unique:users',
            ]);


    $rol = Role::findById($request->rol); // ID'den rolü bul
    $rol_adi = $rol ? $rol->name : 'admin'; // varsa adını al, yoksa admin olarak varsay

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->username = $request->username;
    $user->telefon = $request->telefon;
    $user->password = Hash::make($request->password);
    $user->rol = $rol_adi; // ✅ ARTIK SABİT DEĞİL
    $user->durum=1;
    $user->save();

    if ($rol) {
        $user->assignRole($rol->name); // roller tablosuna atanıyor
    }

    $mesaj = array(
        'bildirim' => 'Kullanıcı ekleme başarılı',
        'alert-type' => 'success'
    );
    return Redirect()->route('kullanici.liste')->with($mesaj);
}





   public function KullaniciDuzenle($id){
    $user = User::findOrFail($id);
    $roller = Role::all();

    return view('admin.kullanicilar.kullanici_duzenle',compact('user','roller'));

   }//function sonu


   public function KullaniciGuncelle(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Rolü bul ve varsa adını al, yoksa mevcut rolünü koru
    $rol = Role::findById($request->rol);
    $rol_adi = $rol ? $rol->name : $user->rol;

    $user->name = $request->name;
    $user->email = $request->email;
    $user->username = $request->username;
    $user->telefon = $request->telefon;
    $user->rol = $rol_adi; // Artık sabit değil
    $user->save();

    // Mevcut tüm rolleri temizle
    $user->roles()->detach();

    if ($rol) {
        $user->assignRole($rol->name); // Yeni rolü ata
    }

    $mesaj = array(
        'bildirim' => 'Kullanıcı güncelleme başarılı',
        'alert-type' => 'success'
    );
    return Redirect()->route('kullanici.liste')->with($mesaj);
}


   public function KullaniciSil($id){
    $user = User::findOrFail($id);
    if(!is_null($user)){
        $user->delete();
    }
        //bildirim
         $mesaj = array(
            'bildirim' => 'Kullanıcı silme başarılı',
            'alert-type' => 'success'
        );
        //bildirim
        return Redirect()->back()->with($mesaj);


   }//function sonu

   
   public function KullaniciDurum(Request $request){  //urun_id ve duruma erişim reguest ile
        $urun = User:: find($request->urun_id);  //id ye gör eürün bulunur
        $urun-> durum = $request->durum;  //durum alanı güncellenir
        $urun->save();  //veritabanına kaydedilir

        return response()->json(['success' =>'Başarılı.']);

      }//function sonu


    
}//class sonu

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Urunler extends Model
{
     use HasFactory;

    //bütün sutunlara işlem yap anlamına geliyor.
    protected $guarded = [];
    public function Altkategori(){
    return $this ->belongsTo(AltKategoriler::class, 'altkategori_id','id');   //iki tablo arasında birleştirme
    } //fonksiyon bitti

 public function kategoriler(){
    return $this ->belongsTo(Kategoriler::class, 'kategori_id','id');   //iki tablo arasında birleştirme
    } //fonksiyon bitti
}


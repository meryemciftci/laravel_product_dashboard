<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AltKategoriler extends Model
{

    protected $guarded = [];

    public function iliskikategori(){
        return $this ->belongsTo(Kategoriler::class, 'kategori_id','id');   //iki tablo arasında birleştirme
    } //fonksiyon bitti
}
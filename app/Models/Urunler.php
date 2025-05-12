<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Urunler extends Model
{
     use HasFactory;

    //bütün sutunlara işlem yap anlamına geliyor.
    protected $guarded = [];
}

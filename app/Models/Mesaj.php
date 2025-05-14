<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\MailGonder;

class Mesaj extends Model
{
    //

    public $fillable =['adi', 'email','telefon','konu','mesaj'];

    public static function boot(){
        parent::boot();
        static::created(function($bilgi){
            $adminEmail = "meryemmcftc@gmail.com";
            Mail::to($adminEmail)->send(new MailGonder($bilgi));
        });

    }
    
}

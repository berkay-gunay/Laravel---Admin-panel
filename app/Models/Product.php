<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'urun_adi', 'urun_aciklamasi', 'fiyati', 'marka', 
        'urun_grubu', 'cinsiyet', 'cerceve_rengi', 'cam_rengi', 
        'cerceve_sekli', 'ekartman', 'sap_uzunlugu', 'kopru_uzunlugu', 'degrade','urun_gorseli'
    ];
}

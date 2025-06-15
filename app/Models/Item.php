<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        "Nama item","Deskripsi","Harga Item","Harga Restock","Tanggal Restock","Stock"
        ];
}

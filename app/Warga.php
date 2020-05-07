<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    Protected $primaryKey ='id_warga';
    Protected $fillable=['id_warga','nama_warga','nik','kec','kel','alamat'];
}

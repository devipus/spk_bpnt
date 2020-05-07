<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Normalisasi extends Model
{
    //
       Protected $primaryKey ='id_normalisasi';
   Protected $fillable=['id_normalisasi','kriteria_normalisasi','bobot_normalisasi'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
   

               Protected $primaryKey ='id_alternatif';
   Protected $fillable=['id_alternatif','alternatif','budget','dp','lokasi','harga','bonus'];
}

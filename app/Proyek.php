<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
  

    Protected $primaryKey ='id_proyek';
    Protected $fillable=['id_proyek','nama_proyek','ket'];
}

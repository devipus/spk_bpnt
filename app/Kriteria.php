<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    
    Protected $primaryKey ='id_kriteria';
    Protected $fillable=['id_kriteria','kriteria','subkriteria','nilai'];
}


 
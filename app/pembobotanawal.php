<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembobotanawal extends Model
{
    
    Protected $primaryKey ='id_pembobotanawal';
    Protected $fillable=['id_pembobotanawal','tahun','penghasilan','pekerjaan','pendidikan','aset','luas_lantai','jenis_lantai','jenis_dinding','sumber_penerangan','sumber_air','fasil_bab'];

}
  
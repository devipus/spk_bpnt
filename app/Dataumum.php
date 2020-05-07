<?php

namespace App;
use App\Provinsi;
use App\Kabkota;
use App\Kel;
use App\Kec;

use Illuminate\Database\Eloquent\Model;

class Dataumum extends Model
{
   

            Protected $primaryKey ='id_dataumum';
   Protected $fillable=['id_dataumum','id_provinsi','id_kabkota','id_kec','id_kel','rt','rw','luassk','luasverifikasi','jumlahbangunan','jumlahpenduduk','jumlahkk'];

    public function regions(){
         return $this -> hasOne (Regions::class, 'code', 'id_provinsi');
   }
   public function cities(){
         return $this -> hasOne (Cities::class, 'code', 'id_kabkota');
   }
   public function districts(){
         return $this -> hasOne (Districts::class, 'code', 'id_kec');
   }
   public function villages(){
         return $this -> hasOne (Villages::class, 'code', 'id_kel');
   }
}


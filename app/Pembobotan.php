<?php

namespace App;
use App\Warga;
use App\Kriteria;
use Illuminate\Database\Eloquent\Model;

class pembobotan extends Model
{
    

    Protected $primaryKey ='id_pembobotan';
    Protected $fillable=['id_pembobotan','tahun','id_warga','penghasilan','pekerjaan','pendidikan','aset','luas_lantai','jenis_lantai','jenis_dinding','sumber_penerangan','sumber_air','fasil_bab'];

    public function warga(){
           return $this -> hasOne (Warga::class, 'id_warga', 'id_warga');
    }

    public function penghasilan1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'penghasilan');
    }

    public function pekerjaan1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'pekerjaan');
    }

    public function pendidikan1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'pendidikan');
    }

    public function aset1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'aset');
    }

    public function luas_lantai1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'luas_lantai');
    }

    public function jenis_lantai1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'jenis_lantai');
    }

    public function jenis_dinding1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'jenis_dinding');
    }

    public function sumber_penerangan1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'sumber_penerangan');
    }

    public function sumber_air1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'sumber_air');
    }

    public function fasil_bab1(){
           return $this -> hasOne (Kriteria::class, 'id_kriteria', 'fasil_bab');
    }
}

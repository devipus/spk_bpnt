<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Villages extends Model
{
    Protected $primaryKey ='id';
   Protected $fillable=['id','country','region','city','district','code','name','postcode','latitude','longitude'];
   public function __construct(){
   	$this->setTable('geo_villages');
   	return parent::__construct();

   }
   public function countrys(){
   		 return $this -> hasOne (Countries::class, 'iso', 'country');

   }
   public function regions(){
   		 return $this -> hasOne (Regions::class, 'code', 'region');
   }
   public function cities(){
   		 return $this -> hasOne (Cities::class, 'code', 'city');
   }
   public function districts(){
   		 return $this -> hasOne (Districts::class, 'code', 'district');
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
     Protected $primaryKey ='id';
   Protected $fillable=['id','iso','iso3','iso_numeric','fips','name','capital','continent','currency_name','currency_code','phonecode','tld','postal_code_format','postal_code_regex','geonameid','language','area','population'];
       public function __construct(){
   	$this->setTable('geo_countries');
   	return parent::__construct();

   }
}

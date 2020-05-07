<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'laporans';
    protected $primaryKey ='id_lap';
    protected $guarded = ['created_at','updated_at'];
}

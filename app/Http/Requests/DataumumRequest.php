<?php

namespace App\Http\Requests;
use App\Regions;
use App\Cities;
use App\Districts;
use App\Countries;
use App\Villages;
use App\Dataumum;
use Illuminate\Foundation\Http\FormRequest;

class DataumumRequest extends Request
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $prov = $this->request->get('id_provinsi');

        $city = $this->request->get('id_kabkota');
        $kec = $this->request->get('id_kec');
        $kel = $this->request->get('id_kel');
        $rw = $this->request->get('rw');
        $rt = $this->request->get('rt');
        return [
               'id_provinsi' => ['required', function($attribute, $value, $fail){
                    $query=Regions::where('code', $value)
                                  ->where('country', 'ID')
                                  ->first();
                    if (!$query){
                        $fail('Provinsi tidak ditemukan!');
                    }
               }],
                 'id_kabkota' => ['required', function($attribute, $value, $fail) use ($prov){
                    $query=Cities::where('code', $value)
                                 ->where('country', 'ID')
                                 ->where('region', $prov)
                                 ->first();
                    if (!$query){
                        $fail('Kab/Kota tidak ditemukan!');
                    }
               }],
                 'id_kec' => ['required', function($attribute, $value, $fail) use ($prov, $city){
                    $query=Districts::where('code', $value)
                                    ->where('country', 'ID')
                                    ->where('region', $prov)
                                    ->where('city', $city)
                                    ->first();
                    if (!$query){
                        $fail('Kecamatan tidak ditemukan!');
                    }

               }],
                 'id_kel' => ['required', function($attribute, $value, $fail) use ($prov, $city, $kec){
                    $query=Villages::where('code', $value)
                                   ->where('country', 'ID')
                                   ->where('region', $prov)
                                   ->where('city', $city)
                                   ->where('district', $kec)
                                   ->first();
                    if (!$query){
                        $fail('Kelurahan tidak ditemukan!');
                    }

               }],
             'rw' => 'max:8|required|regex:/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',
             'rt' => ['max:5', 'required', 'regex:/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/', 
                function($attribute, $value, $fail) use ($prov, $city, $kec, $kel, $rw){
                    $query=Dataumum::where('rt', $value)
                                   ->where('rw', $rw)
                                   ->where('id_provinsi', $prov)
                                   ->where('id_kabkota', $city)
                                   ->where('id_kec', $kec)
                                   ->where('id_kel', $kel)
                                   ->first();
                    if ($query){
                        $fail('RT Telah ada.');
                    }

               }],
      
             'luassk' => 'max:8|required|regex:/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',
             'luasverifikasi' => 'max:8|required|regex:/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',
             'jumlahbangunan' => 'max:8|required|regex:/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',
             'jumlahpenduduk' => 'max:8|required|regex:/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',
             'jumlahkk' => 'max:8|required|regex:/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',
        
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembobotanawalRequest extends Request
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'tahun' => 'max:5|required',
             'penghasilan' => 'max:20|required',
             'pekerjaan' => 'max:20|required',
             'pendidikan' => 'max:20|required',
             'aset' => 'max:20|required',
             'luas_lantai' => 'max:20|required',
             'jenis_lantai' => 'max:20|required',
             'jenis_dinding' => 'max:20|required',
             'sumber_penerangan' => 'max:20|required',
             'sumber_air' => 'max:20|required',
             'fasil_bab' => 'max:20|required',
        ];
    }
}

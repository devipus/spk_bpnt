<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WargaRequest extends Request
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'nama_warga' => 'max:50|required',
             'nik' => 'max:50|required',
             'kec' => 'max:50|required',
             'kel' => 'max:50|required',
             'alamat' => 'max:50|required',
        
        ];
    }
}

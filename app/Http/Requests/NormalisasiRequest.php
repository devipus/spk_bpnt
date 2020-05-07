<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NormalisasiRequest extends Request
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'kriteria_normalisasi' => 'max:20|required',
             'bobot_normalisasi' => 'max:20|required',
        
        ];
    }
}

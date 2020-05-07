<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyekRequest extends Request
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'nama_proyek' => 'max:80|required',
             'ket' => 'max:20|required',
        
        ];
    }
}

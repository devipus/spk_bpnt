<?php namespace App\Http\Requests;

class KriteriaRequest extends Request {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kriteria' => 'max:20|required',
            'subkriteria' => 'max:20|required',
            'nilai' => 'max:20|required',
   
        ];

    }
   
}

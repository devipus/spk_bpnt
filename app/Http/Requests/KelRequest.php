<?php namespace App\Http\Requests;

class KelRequest extends Request {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    

        return [



        'kel' => 'max:40|required',
        
      
        
            
        ];

    }
   public function validateBatasan()
   {

   }
}

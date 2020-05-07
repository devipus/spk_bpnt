<?php namespace App\Http\Requests;

class JabatanRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [



        'jabatan' => 'max:20|required',
        
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}

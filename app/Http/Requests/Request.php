<?php namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
abstract class Request extends FormRequest {
	public function authorize()
	{
		// Honeypot 
		//return  $this->input('address') == '';
		return true;
}
}
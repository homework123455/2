<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3|max:50',
            'category'=>'required',
            //'week'=>'required',
			//'time'=>'required',
			
             //  'cost',
            //'status'=>'required|string|max:20',
            'keeper'=>'required',
            //'lendable'=>'required|boolean',
            'location'=>'required|max:50',
            // 'remark',
            //'vendor'=>'required',
            //'warranty'=>'required',
			//'img'=>'required'
			//'file1'=>'required|image|size:500'

        ];
    }
}

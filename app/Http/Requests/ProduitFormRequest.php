<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//false will lead to 403
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return 
            //
            [
                'designation' => 'required|min:5|max:255',
                'prix'=> 'required|digits_between:1000,50000',
                'description' => 'required|min:10|max:255',
                'pays_source' => 'required|min:5|max:255',
                'prix'=> 'required|digits_between:1,5',
                'image' => 'file|mimes:jpg,png,jpeg,gif,svg|nullable'
                //|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',

            ]
        ;
    }
}

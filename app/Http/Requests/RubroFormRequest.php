<?php

namespace activofijo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RubroFormRequest extends FormRequest
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
            //nombre de los form
            'descripcion' => 'required|max:500',
            'vidautil' => 'required|max:10',
            //'coeficiente' => 'required|max:10',
            'deprecia' => 'max:2',
            'actualiza' => 'max:2'
        ];
    }
}

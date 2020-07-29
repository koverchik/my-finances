<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewPurseRequest extends FormRequest
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
            'createNamePurse'=> 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
      'createNamePurse.required' => 'Придумайте название',
      'createNamePurse.max:100' => 'Длинна названия не может превышать 100 символов'
      ];
    }
}

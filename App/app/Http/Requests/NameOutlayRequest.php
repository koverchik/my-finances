<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NameOutlayRequest extends FormRequest
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
            'title' => 'required|max:100',
            'name1' => 'required',

        ];
    }

    public function messages()
    {
        return [
      'title.required' => 'Для сохранения сметы придумайте название и впишите в поле ниже',
      'name1.required' => 'Для сохранения сметы необходима хотя бы одна запись'
      ];
    }
}

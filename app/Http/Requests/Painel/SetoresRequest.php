<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class SetoresRequest extends FormRequest
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
                        
            'setor'         => 'required|min:3|max:150',
            'email'         => "required|min:3|max:100|email|unique:setores,email,{$this->segment(3)},id",
            'contato'       => 'required',
            'fone'          => 'required',
        ];
    }
}

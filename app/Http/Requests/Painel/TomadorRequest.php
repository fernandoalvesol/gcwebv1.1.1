<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class TomadorRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        
        
        return [

            'razaosocial'    => 'required|min:3|max:150',
            'cnpj'          => 'required|min:3|max:50',
            'endereco'      => 'required',
            'email'         => "required|min:3|max:100|email|unique:users,email,{$this->segment(3)},id",
           'fone'          =>  'required|min:3|max:20',
            'contato'       => 'required',
            
            
        ];
    }

}

<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ConformidadesRequest extends FormRequest
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
            
           'tipo'           => 'required|min:3|max:50',
           'setor'          => 'required|min:1|max:155',
           'atribuir'       => 'required|min:1|max:50',
           'relator'        => 'required|min:1|max:50',
           'prioridade'     => 'required|min:3|max:50',
           'data'           => 'required|date',
           'hora'           => 'required',
           'status'         => 'required|in:E,R,A,D',
           'descricao'      => 'required|min:15|max:500',
            
        ];
    }
}

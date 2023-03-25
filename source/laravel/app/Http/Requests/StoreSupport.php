<?php

namespace App\Http\Requests;

use App\Models\Support;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupport extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Support $support)
    {        
        return [
            'lesson' => ['required', 'exists:lessons,id'], //param obrigatorio e vai ser verificado se existe na tabela o conteudo da coluna id
            'status' => [
                'required',
                Rule::in(array_keys($support->statusOptions)) //Verifica se esta passando os status permitidos ja cadastrados
            ],
            'description' => ['required', 'min:3', 'max:10000'],
        ];
    }
}

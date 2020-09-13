<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
        $url = $this->segment(3);

        return [
            'name' => "required|max:100|unique:plans,name,{$url},url",
            'description' => 'nullable|min:10',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }

    /**
     * Custom messages for Plan Request
     *
     * @return array
     */
    public function messages()
    {
        return [
            //name input
            'name.required' => 'Informe o <b>nome</b>!',
            'name.max' => 'O <b>nome</b> não pode ter mais que 100 caracteres!',
            'name.unique' => 'Já existe um plano com este <b>nome</b>!',

            //description input
            'description.min' => 'A <b>descrição</b> não pode ter menos que 10 caracteres!',

            //price input
            'price.required' => 'Informe o <b>preço</b>!',
            'price.regex' => '<b>Preço</b> inválido!',
        ];
    }
}

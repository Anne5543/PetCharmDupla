<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
            [
                'nome' => 'required|string|max:40',
                'email' => 'required|email|max:45',
                'idade' => 'required|integer',
                'nivel_escolar' => 'required|string|max:55',
                'telefone' => 'required|string|max:15',
            ];
    }
}

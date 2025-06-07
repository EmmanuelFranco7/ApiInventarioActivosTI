<?php

namespace App\Http\Request\dependencias;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateDependenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre_dependencia' => ['required', 'string', 'max:245', 'unique:dependencias,nombre_dependencia,'.$this->route('id')],
            'otros_detalles' => ['nullable', 'string', 'max:500'], 
                       
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nombre_dependencia.required' => "Debe llenar este campo",
            'nombre_dependencia.string' => "Debe enviar una cadena de texto",
            'nombre_dependencia.max' => "Debe enviar una cadena de texto de máximo 245 caracteres",
            'nombre_dependencia.unique' => "Este campo ya ha sido registrado",

           
            'otros_detalles.string' => "Debe enviar una cadena de texto",
            'otros_detalles.max' => "Debe enviar una cadena de texto de máximo 245 caracteres",
            
            
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $response = response()->json([
            'errors' => $validator->errors(),
            'message' => 'Error processing the form. Please correct the indicated errors.',
        ], 422);

        throw new HttpResponseException($response);
    }
}
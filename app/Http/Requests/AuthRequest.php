<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        return [
            'name' => 'required|max:50',
            'email' => 'required|unique:users|max:50',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле :attribute не заполнено',
            'email.required' => 'Поле :attribute не заполнено',
            'email.unique' => ':attribute уже существует',
            'password.required' => 'Поле :attribute не заполнено',
            'password.min' => 'Поле :attribute должен содержать не менее 8 символов',
            'password.confirmed' => 'Пароли не совпадают'
        ];
    }
}

<?php

namespace App\Http\Requests\List;

use Illuminate\Foundation\Http\FormRequest;

class ListStoreRequest extends FormRequest
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
            'desk_id' => 'string|required',
            'name' => 'required|max:255',
            'task' => 'required'
        ];
    }
}

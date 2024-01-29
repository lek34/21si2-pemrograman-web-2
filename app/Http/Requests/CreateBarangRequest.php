<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // seluruh user authenticated maupun tidak dapat mengirimkan request ini
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // validation rule yang akan di-apply ke masing-masing field request
        return [
            'nama' => 'required|string|min:3|max:50',
            'harga' => 'required|integer|min:0|max:1000000000'
        ];
    }
}

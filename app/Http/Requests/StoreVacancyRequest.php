<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacancyRequest extends FormRequest
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
            'vacancy_banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vacancy_banner_title' => 'required|string|max:255',
            'vacancy_banner_subtitle' => 'nullable|string|max:255',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'job_title' => 'required|string|max:255',
            'job_type' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'schedule' => 'nullable|string|max:50',
            'category' => 'required|in:TECHNICAL POSITION,BACK OFFICE SUPPORT,INTERNS',
            'status' => 'required|in:active,inactive',
            'job_requirements' => 'nullable|string',
            'job_description' => 'nullable|string',
        ];
    }
}

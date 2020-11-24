<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdateRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'status_id' => ['required', 'numeric', 'exists:statuses,id'],
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'website' => ['nullable', 'max:255', 'string'],
            'profile' => ['required', 'max:255', 'string'],
            'cover' => ['required', 'max:255', 'string'],
            'user_name' => ['required', 'max:255', 'string'],
            'created_by' => ['required', 'numeric'],
            'custom_url' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
        ];
    }
}

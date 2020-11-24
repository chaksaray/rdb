<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'account_type_id' => ['required', 'exists:account_types,id'],
            'gender_id' => ['required', 'exists:genders,id'],
            'report_user_type_id' => [
                'required',
                'exists:report_user_types,id',
            ],
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'max:255', 'string'],
            'password' => ['required'],
            'avatar' => ['nullable', 'file'],
            'bio' => ['required', 'max:255', 'string'],
            'is_recieve_new_letter' => ['required', 'boolean', 'boolean'],
            'is_social_notification' => ['required', 'boolean', 'boolean'],
            'is_recieve_email_from_followed_author' => [
                'required',
                'boolean',
                'boolean',
            ],
            'is_metion_notification' => ['required', 'boolean', 'boolean'],
            'is_promotion' => ['required', 'boolean', 'boolean'],
        ];
    }
}

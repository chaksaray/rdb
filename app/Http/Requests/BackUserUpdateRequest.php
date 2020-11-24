<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackUserUpdateRequest extends FormRequest
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
            'back_user_role_id' => ['required', 'exists:back_user_roles,id'],
        ];
    }
}

<?php

namespace App\Http\Requests\Conversation;

use Illuminate\Foundation\Http\FormRequest;

class SignoffRequest extends FormRequest
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
            'employee_id' => 'required|digits:6',
            'check_one' => 'accepted',
            'check_two' => 'accepted',
            'agreement' => 'accepted'
        ];
    }

    public function messages() 
    {
        return [
            'check_one.*' => 'please select all the fields',
            'check_two.*' => 'please select all the fields',
            'agreement.*' => 'Please click on agree to signoff the conversation',
            'employee_id.*' => 'Please enter your employee ID to complete the signoff'
        ];
    }
}

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
            'check_one' => 'required|boolean',
            'check_two' => 'required|boolean',
            'check_three' => 'required|boolean'
        ];
    }

    public function messages() 
    {
        $message = __('You should discuss performance expectations, adjust goals, and capture significant conversation outcomes as part of this process. Please indicate if you agree or disagree with each of the statements before signing off');
        return [
            'check_one.*' => $message,
            'check_two.*' => $message,
            'check_three.*' => $message,
            'employee_id.*' => 'Please enter your employee ID to complete the signoff'
        ];
    }
}

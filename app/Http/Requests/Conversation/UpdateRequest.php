<?php

namespace App\Http\Requests\Conversation;

use App\Rules\NotMoreThan4Month;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        if ($this->field == 'date') {
            return [
                'value' => [new NotMoreThan4Month($this->route('conversation'))]
            ];
        }
        return [];
    }
}

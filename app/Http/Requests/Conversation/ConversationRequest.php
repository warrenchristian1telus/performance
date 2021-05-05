<?php

namespace App\Http\Requests\Conversation;

use Illuminate\Foundation\Http\FormRequest;

class ConversationRequest extends FormRequest
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
            'conversation_topic_id' => 'required|exists:conversation_topics,id',
            'participant_id' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'comment' => 'required',

        ];
    }
}

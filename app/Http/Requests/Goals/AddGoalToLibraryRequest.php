<?php

namespace App\Http\Requests\Goals;

use Illuminate\Foundation\Http\FormRequest;

class AddGoalToLibraryRequest extends FormRequest
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
            'title' => 'required',
            'what' => 'required',
            'why' => 'required',
            'how' => 'required',
            'measure_of_success' => 'required',
            'goal_type_id' => 'required|exists:goal_types,id',
            'itemsToShare' => 'required|array',
            'itemsToShare.*' => 'exists:users,id',
            'is_mandatory' => 'required|boolean',
            'start_date' => 'required|date',
            'target_date' => 'required|date'
        ];
    }

    public function messages() {
        return [
            'itemsToShare.required' => 'please select at least one employee'
        ];
    }
}

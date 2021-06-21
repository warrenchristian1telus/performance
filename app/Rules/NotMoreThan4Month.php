<?php

namespace App\Rules;

use App\Models\Conversation;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class NotMoreThan4Month implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $conversation;

    public function __construct(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // dd($value);
        $date1 = Conversation::/* whereNotNull('signoff_user_id')-> */where('id','<>', $this->conversation->id)->whereDate('date', '>' , $this->conversation->date)->orderBy('date')->first();
        $date2 = Conversation::/* whereNotNull('signoff_user_id')-> */where('id',"<>", $this->conversation->id)->whereDate('date',  '<', $this->conversation->date)->orderBy('date','DESC')->first();
        //dd($date1->date);
        // dd($date2->date);
        if(!$date1 && !$date2) return true;

        $date3 = Carbon::createFromFormat('Y-m-d',$value);
        $dates = [
            $date3
        ];

        if ($date1) array_push($dates, $date1->date);
        if ($date2) array_push($dates, $date2->date);
        // Sort
        sort($dates);
        // dd($dates[0]->diffInDays($dates[1]));
        // If different of 0-1 or 1-2 is more than 122 days return false
        if (count($dates) === 3) {
            if ($dates[0]->diffInDays($dates[1]) > 122 || $dates[1]->diffInDays($dates[2]) > 122) {
                return false;
            }
        } else {
            if ($dates[0]->diffInDays($dates[1]) > 122) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Conversations must be scheduled every four months, at minimum.');
    }
}

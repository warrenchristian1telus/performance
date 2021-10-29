<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['topic', 'conversationParticipants', 'conversationParticipants.participant'];
    protected $appends = ['c_date', 'c_time', 'questions', 'date_time', 'is_current_user_participant'];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'time' => 'datetime:H:i:s',
        'sign_off_time' => 'datetime'
    ];

    public function topic()
    {
        return $this->belongsTo('App\Models\ConversationTopic', 'conversation_topic_id', 'id');
    }
    public function conversationParticipants()
    {
        return $this->hasMany('App\Models\ConversationParticipant');
    }

    public function getCDateAttribute()
    {
        return $this->date->format('M d, Y');
    }

    public function getCTimeAttribute()
    {
        return $this->time->format('h:i A');
    }

    public function getDateTimeAttribute()
    {
        return Carbon::parse($this->date->format('M d, Y') .' '. $this->time->format('h:i A')); // $this->time->format('h:i A');
    }

    public function getQuestionsAttribute()
    {
        return Config::get('global.conversation.topic.' . $this->conversation_topic_id . '.questions');
    }

    // Should not be used.
    public static function hasNotDoneAtleastOnceIn4Months() 
    {
        $latestPastConversation = self::latestPastConversation();
        if ($latestPastConversation) {
            return $latestPastConversation->date_time->addDays(122)->isPast();
        }
        return true;
    }

    // Should not be used.
    public static function hasNotYetScheduledConversation($user_id)
    {
        return !self::where('user_id', $user_id)->count() > 0;
    }

    public static function warningMessage() {
        $user = Auth::user();
        $authId = $user->id;
        $lastConv = self::where('user_id', $authId)->whereNotNull('signoff_user_id')->orderBy('sign_off_time', 'DESC')->first();

        if ($lastConv) {
            if ($lastConv->sign_off_time->addMonths(4)->lt(Carbon::now())) {
                return "You are required to complete a performance conversation every 4 months at minimum. You are overdue. Please complete a conversation as soon as possible.";
            }
            return "Your last performance conversation was completed on ".$lastConv->sign_off_time->format('d-M-y').". You must complete your next performance conversation by ". $lastConv->sign_off_time->addMonths(4)->format('d-M-y') ;

        }
        return "You have not completed any performance conversations. You must complete your first performance conversation by " . $user->joining_date->addMonths(4)->format('d-M-y');
    }

    public static function latestPastConversation() 
    {
        return self::whereNotNull('signoff_user_id')->orderBy('date', 'DESC')->first();
    }

    public function getIsCurrentUserParticipantAttribute()
    {
        foreach ($this->conversationParticipants->toArray() as $cp) {
            if ($cp['participant_id'] === Auth::id())
                return true;
        }
        return false;
    }
}

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
    protected $appends = ['c_date', 'c_time', 'questions', 'date_time', 'is_current_user_participant', 'is_with_supervisor', 'last_sign_off_date'];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'time' => 'datetime:H:i:s',
        'sign_off_time' => 'datetime:Y-m-d',
        'supervisor_signoff_time' => 'datetime:Y-m-d'
    ];

    public function topic()
    {
        return $this->belongsTo('App\Models\ConversationTopic', 'conversation_topic_id', 'id');
    }
    public function conversationParticipants()
    {
        return $this->hasMany('App\Models\ConversationParticipant');
    }

    public function getInfoComment1Attribute() {
        if($this->attributes['info_comment1'] === null) return '';
        return $this->attributes['info_comment1'];
    }

    public function getInfoComment2Attribute() {
        if($this->attributes['info_comment2'] === null) return '';
        return $this->attributes['info_comment2'];
    }

    public function getInfoComment3Attribute() {
        if($this->attributes['info_comment3'] === null) return '';
        return $this->attributes['info_comment3'];
    }

    public function getInfoComment4Attribute() {
        if($this->attributes['info_comment4'] === null) return '';
        return $this->attributes['info_comment4'];
    }

    public function getInfoComment5Attribute() {
        if($this->attributes['info_comment5'] === null) return '';
        return $this->attributes['info_comment5'];
    }

    // If conversation is with
    public function getIsWithSupervisorAttribute() {
        $authId = session()->has('original-auth-id') ? session()->get('original-auth-id') : Auth::id();
        $user = User::find($authId);
        $reportingManager = $user->reportingManager()->first();
        if (!$reportingManager) {
            return false;
        }
        foreach ($this->conversationParticipants->toArray() as $cp) {
            if ($cp['participant_id'] === $reportingManager->id)
                return true;
        }
        return false;
    }

    public function getCDateAttribute()
    {
        return $this->date->format('M d, Y');
    }

    public function getLastSignOffDateAttribute()
    {
        return $this->supervisor_signoff_time > $this->sign_off_time ? $this->sign_off_time : $this->supervisor_signoff_time;
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
        // return Config::get('global.conversation.topic.' . $this->conversation_topic_id . '.questions');
        return ConversationTopic::find($this->conversation_topic_id)->question_html;
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

    public static function getLastConv($ignoreList = []) {
        $user = Auth::user();
        $authId = $user->id;
        $lastConv = self::where(function ($query) use ($authId) {
            $query->where('user_id', $authId)->orWhereHas('conversationParticipants', function ($query) use ($authId) {
                return $query->where('participant_id', $authId);
            });
        })->whereNotNull('signoff_user_id')
        ->whereNotNull('supervisor_signoff_id')
        ->whereNotIn('id', $ignoreList)
        ->orderBy('sign_off_time', 'DESC')
        ->first();

        if ($lastConv && !$lastConv->is_with_supervisor) {
            $ignoreList[] = $lastConv->id;
            $lastConv = self::getLastConv($ignoreList);
        }
        return $lastConv;
    }

    public static function warningMessage() {
        
        $lastConv = self::getLastConv();
        
        if ($lastConv) {
            if ($lastConv->sign_off_time->addMonths(4)->lt(Carbon::now())) {
                return "You are required to complete a performance conversation every 4 months at minimum. You are overdue. Please complete a conversation as soon as possible.";
            }
            return "Your last performance conversation was completed on ".$lastConv->sign_off_time->format('d-M-y').". You must complete your next performance conversation by ". $lastConv->sign_off_time->addMonths(4)->format('d-M-y') ;

        }
        $user = Auth::user();
        $joiningDate = $user->joining_date ? $user->joining_date->addMonths(4)->format('d-M-y') : '';
        return "You have not completed any performance conversations. You must complete your first performance conversation by " . $joiningDate;
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

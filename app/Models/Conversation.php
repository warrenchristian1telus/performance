<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Conversation extends Model
{
    use HasFactory;

    protected $with = ['topic', 'conversationParticipants', 'conversationParticipants.participant'];
    protected $appends = ['c_date', 'c_time', 'questions'];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'time' => 'datetime:H:i:s',
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

    public function getQuestionsAttribute()
    {
        return Config::get('global.conversation.topic.' . $this->conversation_topic_id . '.questions');
    }
}

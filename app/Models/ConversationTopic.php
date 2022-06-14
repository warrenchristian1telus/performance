<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class ConversationTopic extends Model
{
    protected $appends = ['questions'];
    
    protected $fillable = [
    'id',
    'name',
    'when_to_use',
    'question_html',    
    'preparing_for_conversation',      
    ];

    public function getQuestionsAttribute()
    {
        return Config::get('global.conversation.topic.' . $this->id . '.questions');
    }
}

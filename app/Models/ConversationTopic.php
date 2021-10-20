<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class ConversationTopic extends Model
{
    protected $appends = ['questions'];

    public function getQuestionsAttribute()
    {
        return Config::get('global.conversation.topic.' . $this->id . '.questions');
    }
}

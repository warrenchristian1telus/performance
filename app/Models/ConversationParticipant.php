<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationParticipant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversation_id',
        'participant_id',
    ];

    public $timestamps = false;

    protected $with = ['participant'];

    public function participant()
    {
        return $this->belongsTo('App\Models\Participant');
    }
}

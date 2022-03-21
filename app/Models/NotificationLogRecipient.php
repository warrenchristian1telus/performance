<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotificationLogRecipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_log_id',
        'recipient_id',
    ];

    public function notification_log() {
        return $this->belongsTo('App\Models\NotificationLog', 'notification_log_id', 'id');
    }

    public function recipient() {
        return $this->belongsTo(User::Class, 'recipient_id', 'id');
    }


}


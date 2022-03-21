<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id', 
        //'recipients',
        'subject',
        'description',
        'alert_type',
        'alert_format',
        'sender_id',
        'template_id',
        'status',
        'date_sent',
    ];


    public function recipients() {
        return $this->hasMany('App\Models\NotificationLogRecipient', 'notification_log_id');
    }

}


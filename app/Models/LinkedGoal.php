<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedGoal extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_goal_id',
        'supervisor_goal_id'
    ];
}

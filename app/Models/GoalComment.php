<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class GoalComment extends Model
{
    use SoftDeletes;
    

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany('App\Models\GoalComment', 'parent_id')->withTrashed();
    }

    public function canBeDeleted() {
        return ($this->user_id === Auth::id());
    }

    public function canBeEdited() {
        return (!$this->trashed()) && $this->user_id === Auth::id();
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'azure_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'azure_id',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function goals() {
        return $this->hasMany('App\Models\Goal');
    }

    public function activeGoals()
    {
        return $this->hasMany('App\Models\Goal')->where('status', 'active');
    }

    public function goalCount() {
        return $this->goals()->count();
    }

    public function conversations() {
        return $this->hasMany('App\Models\Conversation');
    }

    public function upcomingConversation() {
        return $this->conversations()->whereNull('signoff_user_id')->orderBy('date', 'DESC')->limit(1);
    }

    public function latestConversation()
    {
        return $this->conversations()->whereNotNull('signoff_user_id')->orderBy('date', 'DESC')->limit(1);
    }
}

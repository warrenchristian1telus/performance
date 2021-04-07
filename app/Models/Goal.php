<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Goal extends Model implements Auditable
{
  use AuditableTrait;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'goal_type_id',
    'start_date',
    'target_date',
    'what',
    'why',
    'how',
    'measure_of_success',
    'status',
    'user_id',
    'created_at',
    'updated_at'
  ];


  protected $appends = [
    "start_date_human",
    "target_date_human"
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'start_date' => 'datetime',
    'target_date' => 'datetime',
  ];

  public function goalType() {
    return $this->belongsTo('App\Models\GoalType')->select('name', 'id');
  }

  public function user() {
    return $this->belongsTo('App\Models\User')->select('name', 'id');
  }

  public function comments()
  {
    // TODO: Order of comments
    return $this->hasMany('App\Models\GoalComment')->orderBy('created_at','ASC')->limit(10);
  }

  public function getStartDateHumanAttribute() {
    return $this->start_date->format('F d, Y');
  }
  
  public function getTargetDateHumanAttribute()
  {
    return $this->target_date->format('F d, Y');
  }
}

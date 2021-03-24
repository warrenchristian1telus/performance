<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'description',
    'goal_type_id',
    'start_date',
    'target_date',
    'what',
    'why',
    'how',
    'measure_of_success',
    'user_id',
    'created_at',
    'updated_at'
  ];

  public function goalType() {
    return $this->belongsTo('App\Models\GoalType')->select('name', 'id');
  }

}

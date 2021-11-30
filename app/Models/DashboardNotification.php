<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DashboardNotification extends Model
{
  use SoftDeletes;
  protected $table = 'dashboard_notifications';

  protected $fillable = [
      'id',
      'user_id',
      'notification_type',
      'comment',
      'related_id',
      'status',
      'created_at',
      'updated_at',
      'deleted_at'
  ];

  public function relatedGoal() {
      return $this->belongsTo(Goal::class, 'related_id');
  }

}

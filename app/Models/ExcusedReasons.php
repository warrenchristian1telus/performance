<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExcusedReasons extends Model
{
  protected $table = 'excused_reasons';

  protected $fillable = [
      'id', 'name', 'description'
  ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessLevel extends Model
{
    protected $table = 'access_levels';

    protected $fillable = [
        'id',
        'name'
    ];
}

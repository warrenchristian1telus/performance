<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoredDate extends Model
{
    use SoftDeletes;
    protected $table = 'stored_dates';

    protected $fillable = [
        'id',
        'name',
        'value'
    ];
}

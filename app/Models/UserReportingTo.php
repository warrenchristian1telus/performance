<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReportingTo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reporting_to_id',
    ];
    
}

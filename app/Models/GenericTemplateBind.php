<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenericTemplateBind extends Model
{
    use HasFactory;

    protected $fillable = [
        'seqno',
        'bind',
        'description',
        'generic_template_id',
    ];
}

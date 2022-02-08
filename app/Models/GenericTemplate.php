<?php

namespace App\Models;

use App\Models\GenericTemplateBind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenericTemplate extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'template',
        'description',
        'instructional_text',
        'sender',
        'email',
        'azure_id',
        'subject',
        'body',
        'created_by_id',
        'modified_by_id',
    ];

    public function binds()
    {
        return $this->hasMany(GenericTemplateBind::class);
    }

    public function created_by() 
    {
        return $this->hasOne(User::Class, 'id', 'created_by_id');
    }

    public function modified_by() 
    {
        return $this->hasOne(User::Class, 'id', 'modified_by_id');
    }
    
}

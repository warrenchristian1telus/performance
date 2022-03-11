<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Builder;

class JobSchedAudit extends Model
{

    public $table = 'job_sched_audit';

    use HasFactory;

    //protected $primaryKey = ['id'];

    protected $fillable = [
        'id',
        'job_name',
        'start_time',
        'end_time',
        'status',
    ];

    // protected function setKeysForSaveQuery(Builder $query)
    // {
    //     $keys = $this->getKeyName();
    //     if(!is_array($keys)){
    //         return parent::setKeysForSaveQuery($query);
    //     }
    //
    //     foreach($keys as $keyName){
    //         $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
    //     }
    //
    //     return $query;
    // }
    //
    // protected function getKeyForSaveQuery($keyName = null)
    // {
    //     if(is_null($keyName)){
    //         $keyName = $this->getKeyName();
    //     }
    //
    //     if (isset($this->original[$keyName])) {
    //         return $this->original[$keyName];
    //     }
    //
    //     return $this->getAttribute($keyName);
    // }

}

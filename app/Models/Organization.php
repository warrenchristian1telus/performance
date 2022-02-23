<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Organization extends Model
{

    public $table = 'organizations';

    use HasFactory;

    protected $primaryKey = ['deptid'];
    public $incrementing = false;

    protected $fillable = [
        'deptid',
        'organization',
        'level1',
        'level2',
        'level3',
        'level4',
        'date_updated',
        'date_deleted',
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

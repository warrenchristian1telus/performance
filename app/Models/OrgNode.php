<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrgNode extends Model
{

    public $table = 'org_nodes';

    use HasFactory;

    protected $primaryKey = ['org_hierarchy_key'];
    public $incrementing = false;

    protected $fillable = [
        'business_name',
        'deptid',
        'hierarchy_level',
        'parent_key',
        'date_updated',
        'date_deleted',
    ];


    public function children()
    {
        return $this->hasmany(OrgNode::class, 'org_hierarchy_key','parent_key')
        ->with('children');
    }
        // ->whereExists(function ($query) {
        //     $query->select(DB::raw(1))
        //     ->from('employee_demo')
        //     ->whereColumn('employee_demo.deptid', 'organizations.deptid');
        // }
        // );
    // }

    // private static function tree()
    // {
    //     $allBusinesses = OrgNode::whereExists(function ($query) {
    //         $query->select(DB::raw(1))
    //         ->from('employee_demo')
    //         ->whereColumn('employee_demo.deptid', 'organizations.deptid');
    //     }
    //     )
    //     ->get();
    //     $rootBusinesses = $allBusinesses
    //     ->whereNull('parent_key');
    //     self::formatBusiness($rootBusinesses, $allBusinesses);
    //     return $rootBusinesses;
    // }
    //
    //
    // private static function formatBusiness($businesses, $allBusinesses)
    // {
    //     foreach ($businesses as $business) {
    //         $business->children = $allBusinesses
    //         ->where('parent_key', $org_hierarchy_key)
    //         ->values();
    //         if ($business->children->isnotempty()) {
    //             self::formatBusiness($business->children, $allBusinesses);
    //         }
    //     }
    // }


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

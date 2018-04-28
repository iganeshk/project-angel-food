<?php

namespace App;

use App\BaseModel;

class Casemanager extends BaseModel
{
    protected $table = 'casemanager';
    protected $primaryKey = 'caseManagerId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'caseManagerId', 'caseManagerName','caseManagerPhone','caseManagerFax', 'caseManagerAgency'
    ];
    public function user() {
        return $this->hasMany('\App\User', 'caseManagerId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

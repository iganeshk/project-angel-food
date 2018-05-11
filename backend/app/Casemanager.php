<?php

namespace App;

use App\BaseModel;

class Casemanager extends BaseModel
{
    protected $table = 'casemanager';
    protected $primaryKey = 'casemanagerId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'casemanagerId', 'casemanagerName','casemanagerPhone','casemanagerFax', 'casemanagerAgency'
    ];
    public function user() {
        return $this->hasMany('\App\User', 'casemanagerId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

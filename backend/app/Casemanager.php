<?php

namespace App;

use App\BaseModel;
/* Model is a representation of a database table. 
Interacts with DB*/
class Casemanager extends BaseModel
{
    protected $table = 'casemanager';
    protected $primaryKey = 'casemanagerId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // Table fields are here :
    protected $fillable = [
        'casemanagerId', 'casemanagerName','casemanagerPhone','casemanagerFax', 'casemanagerAgency'
    ];
    //Relationship of USer and his Casemanager
    public function user() {
        return $this->hasMany('\App\User', 'casemanagerId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

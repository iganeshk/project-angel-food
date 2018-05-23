<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class Address extends BaseModel
{

    protected $table = 'address';
    protected $primaryKey = 'addressId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // Table fields are here :
    protected $fillable = [
        'addressId', 'addrLine1','addrLine2', 'CITY', 'STATE','ZIP'
    ];
    //Relationship of USer and his Address
    public function user() {
        return $this->hasOne('\App\User', 'addressId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
}

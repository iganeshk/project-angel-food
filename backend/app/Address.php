<?php

namespace App;

use App\BaseModel;

class Address extends BaseModel
{

    protected $table = 'address';
    protected $primaryKey = 'addressId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'addressId', 'addrLine1','addrLine2', 'CITY', 'STATE','ZIP'
    ];
    public function user() {
        return $this->hasOne('\App\User', 'addressId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
}

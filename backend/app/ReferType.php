<?php

namespace App;

use App\BaseModel;

class ReferType extends BaseModel
{

    protected $table = 'refer_type';

    protected $primaryKey = 'referTypeId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'referTypeName'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function refer() {
        return $this->hasMany('\App\Refer', 'referTypeId');
    }
   
}

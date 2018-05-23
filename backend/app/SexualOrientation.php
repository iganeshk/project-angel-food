<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class SexualOrientation extends BaseModel
{

    protected $primaryKey = 'sexualOrientationTypeId';
    protected $table = 'sexual_orientation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Table fields:
    protected $fillable = [
        'sexualOrientationTypeId', 'sexualOrientationTypeName'
    ];
    //Relationship of USer and his SexualOrientation:
    public function user() {
        return $this->hasMany('\App\User', 'sexualOrientationTypeId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
  
}

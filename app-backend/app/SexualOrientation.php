<?php

namespace App;

use App\BaseModel;

class SexualOrientation extends BaseModel
{

    protected $primaryKey = 'sexualOrientationTypeId';
    protected $table = 'sexual_orientation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sexualOrientationTypeId', 'sexualOrientationTypeName'
    ];
    public function user() {
        return $this->hasMany('\App\User', 'sexualOrientationTypeId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
  
}

<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class Race extends BaseModel
{

    protected $table = 'RACE';
    protected $primaryKey = 'raceTypeId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Table fields:
    protected $fillable = [
        'raceTypeId', 'raceTypeName'
    ];
    //Relationship of USer and his Race:
    public function user() {
        return $this->hasMany('\App\User', 'raceTypeId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
  
}

<?php

namespace App;

use App\BaseModel;

class Race extends BaseModel
{

    protected $table = 'RACE';
    protected $primaryKey = 'raceTypeId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'raceTypeId', 'raceTypeName'
    ];
    public function user() {
        return $this->hasMany('\App\User', 'raceTypeId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
  
}

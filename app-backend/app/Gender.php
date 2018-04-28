<?php

namespace App;

use App\BaseModel;

class Gender extends BaseModel {
    protected $table = 'gender';
    protected $primaryKey = 'genderTypeId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'genderTypeID', 'genderTypeName'
    ];
    public function user() {
        return $this->hasMany('\App\User', 'genderTypeId');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
}

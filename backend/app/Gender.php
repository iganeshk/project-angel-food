<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class Gender extends BaseModel {
    protected $table = 'gender';
    protected $primaryKey = 'genderTypeId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //table fields:
    protected $fillable = [
        'genderTypeID', 'genderTypeName'
    ];
    //Relationship of USer and his Gender
    public function user() {
        return $this->hasMany('\App\User', 'genderTypeId');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
}

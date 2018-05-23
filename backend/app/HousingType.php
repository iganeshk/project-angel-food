<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class HousingType extends BaseModel
{
    
    protected $table = 'housing_type';
    protected $primaryKey = 'housingTypeId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Table fields:
    protected $fillable = [
        'housingTypeId', 'housingTypeName',
    ];
    //Relationship of USer and his HousingType:
    public function user() {
        return $this->hasMany('\App\User', 'housingTypeId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

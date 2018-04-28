<?php

namespace App;

use App\BaseModel;

class HousingType extends BaseModel
{
    
    protected $table = 'housing_type';
    protected $primaryKey = 'housingTypeId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'housingTypeId', 'housingTypeName',
    ];
    public function user() {
        return $this->hasMany('\App\User', 'housingTypeId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

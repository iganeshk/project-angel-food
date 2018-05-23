<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class FoodPrepFacility extends BaseModel {

    protected $table = 'food_prep_facilities';
    protected $primaryKey = 'prepId';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // Table fields are here :
    protected $fillable = [
        'prepId', 'prepName'
    ];
    //Relationship of USer and his FoodPrepFacilities
    public function users() {
        return $this->belongsToMany('\App\User', 'site_user_food_prep_map', 'prepId', 'uid');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

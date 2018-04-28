<?php

namespace App;

use App\BaseModel;

class FoodPrepFacility extends BaseModel {

    protected $table = 'food_prep_facilities';
    protected $primaryKey = 'prepId';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prepId', 'prepName'
    ];
    
    public function users() {
        return $this->belongsToMany('\App\User', 'site_user_food_prep_map', 'prepId', 'uid');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

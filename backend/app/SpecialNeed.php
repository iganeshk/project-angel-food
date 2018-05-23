<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class SpecialNeed extends BaseModel
{

    
    protected $table = 'special_need';
    protected $primaryKey = 'specialNeedId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Table fields: 
    protected $fillable = [
        'specialNeedId', 'specialNeedName'
    ];
    //Relationship of USer and his SpecialNeeds:
    public function users() {
        return $this->belongsToMany('\App\User', 'site_user_special_need_map', 'specialNeedId', 'uid');
    }
    //public function user() {
     //   return $this->hasMany('\App\User', 'specialNeedId');
    //}
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
}

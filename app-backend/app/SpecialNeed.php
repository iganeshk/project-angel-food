<?php

namespace App;

use App\BaseModel;

class SpecialNeed extends BaseModel
{

    
    protected $table = 'special_need';
    protected $primaryKey = 'specialNeedId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'specialNeedId', 'specialNeedName'
    ];
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

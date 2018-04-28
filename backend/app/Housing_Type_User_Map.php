<?php

namespace App;

use App\BaseModel;

class Housing_Type_User_Map extends BaseModel
{

    protected $table = 'SITE_USER_HOUSING_TYPE_MAP';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UID', 'H_TYPE_ID',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

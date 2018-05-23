<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class UserType extends BaseModel
{

    protected $table = 'site_user_type';
    protected $primaryKey = 'userTypeId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Table fields:
    protected $fillable = [
        'userTypeId', 'userTypeName'
    ];
    //Relationship of USer and his Usertype:
    public function user() {
        return $this->hasMany('\App\User','userTypeId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
  }

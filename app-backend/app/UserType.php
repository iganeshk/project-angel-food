<?php

namespace App;

use App\BaseModel;

class UserType extends BaseModel
{

    protected $table = 'site_user_type';
    protected $primaryKey = 'userTypeId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userTypeId', 'userTypeName'
    ];

    public function user() {
        return $this->hasMany('\App\User','userTypeId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
  }

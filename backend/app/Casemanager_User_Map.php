<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Casemanager_User_Map extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    
	protected $table = 'CASEMANAGER_SITE_USER_MAP';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CM_ID', 'CM_NAME','CM_PHONE','CM_FAX', 'CM_AGENCY'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}



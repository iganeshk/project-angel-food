<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class Refer extends BaseModel
{

    protected $table = 'REFER';
    protected $primaryKey = 'referId';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Table fields:
    protected $fillable = [
        'referId', 'referPhone', 'referName','referTypeId'
    ];
    //Relationship of USer and his Refer type:
    public function referType() {
        return $this->belongsTo('\App\ReferType', 'referTypeId');
    }
     public function user() {
        return $this->hasOne('\App\User', 'uid');
    }
   
}

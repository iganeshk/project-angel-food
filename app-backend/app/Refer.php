<?php

namespace App;

use App\BaseModel;

class Refer extends BaseModel
{

    protected $table = 'REFER';
    protected $primaryKey = 'referId';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'referId', 'referPhone', 'referName','referTypeId'
    ];

    public function referType() {
        return $this->belongsTo('\App\ReferType', 'referTypeId');
    }
     public function user() {
        return $this->hasOne('\App\User', 'uid');
    }
   
}

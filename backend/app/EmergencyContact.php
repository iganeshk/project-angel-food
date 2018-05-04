<?php

namespace App;

use App\BaseModel;

class EmergencyContact extends BaseModel
{
    protected $table = 'emergency_contact';
    protected $primaryKey = 'contactId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contactId', 'contactName','phone','relation'  
        ];
    public function user() {
        return $this->hasOne('\App\User', 'contactId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

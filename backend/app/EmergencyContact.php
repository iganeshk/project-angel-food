<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class EmergencyContact extends BaseModel
{
    protected $table = 'emergency_contact';
    protected $primaryKey = 'contactId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // Table fields are here :
    protected $fillable = [
        'contactId', 'contactName','phone','relation'  
        ];
    //Relationship of USer and his EmergencyContact
    public function user() {
        return $this->hasOne('\App\User', 'contactId');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

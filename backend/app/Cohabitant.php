<?php

namespace App;

use App\BaseModel;
/*Model is a representation of a database table. 
Interacts with DB */
class Cohabitant extends BaseModel
{

    protected $table = 'cohabitant';
    protected $primaryKey = 'cohabitantId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // Table fields are here :
    protected $fillable = [
    'cohabitantId',
    'cohabitantFirstName',
    'cohabitantLastName',
    'cohabitantAge', 
    'relationship', 
    'isCaretaker', 'mealRequired'
    ];
    //Relationship of USer and his Cohabitants:
    public function user() {
        return $this->hasOne('\App\User','site_user_cohabitant_map','cohabitantId' ,'uid');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

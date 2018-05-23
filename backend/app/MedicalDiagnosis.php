<?php

namespace App;

use App\BaseModel;

/*Model is a representation of a database table. 
Interacts with DB */
class MedicalDiagnosis extends BaseModel
{
    protected $table = 'medical_diagnosises';
    protected $primaryKey = 'diagnosisId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Table fields:
    protected $fillable = [
        'diagnosisId', 'diagnosisName'
    ];
    //Relationship of USer and his MedicalDiagnosis:
    public function user() {
        return $this->hasMany('\App\User', 'site_user_diagnosis_map','diagnosisId' ,'uid');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

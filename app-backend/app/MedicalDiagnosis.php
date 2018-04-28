<?php

namespace App;

use App\BaseModel;

class MedicalDiagnosis extends BaseModel
{
    protected $table = 'medical_diagnosises';
    protected $primaryKey = 'diagnosisId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'diagnosisId', 'diagnosisName'
    ];
    public function user() {
        return $this->hasMany('\App\User', 'site_user_diagnosis_map','diagnosisId' ,'uid');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}

<?php

namespace App;

use App\BaseModel;

class User extends BaseModel
{

    protected $table = 'site_user';
    protected $primaryKey = 'uid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'uid', 
    'fname', 
    'lname', 
    'email',
    'pwd',
    'dob', 
    'ssn', 
    'mobPhone', 
    'printLang', 
    'oralLang', 
    'userTypeId', 
    'genderTypeId',
    'raceTypeId', 
    'sexualOrientationTypeId',
    'housingTypeId',
    'referId',
    'isVeteran',
    'addressId',
    'caseManagerId' 
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function userType() {
        return $this->belongsTo('\App\UserType', 'userTypeId');
    }
     public function refer() {
        return $this->belongsTo('\App\Refer', 'referId');
    }
     public function casemanager() {
        return $this->belongsTo('\App\Casemanager', 'caseManagerId');
    }
    public function sexualOrientationType() {
        return $this->belongsTo('\App\SexualOrientation', 'sexualOrientationTypeId');
    }
    public function raceType() {
        return $this->belongsTo('\App\Race', 'raceTypeId');
    }
    public function housingType() {
        return $this->belongsTo('\App\HousingType', 'housingTypeId');
    }
    public function genderType() {
        return $this->belongsTo('\App\Gender', 'genderTypeId');
    }
    public function foodPrepFacilities() {
        return $this->belongsToMany('\App\FoodPrepFacility', 'site_user_food_prep_map', 'uid', 'prepId');
    }
    public function specialNeeds(){
        return $this->belongsToMany('\App\SpecialNeed', 'site_user_special_need_map', 'uid', 'specialNeedId');
    }
    public function address(){
        return $this->belongsTo('\App\Address', 'addressId');
    }
    public function cohabitants() {
        return $this->belongsToMany('\App\Cohabitant', 'site_user_cohabitant_map','uid','cohabitantId');
    }
    public function medicalDiagnosises() {
        return $this->belongsToMany('\App\MedicalDiagnosis', 'site_user_diagnosis_map','uid','diagnosisId');
    }
     /*public function specialNeed() {
        return $this->hasMany('\App\SpecialNeed', 'specialNeedId');
    }*/
}

<?php
/**
 - change all foeign keys in user table to id suffix
 - change associations to model instead of id
 - add hadMany to all relations
*/

$router->get('/user/{id}', function($id){
	return \App\User::with('userType', 'genderType', 'raceType', 'housingType', 'refer', 'refer.referType', 'sexualOrientationType', 'address', 'caseManager', 'foodPrepFacilities','specialNeeds','cohabitants','medicalDiagnosises')->where('uid', $id)->get();
});

$router->get('/user', function(\Illuminate\Http\Request $request){
	$fName = $request->get('fname');
	$lName = $request->get('lname');
	$uid = $request->get('userId');
    $where = [];
    if (!empty($fName)) {
    	$where[] = ['fname', '=', $fName];
    }
    if (!empty($lName)) {
    	$where[] = ['lname', '=', $lName];
    }
    if (!empty($uid)) {
    	$where[] = ['uid', '=', $uid];
    }
	return !empty($where) ? \App\User::with('userType', 'genderType', 'raceType', 'housingType', 'refer', 'refer.referType', 'sexualOrientationType', 'address', 'caseManager', 'foodPrepFacilities','specialNeeds','cohabitants','medicalDiagnosises')->where($where)->get() : [];
});

$router->get('/users', function () {
    return \App\User::with('userType', 'genderType', 'raceType', 'housingType', 'refer', 'refer.referType', 'sexualOrientationType', 'address', 'caseManager', 'foodPrepFacilities','specialNeeds', 'cohabitants','medicalDiagnosises')->get();
});
$router -> post('/user', function (\Illuminate\Http\Request $request){
	$fName = $request->json()->get('fname');
	$lName = $request->json()->get('lname');
	$email = $request->json()->get('email');
	$pwd = $request->json()->get('pwd');
	$dob = $request->json()->get('dob');
	$ssn = $request->json()->get('ssn');
	$mobPhone = $request->json()->get('mobPhone');
	$printLang = $request->json()->get('printLang');
	$oralLang = $request->json()->get('oralLang');
	$address = $request->json()->get('addressId');
	$userTypeData = $request->json()->get('userType');
	$foodPrepFacilities = $request->json()->get('foodPrepFacilities');
	$specialNeeds= $request->json()->get('specialNeeds');
	$cohabitants=$request->json()->get('cohabitants');
	$medicalDiagnosises= $request->json()->get('medicalDiagnosises');
	$userType = \App\UserType::where('userTypeId', $userTypeData['userTypeId'])->firstOrFail();

	$genderTypeData = $request->json()->get('genderType');
	$genderTypeId = \App\Gender::where('genderTypeId', $genderTypeData['genderTypeId'])->firstOrFail();

	$raceTypeData = $request->json()->get('raceType');
	$raceTypeId = \App\Race::where('raceTypeId', $raceTypeData['raceTypeId'])->firstOrFail();
	
	$referIdData = $request->json()->get('refer');
	$referId = \App\Refer::where('referId', $referIdData['referId'])->firstOrFail();

	$housingTypeData = $request->json()->get('housingType');

	$housingTypeId = \App\HousingType::where('housingTypeId', $housingTypeData['housingTypeId'])->firstOrFail();

	$sexualOrientationTypeData = $request->json()->get('sexualOrientationType');
	$sexualOrientationTypeId = \App\SexualOrientation::where('sexualOrientationTypeId', $sexualOrientationTypeData['sexualOrientationTypeId'])->firstOrFail();
	$casemanagerIdData = $request->json()->get('caseManager');
	$caseManagerId = \App\Casemanager::where('caseManagerId', $casemanagerIdData['caseManagerId'])->firstOrFail();
	$addressIdData= $request->json()->get('address');
	$address = \App\Address::where('addressId', $addressIdData['addressId'])->firstOrFail();

	$user = new \App\User;
	$user->fname = $fName;
	$user->lname = $lName;
	$user->email = $email;
	$user->dob = $dob;
	$user->ssn = $ssn;
	$user->mobPhone = $mobPhone;
	$user->printLang = $printLang;
	$user->oralLang = $oralLang;
	$user->userTypeId = $userTypeData['userTypeId'];
	$user->genderTypeId = $genderTypeData['genderTypeId'];
	$user->raceTypeId = $raceTypeData['raceTypeId'];
	$user->housingTypeId = $housingTypeData['housingTypeId'];
	$user->sexualOrientationTypeId = $sexualOrientationTypeData['sexualOrientationTypeId'];
	$user->referId = $referIdData['referId'];
	$user->caseManagerId = $casemanagerIdData['caseManagerId'];
	$user->addressId= $addressIdData['addressId'];
	$user->refer()->associate($referId)->save();
	$user->casemanager()->associate($caseManagerId)->save();
	$user->housingType()->associate($housingTypeId)->save();
	$user->raceType()->associate($raceTypeId)->save();
	$user->sexualOrientationType()->associate($sexualOrientationTypeId)->save();
	$user->genderType()->associate($genderTypeId)->save();
	$user->userType()->associate($userType)->save();
	$user->address()->associate($address)->save();
    if (!empty($foodPrepFacilities)){
    	foreach($foodPrepFacilities as $foodPrepFacility) {
    		$foodPrepId = $foodPrepFacility['prepId'];
    		$user->foodPrepFacilities()->attach($foodPrepId);
    	}
    }

    if(!empty($specialNeeds)){
    	foreach($specialNeeds as $specialNeed){
    		$specialNeedId= $specialNeed['specialNeedId'];
    		$user->specialNeeds()->attach($specialNeedId);
    	}
    }
    if(!empty($cohabitants)){
    	foreach($cohabitants as $cohabitant){
    		$cohabitantId=$cohabitant['cohabitantId'];
    		$user->cohabitants()->attach($cohabitantId);
    	}
    }
    if(!empty($medicalDiagnosises)){
    	foreach($medicalDiagnosises as $medicalDiagnosis){
    		$diagnosisId= $medicalDiagnosis['diagnosisId'];
    		$user->medicalDiagnosises()->attach($diagnosisId);
    	}
    }

    return response()->json(array('success' => true, 'user' => $user), 200);
	
});

$router->delete('/user/{id}', function ($id){
	$success= App\User::where('uid', $id)->delete();
	return response()->json(array('success' => $success), 200);
});
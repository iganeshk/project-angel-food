<?php
/**
 - change all foeign keys in user table to id suffix
 - change associations to model instead of id
 - add hadMany to all relations
*/

$router->get('/user/{id}',['middleware' => 'auth', function($id){
	return \App\User::with('userType', 'genderType', 'raceType', 'housingType', 'refer', 'refer.referType', 'sexualOrientationType', 'address', 'caseManager', 'foodPrepFacilities','specialNeeds','cohabitants','medicalDiagnosises')->where('uid', $id)->get();
}]);

$router->get('/user',['middleware' => 'auth', function(\Illuminate\Http\Request $request){
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
}]);

$router->get('/users',['middleware' => 'auth', function () {
    return \App\User::with('userType', 'genderType', 'raceType', 'housingType', 'refer', 'refer.referType', 'sexualOrientationType', 'address', 'caseManager', 'foodPrepFacilities','specialNeeds', 'cohabitants','medicalDiagnosises')->get();
}]);
$router -> post('/user',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$fName = $request->json()->get('fname');
	$lName = $request->json()->get('lname');
	$email = $request->json()->get('email');
	$username = $request->json()->get('username');
	$password = $request->json()->get('password');
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
	$uid = $request->json()->get('uid');
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
    
    if (empty($uid)) {
    	$user = new \App\User;
    } else {
    	$user = \App\User::where('uid',$uid)->first();
    }

    $user->fname = $fName;
	$user->lname = $lName;
	$user->email = $email;
	$user->username = $username;
	$user->password = sha1($password);
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
    	$foodprepIds = [];
    	foreach($foodPrepFacilities as $foodPrepFacility) {
    		$foodPrepId = $foodPrepFacility['prepId'];
    		$foodprepIds[] = $foodPrepId;
    		//$user->foodPrepFacilities()->attach($foodPrepId);
    	}
    	$user->foodPrepFacilities()->sync($foodprepIds);
    }

    if(!empty($specialNeeds)){
    	$specialNeedIds = [];
    	foreach($specialNeeds as $specialNeed){
    		$specialNeedId= $specialNeed['specialNeedId'];
    		$specialNeedIds[] = $specialNeedId;
    		//$user->specialNeeds()->attach($specialNeedId);
    	}
    	$user->specialNeeds()->sync($specialNeedIds);
    }

    if(!empty($cohabitants)){
    	$cohabitantIds = [];
    	foreach($cohabitants as $cohabitant){
    		$cohabitantId=$cohabitant['cohabitantId'];
    		$cohabitantIds[] = $cohabitantId;
    		//$user->cohabitants()->attach($cohabitantId);
    	}
    	$user->cohabitants()->sync($cohabitantIds);
    }

    if(!empty($medicalDiagnosises)){
    	$medicalDiagnosisIds = [];
    	foreach($medicalDiagnosises as $medicalDiagnosis){
    		$diagnosisId= $medicalDiagnosis['diagnosisId'];
    		$medicalDiagnosisIds[] = $diagnosisId;
    		//$user->medicalDiagnosises()->attach($diagnosisId);
    	}
    	$user->medicalDiagnosises()->sync($medicalDiagnosisIds);
    }

    return response()->json(array('success' => true, 'user' => $user), 200);
	
}]);

$router->delete('/user/{id}',['middleware' => 'auth', function ($id){
	$success= App\User::where('uid', $id)->delete();
	return response()->json(array('success' => $success), 200);
}]);

$router -> post('/user/activate',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$uid = $request->json()->get('uid');
	$active = $request->json()->get('active');
	$user = \App\User::where('uid',$uid)->first();
	$user->active = $active;
	$user->save();
	return response()->json(array('success' => true), 200);
}]);

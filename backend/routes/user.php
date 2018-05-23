<?php

//Get request is routed to this router to retrieve data 
$router->get('/user/{id}',['middleware' => 'auth', function($id){
	return \App\User::with('userType', 'genderType', 'raceType', 'housingType', 'refer', 'refer.referType', 'sexualOrientationType', 'address', 'casemanager', 'foodPrepFacilities','specialNeeds','cohabitants','medicalDiagnosises')->where('uid', $id)->get();
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
	return !empty($where) ? \App\User::with('userType', 'genderType', 'raceType', 'housingType', 'refer', 'refer.referType', 'sexualOrientationType', 'address', 'casemanager', 'foodPrepFacilities','specialNeeds','cohabitants','medicalDiagnosises')->where($where)->get() : [];
}]);

$router->get('/users',['middleware' => 'auth', function () {
    return \App\User::with('userType', 'genderType', 'raceType', 'housingType', 'refer', 'refer.referType', 'sexualOrientationType', 'address', 'casemanager', 'foodPrepFacilities','specialNeeds', 'cohabitants','medicalDiagnosises')->get();
}]);

//Post Request is routed to this router to add the fields of new user
$router -> post('/user',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$fName = $request->json()->get('fname'); // Getting each value from Json object
	$lName = $request->json()->get('lname');
	$email = $request->json()->get('email');
	$username = $request->json()->get('username');
	$password = $request->json()->get('password');
	$dob = $request->json()->get('dob');
	$ssn = $request->json()->get('ssn');
	$mobPhone = $request->json()->get('mobPhone');
	$printLang = $request->json()->get('printLang');
	$oralLang = $request->json()->get('oralLang');
	$isVeteran= $request->json()->get('isVeteran');
	$active = $request->json()->get('active');
	$address = $request->json()->get('addressId');// Getting AddressId from JSON
	$userTypeData = $request->json()->get('userType');// Getting UserTypeId from JSON
	$foodPrepFacilities = $request->json()->get('foodPrepFacilities');// Getting Prepid from JSON
	$specialNeeds= $request->json()->get('specialNeeds');//Getting specialneeds id from json
	$cohabitants=$request->json()->get('cohabitants');//Getting cohabitant id from json
	$medicalDiagnosises= $request->json()->get('medicalDiagnosises');//Getting medicalDiagnosis id from json
	$uid = $request->json()->get('uid');//Getting user id from json
	
	$userType = \App\UserType::where('userTypeId', $userTypeData['userTypeId'])->firstOrFail();//Retrieving usertype from UserType table using userTypeId 

	$genderTypeData = $request->json()->get('genderType');// Getting genderId from JSON
	$genderTypeId = \App\Gender::where('genderTypeId', $genderTypeData['genderTypeId'])->firstOrFail();// Retrieving gendertype from Gender table

	$raceTypeData = $request->json()->get('raceType');// Getting racetype id from json
	$raceTypeId = \App\Race::where('raceTypeId', $raceTypeData['raceTypeId'])->firstOrFail(); //Retrieving racetype from Race table
	
	$referIdData = $request->json()->get('refer');//Getting refer id from json
	$referId = \App\Refer::where('referId', $referIdData['referId'])->firstOrFail();//Retrieving gendertype from Gender table

	$housingTypeData = $request->json()->get('housingType');//Getting housingtype id from json

	$housingTypeId = \App\HousingType::where('housingTypeId', $housingTypeData['housingTypeId'])->firstOrFail();//Retrieving racetype from Housing type table
	$sexualOrientationTypeData = $request->json()->get('sexualOrientationType');
	$sexualOrientationTypeId = \App\SexualOrientation::where('sexualOrientationTypeId', $sexualOrientationTypeData['sexualOrientationTypeId'])->firstOrFail();
	$casemanagerIdData = $request->json()->get('casemanager');
	$casemanagerId = \App\Casemanager::where('casemanagerId', $casemanagerIdData['casemanagerId'])->firstOrFail();
	$addressIdData= $request->json()->get('address');

	$address = \App\Address::where('addressId', $addressIdData['addressId'])->firstOrFail();

  	/* Edit user or update his details if a post request comes in with a uid.
  	Else a new user is created.*/
    if (empty($uid)) {
    	$user = new \App\User;
    } else {
    	$user = \App\User::where('uid',$uid)->first();
    }

    $user->fname = $fName; /*user variable assigns its the already collected fName(from JSON) and so on */ 
	$user->lname = $lName;
	$user->email = $email;
	$user->username = $username;
    if($password != $user->password && sha1($password) != $user->password)    {
        $user->password = sha1($password);
    }
	$user->dob = $dob;
	$user->ssn = $ssn;
	$user->mobPhone = $mobPhone;
	$user->printLang = $printLang;
	$user->oralLang = $oralLang;
	$user->isVeteran=$isVeteran;
	$user->active=$active;
	$user->userTypeId = $userTypeData['userTypeId'];
	$user->genderTypeId = $genderTypeData['genderTypeId'];
	$user->raceTypeId = $raceTypeData['raceTypeId'];
	$user->housingTypeId = $housingTypeData['housingTypeId'];
	$user->sexualOrientationTypeId = $sexualOrientationTypeData['sexualOrientationTypeId'];
	$user->referId = $referIdData['referId'];
	$user->casemanagerId = $casemanagerIdData['casemanagerId'];
	$user->addressId=$address;
	$user->addressId= $addressIdData['addressId'];

	/* Association between user and refer,casemanager etc are saved in user object */
	$user->refer()->associate($referId)->save();//One to many association
	$user->casemanager()->associate($casemanagerId)->save();//One to many association
	$user->housingType()->associate($housingTypeId)->save();//One to many association
	$user->raceType()->associate($raceTypeId)->save();//One to many association
	$user->sexualOrientationType()->associate($sexualOrientationTypeId)->save();//One to many association
	$user->genderType()->associate($genderTypeId)->save();//One to many association
	$user->userType()->associate($userType)->save();//One to many association
	$user->address()->associate($address)->save();
    if (!empty($foodPrepFacilities)){
    	/*Many to many association between user and his food prep facilities . Collecting the facilities of a user/ */
    	$foodprepIds = [];
    	foreach($foodPrepFacilities as $foodPrepFacility) {
    		$foodPrepId = $foodPrepFacility['prepId'];
    		$foodprepIds[] = $foodPrepId;
    		
    	}
    	$user->foodPrepFacilities()->sync($foodprepIds);
    }

    if(!empty($specialNeeds)){
    	/*Many to many association between user and his special needs. Collecting the specialneeds of a user/ */
    	$specialNeedIds = [];
    	foreach($specialNeeds as $specialNeed){
    		$specialNeedId= $specialNeed['specialNeedId'];
    		$specialNeedIds[] = $specialNeedId;
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
     /*Many to many association between user and diagnosises. Collecting the diagnosises of a user/ */
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

/*Deleting a user*/
$router->delete('/user/{id}',['middleware' => 'auth', function ($id){
	$success= App\User::where('uid', $id)->delete();
	return response()->json(array('success' => $success), 200);
}]);

/*Activating or deactivating a user */ 
$router -> post('/user/activate',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$logged_in_user = $request->user();
	if($logged_in_user->userTypeId==1){
		$uid = $request->json()->get('uid');
		$active = $request->json()->get('active');
		$user = \App\User::where('uid',$uid)->first();
		$user->active = $active;
		$user->save();
		return response()->json(array('success' => true), 200);
	} 
	return response()->json(array('success' => false), 405);
	
}]);

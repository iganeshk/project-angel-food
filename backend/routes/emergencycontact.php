<?php

// emergency contacts endpoints
$router->get('/emergencycontact/{id}/',['middleware' => 'auth', function($id) {
	return \App\EmergencyContact::where('contactId', $id)->get();
}]);
$router->get('/emergencycontacts',['middleware' => 'auth', function () {
    return \App\EmergencyContact::all();
}]);

$router->post('/emergencycontact',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$contactName = $request->json()->get('contactName');
	$phone = $request->json()->get('phone');
	$relation = $request->json()->get('relation'); 

	$emergencycontact = new \App\EmergencyContact;
	$emergencycontact->contactName = $contactName;
	$emergencycontact->phone = $phone;
	$emergencycontact->relation = $relation;
    $emergencycontact->save();
    return response()->json(array('success' => true, 'emergencycontact' => $emergencycontact), 200);
}]);


$router->delete('/emergencycontact/{id}',['middleware' => 'auth', function($id) {
	$success = \App\EmergencyContact::where('contactId', $id)->delete();
	return response()->json(array('success' => $success), 200);
}]);
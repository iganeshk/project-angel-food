<?php

// case manager endpoints
$router->get('/casemanager/{id}/',['middleware' => 'auth', function($id) {
	return \App\Casemanager::where('caseManagerId', $id)->get();
}]);

$router->get('/casemanagers',['middleware' => 'auth', function () {
    return \App\Casemanager::all();
}]);
$router -> post('/casemanager',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$casemanagerName = $request->json()->get('caseManagerName');
	$casemanagerPhone = $request->json()->get('caseManagerPhone');
	$casemanagerFax = $request->json()->get('caseManagerFax'); 
	$casemanagerAgency= $request->json()->get('caseManagerAgency');

	$casemanager = new \App\Casemanager;
	$casemanager->caseManagerName = $casemanagerName;
	$casemanager->caseManagerPhone = $casemanagerPhone;
	$casemanager->caseManagerFax = $casemanagerFax;
	$casemanager->casemanagerAgency = $casemanagerAgency;
    $casemanager->save();
    return response()->json(array('success' => true, 'caseManager' => $casemanager), 200);
}]);


$router->delete('/casemanager/{id}',['middleware' => 'auth', function($id) {
	$success = \App\Casemanager::where('caseManagerId', $id)->delete();
	return response()->json(array('success' => $success), 200);
}]);
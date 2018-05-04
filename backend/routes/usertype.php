<?php


// userType endpoints
$router->get('/usertype/{id}',['middleware' => 'auth', function($id) {
	return \App\UserType::where('userTypeId', $id)->get();
}]);

$router->get('/usertypes',['middleware' => 'auth', function () {
    return \App\UserType::all();
}]);
$router -> post('/usertype',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$userTypeName = $request->json()->get('userTypeName');
	
	$userType = new \App\UserType;
	$userType->userTypeName = $userTypeName;
	
    $userType->save();
    return response()->json(array('success' => true, 'userType' => $userType), 200);

}]);
<?php


// gender endpoints
$router->get('/gender/{id}',['middleware' => 'auth', function($id) {
	return \App\Gender::where('genderTypeId', $id)->get();
}]);

$router->get('/genders', ['middleware' => 'auth', function () {
    return \App\Gender::all();
}]);

$router -> post('/gender',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$genderTypeName = $request->json()->get('genderTypeName');
	
	$gender = new \App\Gender;
	$gender->genderTypeName = $genderTypeName;
	
    $gender->save();
    return response()->json(array('success' => true, 'gender' => $gender), 200);

}]);
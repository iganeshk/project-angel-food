<?php

// food prep facilities endpoints
$router->get('/foodprepfacility/{id}',['middleware' => 'auth', function($id) {
	return \App\FoodPrepFacility::where('prepId', $id)->get();
}]);

$router->get('/foodprepfacilities',['middleware' => 'auth', function () {
    return \App\FoodPrepFacility::all();
}]);
$router -> post('/foodprepfacility',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$prepName = $request->json()->get('prepName');
	
	$foodprepfacility = new \App\FoodPrepFacility;
	$foodprepfacility->prepName = $prepName;
	$foodprepfacility->save();
    return response()->json(array('success' => true, 'foodprepfacility' => $foodprepfacility), 200);

}]);
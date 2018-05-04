<?php

// refer type endpoints
$router->get('/refertype/{id}',['middleware' => 'auth', function($id) {
	return \App\ReferType::where('referTypeId', $id)->get();
}]);

$router->get('/refertypes',['middleware' => 'auth', function () {
    return \App\ReferType::all();
}]);
$router -> post('/refertype',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$referTypeName = $request->json()->get('referTypeName');
	
	$refertype = new \App\ReferType;
	$refertype->referTypeName = $referTypeName;
	$refertype->save();
    return response()->json(array('success' => true, 'refertype' => $refertype), 200);

}]);